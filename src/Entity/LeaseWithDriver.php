<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LeaseWithDriver
 *
 * @ORM\Table(name="lease_with_driver", indexes={@ORM\Index(name="FK_LEASE_WITH_DRIVER_OPTION_WITH_DRIVER", columns={"ID_OPTION"})})
 * @ORM\Entity
 */
class LeaseWithDriver extends Lease
{
    /**
     * @var OptionWithDriver
     *
     * @ORM\ManyToOne(targetEntity="OptionWithDriver")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_OPTION", referencedColumnName="ID")
     * })
     */
    private $idOption;

    public function getIdOption(): ?OptionWithDriver
    {
        return $this->idOption;
    }

    public function setIdOption(?OptionWithDriver $idOption): self
    {
        $this->idOption = $idOption;

        return $this;
    }
}
