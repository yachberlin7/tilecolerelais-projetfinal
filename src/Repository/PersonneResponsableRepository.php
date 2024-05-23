<?php

namespace App\Repository;

use App\Entity\PersonneResponsable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PersonneResponsable>
 *
 * @method PersonneResponsable|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonneResponsable|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonneResponsable[]    findAll()
 * @method PersonneResponsable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneResponsableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonneResponsable::class);
    }

//    /**
//     * @return PersonneResponsable[] Returns an array of PersonneResponsable objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PersonneResponsable
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
