<?php

namespace App\Repository;

use App\Entity\ForumComment;
use App\Entity\ForumCommentReaction;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ForumCommentReaction>
 */
class ForumCommentReactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ForumCommentReaction::class);
    }

    public function findOneForUserAndComment(User $user, ForumComment $comment): ?ForumCommentReaction
    {
        return $this->findOneBy([
            'user' => $user,
            'comment' => $comment,
        ]);
    }

    /**
     * @param int[] $commentIds
     * @return array<int, array{like: int, love: int, total: int}>
     */
    public function getCountsByCommentIds(array $commentIds): array
    {
        if ($commentIds === []) {
            return [];
        }

        $rows = $this->createQueryBuilder('r')
            ->select('IDENTITY(r.comment) AS comment_id, r.type AS type, COUNT(r.id) AS cnt')
            ->andWhere('r.comment IN (:ids)')
            ->setParameter('ids', $commentIds)
            ->groupBy('comment_id, r.type')
            ->getQuery()
            ->getArrayResult();

        $result = [];
        foreach ($rows as $row) {
            $commentId = (int) $row['comment_id'];
            $count = (int) $row['cnt'];
            $type = (string) $row['type'];
            if (!isset($result[$commentId])) {
                $result[$commentId] = ['like' => 0, 'love' => 0, 'total' => 0];
            }
            if ($type === ForumCommentReaction::TYPE_LIKE) {
                $result[$commentId]['like'] = $count;
            } elseif ($type === ForumCommentReaction::TYPE_LOVE) {
                $result[$commentId]['love'] = $count;
            }
            $result[$commentId]['total'] += $count;
        }

        return $result;
    }

    /**
     * @param int[] $commentIds
     * @return array<int, string>
     */
    public function getUserReactionMap(User $user, array $commentIds): array
    {
        if ($commentIds === []) {
            return [];
        }

        $rows = $this->createQueryBuilder('r')
            ->select('IDENTITY(r.comment) AS comment_id, r.type AS type')
            ->andWhere('r.user = :user')
            ->andWhere('r.comment IN (:ids)')
            ->setParameter('user', $user)
            ->setParameter('ids', $commentIds)
            ->getQuery()
            ->getArrayResult();

        $map = [];
        foreach ($rows as $row) {
            $map[(int) $row['comment_id']] = (string) $row['type'];
        }

        return $map;
    }
}
