<?php

namespace Isen\GamePf\CoreBundle\Service;

use Isen\GamePf\InterfaceBundle\Service\AbstractPlatformService;

class GameService extends AbstractPlatformService
{
    private $games = array();
    
    /**
     * Return an array discovered games
     */
    public function discover() {
        return $this->games;
    }
    
    public function addGame($game) {
        $this->games[] = $game;
    }
    
    public function publishResult($gameId, $winners) {
        
    }
}