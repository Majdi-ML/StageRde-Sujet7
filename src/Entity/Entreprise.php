<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: user::class)]
    private Collection $emploie;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: Post::class)]
    private Collection $posts;

    public function __construct()
    {
        $this->emploie = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * @return Collection<int, user>
     */
    public function getEmploie(): Collection
    {
        return $this->emploie;
    }

    public function addEmploie(user $emploie): static
    {
        if (!$this->emploie->contains($emploie)) {
            $this->emploie->add($emploie);
            $emploie->setEntreprise($this);
        }

        return $this;
    }

    public function removeEmploie(user $emploie): static
    {
        if ($this->emploie->removeElement($emploie)) {
            // set the owning side to null (unless already changed)
            if ($emploie->getEntreprise() === $this) {
                $emploie->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): static
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->setEntreprise($this);
        }

        return $this;
    }

    public function removePost(Post $post): static
    {
        if ($this->posts->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getEntreprise() === $this) {
                $post->setEntreprise(null);
            }
        }

        return $this;
    }
}
