<?php

namespace Lunkkun\PermutationsGenerator;

use Generator;

class PermutationsGenerator
{
    public function __invoke(array $values): Generator
    {
        return $this->generator($values);
    }

    protected function generator(array $values): Generator
    {
        if (count($values) === 1) {
            yield $values;
            return;
        }

        $remaining = [];
        while (($value = array_pop($values)) !== null) {
            foreach ($this->generator(array_merge($values, $remaining)) as $permutation) {
                $permutation[] = $value;
                yield $permutation;
            }
            $remaining[] = $value;
        }
    }
}
