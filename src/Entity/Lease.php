<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lease
 *
 * @ORM\Table(name="lease", indexes={@ORM\Index(name="FK_LEASE_VEHICLE", columns={"REGISTRATION"}), @ORM\Index(name="FK_LEASE_CUSTOMER", columns={"ID_CUSTOMER"})})
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"lease" = "Lease", "leasewithdriver" = "LeaseWithDriver", "leasewithoutdriver" = "LeaseWithoutDriver"})
 */
abstract class Lease
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
     * @var string
     *
     * @ORM\Column(name="PRICE_PAID", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $pricePaid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_TIME_START_PLAN", type="datetime", nullable=false)
     */
    private $dateTimeStartPlan;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_TIME_END_PLAN", type="datetime", nullable=false)
     */
    private $dateTimeEndPlan;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_TIME_START_REEL", type="datetime", nullable=true)
     */
    private $dateTimeStartReel;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_TIME_END_REEL", type="datetime", nullable=true)
     */
    private $dateTimeEndReel;

    /**
     * @var Vehicle
     *
     * @ORM\ManyToOne(targetEntity="Vehicle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="REGISTRATION", referencedColumnName="REGISTRATION")
     * })
     */
    private $registration;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CUSTOMER", referencedColumnName="ID")
     * })
     */
    private $idCustomer;

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

    public function getPricePaid(): ?string
    {
        return $this->pricePaid;
    }

    public function setPricePaid(string $pricePaid): self
    {
        $this->pricePaid = $pricePaid;

        return $this;
    }

    public function getDateTimeStartPlan(): ?\DateTimeInterface
    {
        return $this->dateTimeStartPlan;
    }

    public function setDateTimeStartPlan(\DateTimeInterface $dateTimeStartPlan): self
    {
        $this->dateTimeStartPlan = $dateTimeStartPlan;

        return $this;
    }

    public function getDateTimeEndPlan(): ?\DateTimeInterface
    {
        return $this->dateTimeEndPlan;
    }

    public function setDateTimeEndPlan(\DateTimeInterface $dateTimeEndPlan): self
    {
        $this->dateTimeEndPlan = $dateTimeEndPlan;

        return $this;
    }

    public function getDateTimeStartReel(): ?\DateTimeInterface
    {
        return $this->dateTimeStartReel;
    }

    public function setDateTimeStartReel(?\DateTimeInterface $dateTimeStartReel): self
    {
        $this->dateTimeStartReel = $dateTimeStartReel;

        return $this;
    }

    public function getDateTimeEndReel(): ?\DateTimeInterface
    {
        return $this->dateTimeEndReel;
    }

    public function setDateTimeEndReel(?\DateTimeInterface $dateTimeEndReel): self
    {
        $this->dateTimeEndReel = $dateTimeEndReel;

        return $this;
    }

    public function getRegistration(): ?Vehicle
    {
        return $this->registration;
    }

    public function setRegistration(?Vehicle $registration): self
    {
        $this->registration = $registration;

        return $this;
    }

    public function getIdCustomer(): ?User
    {
        return $this->idCustomer;
    }

    public function setIdCustomer(?User $idCustomer): self
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }
}
