<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Verification
 *
 * @ORM\Table(name="verification", indexes={@ORM\Index(name="FK_VERIFICATION_PIECES_MODEL", columns={"ID_PIECE"}), @ORM\Index(name="FK_VERIFICATION_RESTITUTION", columns={"ID_RESTITUTION"}), @ORM\Index(name="FK_VERIFICATION_SHAPE", columns={"ID_SHAPE"})})
 * @ORM\Entity
 */
class Verification
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
     * @ORM\Column(name="DATE", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $date;

    /**
     * @var Restitution
     *
     * @ORM\ManyToOne(targetEntity="Restitution")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_RESTITUTION", referencedColumnName="ID")
     * })
     */
    private $idRestitution;

    /**
     * @var PiecesModel
     *
     * @ORM\ManyToOne(targetEntity="PiecesModel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PIECE", referencedColumnName="ID")
     * })
     */
    private $idPiece;

    /**
     * @var Shape
     *
     * @ORM\ManyToOne(targetEntity="Shape")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SHAPE", referencedColumnName="ID")
     * })
     */
    private $idShape;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdRestitution(): ?Restitution
    {
        return $this->idRestitution;
    }

    public function setIdRestitution(?Restitution $idRestitution): self
    {
        $this->idRestitution = $idRestitution;

        return $this;
    }

    public function getIdPiece(): ?PiecesModel
    {
        return $this->idPiece;
    }

    public function setIdPiece(?PiecesModel $idPiece): self
    {
        $this->idPiece = $idPiece;

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
}
