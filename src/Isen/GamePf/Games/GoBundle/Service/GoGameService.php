<?php
/**
 * Created by PhpStorm.
 * User: rgrisot
 * Date: 16/04/16
 * Time: 14:37
 */

namespace Isen\GamePf\Games\GoBundle\Service;


use AppBundle\Entity\User;
use Isen\GamePf\Games\GoBundle\Entity\GoGame;
use Isen\GamePf\InterfaceBundle\Entity\Game;
use Isen\GamePf\InterfaceBundle\Entity\GameMode;
use Isen\GamePf\InterfaceBundle\Service\AbstractGameService;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

class GoGameService extends AbstractGameService
{
    private $routeur;

    public function __construct(Router $routeur)
    {
        $this->routeur = $routeur;
    }

    /**
     * Retourne le nom du jeu ajouté par le service
     *
     * @return string
     */
    public function getName()
    {
        return 'Jeu de Go';
    }

    /**
     * Retourne la liste des modes supportés par le jeu (au minimum 1)
     *
     * @return GameMode[]
     */
    public function getModes()
    {
        return array(
            new GameMode(19, '19 lignes'),
            new GameMode (13, '13 lignes'),
        );
    }

    /**
     * Crée une partie avec le mode sélectionné, avec la liste de joueur players (doit implémenter UserInterface)
     *
     * @param GameMode $mode
     * @param UserInterface[] $players
     *
     * @return Game
     */
    public function createGame(GameMode $mode, $players)
    {
        $cols = $mode->getId();
        $id = uniqid($players[0]->getId());
        $game = new GoGame($id, $players[0], $players[1], $cols);
        $game->setUrl($this->routeur->generate('playGo', array(
            'uniqueUrl' => $id
        )));

        return $game;
    }

    public function play(GoGame $game,  User $user, $x, $y){
        $this->playerIsOK($game, $user);
        $board = $game->getPlays();
        if($board[$y][$x] !== null){
            throw new \Exception('La place est occupée');
        }

        $color = $user == $game->getPlayer1()?GoGame::BLACK:GoGame::WHITE;
        //$board[$y][$x] = $user == $game->getPlayer1()?1:0;
        $copy = $this->copyBoard($board);
        $copy[$y][$x]  = $color;

        $this->removeDeads($copy, $color===GoGame::WHITE?GoGame::BLACK:GoGame::WHITE);
        $this->removeDeads($copy, $color);

        if($copy[$y][$x] === null){
            throw new \Exception('Impossible de jouer ici (suicide)');
        }
        if($copy === $game->getPreviousPlays()){
            throw new \Exception('Impossible de jouer ici (le plateau revient dans l\'état précédent)');
        }
        $game->setPreviousPlays($board);
        $board = $this->copyBoard($copy);
        $game->setPassed(false);
        $game->setPlays($board);

        $game->setActualPlayer($user==$game->getPlayer1()?$game->getPlayer2():$game->getPlayer1());

    }

    public function pass(GoGame $game, User $user){
        $this->playerIsOK($game, $user);

        if($game->isPassed()){
            $board = $game->getPlays();
            $game->setEnded(true);
            $pointsNoirs = $this->pointsJoueur($board, GoGame::BLACK);
            $pointsBlancs = $this->pointsJoueur($board, GoGame::WHITE);
            //égalité impossible avec un komi non entier
            $game->setWinner($pointsNoirs>$pointsBlancs?$game->getPlayer1():$game->getPlayer2());
        }
        else{
            $game->setPassed(true);
        }
        $game->setActualPlayer($user==$game->getPlayer1()?$game->getPlayer2():$game->getPlayer1());
    }

    private function playerIsOK(GoGame $game, User $user){
        if($game->getEnded()){
            throw  new \Exception('Le jeu est terminé');
        }
        if($game->getPlayer1() != $user and $game->getPlayer2() != $user){
            throw new \Exception('Vous n\'êtes pas dans la partie');
        }
        if($game->getActualPlayer() != $user){
            throw  new \Exception('Ce n\'est pas votre tour');
        }

    }

