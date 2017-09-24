<?php

namespace AppBundle\Controller;

use AppBundle\Entity\WaitingRoom;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class MatchMakingController extends Controller
{
    /**
     * @Route("/wait/{gameName}/{modeId}", name="wait")
     */
    public function waitAction($gameName, $modeId)
    {

        $gameToPlay = null;
        $games = $this->get('isen_game_pf_core.game')->discover();
        foreach ($games as $game){
            if($game->getName() == $gameName){
                $gameToPlay = $game;
            }
        }
        if($gameToPlay == null){
            throw $this->createNotFoundException("Le jeu n'existe pas");
        }
        $modeToPlay = null;
        $modes = $gameToPlay->getModes();
        foreach($modes as $mode){
            if($mode->getId() == $modeId){
                $modeToPlay = $mode;
            }
        }
        if($modeToPlay == null){
            throw $this->createNotFoundException("Le mode de jeu n'existe pas");
        }


        /*
         * Vérification des salles d'attente disponibles
         * */
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('AppBundle:WaitingRoom');

        $room = $rep->findOneByPlayer1($this->getUser());

        if($room != null and $room->getUrl() != null){
            return $this->redirect($room->getUrl());
        }

        $room = $rep->getRoom($gameToPlay->getName(), $modeToPlay->getId());

        /*
         * Si aucune n'est disponible, on en crée une nouvelle
         * */
        if($room == null){
            $waitingRoom = new WaitingRoom($gameToPlay->getName(), $modeToPlay->getId(), $this->getUser());
            $em->persist($waitingRoom);
            $em->flush();
            return $this->render('AppBundle:MatchMaking:wait.html.twig', array(

            ));
        }
        /*
         * S'il y en a une de disponible, mais que l'utilisateur est déjà dans une salle d'attente,
         * on le fait attendre
         * */
        if($room->getPlayer1() == $this->getUser()){
            return $this->render('AppBundle:MatchMaking:wait.html.twig', array(

            ));
        }


        $game = $gameToPlay->createGame($modeToPlay, array(
            $room->getPlayer1(),
            $this->getUser()
        ));
        $room->setUrl($game->getUrl());
        $em->persist($room);
        $em->persist($game);
        $em->flush();
        return $this->redirect($game->getUrl());

    }

    /**
     * @Route("/redirect", name="redirect")
     */
    public function redirectAction(){
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('AppBundle:WaitingRoom');
        $room = $rep->findOneByPlayer1($this->getUser());

        if($room == null){
            return new JsonResponse(
                array(
                    'status' => 'ko',
                    'message' => 'aucune salle d\'attente correspondante'
                ),
                400);
        }
        if(empty($room->getUrl())){
            return new JsonResponse(
                array(
                    'status' => 'ko',
                    'message' => 'aucun adversaire'
                ),
                500);
        }
        $url = $room->getUrl();
        $em->remove($room);
        $em->flush();
        return new JsonResponse(
            array(
                'status' => 'ok',
                'url' => $url
            ));


    }

}
