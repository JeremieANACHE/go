<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * WaitingRoom
 *
 * @ORM\Table(name="waiting_room")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WaitingRoomRepository")
 */
class WaitingRoom
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="modeId", type="integer")
     */
    private $modeId;

    /**
     * @var User
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     */
    private $player1;

    /**
     * @var String
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */

    private $url;

    public function __construct(String $name, int $mode, User $user){
        $this->setName($name)
             ->setModeId($mode)
             ->setPlayer1($user);
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
     * Set name
     *
     * @param string $name
     *
     * @return WaitingRoom
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set modeId
     *
     * @param int $modeId
     *
     * @return WaitingRoom
     */
    public function setModeId($modeId)
    {
        $this->modeId = $modeId;

        return $this;
    }

    /**
     * Get modeId
     *
     * @return int
     */
    public function getModeId()
    {
        return $this->modeId;
    }

    /**
     * @return \AppBundle\Entity\User
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * @param \AppBundle\Entity\User $player1
     * @return WaitingRoom
     */
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;
        return $this;
    }

    /**
     * @return String
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param String $url
     * @return WaitingRoom
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }


}

