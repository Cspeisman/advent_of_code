<?php


use PHPUnit\Framework\TestCase;

class Day5Test extends TestCase {
    public function testGetSeatId() {
        $day5 = new Day5();
        $day5->setRange('F', 'B');
        $row = $day5->getRangeForSymbol('F', 0, 127);
        self::assertEquals(["lower" => 0, "upper" => 63], $row);

        $row = $day5->getRangeForSymbol('B', 0, 63);
        self::assertEquals(["lower" => 32, "upper" => 63], $row);

        $row = $day5->getRangeForSymbol('B', 0, 100);
        self::assertEquals(["lower" => 50, "upper" => 100], $row);

        $row = $day5->getRangeForSymbol('F', 50, 100);
        self::assertEquals(["lower" => 50, "upper" => 75], $row);

        $row = $day5->getRangeForSymbol('B', 50, 100);
        self::assertEquals(["lower" => 75, "upper" => 100], $row);

        $row = $day5->getRangeForSymbol('B', 44, 45);
        self::assertEquals(["lower" => 45, "upper" => 45], $row);
    }

    public function testGetSeatRange() {
        $day5 = new Day5();
        $day5->setRange('L', 'R');
        $seat = $day5->getRangeForSymbol("R", 0, 7);
        self::assertEquals(["lower" => 4, "upper" => 7], $seat);

        $seat = $day5->getRangeForSymbol("L", 4, 7);
        self::assertEquals(["lower" => 4, "upper" => 5], $seat);
    }


    public function testStepThrough() {
        $day5 = new Day5();
        self::assertEquals(357, $day5->getSeatId('FBFBBFFRLR'));
        self::assertEquals(119, $day5->getSeatId('FFFBBBFRRR'));
    }
}
