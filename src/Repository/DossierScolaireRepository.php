<?php

namespace App\Repository;

use App\Entity\DossierScolaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DossierScolaire>
 *
 * @method DossierScolaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method DossierScolaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method DossierScolaire[]    findAll()
 * @method DossierScolaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossierScolaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DossierScolaire::class);
    }

//    /**
//     * @return DossierScolaire[] Returns an array of DossierScolaire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DossierScolaire
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
