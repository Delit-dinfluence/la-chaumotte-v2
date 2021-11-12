<?php

namespace User\Controller;

use Core\Controller\Traits\BaseController;
use Core\Entity\CheckType;
use Core\Entity\CheckValidator;
use Core\Entity\ErrorCode;
use Core\Entity\SocialNetwork;
use DateTime;
use Sender\Service\Email\Mailer;
use Shopping\Controller\Traits\BaseShoppingController;
use Shopping\Entity\Customer;
use Shopping\Entity\CustomerAddress;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use User\Entity\User;
use User\Entity\UserGroup;

class ActionController extends AbstractController
{
    use BaseController;
    use BaseShoppingController;

    /**
     * Connexion à l'espace administration
     *
     * @Route("/fr/login/admin", name="user_login_admin")
     */
    public function admin_login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        return $this->redirect('/logout');

        $this->initializeController($request);

        $this->vars['social_networks'] = $this->getDoctrine()->getRepository(SocialNetwork::class)->findWhere('entity.is_enabled = 1');

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->get('form.factory')
            ->createNamedBuilder(null)
            ->add('_username', null, [])
            ->add('_password', PasswordType::class, [])
            ->add('submit', SubmitType::class, [])
            ->getForm();


        ($error != null ? $errors = true : $errors = false);

        $this->vars['errors'] = $errors;


