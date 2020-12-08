<?php


class Validator {
    public function heightValidator($height) {
        if (substr($height, -2) === "cm") {
            $num = intval(substr($height, 0, -2));
            return $num >= 150 && $num <= 193;
        }

        if (substr($height, -2) === "in") {
            $num = intval(substr($height, 0, -2));
            return $num >= 59 && $num <= 76;
        }
        return false;
    }

    function fourDigitBetweenValues($value, int $lower, int $upper) {
        return strlen($value) === 4 && intval($value) >= $lower && intval($value) <= $upper;
    }

    public function hairValidator(string $value) {
        return $this->matceshRegex($value, '/#[a-f0-9]{6}$/');
    }

    public function eyeValidator(string $value) {
        return $this->matceshRegex($value, '/amb|blu|brn|gry|grn|hzl|oth/');
    }

    public function passportValidator($value) {
        return $this->matceshRegex($value, '/^[0-9]{9}$/');
    }

    private function matceshRegex(string $value, $pattern) {
        preg_match($pattern, $value, $matches);
        return !empty($matches);
    }
}