<?php

namespace TaskBook\Unit\Application\Parsers;

use PHPUnit\Framework\TestCase;
use TaskBook\Application\Parsers\TextToLinkParser;

class TextToLinkParserTest extends TestCase
{
    public function testShouldParserStringWithUrlLinkIsFound()
    {
        $sut = TextToLinkParser::build();

        $data = 'bla bla bla   http://host.com [10/2]';
        $expected = "bla bla bla   <a target='_blank' href='http://host.com'>http://host.com</a>  [10/2]";

        $result = $sut->parser($data);

        $this->assertSame($expected, $result);
    }
}
