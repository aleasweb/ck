<?php

namespace App\Controller\Api;

use App\Entity\Quest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class QuestController extends FOSRestController
{
    /**
     * @Rest\Get("/api/quests")
     */
    public function getQuestsAction()
    {
        $result = [];
        $quests = $this->getDoctrine()->getRepository(Quest::class)->findAll();
        return new JsonResponse($quests);
    }
}
