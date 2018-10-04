<?php

namespace TaskBook\Infrastructure;

use TaskBook\Application\TaskRepository;

class TbTaskRepository implements TaskRepository
{
    const TB_COMMAND = 'tb';

    public function all(): string
    {
        return shell_exec(self::TB_COMMAND);
    }
}
