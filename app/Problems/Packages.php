<?php

namespace App\Problems;

class Packages
{
    /**
     * @return int | null
     */
    public function solve(array $boxes, int $weight): int
    {
        $travels = 0;
        $pairs = [];

        if (empty($boxes) || empty($weight)) {
            return 0;
        }

        foreach ($boxes as $currentIndex => $currentBox) {
            for ($i = 0; $i < count($boxes); $i++) {
                if ($currentIndex == $i) {
                    continue;
                }

                if ($currentBox + $boxes[$i] == $weight) {
                    if (! $this->hasPairAlready($pairs, $currentIndex, $i)) {
                        // Для дебага, если интересно
                        // printf("%d(%d) + %d(%d) = %d\n", $currentBox, $currentIndex, $boxes[$i], $i, $weight);
                        $travels++;
                        $pairs[] = [$currentIndex, $i];
                    }
                }
            }
        }

        return $travels;
    }

    /**
     * @param  array  $pairs  - массив пар индексов
     */
    public function hasPairAlready(array $pairs, int $index1, int $index2): bool
    {
        return (in_array([$index1, $index2], $pairs) or in_array([$index2, $index1], $pairs));
    }
}
