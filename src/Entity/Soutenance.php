<?php

namespace App\Entity;

use App\Repository\SoutenanceRepository;
use Doctrine\ORM\Mapping as ORM;

class Soutenance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DemandeSoutenance;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDemandeSoutenance(): ?string
    {
        return $this->DemandeSoutenance;
    }

    public function setDemandeSoutenance(string $DemandeSoutenance): self
    {
        $this->DemandeSoutenance = $DemandeSoutenance;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}