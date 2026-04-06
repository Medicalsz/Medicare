<?php

namespace App\Command;

use App\Repository\ForumTopicRepository;
use App\Service\TagGeneratorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:forum:generate-tags',
    description: 'Generate and backfill tags for forum topics without tags.'
)]
class GenerateForumTagsCommand extends Command
{
    public function __construct(
        private readonly ForumTopicRepository $topicRepository,
        private readonly TagGeneratorService $tagGenerator,
        private readonly EntityManagerInterface $entityManager,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $topics = $this->topicRepository->findAll();
        $updated = 0;
        $processed = 0;

        foreach ($topics as $topic) {
            $processed++;
            if ($topic->getTags() !== []) {
                continue;
            }

            $tags = $this->tagGenerator->generateTags(
                (string) $topic->getTitle(),
                (string) $topic->getContent()
            );
            $topic->setTags($tags);
            $updated++;

            if ($updated % 50 === 0) {
                $this->entityManager->flush();
            }
        }

        $this->entityManager->flush();

        $output->writeln(sprintf('Topics processed: %d', $processed));
        $output->writeln(sprintf('Topics updated: %d', $updated));

        return Command::SUCCESS;
    }
}

