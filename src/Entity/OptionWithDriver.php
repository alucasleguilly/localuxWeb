<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OptionWithDriver
 *
 * @ORM\Table(name="option_with_driver", indexes={@ORM\Index(name="FK_OPTION_WITH_DRIVER_ROUTE", columns={"ID_ROUTE"})})
 * @ORM\Entity
 */
class OptionWithDriver extends Option
{
    /**
     * @var string
     *
     * @ORM\Column(name="TARIFF", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $tariff;

    /**
     * @var Route
     *
     * @ORM\ManyToOne(targetEntity="Route")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ROUTE", referencedColumnName="ID")
     * })
     */
    private $idRoute;


    public function getTariff(): ?string
    {
        return $this->tariff;
    }

    public function setTariff(string $tariff): self
    {
        $this->tariff = $tariff;

        return $this;
    }

    public function getIdRoute(): ?Route
    {
        return $this->idRoute;
    }

    public function setIdRoute(?Route $idRoute): self
    {
        $this->idRoute = $idRoute;

        return $this;
    }
}
