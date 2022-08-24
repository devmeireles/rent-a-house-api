<?php

namespace App\Repository;

use App\Entity\PropertySpecification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PropertySpecification>
 *
 * @method PropertySpecification|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertySpecification|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertySpecification[]    findAll()
 * @method PropertySpecification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertySpecificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PropertySpecification::class);
    }

    public function add(PropertySpecification $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PropertySpecification $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PropertySpecification[] Returns an array of PropertySpecification objects
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

//    public function findOneBySomeField($value): ?PropertySpecification
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
