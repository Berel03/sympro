<?php

namespace App\Entity;

use App\Repository\PrimeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PrimeRepository::class)]
#[UniqueEntity('Contrat','Client')]
class Prime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    //#[Assert\NotNull()]
    private ?\DateTimeImmutable $Date = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull()]
    private ?string $Contrat = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull()]
    private ?string $Client = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull()]
    private ?string $CompagnieAssurance = null;

    #[ORM\Column]
    #[Assert\Positive()]
    private ?float $PrimeTTC = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero()]
    private ?float $MontantPayer = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero()]
    private ?float $ResteAPayer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Action = null;

    //Constructeur pour les dates
    public function __construct()
    {
        $this->Date = new \DateTimeImmutable();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->Date;
    }

    public function setDate(\DateTimeImmutable $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getContrat(): ?string
    {
        return $this->Contrat;
    }

    public function setContrat(string $Contrat): static
    {
        $this->Contrat = $Contrat;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->Client;
    }

    public function setClient(string $Client): static
    {
        $this->Client = $Client;

        return $this;
    }

    public function getCompagnieAssurance(): ?string
    {
        return $this->CompagnieAssurance;
    }

    public function setCompagnieAssurance(string $CompagnieAssurance): static
    {
        $this->CompagnieAssurance = $CompagnieAssurance;

        return $this;
    }

    public function getPrimeTTC(): ?float
    {
        return $this->PrimeTTC;
    }

    public function setPrimeTTC(float $PrimeTTC): static
    {
        $this->PrimeTTC = $PrimeTTC;

        return $this;
    }

    public function getMontantPayer(): ?float
    {
        return $this->MontantPayer;
    }

    public function setMontantPayer(float $MontantPayer): static
    {
        $this->MontantPayer = $MontantPayer;

        return $this;
    }

    public function getResteAPayer(): ?float
    {
        return $this->ResteAPayer;
    }

    public function setResteAPayer(float $ResteAPayer): static
    {
        $this->ResteAPayer = $ResteAPayer;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->Action;
    }

    public function setAction(?string $Action): static
    {
        $this->Action = $Action;

        return $this;
    }
}
