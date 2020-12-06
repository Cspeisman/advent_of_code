<?php


class Day4 {
    public function __construct(private array $input) {
    }

    public function getValidPassorts() {
        $valid_count = 0;
        foreach ($this->input as $passport) {
            if ($this->isValidPassport($passport)) {
                $valid_count++;
            }
        }
        return $valid_count;
    }

    private function isValidPassport($passport) {
        preg_match_all('/byr|iyr|eyr|hgt|hcl|ecl|pid|cid/', $passport, $matches);
        $match = $matches[0];
        if (count($match) === 8) {
            return true;
        } elseif (count($match) === 7 && !in_array("cid", $match)) {
            return true;
        }
        return false;
    }

    public static function parseInput($input) {
        $results = [];
        $string = "";

        foreach ($input as $line) {
            if (!empty($line)) {
                $string .= $line;
            } else {
                array_push($results, $string);
                $string = '';
            }
        }
        array_push($results, $string);
        return new self($results);
    }
}

$map = array_map('trim', file(__DIR__ . '/input.txt'));
$day4 = Day4::parseInput($map);
print_r($day4->getValidPassorts());