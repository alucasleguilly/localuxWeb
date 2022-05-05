<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restitution
 *
 * @ORM\Table(name="restitution", indexes={@ORM\Index(name="FK_RESTITUTION_LEASE", columns={"ID_LEASE"})})
 * @ORM\Entity
 */
class Restitution
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
     * @var \DateTime
     *
     * @ORM\Column(name="DATE", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="NB_KILOMETERS", type="bigint", nullable=false)
     */
    private $nbKilometers;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOTE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="TARIF", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $tarif;

    /**
     * @var Lease
     *
     * @ORM\ManyToOne(targetEntity="Lease")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_LEASE", referencedColumnName="ID")
     * })
     */
    private $idLease;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getTarif(): ?string
    {
        return $this->tarif;
    }

    public function setTarif(string $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getIdLease(): ?Lease
    {
        return $this->idLease;
    }

    public function setIdLease(?Lease $idLease): self
    {
        $this->idLease = $idLease;

        return $this;
    }
}
