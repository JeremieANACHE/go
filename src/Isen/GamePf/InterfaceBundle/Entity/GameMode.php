<?php

namespace Isen\GamePf\InterfaceBundle\Entity;

class GameMode
{
    /**
     * Un identifiant unique permettant de reconnaire le mode à utiliser
     * @var integer
     */
    private $id;
    
    /**
     * Le libellé du mode
     * @var string
     */
    private $name;
    
    /**
     * Le nombre de joueur nécessaire pour lancer une partie
     * @var integer
     */
    private $players;
    
    /**
     * Est-ce-que le jeu entre en compte dans le calcul de la cote
     * (si non utilisé, toujours retourner false)
     * @var boolean
     */
    private $ranked;

    public function __construct($id, $name, $players = 2, $ranked = false) {
        $this->id = $id;
        $this->name = $name;
        $this->players = $players;
        $this->ranked = $ranked;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getPlayers()
    {
        return $this->players;
    }

    public function setPlayers($players)
    {
        $this->players = $players;
        return $this;
    }

    public function isRanked()
    {
        return $this->ranked;
    }

    public function setRanked($ranked)
    {
        $this->ranked = $ranked;
        return $this;
    }
}