        return $this->generateTemplate('@user/login', [
            'mainNavLogin' => true, 'title' => 'Connexion',
            'form' => $form->createView(),
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * Déconnexion par un utilisateur
     *
     * @Route("/logout", name="logout")
     */
    public function user_logout(Request $request)
    {

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::SUCCESS),
            'code' => ErrorCode::SUCCESS,
            'content' => []
        ], 200);
    }

    /**
     * Mise en session d'une redirection après connexion
     *
     * @Route ("/ajax/connect/submit", name="connect_redirect")
     */
    public function connectRedirect(Request $request)
    {
        $informations = [
            'redirect' => CheckValidator::sanitize($request->query->get('redirect'), CheckType::STRING),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        $this->session->set('connect_redirect', $informations['redirect']['value']);

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::SUCCESS),
            'code' => ErrorCode::SUCCESS,
            'content' => []
        ], 200);
    }

    /**
     * Connexion par un utilisateur
     *
     * @Route("/ajax/login", name="user_login")
     */
    public function user_login(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->initializeController($request);
        $this->setPages();

        $informations = [
            'email' => CheckValidator::sanitize($request->query->get('email'), CheckType::STRING),
            'password' => CheckValidator::sanitize($request->query->get('password'), CheckType::STRING),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Récupération de l'utilisateur
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $informations['email']['value']
        ]);

        // ECHEC - Utilisateur inconnu
        if ($user == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::ENTITY_NOT_FOUND),
                'code' => ErrorCode::ENTITY_NOT_FOUND,
                'content' => [

                ]
            ], 404);
        }

        // ECHEC - Mot de passe incorrect
        if (!$passwordEncoder->isPasswordValid($user, $informations['password']['value'])) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_PASSWORD_CHECK),
                'code' => ErrorCode::FORM_INVALID_PASSWORD_CHECK,
                'content' => []
            ], 401);
        }

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        // Authentification de l'utilisateur
        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
        $this->get('security.token_storage')->setToken($token);
        $this->get('session')->set('_security_main', serialize($token));
        $this->session->set('user', $user); // Mise en session de l'utilisateur

        // Récupération du panier de l'utilisateur
        $cart = $this->cart_manager->getCart()['products'];

        foreach ($cart as $item) {
            $product = new \Shopping\Service\Product\Product($this->getDoctrine());
            $product->createProduct($item['product']->getId(), $item['attributes']);

            $this->cart_manager->update($product, $item['quantity']);
        }

        // Redirection vers le compte par default
        if(array_key_exists('account', $this->vars['pages'])) {
            $redirect = $this->vars['pages']['account']->getUri();
        } else {
            $redirect = '/4DM1n157R4710N';
        }

        $redirect = '/4DM1n157R4710N';

        // Utilisation d'une redirection après la connexion
        if ($this->session->has('connect_redirect')) {
            $redirect = $this->session->get('connect_redirect');
        }

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::USER_LOGGED),
            'code' => ErrorCode::USER_LOGGED,
            'content' => [
                'redirect' => $redirect
            ]
        ], 200);
    }

    /**
     * Inscription par un utilisateur
     *
     * @Route("/ajax/register", name="user_register")
     */
    public function user_register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $informations = [
            'title' => CheckValidator::sanitize($request->query->get('title'), CheckType::INTEGER),
            'firstname' => CheckValidator::sanitize($request->query->get('firstname'), CheckType::STRING),
            'lastname' => CheckValidator::sanitize($request->query->get('lastname'), CheckType::STRING),
            'email' => CheckValidator::sanitize($request->query->get('email'), CheckType::STRING),
            'password' => CheckValidator::sanitize($request->query->get('password'), CheckType::STRING),
            'password_confirm' => CheckValidator::sanitize($request->query->get('password_confirm'), CheckType::STRING),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // ECHEC - Vérification de la confirmation du mot de passe
        if ($informations['password']['value'] != $informations['password_confirm']['value']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_PASSWORD_CHECK),
                'code' => ErrorCode::FORM_INVALID_PASSWORD_CHECK,
                'content' => []
            ], 401);
        }

        // Vérification de l'inexistance de l'utilisateur
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $informations['email']['value']
        ]);

        // ECHEC - Adresse e-mail déjà utilisé pour un autre utilisateur
        if ($user != null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_ALREADY_EXIST),
                'code' => ErrorCode::USER_ALREADY_EXIST,
                'content' => []
            ], 403);
        }

        $entityManager = $this->getDoctrine()->getManager();

        // Création de l'utilisateur
        $user = new User();

        $user->setIsEnabled(true);
        $user->setFirstname($informations['firstname']['value']);
        $user->setLastname($informations['lastname']['value']);
        $user->setEmail($informations['email']['value']);

        $password = $passwordEncoder->encodePassword($user, $informations['password']['value']);
        $user->setPassword($password);

        // Attribution des roles && groupes
        $user->addRole("ROLE_USER");

        $memberGroup = $this->getDoctrine()->getRepository(UserGroup::class)->find(3);
        $visitorGroup = $this->getDoctrine()->getRepository(UserGroup::class)->find(4);

        $memberGroup->addUser($user);
        $visitorGroup->addUser($user);

        $entityManager->persist($memberGroup);
        $entityManager->persist($visitorGroup);

        $entityManager->persist($user);

        // Création de la partie client de l'utilisateur
        $customer = new Customer();
        $customer->setIsEnabled(true);
        $customer->setTitle($informations['title']['value']);
        $user->setCustomer($customer);

        $entityManager->persist($customer);

        // Sauvegarde en base de donnée
        $entityManager->flush();

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::USER_CREATED),
            'code' => ErrorCode::USER_CREATED,
            'content' => []
        ], 200);
    }

    /**
     * Demande de mot de passe oublié par un utilisateur
     *
     * @Route("/ajax/forgot-password", name="user_forgot_password")
     */
    public function user_password_forgotten(Request $request, Mailer $mailer)
    {
        $informations = [
            'email' => CheckValidator::sanitize($request->query->get('email'), CheckType::EMAIL),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Vérification de l'existance de l'utilisateur
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $informations['email']['value']
        ]);

        // ECHEC - Utilisateur inconnu
        if ($user == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_DOES_NOT_EXIST),
                'code' => ErrorCode::USER_DOES_NOT_EXIST,
                'content' => []
            ], 404);
        }

        // Génération du token de réinitialisation du mot de passe
        $informations['forgot_token']['value'] = $token = bin2hex(random_bytes(16));

        // Sauvegarde du Token et de la date de la demande de réinitialisation
        $em = $this->getDoctrine()->getManager();

        $user->setForgotToken($token);
        $user->setForgotTime(new \Datetime());

        $em->persist($user);
        $em->flush();

        // Génération de la configuration l'e-mail
        $mailer->initialize('email_forgot_password');

        // Génération de la vue de l'e-mail
        $template = $this->renderView('@app/account/email_forgot_password.html.twig', $informations);

        // Envoi vers l'utilisateur
        $mailer->compose($informations['email']['value'], $template)->send();

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::MESSAGE_SENT),
            'code' => ErrorCode::MESSAGE_SENT,
            'content' => []
        ], 200);
    }

    /**
     * Modification du mot de passe oublié par un utilisateur
     *
     * @Route("/ajax/forgot-password-reset", name="user_forgot_password_reset")
     */
    public function user_password_forgotten_reset(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $informations = [
            'token' => CheckValidator::sanitize($request->query->get('token'), CheckType::STRING),
            'email' => CheckValidator::sanitize($request->query->get('email'), CheckType::STRING),
            'password' => CheckValidator::sanitize($request->query->get('password'), CheckType::STRING),
            'password_confirm' => CheckValidator::sanitize($request->query->get('password_confirm'), CheckType::STRING),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // ECHEC - Vérification de la confirmation du mot de passe
        if ($informations['password']['value'] != $informations['password_confirm']['value']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_PASSWORD_CONFIRMATION),
                'code' => ErrorCode::FORM_INVALID_PASSWORD_CONFIRMATION,
                'content' => []
            ], 422);
        }

        // Vérification de l'inexistance de l'utilisateur
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $informations['email']['value']
        ]);

        // ECHEC - Aucun utilisateur avec cette adresse e-mail
        if ($user == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_DOES_NOT_EXIST),
                'code' => ErrorCode::USER_DOES_NOT_EXIST,
                'content' => []
            ], 404);
        }

        // ECHEC - Erreur de confirmation du token
        if ($user->getForgotToken() != $informations['token']['value']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_TOKEN_CONFIRMATION),
                'code' => ErrorCode::FORM_INVALID_TOKEN_CONFIRMATION,
                'content' => []
            ], 422);
        }


        $maxTime = $user->getForgotTime();
        $maxTime->modify('+1 day');

        $nowTime = new DateTime();

        // ECHEC - Temps écoulé pour la réinitialisation
        if ($nowTime > $maxTime) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::TIMEOUT_EXCEEDED),
                'code' => ErrorCode::TIMEOUT_EXCEEDED,
                'content' => []
            ], 408);
        }

        $em = $this->getDoctrine()->getManager();

        $password = $passwordEncoder->encodePassword($user, $informations['password']['value']);
        $user->setPassword($password);
        $user->setForgotToken(null);

        $em->persist($user);

        $em->flush();

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => []
        ], 200);
    }

