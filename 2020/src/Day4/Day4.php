<?php

class Day4 {
    public function __construct(private array $input, private Validator $validator) {
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
        $values = preg_split('/(byr|iyr|eyr|hgt|hcl|ecl|pid|cid):/', $passport);
        $match = $matches[0];

        if ($values) {
            $values = array_map('trim', $values);
            array_shift($values);
            $map = array_combine($match, $values);
        }

        if ($this->hasValidVFields($map, $match)) {
            return ($this->validateData($map));
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
        return new self($results, new Validator());
    }

    private function validateData($map) {
        foreach ($map as $field => $value) {
            $valid = match($field) {
                'byr' => $this->validator->fourDigitBetweenValues($value, 1920, 2002),
                'iyr' => $this->validator->fourDigitBetweenValues($value, 2010, 2020),
                'eyr' => $this->validator->fourDigitBetweenValues($value, 2020, 2030),
                'hgt' => $this->validator->heightValidator($value),
                'hcl' => $this->validator->hairValidator($value),
                'ecl' => $this->validator->eyeValidator($value),
                'pid' => $this->validator->passportValidator($value),
                'cid' => true,
                default => false,
            };

            if (!$valid) {
                return false;
            }
        }
        return true;
    }


    private function hasValidVFields(array $map, $match) {
        return count($map) === 8 || (count($map) === 7 && !in_array("cid", $match));
    }
}

$map = array_map('trim', file(__DIR__ . '/input.txt'));
$day4 = Day4::parseInput($map);
print_r($day4->getValidPassorts());