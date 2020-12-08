<?php


use PHPUnit\Framework\TestCase;

class Day4Test extends TestCase {
    public function testGetValidPassports() {
        $inputs = [
            "pid:087499704 hgt:74in ecl:grn iyr:2012 eyr:2030 byr:1980",
            "hcl:#623a2f",
            "",
            "eyr:2029 ecl:blu cid:129 byr:1989",
            "iyr:2014 pid:896056539 hcl:#a97842 hgt:165cm",
        ];
        $day4 = Day4::parseInput($inputs);
        self::assertEquals(2, $day4->getValidPassorts());
    }

    public function testHeighValidator() {
        self::assertTrue((new Validator())->heightValidator("179cm"));
        self::assertTrue((new Validator())->heightValidator("59in"));
        self::assertFalse((new Validator())->heightValidator("59"));
        self::assertFalse((new Validator())->hairValidator("123abc"));
        self::assertTrue((new Validator())->hairValidator("#123abc"));
        self::assertFalse((new Validator())->hairValidator("#123abz"));
        self::assertFalse((new Validator())->eyeValidator("boo"));
        self::assertTrue((new Validator())->eyeValidator("amb"));
        self::assertTrue((new Validator())->passportValidator("000000001"));
        self::assertTrue((new Validator())->passportValidator("087499704"));
        self::assertFalse((new Validator())->passportValidator("0123456789"));
    }

}