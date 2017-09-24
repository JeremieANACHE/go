<?php

namespace Isen\GamePf\Games\ReversiBundle\Service;

use Isen\GamePf\InterfaceBundle\Service\AbstractGameService;
use Isen\GamePf\InterfaceBundle\Entity\GameMode;
use Isen\GamePf\InterfaceBundle\Entity\Game;

class ReversiGameService extends AbstractGameService
{
    public function getName() {
        return 'Reversi';
    }
    
    public function getModes() {
        return array(
            new GameMode(1, 'Classic')
        );
    }
    
    public function createGame(GameMode $mode, $players) {
        return new Game();
    }
}