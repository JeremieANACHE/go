<?php

namespace Isen\GamePf\InterfaceBundle\Service;

use Isen\GamePf\InterfaceBundle\Entity\GameMode;
use Symfony\Component\Security\Core\User\UserInterface;
use Isen\GamePf\InterfaceBundle\Entity\Game;

/**
 * Le service principal des jeux doit implémenter cet abstract
 * 
 * De plus, le service enregistré doit contenir le tag isen_game_pf_core.game afin d'être
 * détecté par la plateforme.
 * 
 * @author sminet
 *
 */
abstract class AbstractGameService
{
    /**
     * Retourne le nom du jeu ajouté par le service
     * 
     * @return string
     */
    public abstract function getName();
    
    /**
     * Retourne la liste des modes supportés par le jeu (au minimum 1)
     * 
     * @return GameMode[]
     */
    public abstract function getModes();
    
    /**
     * Crée une partie avec le mode sélectionné, avec la liste de joueur players (doit implémenter UserInterface)
     * 
     * @param GameMode $mode
     * @param UserInterface[] $players
     * 
     * @return Game
     */
    public abstract function createGame(GameMode $mode, $players);
}