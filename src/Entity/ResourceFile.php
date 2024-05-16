<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class ResourceFile
{
    #[ORM\Id]
    #[ORM\Column(name: 'ID', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?int $id = null;

    #[ORM\Column(name: 'NAME', type: 'string', length: 255, nullable: false)]
    private ?string $name = null;

    /**
     * @var string|resource
     */
    #[ORM\Column(name: 'VALUE', type: 'blob', nullable: false)]
    private mixed $content = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|resource $content
     */
    public function setContent(mixed $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string|resource
     */
    public function getContent(): mixed
    {
        return $this->content;
    }

    public function __clone()
    {
        if ($this->id) {
            $this->id = null;
        }
        if ($this->name) {
            $this->name = null;
        }
    }
}
