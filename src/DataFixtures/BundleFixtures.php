<?php

namespace Fixture;

use Core\Entity\ComingSoonConfiguration;
use Core\Entity\Configuration;
use Core\Entity\CookieConfiguration;
use Core\Entity\Enum;
use Core\Entity\GoogleMapConfiguration;
use Core\Entity\Image;
use Core\Entity\Information;
use Core\Entity\Language;
use Core\Entity\MaintenanceConfiguration;
use Core\Entity\Page;
use Core\Entity\SocialNetwork;
use Core\Entity\Text;
use Core\Entity\TextGroup;
use Core\Entity\TextPrintType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Sender\Entity\Email;
use Sender\Entity\EmailApplication;
use Sender\Entity\EmailConfiguration;
use Sender\Entity\Newsletter;
use Sender\Entity\NewsletterType;
use Shopping\Entity\Attribute;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\AttributePrintType;
use Shopping\Entity\BoughtRedirectType;
use Shopping\Entity\Category;
use Shopping\Entity\Country;
use Shopping\Entity\CountryZone;
use Shopping\Entity\Customer;
use Shopping\Entity\DeliveryConfiguration;
use Shopping\Entity\DeliveryMethod;
use Shopping\Entity\Feature;
use Shopping\Entity\FeatureGroup;
use Shopping\Entity\FeatureGroupType;
use Shopping\Entity\OrderConfiguration;
use Shopping\Entity\PaymentConfiguration;
use Shopping\Entity\PaymentMethod;
use Shopping\Entity\Product;
use Shopping\Entity\ProductConfiguration;
use Shopping\Entity\ProductRedirect;
use Shopping\Entity\ProductType;
use Shopping\Entity\ResearchConfiguration;
use Shopping\Entity\ShopConfiguration;
use Shopping\Entity\Tax;
use Shopping\Form\AttributeGroupType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Yaml\Yaml;
use User\Entity\Authorization;
use User\Entity\AuthorizationGroup;
use User\Entity\User;
use User\Entity\UserGroup;


abstract class FixturesLanguages extends Enum
{
    const FRENCH = 'fr';

    public static $typeName = [
        self::FRENCH => 'Français',
    ];
}

class BundleFixtures extends Fixture
{

