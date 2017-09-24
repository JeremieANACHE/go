<?php

namespace Isen\GamePf\Games\ChessBundle\Service;

use Isen\GamePf\InterfaceBundle\Service\AbstractGameService;
use Isen\GamePf\InterfaceBundle\Entity\GameMode;

class ChessGameService extends AbstractGameService
{
    public function getName() {
        return 'Chess';
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