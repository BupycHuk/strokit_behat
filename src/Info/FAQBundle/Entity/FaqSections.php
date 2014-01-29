<?php

namespace Info\FAQBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FaqSections
 *
 * @ORM\Table(name="faq_sections")
 * @ORM\Entity
 */
class FaqSections
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var \Media
     *
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\MediaBundle\Entity\Media" )
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     * })
     */
    private $image;

    /**
     * @var FaqQuestionsAnswers
     *
     * @ORM\OneToMany(targetEntity="Info\FAQBundle\Entity\FaqQuestionsAnswers", mappedBy="section")
     */
    private $questionsAnswers;

    /**
     * @var FaqComments
     *
     * @ORM\OneToMany(targetEntity="Info\FAQBundle\Entity\FaqComments", mappedBy="section")
     */
    private $comments;

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
     * Set name
     *
     * @param string $name
     * @return FaqSections
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set image
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $image
     * @return FaqSections
     */
    public function setImage(\Application\Sonata\MediaBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }


    public function __toString()
    {
        return $this->getName()?$this->getName():"";
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questionsAnswers = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add questionsAnswers
     *
     * @param \Info\FAQBundle\Entity\FaqQuestionsAnswers $questionsAnswers
     * @return FaqSections
     */
    public function addQuestionsAnswer(\Info\FAQBundle\Entity\FaqQuestionsAnswers $questionsAnswers)
    {
        $this->questionsAnswers[] = $questionsAnswers;
    
        return $this;
    }

    /**
     * Remove questionsAnswers
     *
     * @param \Info\FAQBundle\Entity\FaqQuestionsAnswers $questionsAnswers
     */
    public function removeQuestionsAnswer(\Info\FAQBundle\Entity\FaqQuestionsAnswers $questionsAnswers)
    {
        $this->questionsAnswers->removeElement($questionsAnswers);
    }

    /**
     * Get questionsAnswers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestionsAnswers()
    {
        return $this->questionsAnswers;
    }

    /**
     * Add comments
     *
     * @param \Info\FAQBundle\Entity\FaqComments $comments
     * @return FaqSections
     */
    public function addComment(\Info\FAQBundle\Entity\FaqComments $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Info\FAQBundle\Entity\FaqComments $comments
     */
    public function removeComment(\Info\FAQBundle\Entity\FaqComments $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}