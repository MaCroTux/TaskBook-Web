<?php

namespace TaskBook\Application;

use TaskBook\Application\Parsers\CategoriesToLinkActionParser;
use TaskBook\Application\Parsers\TextToLinkParser;
use TaskBook\Infrastructure\TbTaskRepository;

class TaskListUseCase
{
    /**
     * @var TbTaskRepository
     */
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(): string
    {
        $board = $this->taskRepository->all();
        $board = CategoriesToLinkActionParser::build()->parser($board);
        $board = TextToLinkParser::build()->parser($board);

        return $board;
    }
}
