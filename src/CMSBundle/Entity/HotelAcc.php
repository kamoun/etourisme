<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HotelAcc
 *
 * @ORM\Table(name="hotelacc")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\HotelAccRepository")
 */
class HotelAcc
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
     * @ORM\Column(name="titre", type="string", length=50, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="entete1", type="string", length=50, nullable=true)
     */
    private $entete1;

    /**
     * @var string
     *
     * @ORM\Column(name="entete2", type="string", length=50, nullable=true)
     */
    private $entete2;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean", nullable=true)
     */
    private $etat;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return HotelAcc
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set entete1
     *
     * @param string $entete1
     *
     * @return HotelAcc
     */
    public function setEntete1($entete1)
    {
        $this->entete1 = $entete1;

        return $this;
    }

    /**
     * Get entete1
     *
     * @return string
     */
    public function getEntete1()
    {
        return $this->entete1;
    }

    /**
     * Set entete2
     *
     * @param string $entete2
     *
     * @return HotelAcc
     */
    public function setEntete2($entete2)
    {
        $this->entete2 = $entete2;

        return $this;
    }

    /**
     * Get entete2
     *
     * @return string
     */
    public function getEntete2()
    {
        return $this->entete2;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return HotelAcc
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }
}

