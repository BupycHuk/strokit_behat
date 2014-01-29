<?php

namespace Info\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table(name="cashout")
 * @ORM\Entity
 */
class Cashout extends MapBase
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