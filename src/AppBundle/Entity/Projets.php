<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projets
 *
 * @ORM\Table(name="projets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjetsRepository")
 */
class Projets
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
     * @ORM\Column(name="Date_texte_projet", type="string", length=70, nullable=true)
     */
    private $dateTexteProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre_Projet", type="string", length=80)
     */
    private $titreProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=80, nullable=true)
     */
    private $image;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
     * Set dateTexteProjet
     *
     * @param string $dateTexteProjet
     *
     * @return Projets
     */
    public function setDateTexteProjet($dateTexteProjet)
    {
        $this->dateTexteProjet = $dateTexteProjet;

        return $this;
    }

    /**
     * Get dateTexteProjet
     *
     * @return string
     */
    public function getDateTexteProjet()
    {
        return $this->dateTexteProjet;
    }

    /**
     * Set titreProjet
     *
     * @param string $titreProjet
     *
     * @return Projets
     */
    public function setTitreProjet($titreProjet)
    {
        $this->titreProjet = $titreProjet;

        return $this;
    }

    /**
     * Get titreProjet
     *
     * @return string
     */
    public function getTitreProjet()
    {
        return $this->titreProjet;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Projets
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Projets
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Projets
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
