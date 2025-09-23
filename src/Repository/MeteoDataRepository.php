<?php
namespace App\Repository;

use App\Entity\MeteoData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MeteoDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeteoData::class);
    }

    public function findByDateAndZone(\DateTimeInterface $date, string $zone)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.date = :date')
            ->andWhere('LOWER(m.zone) = :zone')
            ->setParameter('date', $date)
            ->setParameter('zone', mb_strtolower($zone))
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAllOrderedByDate()
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.date', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve l'entrée météo la plus proche d'une date/heure donnée pour une zone spécifique
     * (ignorer l'année, uniquement considérer mois/jour/heure)
     */
    public function findClosestByDatetimeAndZone(\DateTimeInterface $dateTime, string $zone)
    {
        $month = (int) $dateTime->format('n');
        $day = (int) $dateTime->format('j');
        $hour = (int) $dateTime->format('G');

        $conn = $this->getEntityManager()->getConnection();
                $sql = 'SELECT id FROM meteo_data 
                                WHERE LOWER(zone) = :zone 
                  AND EXTRACT(MONTH FROM date) = :month 
                  AND EXTRACT(DAY FROM date) = :day 
                  AND EXTRACT(HOUR FROM date) = :hour 
                ORDER BY date ASC 
                LIMIT 1';
        $result = $conn->fetchOne($sql, [
                        'zone' => mb_strtolower($zone),
            'month' => $month,
            'day' => $day,
            'hour' => $hour,
        ]);

        if ($result === false) {
            return null;
        }

        return $this->find((int) $result);
    }
}