<?php

namespace Tabulous\TablatureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tablature
 *
 * @ORM\Table(name="tablature", indexes={@ORM\Index(name="idGenre", columns={"idGenre"}), @ORM\Index(name="idInstrument", columns={"idInstrument"}), @ORM\Index(name="idMembre", columns={"idMembre"}), @ORM\Index(name="idArtiste", columns={"idArtiste"})})
 * @ORM\Entity
 */
class Tablature
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
     * @ORM\Column(name="nomMusique", type="string", length=255, nullable=false)
     */
    private $nommusique;

    /**
     * @var string
     *
     * @ORM\Column(name="album", type="string", length=100, nullable=false)
     */
    private $album;

    /**
     * @var string
     *
     * @ORM\Column(name="accordage", type="string", length=3, nullable=false)
     */
    private $accordage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="derniereConsultation", type="datetime", nullable=false)
     */
    private $derniereconsultation;

    /**
     * @var float
     *
     * @ORM\Column(name="moyenne", type="float", precision=10, scale=0, nullable=false)
     */
    private $moyenne;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=3, nullable=false)
     */
    private $format;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveau", type="integer", nullable=false)
     */
    private $niveau;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseFichier", type="string", length=255, nullable=false)
     */
    private $adressefichier;

    /**
     * @var integer
     *
     * @ORM\Column(name="cumulNote", type="integer", nullable=true)
     */
    private $cumulnote;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbNote", type="integer", nullable=true)
     */
    private $nbnote;

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
     * @var \Membre
     *
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMembre", referencedColumnName="id")
     * })
     */
    private $idmembre;

    /**
     * @var \Artiste
     *
     * @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idArtiste", referencedColumnName="id")
     * })
     */
    private $idartiste;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nommusique
     *
     * @param string $nommusique
     * @return Tablature
     */
    public function setNommusique($nommusique)
    {
        $this->nommusique = $nommusique;

        return $this;
    }

    /**
     * Get nommusique
     *
     * @return string 
     */
    public function getNommusique()
    {
        return $this->nommusique;
    }

    /**
     * Set album
     *
     * @param string $album
     * @return Tablature
     */
    public function setAlbum($album)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return string 
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set accordage
     *
     * @param string $accordage
     * @return Tablature
     */
    public function setAccordage($accordage)
    {
        $this->accordage = $accordage;

        return $this;
    }

    /**
     * Get accordage
     *
     * @return string 
     */
    public function getAccordage()
    {
        return $this->accordage;
    }

    /**
     * Set derniereconsultation
     *
     * @param \DateTime $derniereconsultation
     * @return Tablature
     */
    public function setDerniereconsultation($derniereconsultation)
    {
        $this->derniereconsultation = $derniereconsultation;

        return $this;
    }

    /**
     * Get derniereconsultation
     *
     * @return \DateTime 
     */
    public function getDerniereconsultation()
    {
        return $this->derniereconsultation;
    }

    /**
     * Set moyenne
     *
     * @param float $moyenne
     * @return Tablature
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
     * Set format
     *
     * @param string $format
     * @return Tablature
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set niveau
     *
     * @param integer $niveau
     * @return Tablature
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return integer 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set adressefichier
     *
     * @param string $adressefichier
     * @return Tablature
     */
    public function setAdressefichier($adressefichier)
    {
        $this->adressefichier = $adressefichier;

        return $this;
    }

    /**
     * Get adressefichier
     *
     * @return string 
     */
    public function getAdressefichier()
    {
        return $this->adressefichier;
    }

    /**
     * Set cumulnote
     *
     * @param integer $cumulnote
     * @return Tablature
     */
    public function setCumulnote($cumulnote)
    {
        $this->cumulnote = $cumulnote;

        return $this;
    }

    /**
     * Get cumulnote
     *
     * @return integer 
     */
    public function getCumulnote()
    {
        return $this->cumulnote;
    }

    /**
     * Set nbnote
     *
     * @param integer $nbnote
     * @return Tablature
     */
    public function setNbnote($nbnote)
    {
        $this->nbnote = $nbnote;

        return $this;
    }

    /**
     * Get nbnote
     *
     * @return integer 
     */
    public function getNbnote()
    {
        return $this->nbnote;
    }

    /**
     * Set idinstrument
     *
     * @param \Tabulous\TablatureBundle\Entity\Instrument $idinstrument
     * @return Tablature
     */
    public function setIdinstrument(\Tabulous\TablatureBundle\Entity\Instrument $idinstrument = null)
    {
        $this->idinstrument = $idinstrument;

        return $this;
    }

    /**
     * Get idinstrument
     *
     * @return \Tabulous\TablatureBundle\Entity\Instrument 
     */
    public function getIdinstrument()
    {
        return $this->idinstrument;
    }

    /**
     * Set idmembre
     *
     * @param \Tabulous\TablatureBundle\Entity\Membre $idmembre
     * @return Tablature
     */
    public function setIdmembre(\Tabulous\TablatureBundle\Entity\Membre $idmembre = null)
    {
        $this->idmembre = $idmembre;

        return $this;
    }

    /**
     * Get idmembre
     *
     * @return \Tabulous\TablatureBundle\Entity\Membre 
     */
    public function getIdmembre()
    {
        return $this->idmembre;
    }

    /**
     * Set idartiste
     *
     * @param \Tabulous\TablatureBundle\Entity\Artiste $idartiste
     * @return Tablature
     */
    public function setIdartiste(\Tabulous\TablatureBundle\Entity\Artiste $idartiste = null)
    {
        $this->idartiste = $idartiste;

        return $this;
    }

    /**
     * Get idartiste
     *
     * @return \Tabulous\TablatureBundle\Entity\Artiste 
     */
    public function getIdartiste()
    {
        return $this->idartiste;
    }

    /**
     * Set idgenre
     *
     * @param \Tabulous\TablatureBundle\Entity\Genre $idgenre
     * @return Tablature
     */
    public function setIdgenre(\Tabulous\TablatureBundle\Entity\Genre $idgenre = null)
    {
        $this->idgenre = $idgenre;

        return $this;
    }

    /**
     * Get idgenre
     *
     * @return \Tabulous\TablatureBundle\Entity\Genre 
     */
    public function getIdgenre()
    {
        return $this->idgenre;
    }
}

