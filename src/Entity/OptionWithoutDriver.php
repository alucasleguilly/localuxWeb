<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OptionWithoutDriver
 *
 * @ORM\Table(name="option_without_driver")
 * @ORM\Entity
 */
class OptionWithoutDriver extends Option
{
    /**
     * @var string
     *
     * @ORM\Column(name="TIME", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="NB_KILOMETERS", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $nbKilometers;

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getNbKilometers(): ?string
    {
        return $this->nbKilometers;
    }

    public function setNbKilometers(string $nbKilometers): self
    {
        $this->nbKilometers = $nbKilometers;

        return $this;
    }
}