    private function removeDeads(array &$board, $color){
        for ($i = 0; $i < sizeof($board); $i++){
            for ($j = 0; $j < sizeof($board[0]); $j++){
                $visited = $this->initializeVisited(sizeof($board[0]));
                if($board[$i][$j] == $color){
                    if($this->libertes($board, $visited, $j, $i, $color)==0){
                        $this->clear($board, $visited);
                    }
                }
            }
        }
    }

    private function copyBoard(array $board){
        return $board;
    }

    private function initializeVisited(int $cols){
        $row = array_fill(0, $cols, false);
        return array_fill(0, $cols, $row);
    }

    private function estLibre($board, $x, $y, $color=null){
        return ($x < 0 || $y < 0 || $x >= sizeof($board) || $y >= sizeof($board) || $board[$y][$x] !== $color)?false:true;
    }

    private function clear(array &$board, array $visited){
        for($i = 0; $i < sizeof($board); $i++){
            for ($j = 0; $j < sizeof($board); $j++){
                if($visited[$i][$j]){
                    $board[$i][$j] = null;
                }
            }
        }
    }

    private function libertes(array $board, array &$visited, int $x, int $y, int $couleur){
        $count = 0;
        if($x >= sizeof($board) || $x < 0 || $y >= sizeof($board) ||
            $y < 0 || $visited[$y][$x] || $board[$y][$x] !== $couleur)
        {
            return $count;
        }
        $visited[$y][$x] = true;
        $count += $this->estLibre($board, $x-1, $y)?1:$this->libertes($board, $visited, $x-1, $y, $couleur);
        $count += $this->estLibre($board, $x+1, $y)?1:$this->libertes($board, $visited, $x+1, $y, $couleur);
        $count += $this->estLibre($board, $x, $y-1)?1:$this->libertes($board, $visited, $x, $y-1, $couleur);
        $count += $this->estLibre($board, $x, $y+1)?1:$this->libertes($board, $visited, $x, $y+1, $couleur);
        return $count;
    }

    private function libertesNull(array $board, array &$visited, int $x, int $y, int $couleur){
        $count = 0;
        if($x >= sizeof($board) || $x < 0 || $y >= sizeof($board) ||
            $y < 0 || $visited[$y][$x] || $board[$y][$x] !== null)
        {
            return $count;
        }
        $visited[$y][$x] = true;
        $count += $this->estLibre($board, $x-1, $y, 1-$couleur)?1:$this->libertesNull($board, $visited, $x-1, $y, $couleur);
        $count += $this->estLibre($board, $x+1, $y, 1-$couleur)?1:$this->libertesNull($board, $visited, $x+1, $y, $couleur);
        $count += $this->estLibre($board, $x, $y-1, 1-$couleur)?1:$this->libertesNull($board, $visited, $x, $y-1, $couleur);
        $count += $this->estLibre($board, $x, $y+1, 1-$couleur)?1:$this->libertesNull($board, $visited, $x, $y+1, $couleur);
        return $count;
    }

    private function longueurChaine(array $board, array &$visited, int $x, int $y){
        $count = 0;

        if($x >= sizeof($board) || $x < 0 || $y >= sizeof($board) ||
            $y < 0 || $visited[$y][$x] || $board[$y][$x] !== null)
        {
            return $count;
        }
        $count++;
        $visited[$y][$x] = true;

        $count += $this->longueurChaine($board, $visited, $x-1, $y);
        $count += $this->longueurChaine($board, $visited, $x+1, $y);
        $count += $this->longueurChaine($board, $visited, $x, $y-1);
        $count += $this->longueurChaine($board, $visited, $x, $y+1);
        return $count;

    }

    private function pointsJoueur(array $board, int $couleur, float $komi = 7.5){
        $points = 0;
        $size = sizeof($board);
        $visited2 = $this->initializeVisited($size);
        $visited = $this->initializeVisited($size);
        for ($i = 0; $i < $size; $i++){
            for ($j = 0; $j < $size; $j++){
                if(!$visited[$i][$j] and $board[$i][$j] === null and $this->libertesNull($board, $visited, $j, $i, $couleur) == 0){
                    $points+=$this->longueurChaine($board, $visited2, $j, $i);
                    $visited2 = $this->initializeVisited($size);
                }
                if($board[$i][$j] === $couleur){
                    $points++;
                }
            }
        }
        if ($couleur === GoGame::WHITE){
            $points += $komi;
        }
        return $points;
    }


}