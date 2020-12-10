<?php


class Day5 {
    const ROWS = 127;
    const COLUMNS = 7;
    private array $range;

    public function getRangeForSymbol(string $string, int $lower, int $upper) {
        $half = ($upper - $lower) / 2;
        if ($string === $this->range["lower"]) {
            return ["lower" => $lower, "upper" => floor($upper - $half)];
        } elseif ($string === $this->range["upper"]) {
            return ["lower" => ceil($lower + $half), "upper" => $upper];
        }
        return null;
    }

    public function strepThrough(string $string, int $start, int $finish, array $resp) {
        for ($i = $start; $i <= $finish; $i++) {
            $resp = $this->getRangeForSymbol($string[$i], $resp["lower"], $resp["upper"]);
            if ($i === $finish) {
                if ($string[$finish] === $this->range["lower"]) {
                    return $resp["lower"];
                } else {
                    return $resp["upper"];
                }
            }
        }
        return null;
    }

    public function getSeatId(string $string) {
        $this->setRange('F', 'B');
        $resp = ["lower" => 0, "upper" => self::ROWS];
        $row_id = $this->strepThrough($string, 0, 6, $resp);


        $this->setRange('L', 'R');
        $resp = ["lower" => 0, "upper" => self::COLUMNS];
        $column_id = $this->strepThrough($string, 7, 9, $resp);
        return $row_id * 8 + $column_id;
    }

    public function setRange(string $lower, string $upper) {
        $this->range = ["lower" => $lower, "upper" => $upper,];
    }
}

$day5 = new Day5();
$input = array_map('trim', file(__DIR__ . '/input.txt'));
$seat_id = array_map(array($day5, 'getSeatId'), $input);
print max($seat_id);