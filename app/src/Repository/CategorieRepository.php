<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorie>
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

    public function findAllWithProducts(): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.produits', 'p')
            ->addSelect('p')
            ->leftJoin('p.images', 'i')
            ->addSelect('i')
            ->getQuery()
            ->getResult();
    }
}