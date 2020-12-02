<?php

class Day1 {
    public function __construct(private array $expenses) {}

    public function getThreeEntries() {
        foreach ($this->expenses as $index => $expense) {
            $result = $this->getProductForSum(array_slice($this->expenses, $index + 1), 2020 - $expense);
            if (!is_null($result)) {
                return $expense * $result;
            }
        }
        return null;
    }

    public function getTwoEntries() {
        return $this->getProductForSum($this->expenses, 2020);
    }


    private function getProductForSum(array $expenses, int $total) {
        foreach ($expenses as $expense) {
            $diff = $total - $expense;
            if (in_array($diff, $this->expenses)) {
                return $diff * $expense;
            }
        }
        return null;
    }
}

$expenses = array_map('intval', file(__DIR__ . '/input.txt'));
echo (new Day1($expenses))->getTwoEntries() . "\n";
echo (new Day1($expenses))->getThreeEntries() . "\n";