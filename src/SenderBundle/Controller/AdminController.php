<?php

namespace Sender\Controller;

use Core\Controller\Traits\BaseAdminController;
use Core\Controller\Traits\BaseController;
use Sender\Entity\Email;
use Sender\Entity\EmailApplication;
use Sender\Entity\EmailTemplate;
use Sender\Entity\Inbox;
use Sender\Service\Email\SendinBlue;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller de l'espace d'administration
 *
 * @Route("/4DM1n157R4710N/sender", name="sender_admin_")
 */
class AdminController extends AbstractController
{
    use BaseController;
    use BaseAdminController;

    /**
     * Nom du bundle
     */
    protected $bundle_name = 'sender';


    public function email_configuration_form(Request $request)
    {
        $emails = $this->getDoctrine()->getRepository(Email::class)->findAll();
        $applications = $this->getDoctrine()->getRepository(EmailApplication::class)->findAll();

        return $this->generateTemplate($this->vars['template'], [
            'email' => new Email(),
            'emails' => $emails,
            'emails_settings' => $this->configuration_from_file['email'],

            'application' => new EmailApplication(),
            'applications' => $applications,
            'applications_settings' => $this->configuration_from_file['email_application'],
        ]);
    }

    /**
     * Surchage du controlelr de la page "Boite de réception"
     */
    public function inbox_list()
    {
        $inbox = $this->getDoctrine()->getRepository(Inbox::class)->findAll();

        return $this->generateTemplate($this->vars['template'], [
            'inbox' => $inbox
        ]);
    }

    /**
     * @Route("/inbox/open", name="inbox_open")
     */
    public function inbox_open(Request $request)
    {
        $output = [];
        $code = 200;

        $id = $request->request->get('id');

        $entity = $this->getDoctrine()->getRepository(Inbox::class)->findWhere('entity.id =' . $id, 1);

        $em = $this->getDoctrine()->getManager();
        $entity->setIsReaded(true);
        $em->persist($entity);
        $em->flush();

        $output['render'] = $this->generateTemplate('@sender/admin/theme/includes/inbox', [
            'item' => $entity
        ], true);

        return new JsonResponse($output, $code);
    }

    /**
     * @Route("/inbox/remove", name="inbox_remove")
     */
    public function inbox_remove(Request $request)
    {
        $output = [];
        $code = 200;

        $id = $request->request->get('id');
        $entity = $this->getDoctrine()->getRepository(Inbox::class)->findWhere('entity.id =' . $id, 1);

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return new JsonResponse($output, $code);

    }

    /**
     * @Route("/builder/save", name="builder_save")
     */
    public function builder_save(Request $request)
    {
        $id = $request->request->get('id');
        $content = $request->request->get('content');


        if ($id != null) {
            $entity = $this->getDoctrine()->getRepository(EmailTemplate::class)->findWhere('entity.id = ' . $id, 1);

        } else {
            $entity = new EmailTemplate();
            $entity->setReference(uniqid());
        }

        $entity->setContent($content);

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();

        return new JsonResponse('', 200);
    }

    public function email_sendin_blue($vars, SendinBlue $sendin_blue)
    {
        $this->vars = $vars;
        $this->vars['account'] = $sendin_blue->getAccount();
        $this->vars['campaigns'] = $sendin_blue->getCampaigns();

        return $this->generateTemplate($this->vars['template']);

    }


}
