<?php

namespace App\Controller;

use Core\Controller\Traits\BaseController;
use Core\Entity\CheckType;
use Core\Entity\CheckValidator;
use Core\Entity\CookieConfiguration;
use Core\Entity\ErrorCode;
use Sender\Service\Email\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller répondant aux methods "POST" de l'application
 *
 * @Route("/app_ajax", name="app_ajax_")
 */
class ActionController extends AbstractController
{
    use BaseController;

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, Mailer $mailer)
    {
        // Champs obligatoires
        $informations = [
            'contact_firstname' => CheckValidator::sanitize($request->request->get('contact_firstname'), CheckType::STRING),
            'contact_lastname' => CheckValidator::sanitize($request->request->get('contact_lastname'), CheckType::STRING),
            'contact_email' => CheckValidator::sanitize($request->request->get('contact_email'), CheckType::EMAIL),
            'contact_phone' => CheckValidator::sanitize($request->request->get('contact_phone'), CheckType::PHONE),
            'contact_subject' => CheckValidator::sanitize($request->request->get('contact_subject'), CheckType::STRING),
            'contact_message' => CheckValidator::sanitize($request->request->get('contact_message'), CheckType::TEXT),
            'contact_token' => CheckValidator::sanitize($request->request->get('contact_token'), CheckType::STRING),
        ];

        // Champs optionnels
        $options = [];

        //  Validation des informations obligatoire reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 500);
        }

        // Obtention des informations pour une validation par ReCaptcha
        $recaptcha_validation = true;
        $userIp = $this->findCurrentIp($request);
        $configuration = $this->getDoctrine()->getRepository(CookieConfiguration::class)->find(1);

        // Validation - ReCaptcha V2
        if ($configuration->getRecaptchaVersion() == '2') {

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $configuration->getRecaptchaServer() . "&response=" . $informations['contact_token']['value'] . "&remoteip=" . $userIp);
            $responseKeys = json_decode($response, true);
            $recaptcha_validation = intval($responseKeys["success"]) == 1 ? true : false;

        }

        // Validation - ReCaptcha V3
        if($configuration->getRecaptchaVersion() == '3'){
            $recaptcha = new \ReCaptcha\ReCaptcha($configuration->getRecaptchaServer());
            $resp = $recaptcha->setExpectedHostname($configuration->getRecaptchaHostname())
                ->setExpectedAction('contact')
                ->setScoreThreshold(0.5)
                ->verify($informations['contact_token']['value'], $userIp);

            if ($resp->isSuccess()) {
                $recaptcha_validation = true;
            } else {
                $recaptcha_validation = false;
                $errors = $resp->getErrorCodes();
            }
        }

        // Validation approuvée
        if ($recaptcha_validation) {

            // Destinatiares de l'e-mail
            $recipients = [
                'william@delit.fr', 'tracking@delit-dinfluence.fr'
            ];

            $statistics = [];

            // Envois de l'e-mail
            foreach ($recipients as $recipient) {

                try {

                    /* Initialisation de l'email */
                    $mailer->initialize('contact');

                    $template = $this->renderView('@app/email/contact.html.twig', $informations);

                    // Envoi vers le développeur ( ou la société )
                    $mailer->compose($recipient, $template)->send();

                    $statistics[] = [
                        'recipient' => $recipient,
                        'state' => 'Envoyé',
                        'error' => ''
                    ];

                } catch (\Exception $e) {

                    $statistics[] = [
                        'recipient' => $recipient,
                        'state' => "Une erreur s'est produite",
                        'error' => $e->getMessage()
                    ];
                }

            }

            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_SENT),
                'code' => ErrorCode::FORM_SENT,
                'content' => [
                    'statistics' => $statistics
                ]
            ], 200);

        }

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_TOKEN_CONFIRMATION),
            'code' => ErrorCode::FORM_INVALID_TOKEN_CONFIRMATION,
            'content' => [
                'errors' => $errors
            ]
        ], 200);
    }

    /**
     * @Route("/ajax/research-clear", name="research_clear_all")
     */
    public function research_clear(Request $request)
    {
        $this->session->set('searches', []);

        return new JsonResponse();
    }


}
