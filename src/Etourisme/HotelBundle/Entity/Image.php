<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\validator\Constraints as Assert;

/**
 * FichierCommande
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Image {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * @Assert\File(maxSize="50000k")
     */
    private $file;
    
    
    private $tempFilename;

    /**
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Hotel",inversedBy="images",cascade={"All"})
     */
    private $hotelimages;
    
    /**
     * @ORM\OneToOne(targetEntity="CMSBundle\Entity\Banniere", inversedBy="image",cascade={"All"})
     * 
     */
    private $banimage;

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
            return;
        }

        // Le nom du fichier est son id, on doit juste stocker également son extension
        $this->url = $this->file->guessExtension();

        // Et on génère l'attribut alt de la balise <img>, à la valeur du nom du fichier sur le PC de l'internaute
        $this->alt = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
            return;
        }
        if($this->getHotelimages()!==null){
             // Si on avait un ancien fichier, on le supprime
        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move(
                $this->getUploadRootDir(), // Le répertoire de destination
                $this->id . '.' . $this->url   // Le nom du fichier à créer, ici "id.extension"
        );
            
        }elseif($this->getBanimage()!==null){
             // Si on avait un ancien fichier, on le supprime
        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDirBanniere() . '/' . $this->id . '.' . $this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move(
                $this->getUploadRootDirBanniere(), // Le répertoire de destination
                $this->id . '.' . $this->url   // Le nom du fichier à créer, ici "id.extension"
        );
            
        }
         
       
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
        // On sauvegarde temporairement le nom du fichier car il dépend de l'id
       if($this->getBanimage()!=null){
            $this->tempFilename = $this->getUploadRootDirBanniere() . '/' . $this->id . '.' . $this->url;  
        }
       
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
        if (file_exists($this->tempFilename)) {
            // On supprime le fichier
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir() {
        // On retourne le chemin relatif vers l'image pour un navigateur
        return 'images/hotel_tun/'.$this->getHotelimages()->getId() ;
    }
    
    public function getUploadDir2() {
        // On retourne le chemin relatif vers l'image pour un navigateur
        return 'images/banniere/'.$this->getBanimage()->getId() ;
    }

    protected function getUploadRootDir() {
        // On retourne le chemin absolu vers l'image pour notre code PHP
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

     protected function getUploadRootDirBanniere() {
        // On retourne le chemin absolu vers l'image pour notre code PHP
        return __DIR__ . '/../../../../web/' . $this->getUploadDir2();
    }

    public function getWebPath() {
        if($this->getHotelimages()!==null){
             return $this->getUploadDir() . '/' . $this->getId() . '.' . $this->getUrl();
        }
        else if($this->getBanimage()!==null){
             return $this->getUploadDir2() . '/' . $this->getId() . '.' . $this->getUrl();
        }
    }

    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $url
     * @return Image
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt) {
        $this->alt = $alt;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlt() {
        return $this->alt;
    }

    public function setFile($file) {
        $this->file = $file;

        // On vérifie si on avait déjà un fichier pour cette entité
        if (null !== $this->url) {
            // On sauvegarde l'extension du fichier pour le supprimer plus tard
            $this->tempFilename = $this->url;

            // On réinitialise les valeurs des attributs url et alt
            $this->url = null;
            $this->alt = null;
        }
    }

    public function getFile() {
        return $this->file;
    }


    /**
     * Set hotelimages
     *
     * @param \Etourisme\HotelBundle\Entity\Hotel $hotelimages
     *
     * @return Image
     */
    public function setHotelimages(\Etourisme\HotelBundle\Entity\Hotel $hotelimages = null)
    {
        $this->hotelimages = $hotelimages;
        //$this->$hotelimages->addImage($this);
       

        return $this;
    }

    /**
     * Get hotelimages
     *
     * @return \Etourisme\HotelBundle\Entity\Hotel
     */
    public function getHotelimages()
    {
        return $this->hotelimages;
    }
    
     /**
     * Set banimage
     *
     * @param \CMSBundle\Entity\Banniere $banimage
     *
     * @return Image
     */
    public function setBanimage(\CMSBundle\Entity\Banniere $banimage = null)
    {
        $this->banimage = $banimage;
        return $this;
    }

    /**
    * Get banimage
    *
    * @return \CMSBundle\Entity\Banniere
    */
    public function getBanimage()
    {
        return $this->banimage;
    }
}
