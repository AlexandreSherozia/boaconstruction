<?php

namespace App\Repository;

use App\Entity\MaterialIcons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MaterialIcons|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaterialIcons|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaterialIcons[]    findAll()
 * @method MaterialIcons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaterialIconsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaterialIcons::class);
    }

    // /**
    //  * @return MaterialIcons[] Returns an array of MaterialIcons objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MaterialIcons
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
