<?php

namespace Isen\GamePf\Games\ReversiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('IsenGamePfGamesReversiBundle:Default:index.html.twig');
    }
}
