<?php

require __DIR__ . '/../vendor/autoload.php';

$permutationsGenerator = new \Lunkkun\PermutationsGenerator\PermutationsGenerator;

$results = [];
foreach (range(0, 4) as $i) {
    $start = microtime(true);

    foreach ($permutationsGenerator((range(0, 9))) as $permutation) {}

    $total = microtime(true) - $start;
    $results[] = $total;

    echo "Total time: $total" . PHP_EOL;
}

echo "Average: " . (array_sum($results) / count($results)) . PHP_EOL;
