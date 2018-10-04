<?php

namespace TaskBook\Application;

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
        $board = $this->parseCategoriesToLinkAction($board);
        $board = $this->parseHtmlLinkUrl($board);

        return $board;
    }

    private function parseCategoriesToLinkAction(string $data): string
    {
        $pattern = "/(([@](.*)) )/m";
        $replacement = "<a href='?catName=$3'>$2</a> ";
        return preg_replace($pattern, $replacement, $data);
    }

    private function parseHtmlLinkUrl(string $data): string
    {
        $pattern = "@(https?:\/\/(www\.)?[-a-zA-Z0-9:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9:%_\+.~#?&//=]*))@i";
        $replacement = "<a target='_blank' href='$1'>$1</a> ";
        return preg_replace($pattern, $replacement, $data);
    }
}
