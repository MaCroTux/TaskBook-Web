<?php

namespace TaskBook\Application\Parsers;

class CategoriesToLinkActionParser extends AbstractParser
{
    protected $patter      = "/^  (([@](.*)) )/m";
    protected $replacement = "<a href='?catName=$3'>$2</a> ";

    public static function build(): self
    {
        return new self();
    }
}
