<?php

namespace TaskBook\Infrastructure;

use TaskBook\Application\TaskRepository;

class InMemoryTaskRepository implements TaskRepository
{
    private $task;

    public function save(string $task)
    {
        $this->task = $task;
    }
    public function all(): string
    {
        return $this->task;
    }
}
