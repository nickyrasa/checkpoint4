<?php

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PositionRepository::class)]
class Position
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pointGuard = null;

    #[ORM\Column(length: 255)]
    private ?string $shootingGuard = null;

    #[ORM\Column(length: 255)]
    private ?string $smallForward = null;

    #[ORM\Column(length: 255)]
    private ?string $powerForward = null;

    #[ORM\Column(length: 255)]
    private ?string $center = null;

    #[ORM\ManyToOne(inversedBy: 'positions')]
    private ?Player $player = null;

    #[ORM\OneToMany(mappedBy: 'position', targetEntity: Player::class)]
    private Collection $players;

    public function __construct()
    {
        $this->players = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPointGuard(): ?string
    {
        return $this->pointGuard;
    }

    public function setPointGuard(string $pointGuard): static
    {
        $this->pointGuard = $pointGuard;

        return $this;
    }

    public function getShootingGuard(): ?string
    {
        return $this->shootingGuard;
    }

    public function setShootingGuard(string $shootingGuard): static
    {
        $this->shootingGuard = $shootingGuard;

        return $this;
    }

    public function getSmallForward(): ?string
    {
        return $this->smallForward;
    }

    public function setSmallForward(string $smallForward): static
    {
        $this->smallForward = $smallForward;

        return $this;
    }

    public function getPowerForward(): ?string
    {
        return $this->powerForward;
    }

    public function setPowerForward(string $powerForward): static
    {
        $this->powerForward = $powerForward;

        return $this;
    }

    public function getCenter(): ?string
    {
        return $this->center;
    }

    public function setCenter(string $center): static
    {
        $this->center = $center;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

        return $this;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): static
    {
        if (!$this->players->contains($player)) {
            $this->players->add($player);
            $player->setPosition($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): static
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getPosition() === $this) {
                $player->setPosition(null);
            }
        }

        return $this;
    }
}
