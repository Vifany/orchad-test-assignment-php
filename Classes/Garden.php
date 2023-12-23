<?php

namespace App;

class Garden
{
    private array $plantedTrees;
    private Harvester $mainHarvester;
    private array $bucketTray;

    public function growTrees(TreeType $treeType, int $amount)
    {
        for ($x = 0; $x < $amount; $x++) {
            $this->plantedTrees[] = new Tree($treeType);
        }
    }
    public function growFruits()
    {
        foreach ($this->plantedTrees as $tree) {
            $tree->growYield();
        }
    }

    public function __construct($mainHarvester)
    {
        $this->mainHarvester = $mainHarvester;
        $this->bucketTray = [];
        $this->plantedTrees = [];
    }

    public function harvestYield()
    {
        foreach ($this->plantedTrees as $tree) {
            $this->mainHarvester->pickFruits($tree);
        }
        foreach ($this->mainHarvester->unloadBucket() as $type => $yield) {
            $this->bucketTray[$type] = array_merge(
                $this->bucketTray[$type] ?? [],
                $yield
            );
        }
    }

    public function countYields(): array
    {
        $data = [];
        foreach ($this->bucketTray as $fruitType => $bucket) {
            $data[$fruitType] = [
                'weight' => array_reduce($bucket, function ($carry, $item) {
                    return $carry + $item->getWeight();
                }),
                'amount' => count($bucket)
            ];
        }

        return $data;
    }
}
