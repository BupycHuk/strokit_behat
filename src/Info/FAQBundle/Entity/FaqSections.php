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
     * @var \Gallery
     *
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\MediaBundle\Entity\Gallery" )
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     * })
     */
    private $image;

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
     * @param \Application\Sonata\MediaBundle\Entity\Gallery $image
     * @return FaqSections
     */
    public function setImage(\Application\Sonata\MediaBundle\Entity\Gallery $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Application\Sonata\MediaBundle\Entity\Gallery
     */
    public function getImage()
    {
        return $this->image;
    }

    public function __toString()
    {
        return $this->getName()?$this->getName():"";
    }
}