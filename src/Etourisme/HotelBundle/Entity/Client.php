<?php

namespace Etourisme\HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="Etourisme\HotelBundle\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="nomClt", type="string", length=50)
     */
    private $nomClt;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomClt", type="string", length=50)
     */
    private $prenomClt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=20)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="string", length=10, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=50, nullable=true)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="recommandation", type="string", length=200, nullable=true)
     */
    private $recommandation;

    /**
     * @var string
     *
     * @ORM\Column(name="modePaiement", type="string", length=40, nullable=true)
     */
    private $modePaiement;
    
    /**
     * @ORM\ManyToOne(targetEntity="Etourisme\HotelBundle\Entity\Reservation",inversedBy="client")
     * 
     */
    private $reservation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1s1", type="string", length=50, nullable=true)
     */
    private $nom1s1;

    /**
     * @var string
     *
     * @ORM\Column(name="recoms1", type="string", length=150, nullable=true)
     */
    private $recoms1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1s2", type="string", length=50, nullable=true)
     */
    private $nom1s2;

    /**
     * @var string
     *
     * @ORM\Column(name="recoms2", type="string", length=150, nullable=true)
     */
    private $recoms2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1s3", type="string", length=50, nullable=true)
     */
    private $nom1s3;

    /**
     * @var string
     *
     * @ORM\Column(name="recoms3", type="string", length=150, nullable=true)
     */
    private $recoms3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1s4", type="string", length=50, nullable=true)
     */
    private $nom1s4;

    /**
     * @var string
     *
     * @ORM\Column(name="recoms4", type="string", length=150, nullable=true)
     */
    private $recoms4;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1s5", type="string", length=50, nullable=true)
     */
    private $nom1s5;

    /**
     * @var string
     *
     * @ORM\Column(name="recoms5", type="string", length=150, nullable=true)
     */
    private $recoms5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1d1", type="string", length=50, nullable=true)
     */
    private $nom1d1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2d1", type="string", length=50, nullable=true)
     */
    private $nom2d1;

    /**
     * @var string
     *
     * @ORM\Column(name="recomd1", type="string", length=150, nullable=true)
     */
    private $recomd1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1d2", type="string", length=50, nullable=true)
     */
    private $nom1d2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2d2", type="string", length=50, nullable=true)
     */
    private $nom2d2;

    /**
     * @var string
     *
     * @ORM\Column(name="recomd2", type="string", length=150, nullable=true)
     */
    private $recomd2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1d3", type="string", length=50, nullable=true)
     */
    private $nom1d3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2d3", type="string", length=50, nullable=true)
     */
    private $nom2d3;

    /**
     * @var string
     *
     * @ORM\Column(name="recomd3", type="string", length=150, nullable=true)
     */
    private $recomd3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1d4", type="string", length=50, nullable=true)
     */
    private $nom1d4;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2d4", type="string", length=50, nullable=true)
     */
    private $nom2d4;

    /**
     * @var string
     *
     * @ORM\Column(name="recomd4", type="string", length=150, nullable=true)
     */
    private $recomd4;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1d5", type="string", length=50, nullable=true)
     */
    private $nom1d5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2d5", type="string", length=50, nullable=true)
     */
    private $nom2d5;

    /**
     * @var string
     *
     * @ORM\Column(name="recomd5", type="string", length=150, nullable=true)
     */
    private $recomd5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1t1", type="string", length=50, nullable=true)
     */
    private $nom1t1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2t1", type="string", length=50, nullable=true)
     */
    private $nom2t1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom3t1", type="string", length=50, nullable=true)
     */
    private $nom3t1;

    /**
     * @var string
     *
     * @ORM\Column(name="recomt1", type="string", length=150, nullable=true)
     */
    private $recomt1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1t2", type="string", length=50, nullable=true)
     */
    private $nom1t2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2t2", type="string", length=50, nullable=true)
     */
    private $nom2t2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom3t2", type="string", length=50, nullable=true)
     */
    private $nom3t2;

    /**
     * @var string
     *
     * @ORM\Column(name="recomt2", type="string", length=150, nullable=true)
     */
    private $recomt2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1t4", type="string", length=50, nullable=true)
     */
    private $nom1t4;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2t4", type="string", length=50, nullable=true)
     */
    private $nom2t4;

    /**
     * @var string
     *
     * @ORM\Column(name="nom3t4", type="string", length=50, nullable=true)
     */
    private $nom3t4;

    /**
     * @var string
     *
     * @ORM\Column(name="recomt4", type="string", length=150, nullable=true)
     */
    private $recomt4;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1t3", type="string", length=50, nullable=true)
     */
    private $nom1t3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2t3", type="string", length=50, nullable=true)
     */
    private $nom2t3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom3t3", type="string", length=50, nullable=true)
     */
    private $nom3t3;

    /**
     * @var string
     *
     * @ORM\Column(name="recomt3", type="string", length=150, nullable=true)
     */
    private $recomt3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1t5", type="string", length=50, nullable=true)
     */
    private $nom1t5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2t5", type="string", length=50, nullable=true)
     */
    private $nom2t5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom3t5", type="string", length=50, nullable=true)
     */
    private $nom3t5;

    /**
     * @var string
     *
     * @ORM\Column(name="recomt5", type="string", length=150, nullable=true)
     */
    private $recomt5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1q1", type="string", length=50, nullable=true)
     */
    private $nom1q1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2q1", type="string", length=50, nullable=true)
     */
    private $nom2q1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom3q1", type="string", length=50, nullable=true)
     */
    private $nom3q1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom4q1", type="string", length=50, nullable=true)
     */
    private $nom4q1;

    /**
     * @var string
     *
     * @ORM\Column(name="recomq1", type="string", length=150, nullable=true)
     */
    private $recomq1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1q2", type="string", length=50, nullable=true)
     */
    private $nom1q2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2q2", type="string", length=50, nullable=true)
     */
    private $nom2q2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom3q2", type="string", length=50, nullable=true)
     */
    private $nom3q2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom4q2", type="string", length=50, nullable=true)
     */
    private $nom4q2;

    /**
     * @var string
     *
     * @ORM\Column(name="recomq2", type="string", length=150, nullable=true)
     */
    private $recomq2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1q3", type="string", length=50, nullable=true)
     */
    private $nom1q3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2q3", type="string", length=50, nullable=true)
     */
    private $nom2q3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom3q3", type="string", length=50, nullable=true)
     */
    private $nom3q3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom4q4", type="string", length=50, nullable=true)
     */
    private $nom4q4;

    /**
     * @var string
     *
     * @ORM\Column(name="recomq4", type="string", length=150, nullable=true)
     */
    private $recomq4;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1q5", type="string", length=50, nullable=true)
     */
    private $nom1q5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2q5", type="string", length=50, nullable=true)
     */
    private $nom2q5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom3q5", type="string", length=50, nullable=true)
     */
    private $nom3q5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom4q5", type="string", length=50, nullable=true)
     */
    private $nom4q5;

    /**
     * @var string
     *
     * @ORM\Column(name="recomq5", type="string", length=150, nullable=true)
     */
    private $recomq5;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=50, nullable=true)
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
     * Set nomClt
     *
     * @param string $nomClt
     *
     * @return Client
     */
    public function setNomClt($nomClt)
    {
        $this->nomClt = $nomClt;

        return $this;
    }

    /**
     * Get nomClt
     *
     * @return string
     */
    public function getNomClt()
    {
        return $this->nomClt;
    }

    /**
     * Set prenomClt
     *
     * @param string $prenomClt
     *
     * @return Client
     */
    public function setPrenomClt($prenomClt)
    {
        $this->prenomClt = $prenomClt;

        return $this;
    }

    /**
     * Get prenomClt
     *
     * @return string
     */
    public function getPrenomClt()
    {
        return $this->prenomClt;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Client
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Client
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Client
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Client
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set recommandation
     *
     * @param string $recommandation
     *
     * @return Client
     */
    public function setRecommandation($recommandation)
    {
        $this->recommandation = $recommandation;

        return $this;
    }

    /**
     * Get recommandation
     *
     * @return string
     */
    public function getRecommandation()
    {
        return $this->recommandation;
    }

    /**
     * Set modePaiement
     *
     * @param string $modePaiement
     *
     * @return Client
     */
    public function setModePaiement($modePaiement)
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    /**
     * Get modePaiement
     *
     * @return string
     */
    public function getModePaiement()
    {
        return $this->modePaiement;
    }

    /**
     * Set nom1s1
     *
     * @param string $nom1s1
     *
     * @return Client
     */
    public function setNom1s1($nom1s1)
    {
        $this->nom1s1 = $nom1s1;

        return $this;
    }

    /**
     * Get nom1s1
     *
     * @return string
     */
    public function getNom1s1()
    {
        return $this->nom1s1;
    }

    /**
     * Set recoms1
     *
     * @param string $recoms1
     *
     * @return Client
     */
    public function setRecoms1($recoms1)
    {
        $this->recoms1 = $recoms1;

        return $this;
    }

    /**
     * Get recoms1
     *
     * @return string
     */
    public function getRecoms1()
    {
        return $this->recoms1;
    }

    /**
     * Set nom1s2
     *
     * @param string $nom1s2
     *
     * @return Client
     */
    public function setNom1s2($nom1s2)
    {
        $this->nom1s2 = $nom1s2;

        return $this;
    }

    /**
     * Get nom1s2
     *
     * @return string
     */
    public function getNom1s2()
    {
        return $this->nom1s2;
    }

    /**
     * Set recoms2
     *
     * @param string $recoms2
     *
     * @return Client
     */
    public function setRecoms2($recoms2)
    {
        $this->recoms2 = $recoms2;

        return $this;
    }

    /**
     * Get recoms2
     *
     * @return string
     */
    public function getRecoms2()
    {
        return $this->recoms2;
    }

    /**
     * Set nom1s3
     *
     * @param string $nom1s3
     *
     * @return Client
     */
    public function setNom1s3($nom1s3)
    {
        $this->nom1s3 = $nom1s3;

        return $this;
    }

    /**
     * Get nom1s3
     *
     * @return string
     */
    public function getNom1s3()
    {
        return $this->nom1s3;
    }

    /**
     * Set recoms3
     *
     * @param string $recoms3
     *
     * @return Client
     */
    public function setRecoms3($recoms3)
    {
        $this->recoms3 = $recoms3;

        return $this;
    }

    /**
     * Get recoms3
     *
     * @return string
     */
    public function getRecoms3()
    {
        return $this->recoms3;
    }

    /**
     * Set nom1s4
     *
     * @param string $nom1s4
     *
     * @return Client
     */
    public function setNom1s4($nom1s4)
    {
        $this->nom1s4 = $nom1s4;

        return $this;
    }

    /**
     * Get nom1s4
     *
     * @return string
     */
    public function getNom1s4()
    {
        return $this->nom1s4;
    }

    /**
     * Set recoms4
     *
     * @param string $recoms4
     *
     * @return Client
     */
    public function setRecoms4($recoms4)
    {
        $this->recoms4 = $recoms4;

        return $this;
    }

    /**
     * Get recoms4
     *
     * @return string
     */
    public function getRecoms4()
    {
        return $this->recoms4;
    }

    /**
     * Set nom1s5
     *
     * @param string $nom1s5
     *
     * @return Client
     */
    public function setNom1s5($nom1s5)
    {
        $this->nom1s5 = $nom1s5;

        return $this;
    }

    /**
     * Get nom1s5
     *
     * @return string
     */
    public function getNom1s5()
    {
        return $this->nom1s5;
    }

    /**
     * Set recoms5
     *
     * @param string $recoms5
     *
     * @return Client
     */
    public function setRecoms5($recoms5)
    {
        $this->recoms5 = $recoms5;

        return $this;
    }

    /**
     * Get recoms5
     *
     * @return string
     */
    public function getRecoms5()
    {
        return $this->recoms5;
    }

    /**
     * Set nom1d1
     *
     * @param string $nom1d1
     *
     * @return Client
     */
    public function setNom1d1($nom1d1)
    {
        $this->nom1d1 = $nom1d1;

        return $this;
    }

    /**
     * Get nom1d1
     *
     * @return string
     */
    public function getNom1d1()
    {
        return $this->nom1d1;
    }

    /**
     * Set nom2d1
     *
     * @param string $nom2d1
     *
     * @return Client
     */
    public function setNom2d1($nom2d1)
    {
        $this->nom2d1 = $nom2d1;

        return $this;
    }

    /**
     * Get nom2d1
     *
     * @return string
     */
    public function getNom2d1()
    {
        return $this->nom2d1;
    }

    /**
     * Set recomd1
     *
     * @param string $recomd1
     *
     * @return Client
     */
    public function setRecomd1($recomd1)
    {
        $this->recomd1 = $recomd1;

        return $this;
    }

    /**
     * Get recomd1
     *
     * @return string
     */
    public function getRecomd1()
    {
        return $this->recomd1;
    }

    /**
     * Set nom1d2
     *
     * @param string $nom1d2
     *
     * @return Client
     */
    public function setNom1d2($nom1d2)
    {
        $this->nom1d2 = $nom1d2;

        return $this;
    }

    /**
     * Get nom1d2
     *
     * @return string
     */
    public function getNom1d2()
    {
        return $this->nom1d2;
    }

    /**
     * Set nom2d2
     *
     * @param string $nom2d2
     *
     * @return Client
     */
    public function setNom2d2($nom2d2)
    {
        $this->nom2d2 = $nom2d2;

        return $this;
    }

    /**
     * Get nom2d2
     *
     * @return string
     */
    public function getNom2d2()
    {
        return $this->nom2d2;
    }

    /**
     * Set recomd2
     *
     * @param string $recomd2
     *
     * @return Client
     */
    public function setRecomd2($recomd2)
    {
        $this->recomd2 = $recomd2;

        return $this;
    }

    /**
     * Get recomd2
     *
     * @return string
     */
    public function getRecomd2()
    {
        return $this->recomd2;
    }

    /**
     * Set nom1d3
     *
     * @param string $nom1d3
     *
     * @return Client
     */
    public function setNom1d3($nom1d3)
    {
        $this->nom1d3 = $nom1d3;

        return $this;
    }

    /**
     * Get nom1d3
     *
     * @return string
     */
    public function getNom1d3()
    {
        return $this->nom1d3;
    }

    /**
     * Set nom2d3
     *
     * @param string $nom2d3
     *
     * @return Client
     */
    public function setNom2d3($nom2d3)
    {
        $this->nom2d3 = $nom2d3;

        return $this;
    }

    /**
     * Get nom2d3
     *
     * @return string
     */
    public function getNom2d3()
    {
        return $this->nom2d3;
    }

    /**
     * Set recomd3
     *
     * @param string $recomd3
     *
     * @return Client
     */
    public function setRecomd3($recomd3)
    {
        $this->recomd3 = $recomd3;

        return $this;
    }

    /**
     * Get recomd3
     *
     * @return string
     */
    public function getRecomd3()
    {
        return $this->recomd3;
    }

    /**
     * Set nom1d4
     *
     * @param string $nom1d4
     *
     * @return Client
     */
    public function setNom1d4($nom1d4)
    {
        $this->nom1d4 = $nom1d4;

        return $this;
    }

    /**
     * Get nom1d4
     *
     * @return string
     */
    public function getNom1d4()
    {
        return $this->nom1d4;
    }

    /**
     * Set nom2d4
     *
     * @param string $nom2d4
     *
     * @return Client
     */
    public function setNom2d4($nom2d4)
    {
        $this->nom2d4 = $nom2d4;

        return $this;
    }

    /**
     * Get nom2d4
     *
     * @return string
     */
    public function getNom2d4()
    {
        return $this->nom2d4;
    }

    /**
     * Set recomd4
     *
     * @param string $recomd4
     *
     * @return Client
     */
    public function setRecomd4($recomd4)
    {
        $this->recomd4 = $recomd4;

        return $this;
    }

    /**
     * Get recomd4
     *
     * @return string
     */
    public function getRecomd4()
    {
        return $this->recomd4;
    }

    /**
     * Set nom1d5
     *
     * @param string $nom1d5
     *
     * @return Client
     */
    public function setNom1d5($nom1d5)
    {
        $this->nom1d5 = $nom1d5;

        return $this;
    }

    /**
     * Get nom1d5
     *
     * @return string
     */
    public function getNom1d5()
    {
        return $this->nom1d5;
    }

    /**
     * Set nom2d5
     *
     * @param string $nom2d5
     *
     * @return Client
     */
    public function setNom2d5($nom2d5)
    {
        $this->nom2d5 = $nom2d5;

        return $this;
    }

    /**
     * Get nom2d5
     *
     * @return string
     */
    public function getNom2d5()
    {
        return $this->nom2d5;
    }

    /**
     * Set rcomd5
     *
     * @param string $rcomd5
     *
     * @return Client
     */
    public function setRcomd5($rcomd5)
    {
        $this->rcomd5 = $rcomd5;

        return $this;
    }

    /**
     * Get rcomd5
     *
     * @return string
     */
    public function getRcomd5()
    {
        return $this->rcomd5;
    }

    /**
     * Set nom1t1
     *
     * @param string $nom1t1
     *
     * @return Client
     */
    public function setNom1t1($nom1t1)
    {
        $this->nom1t1 = $nom1t1;

        return $this;
    }

    /**
     * Get nom1t1
     *
     * @return string
     */
    public function getNom1t1()
    {
        return $this->nom1t1;
    }

    /**
     * Set nom2t1
     *
     * @param string $nom2t1
     *
     * @return Client
     */
    public function setNom2t1($nom2t1)
    {
        $this->nom2t1 = $nom2t1;

        return $this;
    }

    /**
     * Get nom2t1
     *
     * @return string
     */
    public function getNom2t1()
    {
        return $this->nom2t1;
    }

    /**
     * Set nom3t1
     *
     * @param string $nom3t1
     *
     * @return Client
     */
    public function setNom3t1($nom3t1)
    {
        $this->nom3t1 = $nom3t1;

        return $this;
    }

    /**
     * Get nom3t1
     *
     * @return string
     */
    public function getNom3t1()
    {
        return $this->nom3t1;
    }

    /**
     * Set recomt1
     *
     * @param string $recomt1
     *
     * @return Client
     */
    public function setRecomt1($recomt1)
    {
        $this->recomt1 = $recomt1;

        return $this;
    }

    /**
     * Get recomt1
     *
     * @return string
     */
    public function getRecomt1()
    {
        return $this->recomt1;
    }

    /**
     * Set nom1t2
     *
     * @param string $nom1t2
     *
     * @return Client
     */
    public function setNom1t2($nom1t2)
    {
        $this->nom1t2 = $nom1t2;

        return $this;
    }

    /**
     * Get nom1t2
     *
     * @return string
     */
    public function getNom1t2()
    {
        return $this->nom1t2;
    }

    /**
     * Set nom2t2
     *
     * @param string $nom2t2
     *
     * @return Client
     */
    public function setNom2t2($nom2t2)
    {
        $this->nom2t2 = $nom2t2;

        return $this;
    }

    /**
     * Get nom2t2
     *
     * @return string
     */
    public function getNom2t2()
    {
        return $this->nom2t2;
    }

    /**
     * Set nom3t2
     *
     * @param string $nom3t2
     *
     * @return Client
     */
    public function setNom3t2($nom3t2)
    {
        $this->nom3t2 = $nom3t2;

        return $this;
    }

    /**
     * Get nom3t2
     *
     * @return string
     */
    public function getNom3t2()
    {
        return $this->nom3t2;
    }

    /**
     * Set recomt3
     *
     * @param string $recomt3
     *
     * @return Client
     */
    public function setRecomt3($recomt3)
    {
        $this->recomt3 = $recomt3;

        return $this;
    }

    /**
     * Get recomt3
     *
     * @return string
     */
    public function getRecomt3()
    {
        return $this->recomt3;
    }

    /**
     * Set nom1t4
     *
     * @param string $nom1t4
     *
     * @return Client
     */
    public function setNom1t4($nom1t4)
    {
        $this->nom1t4 = $nom1t4;

        return $this;
    }

    /**
     * Get nom1t4
     *
     * @return string
     */
    public function getNom1t4()
    {
        return $this->nom1t4;
    }

    /**
     * Set nom2t4
     *
     * @param string $nom2t4
     *
     * @return Client
     */
    public function setNom2t4($nom2t4)
    {
        $this->nom2t4 = $nom2t4;

        return $this;
    }

    /**
     * Get nom2t4
     *
     * @return string
     */
    public function getNom2t4()
    {
        return $this->nom2t4;
    }

    /**
     * Set nom3t4
     *
     * @param string $nom3t4
     *
     * @return Client
     */
    public function setNom3t4($nom3t4)
    {
        $this->nom3t4 = $nom3t4;

        return $this;
    }

    /**
     * Get nom3t4
     *
     * @return string
     */
    public function getNom3t4()
    {
        return $this->nom3t4;
    }

    /**
     * Set recomt4
     *
     * @param string $recomt4
     *
     * @return Client
     */
    public function setRecomt4($recomt4)
    {
        $this->recomt4 = $recomt4;

        return $this;
    }

    /**
     * Get recomt4
     *
     * @return string
     */
    public function getRecomt4()
    {
        return $this->recomt4;
    }

    /**
     * Set nom1t3
     *
     * @param string $nom1t3
     *
     * @return Client
     */
    public function setNom1t3($nom1t3)
    {
        $this->nom1t3 = $nom1t3;

        return $this;
    }

    /**
     * Get nom1t3
     *
     * @return string
     */
    public function getNom1t3()
    {
        return $this->nom1t3;
    }

    /**
     * Set nom2t3
     *
     * @param string $nom2t3
     *
     * @return Client
     */
    public function setNom2t3($nom2t3)
    {
        $this->nom2t3 = $nom2t3;

        return $this;
    }

    /**
     * Get nom2t3
     *
     * @return string
     */
    public function getNom2t3()
    {
        return $this->nom2t3;
    }

    /**
     * Set nom3t3
     *
     * @param string $nom3t3
     *
     * @return Client
     */
    public function setNom3t3($nom3t3)
    {
        $this->nom3t3 = $nom3t3;

        return $this;
    }

    /**
     * Get nom3t3
     *
     * @return string
     */
    public function getNom3t3()
    {
        return $this->nom3t3;
    }

    /**
     * Set recomt2
     *
     * @param string $recomt2
     *
     * @return Client
     */
    public function setRecomt2($recomt2)
    {
        $this->recomt2 = $recomt2;

        return $this;
    }

    /**
     * Get recomt2
     *
     * @return string
     */
    public function getRecomt2()
    {
        return $this->recomt2;
    }

    /**
     * Set nom1t5
     *
     * @param string $nom1t5
     *
     * @return Client
     */
    public function setNom1t5($nom1t5)
    {
        $this->nom1t5 = $nom1t5;

        return $this;
    }

    /**
     * Get nom1t5
     *
     * @return string
     */
    public function getNom1t5()
    {
        return $this->nom1t5;
    }

    /**
     * Set nom2t5
     *
     * @param string $nom2t5
     *
     * @return Client
     */
    public function setNom2t5($nom2t5)
    {
        $this->nom2t5 = $nom2t5;

        return $this;
    }

    /**
     * Get nom2t5
     *
     * @return string
     */
    public function getNom2t5()
    {
        return $this->nom2t5;
    }

    /**
     * Set nom3t5
     *
     * @param string $nom3t5
     *
     * @return Client
     */
    public function setNom3t5($nom3t5)
    {
        $this->nom3t5 = $nom3t5;

        return $this;
    }

    /**
     * Get nom3t5
     *
     * @return string
     */
    public function getNom3t5()
    {
        return $this->nom3t5;
    }

    /**
     * Set recomt5
     *
     * @param string $recomt5
     *
     * @return Client
     */
    public function setRecomt5($recomt5)
    {
        $this->recomt5 = $recomt5;

        return $this;
    }

    /**
     * Get recomt5
     *
     * @return string
     */
    public function getRecomt5()
    {
        return $this->recomt5;
    }

    /**
     * Set nom1q1
     *
     * @param string $nom1q1
     *
     * @return Client
     */
    public function setNom1q1($nom1q1)
    {
        $this->nom1q1 = $nom1q1;

        return $this;
    }

    /**
     * Get nom1q1
     *
     * @return string
     */
    public function getNom1q1()
    {
        return $this->nom1q1;
    }

    /**
     * Set nom2q1
     *
     * @param string $nom2q1
     *
     * @return Client
     */
    public function setNom2q1($nom2q1)
    {
        $this->nom2q1 = $nom2q1;

        return $this;
    }

    /**
     * Get nom2q1
     *
     * @return string
     */
    public function getNom2q1()
    {
        return $this->nom2q1;
    }

    /**
     * Set nom3q1
     *
     * @param string $nom3q1
     *
     * @return Client
     */
    public function setNom3q1($nom3q1)
    {
        $this->nom3q1 = $nom3q1;

        return $this;
    }

    /**
     * Get nom3q1
     *
     * @return string
     */
    public function getNom3q1()
    {
        return $this->nom3q1;
    }

    /**
     * Set nom4q1
     *
     * @param string $nom4q1
     *
     * @return Client
     */
    public function setNom4q1($nom4q1)
    {
        $this->nom4q1 = $nom4q1;

        return $this;
    }

    /**
     * Get nom4q1
     *
     * @return string
     */
    public function getNom4q1()
    {
        return $this->nom4q1;
    }

    /**
     * Set recomq1
     *
     * @param string $recomq1
     *
     * @return Client
     */
    public function setRecomq1($recomq1)
    {
        $this->recomq1 = $recomq1;

        return $this;
    }

    /**
     * Get recomq1
     *
     * @return string
     */
    public function getRecomq1()
    {
        return $this->recomq1;
    }

    /**
     * Set nom1q2
     *
     * @param string $nom1q2
     *
     * @return Client
     */
    public function setNom1q2($nom1q2)
    {
        $this->nom1q2 = $nom1q2;

        return $this;
    }

    /**
     * Get nom1q2
     *
     * @return string
     */
    public function getNom1q2()
    {
        return $this->nom1q2;
    }

    /**
     * Set nom2q2
     *
     * @param string $nom2q2
     *
     * @return Client
     */
    public function setNom2q2($nom2q2)
    {
        $this->nom2q2 = $nom2q2;

        return $this;
    }

    /**
     * Get nom2q2
     *
     * @return string
     */
    public function getNom2q2()
    {
        return $this->nom2q2;
    }

    /**
     * Set nom3q2
     *
     * @param string $nom3q2
     *
     * @return Client
     */
    public function setNom3q2($nom3q2)
    {
        $this->nom3q2 = $nom3q2;

        return $this;
    }

    /**
     * Get nom3q2
     *
     * @return string
     */
    public function getNom3q2()
    {
        return $this->nom3q2;
    }

    /**
     * Set nom4q2
     *
     * @param string $nom4q2
     *
     * @return Client
     */
    public function setNom4q2($nom4q2)
    {
        $this->nom4q2 = $nom4q2;

        return $this;
    }

    /**
     * Get nom4q2
     *
     * @return string
     */
    public function getNom4q2()
    {
        return $this->nom4q2;
    }

    /**
     * Set recomq2
     *
     * @param string $recomq2
     *
     * @return Client
     */
    public function setRecomq2($recomq2)
    {
        $this->recomq2 = $recomq2;

        return $this;
    }

    /**
     * Get recomq2
     *
     * @return string
     */
    public function getRecomq2()
    {
        return $this->recomq2;
    }

    /**
     * Set nom1q3
     *
     * @param string $nom1q3
     *
     * @return Client
     */
    public function setNom1q3($nom1q3)
    {
        $this->nom1q3 = $nom1q3;

        return $this;
    }

    /**
     * Get nom1q3
     *
     * @return string
     */
    public function getNom1q3()
    {
        return $this->nom1q3;
    }

    /**
     * Set nom2q3
     *
     * @param string $nom2q3
     *
     * @return Client
     */
    public function setNom2q3($nom2q3)
    {
        $this->nom2q3 = $nom2q3;

        return $this;
    }

    /**
     * Get nom2q3
     *
     * @return string
     */
    public function getNom2q3()
    {
        return $this->nom2q3;
    }

    /**
     * Set nom3q3
     *
     * @param string $nom3q3
     *
     * @return Client
     */
    public function setNom3q3($nom3q3)
    {
        $this->nom3q3 = $nom3q3;

        return $this;
    }

    /**
     * Get nom3q3
     *
     * @return string
     */
    public function getNom3q3()
    {
        return $this->nom3q3;
    }

    /**
     * Set nom4q4
     *
     * @param string $nom4q4
     *
     * @return Client
     */
    public function setNom4q4($nom4q4)
    {
        $this->nom4q4 = $nom4q4;

        return $this;
    }

    /**
     * Get nom4q4
     *
     * @return string
     */
    public function getNom4q4()
    {
        return $this->nom4q4;
    }

    /**
     * Set recomq4
     *
     * @param string $recomq4
     *
     * @return Client
     */
    public function setRecomq4($recomq4)
    {
        $this->recomq4 = $recomq4;

        return $this;
    }

    /**
     * Get recomq4
     *
     * @return string
     */
    public function getRecomq4()
    {
        return $this->recomq4;
    }

    /**
     * Set nom1q5
     *
     * @param string $nom1q5
     *
     * @return Client
     */
    public function setNom1q5($nom1q5)
    {
        $this->nom1q5 = $nom1q5;

        return $this;
    }

    /**
     * Get nom1q5
     *
     * @return string
     */
    public function getNom1q5()
    {
        return $this->nom1q5;
    }

    /**
     * Set nom2q5
     *
     * @param string $nom2q5
     *
     * @return Client
     */
    public function setNom2q5($nom2q5)
    {
        $this->nom2q5 = $nom2q5;

        return $this;
    }

    /**
     * Get nom2q5
     *
     * @return string
     */
    public function getNom2q5()
    {
        return $this->nom2q5;
    }

    /**
     * Set nom3q5
     *
     * @param string $nom3q5
     *
     * @return Client
     */
    public function setNom3q5($nom3q5)
    {
        $this->nom3q5 = $nom3q5;

        return $this;
    }

    /**
     * Get nom3q5
     *
     * @return string
     */
    public function getNom3q5()
    {
        return $this->nom3q5;
    }

    /**
     * Set nom4q5
     *
     * @param string $nom4q5
     *
     * @return Client
     */
    public function setNom4q5($nom4q5)
    {
        $this->nom4q5 = $nom4q5;

        return $this;
    }

    /**
     * Get nom4q5
     *
     * @return string
     */
    public function getNom4q5()
    {
        return $this->nom4q5;
    }

    /**
     * Set recomq5
     *
     * @param string $recomq5
     *
     * @return Client
     */
    public function setRecomq5($recomq5)
    {
        $this->recomq5 = $recomq5;

        return $this;
    }

    /**
     * Get recomq5
     *
     * @return string
     */
    public function getRecomq5()
    {
        return $this->recomq5;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Client
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set recomd5
     *
     * @param string $recomd5
     *
     * @return Client
     */
    public function setRecomd5($recomd5)
    {
        $this->recomd5 = $recomd5;

        return $this;
    }

    /**
     * Get recomd5
     *
     * @return string
     */
    public function getRecomd5()
    {
        return $this->recomd5;
    }

    /**
     * Set reservation
     *
     * @param \Etourisme\HotelBundle\Entity\Reservation $reservation
     *
     * @return Client
     */
    public function setReservation(\Etourisme\HotelBundle\Entity\Reservation $reservation = null)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \Etourisme\HotelBundle\Entity\Reservation
     */
    public function getReservation()
    {
        return $this->reservation;
    }
}
