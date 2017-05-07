<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 *
 * @ORM\Table(name="commentaires")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentairesRepository")
 */
class Commentaires
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
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Commentaires", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */    
    private $News;
    

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
     * Set message
     *
     * @param string $message
     *
     * @return Commentaires
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Commentaires
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

    /**
     * Set news
     *
     * @param \AppBundle\Entity\Commentaires $news
     *
     * @return Commentaires
     */
    public function setNews(\AppBundle\Entity\Commentaires $news)
    {
        $this->News = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \AppBundle\Entity\Commentaires
     */
    public function getNews()
    {
        return $this->News;
    }
}
