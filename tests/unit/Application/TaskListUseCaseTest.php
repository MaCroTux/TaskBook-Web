<?php

namespace TaskBook\Unit\Application;

use PHPUnit\Framework\TestCase;
use TaskBook\Application\TaskListUseCase;
use TaskBook\Infrastructure\InMemoryTaskRepository;

class TaskListUseCaseTest extends TestCase
{
    const TASK_LIST = "
        @asdasd [0/1]
            1. ☐  asdasdasd

        0% of all tasks complete.
        0 done · 1 pending · 0 notes";

    /** @var InMemoryTaskRepository */
    private $taskRepository;
    /** @var TaskListUseCase */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->taskRepository = new InMemoryTaskRepository();
        $this->sut            = new TaskListUseCase($this->taskRepository);
    }

    public function testShouldReturnTaskListWhenExecuteUseCase()
    {
        $expected = "
        <a href='?catName=asdasd'>@asdasd</a> [0/1]
            1. ☐  asdasdasd

        0% of all tasks complete.
        0 done · 1 pending · 0 notes";

        $this->taskRepository->save(self::TASK_LIST);

        $taskList = $this->sut->execute();

        $this->assertSame($expected, $taskList);
    }

    public function testShouldReturnErrorWhenExecuteUseCaseWithWrongList()
    {
        $this->taskRepository->save(self::TASK_LIST);

        $expected = self::TASK_LIST;

        $taskList = $this->sut->execute();

        $this->assertNotSame($expected, $taskList);
    }
}
