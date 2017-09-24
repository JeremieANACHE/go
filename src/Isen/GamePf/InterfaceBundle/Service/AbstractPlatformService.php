<?php

namespace Isen\GamePf\InterfaceBundle\Service;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * La plateforme doit implémenter cet abstract. De plus, il doit enregistrer un service nommé isen_game_pf_core.game
 * afin que les jeux puissent publier le résultat des parties
 * 
 * @author sminet
 *
 */
abstract class AbstractPlatformService
{
    /**
     * Publie les résultats d'une partie
     * $winners contient la liste des joueurs ayant reporté la partie (généralement, 1 seul)
     * S'il n'y a pas de gagnant, la partie est considérée comme nulle
     * 
     * @param integer $gameId
     * @param UserInterface[] $winners
     */
    public abstract function publishResult($gameId, $winners);
}