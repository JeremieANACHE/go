<?php

namespace Isen\GamePf\Games\GoBundle\Controller;

use Isen\GamePf\Games\GoBundle\Entity\GoGame;
use Isen\GamePf\Games\GoBundle\Service\GoGameService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class GameController extends Controller
{
    /**
     * @Route("/play/{uniqueUrl}", name="playGo")
     */
    public function playAction(GoGame $goGame)
    {
        return $this->render('IsenGamePfGamesGoBundle:Game:play.html.twig', array(
            'game' => $goGame
        ));
    }

    /**
     * @Route("/validate/{uniqueUrl}", name="goValidate")
     * @Method({"POST"})
     */
    public function validateAction(GoGame $game, Request $request)
    {
        if($game->getActualPlayer() === null){
            $game->setActualPlayer($game->getPlayer1());
        }
        $gs = new GoGameService($this->get('router'));
        $em = $this->getDoctrine()->getManager();
        $x = $request->get('x', 0);
        $y = $request->get('y', 0);

        try{
            $gs->play($game, $this->getUser(), $x, $y);
        }catch(\Exception $e){
            return new JsonResponse(array(
                'message' => $e->getMessage()
            ), 400);
        }
        $em->persist($game);
        $em->flush();
        return new JsonResponse(array(
            'valide' => true,
            'message' => 'Placement non autorisé',
            'board' => $game->getPlays(),
            'passed' => $game->isPassed(),
            'ended' => $game->getEnded(),
        ));
    }

    /**
     * @Route("/fetch/{uniqueUrl}", name="goFetch")
     */
    public function fetchAction(GoGame $game){
        return new JsonResponse(array(
            'board' => $game->getPlays(),
            'passed' => $game->isPassed(),
            'ended' => $game->getEnded(),
            'won'   => $game->getWinner()===$this->getUser()
        ));
    }

    /**
     * @Route("/pass/{uniqueUrl}", name="goPass")
     */
    public function passAction(GoGame $game){
        if($game->getActualPlayer() === null){
            $game->setActualPlayer($game->getPlayer1());
        }
        $gs = new GoGameService($this->get('router'));
        $em = $this->getDoctrine()->getManager();

        try{
            $gs->pass($game, $this->getUser());
        }catch(\Exception $e){
            return new JsonResponse(array(
                'message' => $e->getMessage()
            ), 400);
        }
        $em->persist($game);
        $em->flush();
        return new JsonResponse(array(

        ));

    }
}