//    /**
//     * @Route("/ajax/user/account", name="user_account")
//     */
//    public function user_account(Request $request)
//    {
//        $this->setPages();
//
//        return $this->redirect($this->vars['pages']['account']->getUri());
//    }

    /**
     * Modification des informations par un utilisateur
     *
     * @Route("/ajax/update/infos", name="user_update_infos")
     */
    public function update_infos(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $informations = [
            'title' => CheckValidator::sanitize($request->query->get('title'), CheckType::INTEGER),
            'firstname' => CheckValidator::sanitize($request->query->get('firstname'), CheckType::STRING),
            'lastname' => CheckValidator::sanitize($request->query->get('lastname'), CheckType::STRING),
            'password_check' => CheckValidator::sanitize($request->query->get('password_check'), CheckType::STRING),
        ];

        $options = [
            'birthday' => CheckValidator::sanitize($request->query->get('birthday'), CheckType::STRING),
            'phone' => CheckValidator::sanitize($request->query->get('phone'), CheckType::STRING),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Récupération de l'utilisateur en session
        $entity = new User();
        $session_content = $this->session->get('user');
        $entity->unserialize($session_content);

        // Récupération des données en BDD
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $entity->getEmail()
        ]);

        // ECHEC - Utilisateur inconnu
        if ($user == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_DOES_NOT_EXIST),
                'code' => ErrorCode::USER_DOES_NOT_EXIST,
                'content' => []
            ], 404);
        }

        // ECHEC - Mot de passe incorrect
        if (!$passwordEncoder->isPasswordValid($user, $informations['password_check']['value'])) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_PASSWORD_CHECK),
                'code' => ErrorCode::FORM_INVALID_PASSWORD_CHECK,
                'content' => []
            ], 401);
        }

        $em = $this->getDoctrine()->getManager();

        $user->setFirstname($informations['firstname']['value']);
        $user->setLastname($informations['lastname']['value']);
        $em->persist($user);

        $customer = $user->getCustomer();
        $customer->setTitle($informations['title']['value']);
        $customer->setBirthday($options['birthday']['value']);
        $customer->setPhone($options['phone']['value']);

        $em->persist($customer);
        $em->flush();

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => []
        ], 200);
    }

    /**
     * Modification du mot de passe par un utilisateur
     *
     * @Route("/ajax/update/password", name="user_update_password")
     */
    public function update_password(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $informations = [
            'password_check' => CheckValidator::sanitize($request->query->get('password_check'), CheckType::STRING),
            'password' => CheckValidator::sanitize($request->query->get('password'), CheckType::EMAIL),
            'password_confirm' => CheckValidator::sanitize($request->query->get('password_confirm'), CheckType::EMAIL),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // ECHEC - Vérification de la confirmation du mot de passe
        if ($informations['password']['value'] != $informations['password_confirm']['value']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_PASSWORD_CONFIRMATION),
                'code' => ErrorCode::FORM_INVALID_PASSWORD_CONFIRMATION,
                'content' => []
            ], 401);
        }

        // Récupération de l'utilisateur en session
        $entity = new User();
        $session_content = $this->session->get('user');
        $entity->unserialize($session_content);

        // Vérification de l'inexistance de l'utilisateur
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $entity->getEmail()
        ]);

        // ECHEC - Création de l'utilisateur
        if ($user == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_DOES_NOT_EXIST),
                'code' => ErrorCode::USER_DOES_NOT_EXIST,
                'content' => []
            ], 404);
        }

        // ECHEC - Mot de passe incorrect
        if (!$passwordEncoder->isPasswordValid($user, $informations['password_check']['value'])) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_PASSWORD_CHECK),
                'code' => ErrorCode::FORM_INVALID_PASSWORD_CHECK,
                'content' => []
            ], 401);
        }

        $em = $this->getDoctrine()->getManager();

        $password = $passwordEncoder->encodePassword($user, $informations['password']['value']);
        $user->setPassword($password);

        $em->persist($user);

        $em->flush();

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => []
        ], 200);

    }

    /**
     * Modification de l'adresse e-mail par un utilisateur
     *
     * @Route("/ajax/update/email", name="user_update_email")
     */
    public function update_email(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $informations = [
            'password_check' => CheckValidator::sanitize($request->query->get('password_check'), CheckType::STRING),
            'email' => CheckValidator::sanitize($request->query->get('email'), CheckType::EMAIL),
            'email_confirm' => CheckValidator::sanitize($request->query->get('email_confirm'), CheckType::EMAIL),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // ECHEC - Vérification de la confirmation de l'adresse e-mail
        if ($informations['email']['value'] != $informations['email_confirm']['value']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_EMAIL_CONFIRMATION),
                'code' => ErrorCode::FORM_INVALID_EMAIL_CONFIRMATION,
                'content' => []
            ], 422);
        }

        // Récupération de l'utilisateur en session
        $entity = new User();
        $session_content = $this->session->get('user');
        $entity->unserialize($session_content);

        // Récupération des données en BDD
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $entity->getEmail()
        ]);

        // ECHEC - Aucun utilisateur avec cette adresse e-mail
        if ($user == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_DOES_NOT_EXIST),
                'code' => ErrorCode::USER_DOES_NOT_EXIST,
                'content' => []
            ], 404);
        }

        // ECHEC - Mot de passe incorrect
        if (!$passwordEncoder->isPasswordValid($user, $informations['password_check']['value'])) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID_PASSWORD_CHECK),
                'code' => ErrorCode::FORM_INVALID_PASSWORD_CHECK,
                'content' => []
            ], 401);
        }

        // Modification de l'utilisateur
        $em = $this->getDoctrine()->getManager();

        $user->setEmail($informations['email']['value']);
        $em->persist($user);

        $em->flush();

        $this->session->set('user', $user); // Mise en session de l'utilisateur

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => []
        ], 200);
    }

    /**
     * Modification de l'adhésion aux newsletters par un utilisateur
     *
     * @Route("/ajax/update/newsletter", name="user_update_newsletter")
     */
    public function update_newsletter(Request $request)
    {
        $informations = [
            'newsletter' => CheckValidator::sanitize($request->query->get('newsletter'), CheckType::STRING),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Récupération de l'utilisateur en session
        $entity = new User();
        $session_content = $this->session->get('user');
        $entity->unserialize($session_content);

        // Récupération des données en BDD
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $entity->getEmail()
        ]);

        // Aucun utilisateur avec cette adresse e-mail
        if ($user == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_DOES_NOT_EXIST),
                'code' => ErrorCode::USER_DOES_NOT_EXIST,
                'content' => []
            ], 404);
        }

        $em = $this->getDoctrine()->getManager();

        $customer = $user->getCustomer();
        $customer->setUseNewsletter($informations['newsletter']['value']);
        $em->persist($customer);

        $em->flush();

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => []
        ], 200);
    }

    /**
     * Récupération du template - Création d'une adresse par un utilisateur
     *
     * @Route("/ajax/create/address/template", name="user_create_address_template")
     */
    public function create_address_template(Request $request)
    {
        $this->setPages();

        $this->vars['address'] = $address = new CustomerAddress();

        $template = $this->renderView('@app/shopping/delivery/address_form.html.twig', $this->vars);

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::TEMPLATE_RETURNED),
            'code' => ErrorCode::TEMPLATE_RETURNED,
            'content' => [
                'template' => $template
            ]
        ], 200);
    }

    /**
     * Récupération du template - Modification d'une adresse par un utilisateur
     *
     * @Route("/ajax/update/address/template", name="user_update_address_template")
     */
    public function update_address_template(Request $request)
    {
        $informations = [
            'address_id' => CheckValidator::sanitize($request->query->get('address_id'), CheckType::INTEGER),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        $this->setUserSettings($request);
        $this->setPages();
        $this->vars['address'] = $address = $this->getDoctrine()->getRepository(CustomerAddress::class)
            ->find($informations['address_id']['value']);

        // ECHEC - L'utilisateur n'est pas le propriétaire de l'adresse demandée
        if ($address != null && $address->getCustomer()->getId() != $this->vars['account']['customer']->getId()) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_NOT_OWNER),
                'code' => ErrorCode::USER_NOT_OWNER,
                'content' => []
            ], 403);
        }

        $template = $this->renderView('@app/shopping/delivery/address_form.html.twig', $this->vars);

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::TEMPLATE_RETURNED),
            'code' => ErrorCode::TEMPLATE_RETURNED,
            'content' => [
                'template' => $template
            ]
        ], 200);

    }

    /**
     * Modification d'une adresse par un utilisateur
     *
     * @Route("/ajax/update/address", name="user_update_address")
     */
    public function update_address(Request $request)
    {
        $informations = [
            'id' => CheckValidator::sanitize($request->query->get('id'), CheckType::INTEGER),
            'designation' => CheckValidator::sanitize($request->query->get('designation'), CheckType::STRING),
            'title' => CheckValidator::sanitize($request->query->get('title'), CheckType::INTEGER),
            'lastname' => CheckValidator::sanitize($request->query->get('lastname'), CheckType::STRING),
            'firstname' => CheckValidator::sanitize($request->query->get('firstname'), CheckType::STRING),
            'address' => CheckValidator::sanitize($request->query->get('address'), CheckType::STRING),
            'zip_code' => CheckValidator::sanitize($request->query->get('zip_code'), CheckType::STRING),
            'city' => CheckValidator::sanitize($request->query->get('city'), CheckType::STRING),
            'country' => CheckValidator::sanitize($request->query->get('country'), CheckType::STRING),
        ];

        $options = [
            'company' => CheckValidator::sanitize($request->query->get('company'), CheckType::STRING),
            'complement' => CheckValidator::sanitize($request->query->get('complement'), CheckType::STRING),
            'instruction' => CheckValidator::sanitize($request->query->get('instruction'), CheckType::STRING),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }


        // Récupération de l'utilisateur en session
        $this->setUserSettings($request);

        $entity = new User();
        $session_content = $this->session->get('user');
        $entity->unserialize($session_content);

        // Récupération des données en BDD
        $user = $this->getDoctrine()->getRepository(User::class)->find($entity->getId());

        // L'utilisateur n'existe pas
        if ($user == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_DOES_NOT_EXIST),
                'code' => ErrorCode::USER_DOES_NOT_EXIST,
                'content' => [

                ]
            ], 404);
        }

        // Sauvegarde de l'adresse
        $em = $this->getDoctrine()->getManager();
        $customer = $user->getCustomer();

        if ($informations['id']['value'] <= 0) { // Nouvelle adresse

            $address = new CustomerAddress();

        } else { // Edition d'une adresse

            $address = $this->getDoctrine()->getRepository(CustomerAddress::class)
                ->find($informations['id']['value']);

            // ECHEC - L'utilisateur n'est pas le propriétaire de l'adresse demandée
            if ($address->getCustomer()->getId() != $this->vars['account']['customer']->getId()) {
                return new JsonResponse([
                    'text' => ErrorCode::getTypeName(ErrorCode::USER_DOES_NOT_EXIST),
                    'code' => ErrorCode::USER_DOES_NOT_EXIST,
                    'content' => []
                ], 403);
            }
        }

        $address->setDesignation($informations['designation']['value']);
        $address->setTitle($informations['title']['value']);
        $address->setFirstname($informations['firstname']['value']);
        $address->setLastname($informations['lastname']['value']);
        $address->setAddress($informations['address']['value']);
        $address->setComplement($options['complement']['value']);
        $address->setZipCode($informations['zip_code']['value']);
        $address->setCity($informations['city']['value']);
        $address->setCountry($informations['country']['value']);
        $address->setInstruction($options['instruction']['value']);

        $em->persist($address);

        if ($informations['id']['value'] <= 0) { // Nouvelle adresse
            $customer->addAddress($address);
        }

        $em->persist($customer);
        $em->flush();

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => []
        ], 200);

    }

    /**
     * Suppression d'une adresse par un utilisateur
     *
     * @Route("/ajax/remove/address", name="user_remove_address")
     */
    public function remove_address(Request $request)
    {
        $informations = [
            'id' => CheckValidator::sanitize($request->query->get('id'), CheckType::INTEGER),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        $this->setUserSettings($request);

        $em = $this->getDoctrine()->getManager();
        $address = $this->getDoctrine()->getRepository(CustomerAddress::class)
            ->find($informations['id']['value']);

        // ECHEC - Aucune adresse trouvée
        if ($address == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::ENTITY_NOT_FOUND),
                'code' => ErrorCode::ENTITY_NOT_FOUND,
                'content' => [

                ]
            ], 404);
        }

        // ECHEC - L'utilisateur n'est pas le propriétaire de l'adresse demandée
        if ($address->getCustomer()->getId() != $this->vars['account']['customer']->getId()) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::USER_NOT_OWNER),
                'code' => ErrorCode::USER_NOT_OWNER,
                'content' => [

                ]
            ], 403);
        }

        $em->remove($address);
        $em->flush();

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => []
        ], 200);

    }

}
