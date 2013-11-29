<?php

namespace Info\FAQBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FaqQuestionsAnswers
 *
 * @ORM\Table(name="faq_questions_answers")
 * @ORM\Entity
 */
class FaqQuestionsAnswers
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
     * @ORM\Column(name="question", type="text", nullable=true)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text", nullable=true)
     */
    private $answer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \FaqSections
     *
     * @ORM\ManyToOne(targetEntity="FaqSections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     * })
     */
    private $section;



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
     * Set question
     *
     * @param string $question
     * @return FaqQuestionsAnswers
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return FaqQuestionsAnswers
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    
        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return FaqQuestionsAnswers
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
     * Set razdel
     *
     * @param \Info\FAQBundle\Entity\FaqSections $razdel
     * @return FaqQuestionsAnswers
     */
    public function setRazdel(\Info\FAQBundle\Entity\FaqSections $razdel = null)
    {
        $this->razdel = $razdel;
    
        return $this;
    }

    /**
     * Get razdel
     *
     * @return \Info\FAQBundle\Entity\FaqSections 
     */
    public function getRazdel()
    {
        return $this->razdel;
    }
}