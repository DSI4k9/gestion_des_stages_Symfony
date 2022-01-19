<?php

namespace App\Entity;

use App\Repository\FiliereRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Timestampable;

/**
 * @ORM\Entity(repositoryClass=FiliereRepository::class)
 * @ORM\Table(name="filieres")
 * @ORM\HasLifecycleCallbacks
 */
class Filiere
{

    use Timestampable;


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomFiliere;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFiliere(): ?string
    {
        return $this->nomFiliere;
    }

    public function setNomFiliere(string $nomFiliere): self
    {
        $this->nomFiliere = $nomFiliere;

        return $this;
    }


}