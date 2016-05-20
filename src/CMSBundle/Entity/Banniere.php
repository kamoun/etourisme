<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banniere
 *
 * @ORM\Table(name="banniere")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\BanniereRepository")
 */
class Banniere
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
     * @ORM\Column(name="titre", type="string", length=80, nullable=true)
     */
    private $titre;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;
    
    /**
    * @ORM\OneToOne(targetEntity="Etourisme\HotelBundle\Entity\Image",mappedBy="banimage", cascade={"All"})
    * 
    * 
    */
    private $image;
    

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
     * @return Banniere
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
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Banniere
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
    
    /**
     * Add image
     *
     * @param \CMSBundle\Entity\Banniere $image
     *
     * @return Banniere
     */
    public function addImage(\Etourisme\HotelBundle\Entity\Image $image) {
        $this->image = $image;
        $image->setBanimage($this);

        return $this;
    }

    /**
     * Remove image
     *
     * @param \CMSBundle\Entity\Banniere $image
     */
    public function removeImage(\Etourisme\HotelBundle\Entity\Image $image) {
        $this->image->removeElement($image);
        $image->setBanimage(null);
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage() {
        return $this->image;
    }
    
     public function __toString() {
        return $this->getTitre();
    }
}

