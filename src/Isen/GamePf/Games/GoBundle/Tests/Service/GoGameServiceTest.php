<?php
namespace Projet\GoBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Isen\GamePf\Games\GoBundle\Entity\GoGame;
use Isen\GamePf\Games\GoBundle\Service\GoGameService;
use AppBundle\Entity\User;
/**
 * Created by PhpStorm.
 * User: rgrisot
 * Date: 04/06/16
 * Time: 14:46
 */
class GoGameServiceTest extends TestCase
{
    private $service;
    //méthode qui sert à appeler la méthode privée ou protected d'un objet
    //source : https://jtreminio.com/2013/03/unit-testing-tutorial-part-3-testing-protected-private-methods-coverage-reports-and-crap/
    private function invokeMethod(&$object, $methodName, array $parameters = array()){
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    private function createGame(){
        $cols = 5;

        $player1 = new User();
        $player1->setId(1);

        $player2 = new User();
        $player2->setId(1);

        $uniqId = uniqid();
        $game = new GoGame($uniqId, $player1, $player2, $cols);
        $game->setActualPlayer($player1);
        return $game;
    }
//tableau qui contiendra des pierres mortes si les blancs jouent en [1][3]
//les blancs ne peuvent pas jouer en [4][4] (suicide)
    private function getPlaysWithDeadStones(){
        return array(
            array(null         , GoGame::WHITE, GoGame::WHITE, null         , null         ),
            array(GoGame::WHITE, GoGame::BLACK, GoGame::BLACK, null         , null         ),
            array(null         , GoGame::WHITE, GoGame::WHITE, null         , null         ),
            array(null         , null         , null         , null         , GoGame::BLACK),
            array(null         , null         , null         , GoGame::BLACK, null         ),
        );
    }

    //tableau de fin de partie, avec 3 points de territoire + 6 pions + 7.5 de komi = 16.5 points pour les blancs
    // 6 points de territoire + 8 pions = 14 points pour les noirs
    private function getEndGame(){
        return array(
            array(null         , GoGame::WHITE, GoGame::WHITE, null         , null         ),
            array(GoGame::WHITE, null         , null         , GoGame::WHITE, GoGame::BLACK),
            array(GoGame::BLACK, GoGame::WHITE, GoGame::WHITE, GoGame::BLACK, null         ),
            array(null         , GoGame::BLACK, GoGame::BLACK, GoGame::BLACK, null         ),
            array(null         , GoGame::BLACK, null         , GoGame::BLACK, null         ),
        );
    }
    // Si le joueur blanc place un pion en [1][2], le pion noir [1][1] est enlevé
    // Si le joueur noir joue ensuite en [1][1], le pion blanc [1][2] est enlevé
    // On retourne alors à l'état précédent, ce qui est interdit
    private function getPlateauRedondant(){
        return array(
            array(null         , GoGame::WHITE, GoGame::BLACK, null         , null),
            array(GoGame::WHITE, GoGame::BLACK, null         , GoGame::BLACK, null),
            array(null         , GoGame::WHITE, GoGame::BLACK, null         , null),
            array(null         , null         , null         , null         , null),
            array(null         , null         , null         , null         , null),
        );
    }

    public function __construct()
    {
        $router = $this->getMockBuilder('Symfony\Bundle\FrameworkBundle\Routing\Router')
            ->disableOriginalConstructor()
            ->getMock();
        $this->service = new GoGameService($router);
    }

    public function testPlayer1CanPlay(){
        $game = $this->createGame();
        $this->service->play($game, $game->getPlayer1(), 0, 0);
        $board = $game->getPlays();
        $this->assertEquals(GoGame::BLACK, $board[0][0]);
        $this->assertSame($game->getPlayer2(), $game->getActualPlayer());
    }

    public function testPlayer2CanPlay(){
        $game = $this->createGame();
        //On fait jouer le joueur 1 (ce qui donne au joueur 2 le droit de jouer)
        $this->service->play($game, $game->getPlayer1(), 0, 0);
        //puis le joueur 2
        $this->service->play($game, $game->getPlayer2(), 0, 1);
        $board = $game->getPlays();
        //On utilise same et pas equals pour faire la différence entre null et 0
        // (equals est l'équivalent de ==, same est l'équivalent de ===)
        $this->assertSame(GoGame::WHITE, $board[1][0]);
        $this->assertSame($game->getPlayer1(), $game->getActualPlayer());
    }

    public function testStonesRemoved(){
        $game = $this->createGame();
        $game->setPlays($this->getPlaysWithDeadStones());
        $game->setActualPlayer($game->getPlayer2());
        $this->service->play($game, $game->getPlayer2(), 3, 1);
        $board = $game->getPlays();
        $this->assertSame(null, $board[1][1]);
        $this->assertSame(null, $board[1][2]);
    }


    public function testComptagePoints(){
        $game = $this->createGame();
        $game->setPlays($this->getEndGame());
        $pointsNoirs = $this->invokeMethod($this->service, 'pointsJoueur', array(
            $game->getPlays(),
            GoGame::BLACK
        ));
        $pointsBlancs = $this->invokeMethod($this->service, 'pointsJoueur', array(
            $game->getPlays(),
            GoGame::WHITE
        ));
        $this->assertEquals(14, $pointsNoirs);
        $this->assertEquals(16.5, $pointsBlancs);
    }
    public function testWinner(){
        $game = $this->createGame();
        $game->setPlays($this->getEndGame());
        //On indique qu'un joueur a déjà passé son tour
        $game->setPassed(true);
        //on fait passer l'autre joueur, pour terminer la partie
        $this->service->pass($game, $game->getPlayer1());


        //le jeu doit être terminé
        $this->assertTrue($game->getEnded());
        //le joueur 1 (qui a les pions noirs) doit avoir gagné
        $this->assertSame($game->getPlayer2(), $game->getWinner());

    }
    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Impossible de jouer ici (suicide)
     */
    public function testSuicide(){
        $game = $this->createGame();
        $game->setPlays($this->getPlaysWithDeadStones());
        $game->setActualPlayer($game->getPlayer2());
        $this->service->play($game, $game->getPlayer2(), 4, 4);
    }
    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Ce n'est pas votre tour
     */
    public function testJoueAuMauvaisTour(){
        $game = $this->createGame();
        $this->service->play($game, $game->getPlayer2(), 0, 0);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Vous n'êtes pas dans la partie
     */
    public function testJoueSansEtreDansLaPartie(){
        $game = $this->createGame();
        $user = new User();
        $user->setId(42);
        $this->service->play($game, $user, 0, 0);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Le jeu est terminé
     */
    public function testJoueJeuTermine(){
        $game = $this->createGame();
        $game->setEnded(true);
        $this->service->play($game, $game->getPlayer1(), 0, 0);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage La place est occupée
     */
    public function testJouePlaceOccupee(){
        $game = $this->createGame();
        $board = $game->getPlays();
        $board[0][0] = GoGame::BLACK;
        $game->setPlays($board);
        $this->service->play($game, $game->getPlayer1(), 0, 0);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Impossible de jouer ici (le plateau revient dans l'état précédent)
     */
    public function testPlateauRedondant(){
        $game = $this->createGame();
        $game->setPlays($this->getPlateauRedondant());
        $game->setActualPlayer($game->getPlayer2());
        $this->service->play($game, $game->getPlayer2(), 2, 1);
        $this->service->play($game, $game->getPlayer1(), 1, 1);
    }

    public function testPasseTour(){
        $game = $this->createGame();
        $this->service->pass($game, $game->getPlayer1());
        $this->assertTrue($game->isPassed());
        $this->assertSame($game->getPlayer2(), $game->getActualPlayer());

        $game->setPassed(false);
        $this->service->pass($game, $game->getPlayer2());
        $this->assertTrue($game->isPassed());
        $this->assertSame($game->getPlayer1(), $game->getActualPlayer());

    }
}
