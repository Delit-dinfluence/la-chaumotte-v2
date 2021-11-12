<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Entity\History;
use App\Entity\Slide;
use Core\Controller\Traits\BaseController;
use Core\Entity\GoogleMapConfiguration;
use Core\Entity\SocialNetwork;
use Core\Service\History\HistoryMessage;
use Core\Service\Session\Session;
use DateTime;
use http\Env\Response;
use http\Exception;
use Sender\Form\InboxType;
use Sender\Entity\Inbox;
use Sender\Service\Email\Mailer;
use Shopping\Controller\Traits\BaseShoppingController;
use Shopping\Entity\Address;
use Shopping\Entity\AddressType;
use Shopping\Entity\Category;
use Shopping\Entity\Customer;
use Shopping\Entity\CustomerAddress;
use Shopping\Entity\DeliveryHome;
use Shopping\Entity\DeliveryMethod;
use Shopping\Entity\Order;
use Shopping\Entity\OrderStatus;
use Shopping\Entity\PaymentMethod;
use Shopping\Entity\Product;
use Shopping\Entity\ResearchConfiguration;
use Shopping\Entity\ResearchKeyword;
use Shopping\Entity\ShopConfiguration;
use Shopping\Service\Cart\CartManager;
use Shopping\Service\Payment\PaymentManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Validator\Constraints\Date;
use User\Entity\User;
use User\Form\UserType;

/**
 * Controller répondant aux methods "GET" de l'application
 */
class PageController extends AbstractController
{
    use BaseController;
    use BaseShoppingController;

    /**
     * Initialisation de variables communes aux controllers et spécifiques à l'application
     */
    public function initialize(Request $request)
    {
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }


        // Définition des variables
        $this->vars = $request->attributes->get('vars');

        $this->vars['cart'] = $this->cart_manager->getCart();


        // Réseaux sociaux
        $this->vars['social_networks'] = $this->getDoctrine()->getRepository(SocialNetwork::class)->findWhere('entity.is_enabled = 1');

        // Paramèrres recherche
        // TODO Inclure dans la configuration générale
//        $this->vars['research_configuration'] = $this->getDoctrine()->getRepository(ResearchConfiguration::class)->findWhere('entity.id = 1', 1);

        // Catégories
        $this->vars['categories'] = $this->getDoctrine()->getRepository(Category::class)->findWhere('entity.is_enabled = 1');

        $array = $this->getDoctrine()->getRepository(Product::class)->findWhere('entity.is_enabled = 1', 6);

        $random_products = [];
        foreach ($array as $item) {
            $random_products[] = $this->findProduct($item->getId());
        }

        $this->vars['random_products'] = $random_products;
//
//        $securityContext = $this->container->get('security.authorization_checker');
//        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
//            $this->vars['account']['connected'] = true;
//        }


