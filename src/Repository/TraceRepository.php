<?php

namespace App\Repository;

use App\Entity\Trace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trace|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trace|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trace[]    findAll()
 * @method Trace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trace::class);
    }
}
