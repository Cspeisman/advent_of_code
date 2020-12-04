<?php

class Day2 {
    public function findValidPasswords(array $pws) {
        return count(array_filter($pws, array($this, 'isValidPassword')));
    }

    private function isValidPassword(string $pws) {
        $row = explode(" ", $pws);
        $letter = trim($row[1], ':');
        $range = array_map('intval', explode("-", $row[0]));
        return $this->hasLetterAtPosition($letter, $range, $row[2]);
//      return $this->fallsInRange($letter, $range, $row[2]);
    }


    private function fallsInRange(string $letter, array $range, string $pw): bool {
        $matches = preg_match_all("/$letter/i", $pw);
        return ($matches >= $range[0] && $matches <= $range[1]);
    }

    private function hasLetterAtPosition(string $letter, array $range, string $pw) {
        $firstPosition = $pw[$range[0] - 1];
        $secondPosition = $pw[$range[1] - 1];
        return ($firstPosition === $letter && $secondPosition !== $letter) ||
            ($firstPosition !== $letter && $secondPosition === $letter);
    }
}

$expenses = file(__DIR__ . '/input.txt');
echo (new Day2())->findValidPasswords($expenses);