        return new \Symfony\Component\HttpFoundation\Response();
    }

    public function comingsoon(Request $request)
    {

        return $this->generateTemplate('@core/coming_soon');
    }

    public function maintenance(Request $request)
    {

        return $this->generateTemplate('@core/maintenance');
    }


    public function home(Request $request)
    {



        return $this->generateTemplate('@app/home');
    }


    public function mini(Request $request)
    {
        $this->vars['slides'] = $this->getDoctrine()->getRepository(Slide::class)->findBy([
            'is_enabled' => 1
        ]);
        return $this->generateTemplate('@app/mini');
    }

    public function contact(Request $request)
    {
        $this->vars['google_map'] = $google = $this->getDoctrine()->getRepository(GoogleMapConfiguration::class)->find(1);

        return $this->generateTemplate('@app/contact');
    }

    public function research(Request $request)
    {
        try {
            $form = $default_form = $this->createFormBuilder()
                ->add('name', TextType::class)
                ->add('submit', SubmitType::class)
                ->getForm();


            if ($request->getMethod('POST')) {
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $data = $form->getData();

                    $this->vars['search'] = $research = $data['name'];

                    $array = $this->session->get('searches');

                    if ($array == []) {
                        $array = [$research];
                    } else if (!in_array($research, $array)) {
                        $array[] = $research;
                    }

                    $this->session->set('searches', $array);

//                $configuration = $this->vars['research_configuration'];
//                $products = $this->getDoctrine()->getRepository(Product::class)->findByPattern($research, [
//                    'by_reference' => $configuration->getByReference(),
//                    'by_url' => $configuration->getByUrl(),
//                    'by_designation' => $configuration->getByDesignation(),
//                    'by_keywords' => $configuration->getByKeywords(),
//                ]);
                    $products = $this->getDoctrine()->getRepository(Product::class)->findByPattern($research, [
                        'by_reference' => true,
                        'by_url' => true,
                        'by_designation' => true,
                        'by_keywords' => true,
                    ]);

                    $results = [];
                    foreach ($products as $product) {

                        $item = new \Shopping\Service\Product\Product($this->getDoctrine());
                        $results[] = $item->createProduct($product->getId());
                    }

                    $this->vars['products'] = $results;
                }
            }


            $this->vars['searches'] = $searches = $this->session->get('searches');
            $this->vars['suggestions'] = $suggestions = $this->getDoctrine()->getRepository(ResearchKeyword::class)->findWhere('entity.is_enabled = 1');

            return $this->generateTemplate('@app/research', [
                'research_form' => $form->createView()
            ]);
        } catch (\Exception $e) {
            dump($e);
        }
    }


    public function actualites(Request $request)
    {
        $this->vars['actualites'] = $actualites = $this->getDoctrine()->getRepository(Actualite::class)->findWhere('entity.is_enabled = 1', -1, 'sortorder', 'ASC');

        return $this->generateTemplate('@app/actualites', []);
    }

    public function actualite(Request $request)
    {
        $slug = trim($request->getRequestUri(), '/');

        if (preg_match('#/(.)+$#', $slug, $matches)) {
            $slug = trim($matches[0], '/');
            $actualite_slug = explode('/', $slug)[1];
        }

        $this->vars['actualite'] = $actualite = $this->getDoctrine()->getRepository(Actualite::class)->findBySlug($actualite_slug);

        return $this->generateTemplate('@app/actualite', []);
    }


    /**
     * Section custom
     */

    public function customone(Request $request)
    {
        return $this->generateTemplate('@app/custom/custom_one', []);
    }

    public function customtwo(Request $request)
    {
        return $this->generateTemplate('@app/custom/custom_two', []);
    }

    public function customthree(Request $request)
    {

        return $this->generateTemplate('@app/custom/custom_three', []);
    }

    public function customfour(Request $request)
    {
        return $this->generateTemplate('@app/custom/custom_four', []);
    }

    public function customfive(Request $request)
    {
        return $this->generateTemplate('@app/custom/custom_five', []);
    }

    public function customsix(Request $request)
    {
        return $this->generateTemplate('@app/custom/custom_six', []);
    }

    public function customseven(Request $request)
    {
        return $this->generateTemplate('@app/custom/custom_seven', []);
    }

    public function customeight(Request $request)
    {
        return $this->generateTemplate('@app/custom/custom_eight', []);
    }

    public function customnine(Request $request)
    {
        return $this->generateTemplate('@app/custom/custom_nine', []);
    }

    public function customten(Request $request)
    {
        return $this->generateTemplate('@app/custom/custom_ten', []);
    }

    /**
     * Section shopping
     */

    public function category(Request $request)
    {
        $this->vars['categories'] = $categories = $this->getDoctrine()->getRepository(Category::class)->findWhere('entity.is_enabled = 1 and entity.parent is null', -1, 'sortorder', 'ASC');

        return $this->generateTemplate('@app/shopping/categories', []);
    }

    public function products(Request $request)
    {
        $this->initializeController($request);

        $custom = $request->attributes->get('custom_url');
        $id = $request->attributes->get('custom_id');

        if ($custom) {

            $this->vars['category'] = $category = $this->getDoctrine()->getRepository(Category::class)->findWhere('entity.id = ' . $id, 1);

        } else {

            $slug = trim($request->getRequestUri(), '/');

            if (preg_match('#^(.){2}/(.)+$#', $slug, $matches)) {
                $slug = substr($slug, 3);
                $slug = explode('/', $slug)[1];
            }

            // Rechercge par URL
            $this->vars['category'] = $category = $this->getDoctrine()->getRepository(Category::class)->findByUrl($slug);

            // Recherche par SLUG
            if ($category == []) {
                $this->vars['category'] = $category = $this->getDoctrine()->getRepository(Category::class)->findBySlug($slug);
            }

            // Redirection vers un produit
            if ($category == []) {
                return $this->forward('App\Controller\PageController::product', []);
            }

        }

        $this->vars['products'] = $products = $this->findProductByCategory($category->getId());

        return $this->generateTemplate('@app/shopping/products', [
        ]);

    }

    public function product(Request $request)
    {

        $slug = trim($request->getRequestUri(), '/');

        if (preg_match('#^(.){2}/(.)+$#', $slug, $matches)) {
            $slug = substr($slug, 3);
            $product_slug = explode('/', $slug)[1];
        } else {

            $product_slug = $slug;
        }

        $this->vars['product_primary'] = $product = $this->findProduct($product_slug);

        if ($product == null) {
            return $this->forward('App\Controller\PageController::error404');
        }

        if ($product->getSeoTitle() != '')
            $this->vars['seo']['title'] = $product->getSeoTitle();

        if ($product->getSeoDescription() != '')
            $this->vars['seo']['description'] = $product->getSeoDescription();

        if ($product->getSeoKeywords() != '')
            $this->vars['seo']['keywords'] = $product->getSeoKeywords();

        if ($product->getUris() != [])
            $this->vars['uris'] = $product->getUris();

        $this->vars['page_indexable'] = $product->getIsIndexable();

        return $this->generateTemplate('@app/shopping/product', []);
    }

    public function cart(Request $request)
    {
        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        return $this->generateTemplate('@app/shopping/cart', [
            'cart' => $this->cart_manager->getCart()
        ]);
    }

    public function order(Request $request)
    {
        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        // Définition de l'adresse e-mail
        $this->order_manager->setEmail($this->vars['account']['user']->getEmail());

        $this->vars['cart'] = $cart = $this->cart_manager->getCart();

        // Redirection si le panier est vide
        if ($cart['cartTotalProductsCount'] <= 0) {
            return $this->redirect($this->vars['pages']['cart']->getUri());
        }


        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        $deliveries = $this->getDoctrine()->getRepository(DeliveryMethod::class)->findBy(['is_enabled' => 1]);


        $this->vars['deliveries'] = [];
        foreach ($deliveries as $delivery) {
            $item = [];
            $item['reference'] = $delivery->getReference();
            $item['id'] = $delivery->getId();

            $class = $delivery->getControllerModule() . '\Entity\\' . $delivery->getControllerEntity();
            $item['entity'] = $entity = $this->getDoctrine()->getRepository($class)->findOneBy(['id' => 1]);

            if ($entity->getIsEnabled())
                $this->vars['deliveries'][] = $item;
        }


        $payments = $this->getDoctrine()->getRepository(PaymentMethod::class)->findBy(['is_enabled' => 1]);

        $this->vars['payments'] = [];
        foreach ($payments as $payment) {
            $item = [];
            $item['reference'] = $payment->getReference();
            $item['id'] = $payment->getId();

            $class = $payment->getControllerModule() . '\Entity\\' . $payment->getControllerEntity();
            $item['entity'] = $entity = $this->getDoctrine()->getRepository($class)->findOneBy(['id' => 1]);

            if ($entity->getIsEnabled() == 1)
                $this->vars['payments'][] = $item;
        }

        return $this->generateTemplate('@app/shopping/order', [
            'order' => $this->order_manager->getOrder()
        ]);
    }

    /**
     * Section  utilisteur
     **/
    public function connect(Request $request)
    {
        // Redirection si l'utilisateur est déjà authentifié
        if ($this->vars['account']['user']->getId() != null) {
            return $this->redirect($this->vars['pages']['account']->getUri());
        }

        return $this->generateTemplate('@app/account/connect', []);
    }

    public function register(Request $request)
    {
        // Redirection si l'utilisateur est déjà authentifié
        if ($this->vars['account']['user']->getId() != null) {
            return $this->redirect($this->vars['pages']['account']->getUri());
        }

        return $this->generateTemplate('@app/account/register', []);
    }

    public function forgotpassword(Request $request)
    {
        // Redirection si l'utilisateur est déjà authentifié
        if ($this->vars['account']['user']->getId() != null) {
            return $this->redirect($this->vars['pages']['account_info']->getUri());
        }

        return $this->generateTemplate('@app/account/forgot_password', []);
    }

    public function forgotpasswordreset(Request $request)
    {
        // Redirection si l'utilisateur est déjà authentifié
        if ($this->vars['account']['user']->getId() != null) {
            return $this->redirect($this->vars['pages']['account_info']->getUri());
        }

        $query = $request->server->get('QUERY_STRING');
        preg_match('/token=([a-zA-Z0-9-_]+)&email=([a-zA-Z0-9@-_\.]+)/', $query, $matches, PREG_OFFSET_CAPTURE);

        $this->vars['forgot_token'] = $token = $matches[1][0];
        $this->vars['forgot_email'] = $email = $matches[2][0];

        // Vérification de l'inexistance de l'utilisateur
        $user = $this->getDoctrine()->getRepository(User::class)->findByEmail($email);

        if ($user == null) {

            // Aucun utilisateur avec cette adresse e-mail
            return $this->redirect($this->vars['pages']['forgot_password']->getUri());
        }

        if ($user->getForgotToken() != $token) {

            // Erreur sur le token
            return $this->redirect($this->vars['pages']['forgot_password']->getUri());
        }

        $maxTime = $user->getForgotTime();
        $maxTime->modify('+1 day');

        $nowTime = new DateTime();

        if ($nowTime > $maxTime) {

            $em = $this->getDoctrine()->getManager();

            $user->setForgotToken(null);
            $user->setForgotTime(null);

            $em->persist($user);
            $em->flush();

            // Temps écoulé pour la réinitialisation
            return $this->generateTemplate('@app/account/forgot_password_expire', []);
        }

        return $this->generateTemplate('@app/account/forgot_password_reset', []);
    }

    public function disconnect(Request $request)
    {
        return $this->redirect('/logout');
    }

    /**
     * Section compte utilisteur
     **/

    public function initializeAccount(Request $request)
    {
        return true;
    }

    public function account(Request $request)
    {
        if (!$this->initializeAccount($request)) {
            return $this->redirect('/connexion');
        }

        return $this->generateTemplate('@app/account/dashboard', [
        ]);
    }

    public function accountinfo(Request $request)
    {
        if (!$this->initializeAccount($request)) {
            return $this->redirect('/connexion');
        }


        return $this->generateTemplate('@app/account/info', [
        ]);
    }

    public function accountadress(Request $request)
    {
        if (!$this->initializeAccount($request)) {
            return $this->redirect('/connexion');
        }

        $this->vars['addresses'] = $this->getDoctrine()->getRepository(CustomerAddress::class)->findBy([
            'customer' => $this->vars['account']['user']->getId()
        ]);

        return $this->generateTemplate('@app/account/adress', [
        ]);
    }

    public function accountadressform(Request $request)
    {
        try {
            if (!$this->initializeAccount($request)) {
                return $this->redirect('/connexion');
            }

            $slug = trim($request->getRequestUri(), '/');

            if (preg_match('#^(.){2}/(.)+/(.)+/(.)+/(.)+$#', $slug, $matches)) {
                $slug = substr($slug, 3);
                $address_slug = explode('/', $slug)[3];
            }

            $this->vars['address'] = $address = $this->getDoctrine()->getRepository(CustomerAddress::class)->findOneBy([
                'id' => $address_slug
            ]);

            // ECHEC - L'utilisateur n'est pas le propriétaire de l'adresse demandée
            if ($address != null && $address->getCustomer()->getId() != $this->vars['account']['customer']->getId()) {
                return $this->redirect($this->vars['pages']['error404']->getUri());
            }

            return $this->generateTemplate('@app/account/adress_form');
        } catch (\Exception $e) {
            dump($e);
            die();
        }
    }

    public function accounthistoric(Request $request)
    {
        if (!$this->initializeAccount($request)) {
            return $this->redirect('/connexion');
        }

        $this->vars['orders'] = $orders = $this->getDoctrine()->getRepository(Order::class)->findBy([
            'customer' => $this->vars['account']['customer']->getId()
        ]);

        return $this->generateTemplate('@app/account/historic');
    }

    public function accounthistoricdetails(Request $request)
    {
        if (!$this->initializeAccount($request)) {
            return $this->redirect($this->vars['pages']['connect']->getUri());
        }

        $slug = trim($request->getRequestUri(), '/');

        if (preg_match('#^(.){2}/(.)+/(.)+/(.)+$#', $slug, $matches)) {
            $slug = substr($slug, 3);
            $order_slug = explode('/', $slug)[2];
        }

        $this->vars['order'] = $order = $this->getDoctrine()->getRepository(Order::class)->findOneBy([
            'reference' => $order_slug
        ]);

        // ECHEC - L'utilisateur n'est pas le propriétaire de la commande demandée
        if ($order->getCustomer()->getId() != $this->vars['account']['customer']->getId()) {
            return $this->redirect($this->vars['pages']['error404']->getUri());
        }

        return $this->generateTemplate('@app/account/historic_order');
    }

    public function accountnewsletter(Request $request)
    {
        if (!$this->initializeAccount($request)) {
            return $this->redirect('/connexion');
        }

        return $this->generateTemplate('@app/account/newsletter', [
        ]);
    }

    /**
     * Section annexes
     */

    public function about()
    {
        return $this->generateTemplate('@app/annexes/about', []);
    }

    public function cgv()
    {
        return $this->generateTemplate('@app/annexes/cgv', []);
    }

    public function infodelivery()
    {
        return $this->generateTemplate('@app/annexes/info_delivery', []);
    }

    public function infopayment()
    {
        return $this->generateTemplate('@app/annexes/info_payment', []);
    }

    public function faq()
    {
        return $this->generateTemplate('@app/annexes/faq', []);
    }

    public function notice()
    {
        return $this->generateTemplate('@app/annexes/notices', []);
    }


    /**
     * Section erreurs
     */

    public function error403(Request $request)
    {
        $response = $this->generateTemplate('@core/errors/error_403');
        $response->setStatusCode(403);
        return $response;
    }

    public function error404(Request $request)
    {
        $response = $this->generateTemplate('@core/errors/error_404');
        $response->setStatusCode(404);
        return $response;
    }

    public function error(Request $request)
    {
        $response =$this->generateTemplate('@core/errors/error');
        $response->setStatusCode(500);
        return $response;
    }

    /**
     * URL temporaire de retour : Paiement validé
     * -> Redirige vers une URL "propre" de paiement validé
     *
     * @Route ("/payment-success", name="payment_validated")
     */
    public function payment_success(Request $request, Mailer $mailer)
    {
        $this->setPages();
        $query = $request->server->get('QUERY_STRING');

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        // Nettoyage de la session
        $this->cart_manager->clear();
        $this->order_manager->clear();

        // Notification
        $mailer->initialize('email_order');
        $mailer->compose('tracking@delit-dinfluence.fr', 'Content : ' . $query, [
            'subject' => 'Vérification de paiement [ HUBERT BROCHARD ] - USER SUCCESS',
            'from' => 'tracking@delit-dinfluence.fr',
            'sender' => 'Tracking - Délit d\'influence',
        ])->send();

        return $this->redirect($this->vars['pages']['order_validated']->getUri());
    }

    /**
     * URL final de retour : Paiement validé
     */
    public function ordervalidated(Request $request)
    {
        return $this->generateTemplate('@app/shopping/order_validated');
    }

    /**
     * URL temporaire de retour : Paiement annulé
     * -> Redirige vers le panier
     *
     * @route ("payment-cancelled", name="payment_cancelled")
     */
    public function payment_cancelled(Request $request, Mailer $mailer)
    {
        $this->setPages();
        $query = $request->server->get('QUERY_STRING');

        // Notification
        $mailer->initialize('email_order');
        $mailer->compose('tracking@delit-dinfluence.fr', 'Content : ' . $query, [
            'subject' => 'Vérification de paiement [ HUBERT BROCHARD ] - USER CANCELLED',
            'from' => 'tracking@delit-dinfluence.fr',
            'sender' => 'Tracking - Délit d\'influence',
        ])->send();

        return $this->redirect($this->vars['pages']['cart']->getUri());
    }

    /**
     * URL temporaire de retour : Paiement échoué
     * -> Redirige vers une URL "propre" de paiement échoué
     *
     * @route ("payment-failed", name="payment_failed")
     */
    public function payment_failed(Request $request, Mailer $mailer)
    {
        $this->setPages();
        $query = $request->server->get('QUERY_STRING');

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        // Notification
        $mailer->initialize('email_order');
        $mailer->compose('tracking@delit-dinfluence.fr', 'Content : ' . $query, [
            'subject' => 'Vérification de paiement [ HUBERT BROCHARD ] - USER FAILED',
            'from' => 'tracking@delit-dinfluence.fr',
            'sender' => 'Tracking - Délit d\'influence',
        ])->send();

        return $this->redirect($this->vars['pages']['order_failed']->getUri());
    }

    /**
     * URL final de retour : Paiement échoué
     */
    public function orderfailed(Request $request)
    {
        return $this->generateTemplate('@app/shopping/order_failed');
    }


    /**
     * URL de retour : Notification de paiement
     *
     * @route ("payment-notify", name="payment_notify")
     */
    public function payment_notify_credit_agricole(Request $request, Mailer $mailer)
    {
        $query = $request->server->get('QUERY_STRING');

        // Sécurisation de la provenance du retour
        if (!in_array($_SERVER['REMOTE_ADDR'], ['195.101.99.76', '194.2.122.190', '195.25.67.22'])) {
            return new JsonResponse('Not IP provide by paybox', 401);
        }

        $em = $this->getDoctrine()->getManager();

        // Format de la réponse
        preg_match('/order=([a-zA-Z0-9-_]+)&erreur=([a-zA-Z0-9@-_\.]+)&mt=([0-9]+)/', $query, $matches, PREG_OFFSET_CAPTURE);

        $tokens = [
            'order_id' => $matches[1][0],
            'error' => $matches[2][0],
        ];

        preg_match('/([a-zA-Z0-9]+)-([a-zA-Z0-9]+)/', $query, $matches, PREG_OFFSET_CAPTURE);

        $reference = $matches[1][0];

        $order = $this->getDoctrine()->getRepository(Order::class)->findOneBy([
            'reference' => $reference
        ]);

        // Vérirication de l'existance du produit
        if ($order == null) {
            return new JsonResponse('Invalid informations', 401);
        }

        // Opération réussie
        if ($tokens['error'] == '0000') {

            if ($order->getStatus() == OrderStatus::PENDING_PAYMENT) {
                $order->setStatus(OrderStatus::VALIDATED_PAYMENT);

                try {
                    $em->persist($order);
                    $em->flush();

                    $mailer->initialize('email_order');
                    $mailer->compose('tracking@delit-dinfluence.fr', 'Content : ' . $query, [
                        'subject' => 'Vérification de paiement [ HUBERT BROCHARD ] - NOTIFICATION - VALIDATED PAYMENT',
                        'from' => 'tracking@delit-dinfluence.fr',
                        'sender' => 'Tracking - Délit d\'influence',
                    ])->send();
                } catch (\Exception $e) {

                    // Echec de la mise à jours
                    $mailer->initialize('email_order');
                    $mailer->compose('tracking@delit-dinfluence.fr', 'Content : ' . $query . ' | ' . $e->getMessage() . ' ' . $e->getLine() . ' ' . $e->getLine(), [
                        'subject' => 'Vérification de paiement [ HUBERT BROCHARD ] - NOTIFICATION - VALIDATED PAYMENT - FAILED TO UPDATE',
                        'from' => 'tracking@delit-dinfluence.fr',
                        'sender' => 'Tracking - Délit d\'influence',
                    ])->send();
                }
                die();
            }

        }

        // Paiement déjà effectué
        if ($tokens['error'] == '00015') {

            $mailer->initialize('email_order');
            $mailer->compose('tracking@delit-dinfluence.fr', 'Content : ' . $query, [
                'subject' => 'Vérification de paiement [ HUBERT BROCHARD ] - NOTIFICATION - ALREADY PAID',
                'from' => 'tracking@delit-dinfluence.fr',
                'sender' => 'Tracking - Délit d\'influence',
            ])->send();
            die();
        }


        // Echec diverses
        $mailer->initialize('email_order');
        $mailer->compose('tracking@delit-dinfluence.fr', 'Content : ' . $query, [
            'subject' => 'Vérification de paiement [ HUBERT BROCHARD ] - NOTIFICATION - FAILED PAYMENT',
            'from' => 'tracking@delit-dinfluence.fr',
            'sender' => 'Tracking - Délit d\'influence',
        ])->send();
        die();

    }

}
