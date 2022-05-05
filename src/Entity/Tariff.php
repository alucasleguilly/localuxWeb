<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tariff
 *
 * @ORM\Table(name="tariff", indexes={@ORM\Index(name="FK_TARIFF_OPTION", columns={"ID_OPTION"}), @ORM\Index(name="FK_TARIFF_MODEL", columns={"ID_MODEL"})})
 * @ORM\Entity
 */
class Tariff
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="PRICE", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var OptionWithoutDriver
     *
     * @ORM\ManyToOne(targetEntity="OptionWithoutDriver")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_OPTION", referencedColumnName="ID")
     * })
     */
    private $idOption;

    /**
     * @var Model
     *
     * @ORM\ManyToOne(targetEntity="Model")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_MODEL", referencedColumnName="ID")
     * })
     */
    private $idModel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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
