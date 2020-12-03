<?php


use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase {
    public function testValidatePasswords() {
        $pws = ['1-3 s: sgs', '1-3 a: bbcbcbcbc'];
        $result = (new Day2())->findValidPasswords($pws);
        self::assertEquals(1, $result);
    }

    public function testValidatePasswordII() {
        $pws = ['1-3 s: sgcsss', '1-3 a: bbbb'];
        $result = (new Day2())->findValidPasswords($pws);
        self::assertEquals(1, $result);
    }
}
