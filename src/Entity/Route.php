<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Route
 *
 * @ORM\Table(name="route")
 * @ORM\Entity
 */
class Route
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
     * @var string
     *
     * @ORM\Column(name="ADDRESS_START", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $addressStart;

    /**
     * @var string
     *
     * @ORM\Column(name="ADDRESS_END", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $addressEnd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddressStart(): ?string
    {
        return $this->addressStart;
    }

    public function setAddressStart(string $addressStart): self
    {
        $this->addressStart = $addressStart;

        return $this;
    }

    public function getAddressEnd(): ?string
    {
        return $this->addressEnd;
    }

    public function setAddressEnd(string $addressEnd): self
    {
        $this->addressEnd = $addressEnd;

        return $this;
    }


}
