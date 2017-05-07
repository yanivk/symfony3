<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parcours
 *
 * @ORM\Table(name="parcours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParcoursRepository")
 */
class Parcours
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
     * @ORM\Column(name="Date_texte", type="string", length=80)
     */
    private $dateTexte;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=150)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripition", type="string", length=255, nullable=true)
     */
    private $descripition;
    
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
     * Set dateTexte
     *
     * @param string $dateTexte
     *
     * @return Parcours
     */
    public function setDateTexte($dateTexte)
    {
        $this->dateTexte = $dateTexte;

        return $this;
    }

    /**
     * Get dateTexte
     *
     * @return string
     */
    public function getDateTexte()
    {
        return $this->dateTexte;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Parcours
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
     * Set descripition
     *
     * @param string $descripition
     *
     * @return Parcours
     */
    public function setDescripition($descripition)
    {
        $this->descripition = $descripition;

        return $this;
    }

    /**
     * Get descripition
     *
     * @return string
     */
    public function getDescripition()
    {
        return $this->descripition;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Parcours
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
