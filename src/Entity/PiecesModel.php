<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiecesModel
 *
 * @ORM\Table(name="pieces_model", indexes={@ORM\Index(name="FK_PIECES_MODEL_SHAPE", columns={"ID_SHAPE"}), @ORM\Index(name="FK_PIECES_MODEL_CAR_PIECE", columns={"ID_PIECE"}), @ORM\Index(name="FK_PIECES_MODEL_VEHICLE", columns={"REGISTRATION"})})
 * @ORM\Entity
 */
class PiecesModel
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
     * @var string|null
     *
     * @ORM\Column(name="NOTE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $note;

    /**
     * @var Shape
     *
     * @ORM\ManyToOne(targetEntity="Shape")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SHAPE", referencedColumnName="ID")
     * })
     */
    private $idShape;

    /**
     * @var CarPiece
     *
     * @ORM\ManyToOne(targetEntity="CarPiece")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PIECE", referencedColumnName="ID")
     * })
     */
    private $idPiece;

    /**
     * @var Vehicle
     *
     * @ORM\ManyToOne(targetEntity="Vehicle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="REGISTRATION", referencedColumnName="REGISTRATION")
     * })
     */
    private $registration;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdShape(): ?Shape
    {
        return $this->idShape;
    }

    public function setIdShape(?Shape $idShape): self
    {
        $this->idShape = $idShape;

        return $this;
    }

    public function getIdPiece(): ?CarPiece
    {
        return $this->idPiece;
    }

    public function setIdPiece(?CarPiece $idPiece): self
    {
        $this->idPiece = $idPiece;

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
}
