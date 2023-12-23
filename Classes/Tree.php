<?php

namespace App;

class Tree
{
    private string $treeId;
    private array $fruitYield;
    private TreeType $treeType;

    public function __construct($treeType)
    {
        $this->treeId = uniqid("", true);
        $this->treeType = $treeType;
    }

    private function growFruit($amount)
    {
        if ($amount == 0) {
            return [];
        }

        $yld = [];
        for ($x = 0; $x <= $amount; $x++) {
            $yld[] = new Fruit($this->treeType);
        }
        return $yld;
    }

    public function growYield()
    {
        match ($this->treeType) {
            TreeType::Apple =>
            $this->fruitYield = $this->growFruit(rand(40, 50)),
            TreeType::Pear =>
            $this->fruitYield = $this->growFruit(rand(0, 20)),
        };
    }

    public function getFruitYield(): int
    {
        return sizeof($this->fruitYield);
    }

    public function getTreeId(): string
    {
        return $this->treeId;
    }
    public function dropFruit()
    {
        return array_pop($this->fruitYield);
    }
}
