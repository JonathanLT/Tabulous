<?php

namespace Tabulous\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table(name="membre", indexes={@ORM\Index(name="idInstrument", columns={"idInstrument"}), @ORM\Index(name="idGenre", columns={"idGenre"})})
 * @ORM\Entity
 */
class Membre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=false)
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="adressMail", type="string", length=50, nullable=false)
     */
    private $adressmail;

    /**
     * @var string
     *
     * @ORM\Column(name="photoMembre", type="string", length=50, nullable=false)
     */
    private $photomembre;

    /**
     * @var float
     *
     * @ORM\Column(name="moyenne", type="float", precision=10, scale=0, nullable=false)
     */
    private $moyenne;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=32, nullable=false)
     */
    private $pseudo;

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idGenre", referencedColumnName="id")
     * })
     */
    private $idgenre;

    /**
     * @var \Instrument
     *
     * @ORM\ManyToOne(targetEntity="Instrument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idInstrument", referencedColumnName="id")
     * })
     */
    private $idinstrument;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Membre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Membre
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     * @return Membre
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime 
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set adressmail
     *
     * @param string $adressmail
     * @return Membre
     */
    public function setAdressmail($adressmail)
    {
        $this->adressmail = $adressmail;

        return $this;
    }

    /**
     * Get adressmail
     *
     * @return string 
     */
    public function getAdressmail()
    {
        return $this->adressmail;
    }

    /**
     * Set photomembre
     *
     * @param string $photomembre
     * @return Membre
     */
    public function setPhotomembre($photomembre)
    {
        $this->photomembre = $photomembre;

        return $this;
    }

    /**
     * Get photomembre
     *
     * @return string 
     */
    public function getPhotomembre()
    {
        return $this->photomembre;
    }

    /**
     * Set moyenne
     *
     * @param float $moyenne
     * @return Membre
     */
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    /**
     * Get moyenne
     *
     * @return float 
     */
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Membre
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Membre
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set idgenre
     *
     * @param \Tabulous\ForumBundle\Entity\Genre $idgenre
     * @return Membre
     */
    public function setIdgenre(\Tabulous\ForumBundle\Entity\Genre $idgenre = null)
    {
        $this->idgenre = $idgenre;

        return $this;
    }

    /**
     * Get idgenre
     *
     * @return \Tabulous\ForumBundle\Entity\Genre 
     */
    public function getIdgenre()
    {
        return $this->idgenre;
    }

    /**
     * Set idinstrument
     *
     * @param \Tabulous\ForumBundle\Entity\Instrument $idinstrument
     * @return Membre
     */
    public function setIdinstrument(\Tabulous\ForumBundle\Entity\Instrument $idinstrument = null)
    {
        $this->idinstrument = $idinstrument;

        return $this;
    }

    /**
     * Get idinstrument
     *
     * @return \Tabulous\ForumBundle\Entity\Instrument 
     */
    public function getIdinstrument()
    {
        return $this->idinstrument;
    }
}