    private $settings;

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $em)
    {
        // Récupération du fichier de configuration des fixtures
        $this->settings = Yaml::parseFile('./src/DataFixtures/settings.yaml');

        $this->loadConfiguration($em);
        $this->loadPages($em);
        $this->loadCountryZones($em);
        $this->loadLanguages($em);
        $this->loadTaxes($em);
        $this->loadTranslations($em);
        $this->loadSocialNetworks($em);
        $this->loadUsers($em);
        $this->loadImages($em);

        $em->flush();
    }

    public function loadImages(ObjectManager $em)
    {

        foreach ($this->settings['images'] as $item) {
            $entity = new Image();

            $entity->setIsEnabled($item['is_enabled']);
            $entity->setReference($item['reference']);


            foreach ($item['alt'] as $key => $value) {
                $entity->translate($key)->setAlt($value);
            }

            $em->persist($entity);
        }
    }

    /**
     * Chargement de la configuration générale
     */
    public function loadConfiguration(ObjectManager $em)
    {
        // Mise en maintenance de l'application
        $entity = new MaintenanceConfiguration();
        $entity->setId(1);
        $entity->setUseMaintenance($this->settings['maintenance']['use']); // Désactivation
        $em->persist($entity);

        // Page d'attente de l'application
        $entity = new ComingSoonConfiguration();
        $entity->setId(1);
        $entity->setUseComingSoon($this->settings['coming_soon']['use']); // Désactivation
        $em->persist($entity);

        // Configuration générale
        $entity = new Configuration();
        $entity->setId(1);
        $entity->setSitename($this->settings['configuration']['sitename']);
        $entity->setDomain($this->settings['configuration']['domaine']);
        $em->persist($entity);

        // Configuration du BackOffice
        $entity = new Information();
        $entity->setId(1);
        $entity->setUseModuleShopping($this->settings['back_office']['use_module_shopping']);
        $entity->setUseModuleCalendar($this->settings['back_office']['use_module_calendar']);
        $entity->setUseModuleLibrary($this->settings['back_office']['use_module_library']);
        $entity->setUseModuleBlog($this->settings['back_office']['use_module_blog']);
        $entity->setUseModuleNewsletter($this->settings['back_office']['use_module_newsletter']);
        $entity->setUseModuleComingSoon($this->settings['back_office']['use_module_coming_soon']);
        $entity->setUseModuleLanguage($this->settings['back_office']['use_module_language']);
        $entity->setUseModuleDashboard($this->settings['back_office']['use_module_dashboard']);
        $entity->setUseModuleStatistics($this->settings['back_office']['use_module_statistics']);
        $entity->setUseModuleUsers($this->settings['back_office']['use_module_users']);
        $entity->setUseModuleMedia($this->settings['back_office']['use_module_media']);
        $entity->setUseModuleGallery($this->settings['back_office']['use_module_gallery']);
        $entity->setUseModuleReference($this->settings['back_office']['use_module_reference']);
        $em->persist($entity);

        // Gestion des cookies
        $entity = new CookieConfiguration();
        $entity->setId(1);
        $entity->setGoogleAnalytics($this->settings['cookies']['google_analytics']);
        $entity->setAddThis($this->settings['cookies']['add_this']);
        $entity->setPixelFacebook($this->settings['cookies']['pixel_facebook']);
        $entity->setRecaptchaVersion($this->settings['cookies']['recaptcha_version']);
        $entity->setRecaptchaClient($this->settings['cookies']['recaptcha_client']);
        $entity->setRecaptchaServer($this->settings['cookies']['recaptcha_server']);
        $entity->setRecaptchaScore($this->settings['cookies']['recaptcha_score']);
        $entity->setRecaptchaHostname($this->settings['cookies']['recaptcha_hostname']);
        $em->persist($entity);

        // Gestion de la google map
        $entity = new GoogleMapConfiguration();
        $entity->setId(1);
        $entity->setApiKey($this->settings['google_map']['api_key']);
        $entity->setZoom($this->settings['google_map']['zoom']);
        $entity->setLatitude($this->settings['google_map']['latitude']);
        $entity->setLongitude($this->settings['google_map']['longitude']);
        $em->persist($entity);


        // Gestion des emails
        $entity = new EmailConfiguration();
        $entity->setId(1);
        $em->persist($entity);

        $entities = [];
        foreach ($this->settings['emails']['entities'] as $email) {
            $entity = new Email();

            $entity->setId($email['id']);
            $entity->setReference($email['reference']);
            $entity->setUsername($email['username']);
            $entity->setHost($email['host']);
            $entity->setTransport($email['transport']);
            $entity->setPort($email['port']);
            $entity->setEncryption($email['encryption']);
            $entity->setPassword($email['password']);

            $em->persist($entity);
            $entities[$email['id']] = $entity;
        }

        foreach ($this->settings['emails']['settings'] as $application) {
            $entity = new EmailApplication();

            $entity->setId($application['id']);
            $entity->setReference($application['reference']);
            $entity->setSubject($application['subject']);
            $entity->setSender($application['sender']);
            $entity->setDevKey($application['key']);
            $entity->setEmail($entities[$application['entity']]);
            $em->persist($entity);
        }
    }

    public function loadTaxes(ObjectManager $em)
    {

        foreach ($this->settings['taxes'] as $item) {
            $entity = new Tax();

            $entity->setIsEnabled($item['is_enabled']);
            $entity->setDesignation($item['designation']);
            $entity->setRate($item['rate']);


            $em->persist($entity);
        }

    }

    /**
     * Chargement des pages
     */
    public function loadPages(ObjectManager $em)
    {

        foreach ($this->settings['pages'] as $page) {
            $entity = new Page();

            $entity->setIsEnabled($page['is_enabled']);
            $entity->setReference($page['reference']);
            $entity->setController($page['controller']);
            $entity->setControllerEntity($page['controller_entity']);
            $entity->setControllerModule($page['controller_module']);
            $entity->setControllerAction($page['controller_action']);
            $entity->setControllerId($page['controller_id']);

            $em->persist($entity);


            $entity = 'App\Entity\\' . $page['controller_entity'];
            $entity = new $entity();

            $entity->setId(1);
            $entity->setIsEnabled(1);

            $entity->setIsIndexable($page['is_indexable']);
            $entity->setPriority($page['priority']);

            foreach ($page['urls'] as $key => $value) {
                $entity->translate($key)->setUri($value);
            }

            foreach ($page['meta_title'] as $key => $value) {
                $entity->translate($key)->setSeoTitle($value);
            }

            foreach ($page['meta_description'] as $key => $value) {
                $entity->translate($key)->setSeoDescription($value);
            }

            $entity->mergeNewTranslations();
            $em->persist($entity);
        }
    }

    public function loadUsers(ObjectManager $em)
    {
        $entities = [];
        foreach ($this->settings['groups'] as $group) {
            $entity = new UserGroup();

            $entity->setId($group['id']);
            $entity->setPriority($group['priority']);

            foreach ($group['designations'] as $key => $value) {
                $entity->translate($key)->setDesignation($value);
            }

            $entity->mergeNewTranslations();
            $em->persist($entity);

            $entities[$group['id']] = $entity;
        }

        foreach ($this->settings['users'] as $user) {
            $entity = new User();

            $entity->setFirstname($user['firstname']);
            $entity->setLastname($user['lastname']);
            $entity->setPassword($user['password']);
            $entity->setEmail($user['email']);

            foreach ($user['roles'] as $role) {
                $entity->addRole($role);
            }


            foreach ($user['groups'] as $group) {
                $entities[$group]->addUser($entity);
                $em->persist($entities[$group]);
            }


            $customer = new Customer();
            $customer->setIsEnabled(true);
            $customer->setTitle($user['title']);
            $entity->setCustomer($customer);
            $em->persist($customer);

            $em->persist($entity);

        }

        $groups = [];
        foreach ($this->settings['authorization']['group'] as $group) {
            $entity = new Authorization();

            $entity->setId($group['id']);
            $entity->setIsEnabled($group['is_enabled']);
            $entity->setDesignation($group['designation']);
            $entity->setDevKey($group['key']);

            if ($group['parent'] != 'null') {
                $entity->setParent($groups[$group['parent']]);
            }

            $em->persist($entity);
            $groups[$group['id']] = $entity;
        }

        foreach ($this->settings['authorization']['entity'] as $authorization) {
            $entity = new AuthorizationGroup();

            $entity->setIsEnabled($authorization['is_enabled']);
            $entity->setAuthorization($groups[$authorization['authorization']]);

            $entity->setTeam($entities[$authorization['user_group']]);

            $entity->setEnableAdd($authorization['enable_add']);
            $entity->setEnableDelete($authorization['enable_delete']);
            $entity->setEnableEdit($authorization['enable_edit']);
            $entity->setEnableView($authorization['enable_view']);

            $em->persist($entity);
        }
    }

    public function loadCountryZones(ObjectManager $em)
    {
        foreach ($this->settings['countries'] as $country) {
            $entity = new CountryZone();

            $entity->setId($country['id']);
            $entity->setIsEnabled($country['is_enabled']);
            $entity->setDesignation($country['designation']);

            $em->persist($entity);
        }

    }

    public function loadLanguages(ObjectManager $em)
    {
        foreach ($this->settings['languages'] as $language) {
            $entity = new Language();

            $entity->setId($language['id']);
            $entity->setIsEnabled($language['is_enabled']);

            foreach ($language['designations'] as $key => $value) {
                $entity->translate($key)->setDesignation($value);
            }

            $entity->setLanguageCode($language['language_code']);
            $entity->setIsoCode($language['iso_code']);
            $entity->setDateFormat($language['date_format']);
            $entity->setDateFormatFull($language['date_format_full']);

            $entity->mergeNewTranslations();
            $em->persist($entity);
        }

    }

    public function loadTranslations(ObjectManager $em)
    {
        $groups = [];

        foreach ($this->settings['translations']['groups'] as $group) {
            $entity = new TextGroup();

            $entity->setId($group['id']);
            $entity->setIsEnabled($group['is_enabled']);


            foreach ($group['designations'] as $key => $value) {
                $entity->translate($key)->setDesignation($value);
            }

            if ($group['parent'] != 'null') {
                $entity->setParent($groups[$group['parent']]);
            }

            $entity->mergeNewTranslations();
            $em->persist($entity);

            $groups[$group['id']] = $entity;
        }

        foreach ($this->settings['translations']['texts'] as $text) {
            $entity = new Text();

            $entity->setIsEnabled($text['is_enabled']);
            $entity->setType($text['type']);
            $entity->setTextGroup($groups[$text['group']]);
            $entity->setReference($text['key']);

            foreach ($text['values'] as $key => $value) {
                $entity->translate($key)->setValue($value);
            }

            $entity->mergeNewTranslations();
            $em->persist($entity);
        }
    }

    public function loadSocialNetworks(ObjectManager $em)
    {
        foreach ($this->settings['social_networks'] as $network) {
            $entity = new SocialNetwork();

            $entity->setIsEnabled($network['is_enabled']);
            $entity->setDesignation($network['designation']);
            $entity->setLink($network['url']);

            $em->persist($entity);
        }
    }


}
