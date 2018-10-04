<?php

namespace TaskBook\Application\Parsers;

abstract class AbstractParser
{
    public function parser(string $data): string
    {
        return preg_replace($this->patter, $this->replacement, $data);
    }
}
