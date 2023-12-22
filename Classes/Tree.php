<?php
require_once 'Fruit.php';

class Tree
{
    private string $treeId;
    private array $yield;
    private TreeType $treeType;

    public function __construct($treeType)
    {
        $this->treeId = uniqid("", true);
        $this->treeType = $treeType;
    }

    private function growFruit($amount)
    {
        $yield = [];
        for ($x = 0; $x <= $amount; $x++) {
            array_push($yield,
                (
                new Fruit($this->treeType)
                ));
        }
    }

    public function growYield()
    {
        match ($this->treeType) {
            TreeType::Apple =>
            $this->growYield = growFruit(rand(40, 50)),
            TreeType::Pear =>
            $this->growYield = growFruit(rand(0, 20)),
        };
    }
}