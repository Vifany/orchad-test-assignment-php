<?php

class Harvester
{
    private array $fruitBucket;

    public function pickFruits(Tree $tree): void{
        while(true){
            $claw = $tree->dropFruit();
            if ($claw==null) {
                break;
            }
            $this->fruitBucket[]=$claw;
        }
    }

    public function unloadBucket():array
    {
        $bucketTray =[];
        foreach(TreeType::cases() as $tType){
            $bucketTray[$tType->value]=[];
        }
        while (true){
            $fruit = array_pop($this->fruitBucket);
            if ($fruit == null){
                break;
                }
            $bucketTray[$fruit->getType()->value][]=$fruit;
        }
        return $bucketTray;
    }

}