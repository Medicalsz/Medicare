<?php

namespace App\Repository;

use App\Entity\ForumTopic;
use App\Entity\ForumTopicReaction;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ForumTopicReaction>
 */
class ForumTopicReactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ForumTopicReaction::class);
    }

    public function findOneForUserAndTopic(User $user, ForumTopic $topic): ?ForumTopicReaction
    {
        return $this->findOneBy([
            'user' => $user,
            'topic' => $topic,
        ]);
    }

    /**
     * @param int[] $topicIds
     * @return array<int, array{like: int, love: int, total: int}>
     */
    public function getCountsByTopicIds(array $topicIds): array
    {
        if ($topicIds === []) {
            return [];
        }

        $rows = $this->createQueryBuilder('r')
            ->select('IDENTITY(r.topic) AS topic_id, r.type AS type, COUNT(r.id) AS cnt')
            ->andWhere('r.topic IN (:ids)')
            ->setParameter('ids', $topicIds)
            ->groupBy('topic_id, r.type')
            ->getQuery()
            ->getArrayResult();

        $result = [];
        foreach ($rows as $row) {
            $topicId = (int) $row['topic_id'];
            $count = (int) $row['cnt'];
            $type = (string) $row['type'];
            if (!isset($result[$topicId])) {
                $result[$topicId] = ['like' => 0, 'love' => 0, 'total' => 0];
            }
            if ($type === ForumTopicReaction::TYPE_LIKE) {
                $result[$topicId]['like'] = $count;
            } elseif ($type === ForumTopicReaction::TYPE_LOVE) {
                $result[$topicId]['love'] = $count;
            }
            $result[$topicId]['total'] += $count;
        }

        return $result;
    }

    /**
     * @param int[] $topicIds
     * @return array<int, string>
     */
    public function getUserReactionMap(User $user, array $topicIds): array
    {
        if ($topicIds === []) {
            return [];
        }

        $rows = $this->createQueryBuilder('r')
            ->select('IDENTITY(r.topic) AS topic_id, r.type AS type')
            ->andWhere('r.user = :user')
            ->andWhere('r.topic IN (:ids)')
            ->setParameter('user', $user)
            ->setParameter('ids', $topicIds)
            ->getQuery()
            ->getArrayResult();

        $map = [];
        foreach ($rows as $row) {
            $map[(int) $row['topic_id']] = (string) $row['type'];
        }

        return $map;
    }
}

