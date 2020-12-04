<?php


use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase {
    public function testEncounteredTree() {
        $day3 = new Day3([]);
        self::assertFalse($day3->encounteredTree('.'));
        self::assertTrue($day3->encounteredTree('#'));
    }

    public function testGetTreeCount() {
        $input = [
            ".............#...#....#.....##.",
            ".#...##.........#.#.........#.#",
            ".....##......#.......#.........",
            ".......#...........#.#.........",
            "#...........#...#..#.#......#..",
            ".........##....#.#...#.........",
            ".....#.........#.#...........#.",
            "....#...............##....##...",
        ];
        $day3 = new Day3($input);
        $slope = ["right" => 3, "down" => 1];
        $result = $day3->getTreeCount($slope);
        self::assertEquals(4, $result);
    }
}