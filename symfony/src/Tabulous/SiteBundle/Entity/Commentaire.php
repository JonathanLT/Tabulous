<?php

namespace Tabulous\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="idMembre", columns={"idMembre"}), @ORM\Index(name="idTablature", columns={"idTablature"})})
 * @ORM\Entity
 */
class Commentaire
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255, nullable=false)
     */
    private $contenu;

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
     * @var \Tablature
     *
     * @ORM\ManyToOne(targetEntity="Tablature")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTablature", referencedColumnName="id")
     * })
     */
    private $idtablature;



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
     * Set date
     *
     * @param \DateTime $date
     * @return Commentaire
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Commentaire
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set idmembre
     *
     * @param \Tabulous\SiteBundle\Entity\Membre $idmembre
     * @return Commentaire
     */
    public function setIdmembre(\Tabulous\SiteBundle\Entity\Membre $idmembre = null)
    {
        $this->idmembre = $idmembre;

        return $this;
    }

    /**
     * Get idmembre
     *
     * @return \Tabulous\SiteBundle\Entity\Membre 
     */
    public function getIdmembre()
    {
        return $this->idmembre;
    }

    /**
     * Set idtablature
     *
     * @param \Tabulous\SiteBundle\Entity\Tablature $idtablature
     * @return Commentaire
     */
    public function setIdtablature(\Tabulous\SiteBundle\Entity\Tablature $idtablature = null)
    {
        $this->idtablature = $idtablature;

        return $this;
    }

    /**
     * Get idtablature
     *
     * @return \Tabulous\SiteBundle\Entity\Tablature 
     */
    public function getIdtablature()
    {
        return $this->idtablature;
    }
}
