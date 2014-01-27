<?php

namespace Info\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table(name="terminal")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Info\MapBundle\Entity\TerminalRepository")
 */
class Terminal extends MapBase
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}