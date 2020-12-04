<?php


class Day3 {
    public function __construct(private array $map) {}

    public function encounteredTree(string $string) {
        return $string === "#";
    }

    public function getTreeCount(array $slope) {
        $result = 0;
        $row_length = strlen($this->map[0]);
        $column = 0;
        $row = 0;
        while ($row < count($this->map) - 1) {
            $row += $slope["down"];
            $column = ($column + $slope["right"]) % $row_length;

            if ($this->encounteredTree($this->map[$row][$column])){
                $result++;
            }
        }
        return $result;
    }
}

$map = array_map('trim', file(__DIR__ . '/input.txt'));

$day3 = new Day3($map);
$slopes = [["right" => 1, "down" => 1],
    ["right" => 3, "down" => 1],
    ["right" => 5, "down" => 1],
    ["right" => 7, "down" => 1],
    ["right" => 1, "down" => 2],
];

$trees = array_map(array($day3, 'getTreeCount'), $slopes);
echo array_product($trees);