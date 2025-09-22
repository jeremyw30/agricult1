<?php

namespace App\Repository;

use App\Entity\Collaboration;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Collaboration>
 */
class CollaborationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collaboration::class);
    }

    /**
     * Find collaborations where the user is the owner
     */
    public function findByOwner(User $owner): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.owner = :owner')
            ->setParameter('owner', $owner)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find collaborations where the user is the collaborator
     */
    public function findByCollaborator(User $collaborator): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.collaborator = :collaborator')
            ->setParameter('collaborator', $collaborator)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find pending invitations for a user
     */
    public function findPendingInvitations(User $user): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.collaborator = :user')
            ->andWhere('c.status = :status')
            ->setParameter('user', $user)
            ->setParameter('status', 'pending')
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Check if a collaboration exists between two users
     */
    public function findCollaboration(User $owner, User $collaborator): ?Collaboration
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.owner = :owner')
            ->andWhere('c.collaborator = :collaborator')
            ->setParameter('owner', $owner)
            ->setParameter('collaborator', $collaborator)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Find accepted collaborations where user has write access
     */
    public function findWriteAccessCollaborations(User $user): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.collaborator = :user')
            ->andWhere('c.status = :status')
            ->andWhere('c.role = :role')
            ->setParameter('user', $user)
            ->setParameter('status', 'accepted')
            ->setParameter('role', 'ROLE_COLLABORATOR_WRITE')
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}