<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicle
 *
 * @ORM\Table(name="vehicle", indexes={@ORM\Index(name="FK_VEHICLE_MODEL", columns={"ID_MODEL"})})
 * @ORM\Entity
 */
class Vehicle
{
    /**
     * @var string
     *
     * @ORM\Column(name="REGISTRATION", type="string", length=7, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $registration;

    /**
     * @var Model
     *
     * @ORM\ManyToOne(targetEntity="Model")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_MODEL", referencedColumnName="ID")
     * })
     */
    private $idModel;

    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    public function getIdModel(): ?Model
    {
        return $this->idModel;
    }

    public function setIdModel(?Model $idModel): self
    {
        $this->idModel = $idModel;

        return $this;
    }
}
