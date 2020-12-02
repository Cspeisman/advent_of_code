<?php


use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase {
    public function testThisOut() {
        self::assertEquals((new Day1([2000, 20]))->getTwoEntries(), 40000);
        self::assertNull((new Day1([2000, 19]))->getTwoEntries());
    }

    public function testGetThreeEntries() {
        $input = [1721, 979, 366, 299, 675, 1456];
        self::assertEquals((new Day1($input))->getThreeEntries(), 241861950);
    }

}
