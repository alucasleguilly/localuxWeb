<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LeaseWithoutDriver
 *
 * @ORM\Table(name="lease_without_driver", indexes={@ORM\Index(name="FK_LEASE_WITHOUT_DRIVER_OPTION_WITHOUT_DRIVER", columns={"ID_OPTION"})})
 * @ORM\Entity
 */
class LeaseWithoutDriver extends Lease
{
    /**
     * @var string
     *
     * @ORM\Column(name="NB_KILOMETERS_START", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $nbKilometersStart;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NB_KILOMETERS_END", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $nbKilometersEnd;

    /**
     * @var OptionWithoutDriver
     *
     * @ORM\ManyToOne(targetEntity="OptionWithoutDriver")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_OPTION", referencedColumnName="ID")
     * })
     */
    private $idOption;


    public function getNbKilometersStart(): ?string
    {
        return $this->nbKilometersStart;
    }

    public function setNbKilometersStart(string $nbKilometersStart): self
    {
        $this->nbKilometersStart = $nbKilometersStart;

        return $this;
    }

    public function getNbKilometersEnd(): ?string
    {
        return $this->nbKilometersEnd;
    }

    public function setNbKilometersEnd(?string $nbKilometersEnd): self
    {
        $this->nbKilometersEnd = $nbKilometersEnd;

        return $this;
    }

    public function getIdOption(): ?OptionWithoutDriver
    {
        return $this->idOption;
    }

    public function setIdOption(?OptionWithoutDriver $idOption): self
    {
        $this->idOption = $idOption;

        return $this;
    }
}
