<?php

namespace User\Controller;

use Core\Controller\Traits\BaseAdminController;
use Core\Controller\Traits\BaseController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use User\Entity\Authorization;
use User\Entity\AuthorizationGroup;
use User\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use User\Entity\UserGroup;

/**
 * Controller de l'espace d'administration
 *
 * @Route("/4DM1n157R4710N", name="user_admin_")
 */
class AdminController extends AbstractController
{
    use BaseController;
    use BaseAdminController;

    /**
     * Nom du bundle
     */
    protected $bundle_name = 'user';

    /**
     * Gestion de la liste des "Utilisateurs"
     */
    public function user_list()
    {
        try {
            $count_groups = $this->getDoctrine()->getRepository(UserGroup::class)->countWhere('entity.id', 'entity.id > 0'); // Compte le nombre de "groupe utilisateurs"
//            $count_authorisations = $this->getDoctrine()->getRepository(Authorization::class)->findWhere('entity.parent is not null');
            $users = $this->getDoctrine()->getRepository(User::class)->findAll(); // Récupère tous les "utilisateurs" actifs ou non

            return $this->generateTemplate($this->vars['template'], [
                'count_users' => 'Indisponible',
                'count_groups' => $count_groups,
                'count_authorizations' => '',

                'default_team' => new UserGroup(),
                'default_authorization' => new Authorization(),

                'blocks_settings' => $this->configuration_from_file['user'],
                'blocks' => $users,
                'block' => new User(),
            ]);
        } catch (\Exception $e) {
            dump($e);
            die();
        }

    }

    /**
     * Formulaire d'un "Utilisateur"
     */
    public function user()
    {
        return $this->generateTemplate($this->vars['template'], [

        ]);
    }

    /**
     * Gestion de la liste des "Groupes utilisateurs"
     */
    public function user_group_list()
    {
        return $this->generateTemplate($this->vars['template']);
    }

    /**
     * Formulaire d'un "Groupe utilisateur"
     */
    public function user_group_form()
    {
        $authorizations = $this->getDoctrine()->getRepository(Authorization::class)->findWhere('entity.parent is null');
        $team_authorizations = $this->getDoctrine()->getRepository(AuthorizationGroup::class)->findWhere('entity.team = ' . $this->vars['id']);

        $results = [];
        $numbers = [];
        foreach ($team_authorizations as $authorization) {
            $results[$authorization->getAuthorization()->getId()] = $authorization;
            $numbers[] = $authorization->getAuthorization()->getId();
        }

        return $this->generateTemplate($this->vars['template'], [
            'authorizations' => $authorizations,
            'team_authorizations' => $results,
            'team_authorizations_number' => $numbers,
        ]);
    }

    /**
     * Modification d'une permission
     *
     * @Route("/authorization/change", name="authorization_change")
     */
    public function authorization_change(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $team = $request->request->get('team');
        $id = $request->request->get('authorization');
        $type = $request->request->get('type');
        $value = $request->request->get('value');
        if ($value == 'true') {
            $value = true;
        } else {
            $value = false;
        }
        $team_authorization = $this->getDoctrine()->getRepository(AuthorizationGroup::class)->findWhere('entity.authorization = ' . $id . ' AND entity.team = ' . $team, 1);

        if ($team_authorization == []) {

            $team_authorization = new AuthorizationGroup();
            $team_authorization->setTeam($team);
            $team_authorization->setAuthorization($id);
        }

        if ($type == 0) {
            $team_authorization->setEnableView($value);
        } elseif ($type == 1) {
            $team_authorization->setEnableAdd($value);
        } elseif ($type == 2) {
            $team_authorization->setEnableEdit($value);
        } elseif ($type == 3) {
            $team_authorization->setEnableDelete($value);
        }

        $em->persist($team_authorization);
        $em->flush();


        return new JsonResponse('', 200);
    }

}
