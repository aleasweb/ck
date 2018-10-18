<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use App\Entity\User;
use JMS\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends FOSRestController
{
    /**
     * @Rest\GET("/api")
     */
    public function getAction()
    {
        return new JsonResponse(['version' => '1.0']);
    }

    /**
     * @Rest\Get("/api/users")
     */
    public function getUsersAction()
    {
        $result = [];
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $serializer = new Serializer();
        foreach($users as $user) {
            $result[] = $serializer->serialize($user, 'json');
        }//var_dump($users);
        return new JsonResponse($result);
    }
}
