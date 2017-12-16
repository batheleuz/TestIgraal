<?php
/**
 * Created by PhpStorm.
 * User: Massamba
 * Date: 12/16/17
 * Time: 2:39 AM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use AppBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Get("/users")
     */
    public function getUsersAction(Request $request)
    {
        $users = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User')
            ->findAll();
        /* @var $users User[] */

        if (count($users) === 0 )
            return new JsonResponse(['message' => 'No user'], Response::HTTP_NOT_FOUND);

        $formatted = [];
        foreach ($users as $user) {
            $formatted[] = $this->format($user);
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Get("/users/{user_id}")
     */
    public function getUserAction(Request $request)
    {
        $user = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User')
            ->find($request->get('user_id'));
        /* @var $user User */

        if (empty($user))
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);

        return new JsonResponse($this->format($user));
    }

    private function format( User $user ){
        return  [
            'id' => $user->getId(),
            'name' => $user->getName(),
        ];
    }

}