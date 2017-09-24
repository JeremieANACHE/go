<?php

namespace Isen\GamePf\Games\GoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User as User;
use Isen\GamePf\InterfaceBundle\Entity\Game;


/**
 * GoGame
 *
 * @ORM\Table(name="go_game")
 * @ORM\Entity(repositoryClass="Isen\GamePf\Games\GoBundle\Repository\GoGameRepository")
 */
class GoGame extends Game
{
    const BLACK = 1;
    const WHITE = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="unique_url", type="string", length=255, unique=true)
     */
    private $uniqueUrl;

    /**
     * @var array
     *
     * @ORM\Column(name="plays", type="array")
     */
    private $plays = array();

    /**
     * @var array
     *
     * @ORM\Column(name="previous_plays", type="array")
     */
    private $previousPlays = array();

    /**
     * @var bool
     *
     * @ORM\Column(name="ended", type="boolean")
     */
    private $ended = false;

    /**
     * @var int
     *
     * @ORM\Column(name="rows", type="integer")
     */
    private $rows = 19;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $player1;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $player2;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $actualPlayer;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $winner;

    /**
     * @var bool
     * @ORM\Column(name="passed", type="boolean")
     */
    private $passed = false;

    public function __construct($uniqUrl, User $player_1, User $player_2, $cols)
    {
        $this->setUniqueUrl($uniqUrl);
        $this->setPlayer1($player_1)->setPlayer2($player_2);
        $this->setRows($cols);
        $row = array_fill(0, $cols, null);
        $this->plays = array_fill(0, $cols, $row);

        $this->previousPlays = array_fill(0, $cols, $row);
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set plays
     *
     * @param array $plays
     *
     * @return GoGame
     */
    public function setPlays($plays)
    {
        $this->plays = $plays;

        return $this;
    }

    /**
     * Get plays
     *
     * @return array
     */
    public function getPlays()
    {
        return $this->plays;
    }

    /**
     * Set ended
     *
     * @param boolean $ended
     *
     * @return GoGame
     */
    public function setEnded($ended)
    {
        $this->ended = $ended;

        return $this;
    }

    /**
     * Get ended
     *
     * @return bool
     */
    public function getEnded()
    {
        return $this->ended;
    }

    /**
     * Set rows
     *
     * @param integer $rows
     *
     * @return GoGame
     */
    public function setRows($rows)
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * Get rows
     *
     * @return int
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @return User
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * @param User $player1
     * @return GoGame
     */
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;
        return $this;
    }

    /**
     * @return User
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * @param User $player2
     * @return GoGame
     */
    public function setPlayer2($player2)
    {
        $this->player2 = $player2;
        return $this;
    }

    /**
     * @return User
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * @param User $winner
     * @return GoGame
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;
        return $this;
    }

    /**
     * @return User
     */
    public function getActualPlayer()
    {
        return $this->actualPlayer;
    }

    /**
     * @param User $actualPlayer
     * @return GoGame
     */
    public function setActualPlayer($actualPlayer)
    {
        $this->actualPlayer = $actualPlayer;
        return $this;
    }

    /**
     * @return string
     */
    public function getUniqueUrl()
    {
        return $this->uniqueUrl;
    }

    /**
     * @param string $uniqueUrl
     * @return GoGame
     */
    public function setUniqueUrl($uniqueUrl)
    {
        $this->uniqueUrl = $uniqueUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPreviousPlays()
    {
        return $this->previousPlays;
    }

    /**
     * @param mixed $previousPlays
     * @return GoGame
     */
    public function setPreviousPlays($previousPlays)
    {
        $this->previousPlays = $previousPlays;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPassed()
    {
        return $this->passed;
    }

    /**
     * @param boolean $passed
     * @return GoGame
     */
    public function setPassed($passed)
    {
        $this->passed = $passed;
        return $this;
    }




}

