<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\OneToMany(mappedBy: 'player', targetEntity: Position::class)]
    private Collection $positions;

    #[ORM\ManyToOne(inversedBy: 'players')]
    private ?Team $team = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    private ?Position $position = null;

    #[ORM\OneToMany(mappedBy: 'PostedBy', targetEntity: Post::class)]
    private Collection $postedBy;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
        $this->postedBy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection<int, Position>
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    public function addPosition(Position $position): static
    {
        if (!$this->positions->contains($position)) {
            $this->positions->add($position);
            $position->setPlayer($this);
        }

        return $this;
    }

    public function removePosition(Position $position): static
    {
        if ($this->positions->removeElement($position)) {
            // set the owning side to null (unless already changed)
            if ($position->getPlayer() === $this) {
                $position->setPlayer(null);
            }
        }

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): static
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPostedBy(): Collection
    {
        return $this->postedBy;
    }

    public function addPostedBy(Post $postedBy): static
    {
        if (!$this->postedBy->contains($postedBy)) {
            $this->postedBy->add($postedBy);
            $postedBy->setpostedBy($this);
        }

        return $this;
    }

    public function removePostedBy(Post $postedBy): static
    {
        if ($this->postedBy->removeElement($postedBy)) {
            // set the owning side to null (unless already changed)
            if ($postedBy->getPostedBy() === $this) {
                $postedBy->setPostedBy(null);
            }
        }

        return $this;
    }
}
