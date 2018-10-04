<?php

namespace TaskBook\Unit\Application\Parsers;

use PHPUnit\Framework\TestCase;
use TaskBook\Application\Parsers\CategoriesToLinkActionParser;

class CategoriesToLinkActionParserTest extends TestCase
{
    public function testShouldParserStringWithCategoryIsUrlLink()
    {
        $sut = CategoriesToLinkActionParser::build();

        $data = '@IAmCateory 3d';
        $expected = "<a href='?catName=IAmCateory'>@IAmCateory</a> 3d";

        $result = $sut->parser($data);

        $this->assertSame($expected, $result);
    }
}
