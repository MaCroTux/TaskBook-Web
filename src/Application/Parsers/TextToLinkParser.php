<?php

namespace TaskBook\Application\Parsers;

class TextToLinkParser extends AbstractParser
{
    protected $patter      = "@(https?:\/\/(www\.)?[-a-zA-Z0-9:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9:%_\+.~#?&//=]*))@i";
    protected $replacement = "<a target='_blank' href='$1'>$1</a> ";

    public static function build(): self
    {
        return new self();
    }
}
