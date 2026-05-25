<?php

namespace Metarete\ComuniBundle\Entity;

use Metarete\ComuniBundle\Repository\MetareteComuneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetareteComuneRepository::class)]
class MetareteComune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $codiceIstat = null;

    #[ORM\Column(length: 255)]
    private ?string $denominazioneItaAltra = null;

    #[ORM\Column(length: 255)]
    private ?string $denominazioneIta = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $denominazioneAltra = null;

    #[ORM\Column(length: 5)]
    private ?string $cap = null;

    #[ORM\Column(length: 2)]
    private ?string $siglaProvincia = null;

    #[ORM\Column(length: 255)]
    private ?string $denominazioneProvincia = null;

    #[ORM\Column(length: 255)]
    private ?string $tipologiaProvincia = null;

    #[ORM\Column(length: 2)]
    private ?string $codiceRegione = null;

    #[ORM\Column(length: 255)]
    private ?string $denominazioneRegione = null;

    #[ORM\Column(length: 255)]
    private ?string $tipologiaRegione = null;

    #[ORM\Column(length: 255)]
    private ?string $ripartizioneGeografica = null;

    #[ORM\Column(length: 2)]
    private ?string $flagCapoluogo = null;

    #[ORM\Column(length: 4)]
    private ?string $codiceBelfiore = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 7)]
    private ?string $lat = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 7)]
    private ?string $lon = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 4)]
    private ?string $superficieKmq = null;

    public function __toString(): string
    {
        return $this->denominazioneIta ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodiceIstat(): ?string
    {
        return $this->codiceIstat;
    }

    public function setCodiceIstat(?string $codiceIstat): self
    {
        $this->codiceIstat = $codiceIstat;
        return $this;
    }

    public function getDenominazioneItaAltra(): ?string
    {
        return $this->denominazioneItaAltra;
    }

    public function setDenominazioneItaAltra(?string $denominazioneItaAltra): self
    {
        $this->denominazioneItaAltra = $denominazioneItaAltra;
        return $this;
    }

    public function getDenominazioneIta(): ?string
    {
        return $this->denominazioneIta;
    }

    public function setDenominazioneIta(?string $denominazioneIta): self
    {
        $this->denominazioneIta = $denominazioneIta;
        return $this;
    }

    public function getDenominazioneAltra(): ?string
    {
        return $this->denominazioneAltra;
    }

    public function setDenominazioneAltra(?string $denominazioneAltra): self
    {
        $this->denominazioneAltra = $denominazioneAltra;
        return $this;
    }

    public function getCap(): ?string
    {
        return $this->cap;
    }

    public function setCap(?string $cap): self
    {
        $this->cap = $cap;
        return $this;
    }

    public function getSiglaProvincia(): ?string
    {
        return $this->siglaProvincia;
    }

    public function setSiglaProvincia(?string $siglaProvincia): self
    {
        $this->siglaProvincia = $siglaProvincia;
        return $this;
    }

    public function getDenominazioneProvincia(): ?string
    {
        return $this->denominazioneProvincia;
    }

    public function setDenominazioneProvincia(?string $denominazioneProvincia): self
    {
        $this->denominazioneProvincia = $denominazioneProvincia;
        return $this;
    }

    public function getTipologiaProvincia(): ?string
    {
        return $this->tipologiaProvincia;
    }

    public function setTipologiaProvincia(?string $tipologiaProvincia): self
    {
        $this->tipologiaProvincia = $tipologiaProvincia;
        return $this;
    }

    public function getCodiceRegione(): ?string
    {
        return $this->codiceRegione;
    }

    public function setCodiceRegione(?string $codiceRegione): self
    {
        $this->codiceRegione = $codiceRegione;
        return $this;
    }

    public function getDenominazioneRegione(): ?string
    {
        return $this->denominazioneRegione;
    }

    public function setDenominazioneRegione(?string $denominazioneRegione): self
    {
        $this->denominazioneRegione = $denominazioneRegione;
        return $this;
    }

    public function getTipologiaRegione(): ?string
    {
        return $this->tipologiaRegione;
    }

    public function setTipologiaRegione(?string $tipologiaRegione): self
    {
        $this->tipologiaRegione = $tipologiaRegione;
        return $this;
    }

    public function getRipartizioneGeografica(): ?string
    {
        return $this->ripartizioneGeografica;
    }

    public function setRipartizioneGeografica(?string $ripartizioneGeografica): self
    {
        $this->ripartizioneGeografica = $ripartizioneGeografica;
        return $this;
    }

    public function getFlagCapoluogo(): ?string
    {
        return $this->flagCapoluogo;
    }

    public function setFlagCapoluogo(?string $flagCapoluogo): self
    {
        $this->flagCapoluogo = $flagCapoluogo;
        return $this;
    }

    public function getCodiceBelfiore(): ?string
    {
        return $this->codiceBelfiore;
    }

    public function setCodiceBelfiore(?string $codiceBelfiore): self
    {
        $this->codiceBelfiore = $codiceBelfiore;
        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(?string $lat): self
    {
        $this->lat = $lat;
        return $this;
    }

    public function getLon(): ?string
    {
        return $this->lon;
    }

    public function setLon(?string $lon): self
    {
        $this->lon = $lon;
        return $this;
    }

    public function getSuperficieKmq(): ?string
    {
        return $this->superficieKmq;
    }

    public function setSuperficieKmq(?string $superficieKmq): self
    {
        $this->superficieKmq = $superficieKmq;
        return $this;
    }
}
