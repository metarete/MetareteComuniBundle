<?php

namespace Metarete\ComuniBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Metarete\ComuniBundle\Entity\MetareteComune;

class ComuniService
{

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {}

    /**
     * Retrieves a list of distinct comune names (denominazioneIta) from the MetareteComune entity.
     *
     * This method constructs a query using the entity manager to select distinct comune names,
     * orders them in ascending order, and returns the result as an array of strings.
     *
     * @return array<string> An array of distinct comune names (denominazioneIta).
     */
    public function getComuniList(): array
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.denominazioneIta')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->orderBy('c.denominazioneIta', 'ASC')
            ->getQuery();
        $result = $query->getResult();

        return array_map(fn($item): string => $item['denominazioneIta'], $result);
    }

    /**
     * 
     * Retrieves a list of distinct comune names (denominazioneIta) from the MetareteComune entity associated with the specified province.
     *
     * This method constructs a query using the entity manager to select distinct comune names associated with the specified province,
     * orders them in ascending order, and returns the result as an array of strings.
     *
     * @return array<string> An array of distinct comune names (denominazioneIta).
     */
    public function getComuniListFromProvince(string $provincia): array
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.denominazioneIta')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->where('c.siglaProvincia = :provincia')
            ->setParameter('provincia', $provincia)
            ->orderBy('c.denominazioneIta', 'ASC')
            ->getQuery();
        $result = $query->getResult();

        return array_map(fn($item): string => $item['denominazioneIta'], $result);
    }

    /**
     * Retrieves a list of distinct province abbreviations (siglaProvincia) from the MetareteComune entity.
     *
     * This method constructs a query using the entity manager to select distinct province abbreviations,
     * orders them in ascending order, and returns the result as an array of strings.
     *
     * @return array<string> An array of distinct province abbreviations (siglaProvincia).
     */
    public function getProvinceList(): array
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.siglaProvincia')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->orderBy('c.siglaProvincia', 'ASC')
            ->getQuery();
        $result = $query->getResult();

        return array_map(fn($item): string => $item['siglaProvincia'], $result);
    }

    /**
     * 
     * Retrieves a province abbreviation (siglaProvincia) from the MetareteComune entity associated to the given Comune.
     *
     * This method constructs a query using the entity manager to select a province abbreviation associated to the given Comune,
     * orders them in ascending order, and returns the result as an array of strings.
     *
     * @param string $comune The codice istat or name of the comune.
     * @return array<string> An array of distinct province abbreviations (siglaProvincia).
     */
    public function getProvinceFromComune(string $comune): array
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.siglaProvincia')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->where('c.codiceIstat = :comune OR c.denominazioneIta = :comune')
            ->setParameter('comune', $comune)
            ->orderBy('c.siglaProvincia', 'ASC')
            ->getQuery();
        $result = $query->getResult();

        return array_map(fn($item): string => $item['siglaProvincia'], $result);
    }

    /**
     * 
     * Retrieves a province abbreviation (siglaProvincia) from the MetareteComune entity associated to the given CAP.
     *
     * This method constructs a query using the entity manager to select a province abbreviation associated to the given CAP,
     * orders them in ascending order, and returns the result as an array of strings.
     *
     * @return array<string> An array of distinct province abbreviations (siglaProvincia).
     */
    public function getProvinceFromCAP(string $cap): array
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.siglaProvincia')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->where('c.cap = :cap')
            ->setParameter('cap', $cap)
            ->orderBy('c.siglaProvincia', 'ASC')
            ->getQuery();
        $result = $query->getResult();

        return array_map(fn($item): string => $item['siglaProvincia'], $result);
    }

    /**
     * Retrieves a list of unique CAP (postal codes) from a given comune.
     *
     * This method queries the database to get a distinct list of CAPs associated with the specified comune.
     * The comune can be identified by its codice istat or its name.
     * The results are ordered in ascending order.
     *
     * @param string $comune The codice istat or name of the comune to filter the CAPs.
     * @return array<string> An array of unique CAPs sorted in ascending order.
     */
    public function getCAPListFromComune(string $comune): array
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.cap')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->where('c.codiceIstat = :comune OR c.denominazioneIta = :comune')
            ->setParameter('comune', $comune)
            ->orderBy('c.cap', 'ASC')
            ->getQuery();
            $result = $query->getResult();

            return array_map(fn($item): string => $item['cap'], $result);
    }

    /**
     * Retrieves a list of unique CAP (postal codes) from a given province.
     *
     * This method queries the database to get a distinct list of CAPs associated with the specified province.
     * The results are ordered in ascending order.
     *
     * @param string $provincia The province code to filter the CAPs.
     * @return array<string> An array of unique CAPs sorted in ascending order.
     */
    public function getCAPListFromProvincia(string $provincia): array
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.cap')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->where('c.siglaProvincia = :provincia')
            ->setParameter('provincia', $provincia)
            ->orderBy('c.cap', 'ASC')
            ->getQuery();
        $result = $query->getResult();

        return array_map(fn($item): string => $item['cap'], $result);
    }

    /**
     * 
     * @deprecated version 1.0.5
     * 
     * Retrieves the codice ISTAT of a comune given its exact name and CAP.
     *
     * This method queries the database to get the codice istat of a comune given its name and CAP.
     * The result is a string containing the codice istat or null if no match is found.
     *
     * @param string $comune The name of the comune.
     * @param string $cap The CAP of the comune.
     * @return string|null The codice istat of the comune or null if no match is found.
     */
    public function getCodiceISTATFromComuneAndCap(string $comune, string $cap): string|null
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.codiceIstat')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->where('c.denominazioneIta = :comune')
            ->andWhere('c.cap = :cap')
            ->setParameter('comune', $comune)
            ->setParameter('cap', $cap)
            ->getQuery();
        $result = $query->getOneOrNullResult();

        return ($result ? $result['codiceIstat'] : null);
    }

    /*
     * Retrieves the codice ISTAT of a comune given its exact name
     *
     * This method queries the database to get the codice istat of a comune given its name.
     * The result is a string containing the codice istat or null if no match is found.
     *
     * @param string $comune The name of the comune.
     * @return string|null The codice istat of the comune or null if no match is found.
     */
    public function getCodiceISTATFromComune(string $comune): string|null
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.codiceIstat')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->where('c.denominazioneIta = :comune')
            ->setParameter('comune', $comune)
            ->getQuery();
        $result = $query->getOneOrNullResult();

        return ($result ? $result['codiceIstat'] : null);
    }

    /*
     * Retrieves the codice ISTAT of a comune given its CAP.
     *
     * This method queries the database to get the codice istat of a comune given its CAP.
     * The result is a string containing the codice istat or null if no match is found.
     *
     * @param string $comune The name of the comune.
     * @param string $cap The CAP of the comune.
     * @return string|null The codice istat of the comune or null if no match is found.
     */
    public function getCodiceISTATFromCap(string $cap): string|null
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT c.codiceIstat')
            ->from('Metarete\ComuniBundle\Entity\MetareteComune', 'c')
            ->where('c.cap = :cap')
            ->setParameter('cap', $cap)
            ->getQuery();
        $result = $query->getOneOrNullResult();

        return ($result ? $result['codiceIstat'] : null);
    }

    /**
     * Import a list of [MetareteComuni] from an associative array (decoded from JSON).
     *
     * @param array $data
     * @return int count of imported [MetareteComuni]
     */
    public function importComuniFromArray(array $data): int
    {
        $count = 0;
        foreach ($data as $item) {
            $comune = new MetareteComune();
            $comune->setCodiceIstat($item['codice_istat']);
            $comune->setDenominazioneItaAltra($item['denominazione_ita_altra']);
            $comune->setDenominazioneIta($item['denominazione_ita']);
            $comune->setDenominazioneAltra($item['denominazione_altra']);
            $comune->setCap($item['cap']);
            $comune->setSiglaProvincia($item['sigla_provincia']);
            $comune->setDenominazioneProvincia($item['denominazione_provincia']);
            $comune->setTipologiaProvincia($item['tipologia_provincia']);
            $comune->setCodiceRegione($item['codice_regione']);
            $comune->setDenominazioneRegione($item['denominazione_regione']);
            $comune->setTipologiaRegione($item['tipologia_regione']);
            $comune->setRipartizioneGeografica($item['ripartizione_geografica']);
            $comune->setFlagCapoluogo($item['flag_capoluogo']);
            $comune->setCodiceBelfiore($item['codice_belfiore']);
            $comune->setLat((float)$item['lat']);
            $comune->setLon((float)$item['lon']);
            $comune->setSuperficieKmq((float)$item['superficie_kmq']);

            $this->entityManager->persist($comune);
            $count++;
        }
        $this->entityManager->flush();

        return $count;
    }

    /**
     * Truncate [MetareteComuni] table.
     */
    public function truncateComuni(): void
    {
        $connection = $this->entityManager->getConnection();
        $platform = $connection->getDatabasePlatform();
        $cmd = $this->entityManager->getClassMetadata(MetareteComune::class);
        $connection->executeStatement($platform->getTruncateTableSQL($cmd->getTableName(), true));
    }

}
