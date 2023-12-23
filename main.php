<?php
require_once 'vendor/autoload.php';
use App\Garden;
use App\Harvester;
use App\TreeType;


$harvester = new Harvester;
$orchard = new Garden($harvester);

$orchard ->growTrees(TreeType::Apple, 10 );
$orchard ->growTrees(TreeType::Pear, 15 );
$orchard ->growFruits();
$orchard ->harvestYield();
$stats = $orchard->countYields();

foreach ($stats as $type => $stat){
    echo "\n We harvested {$stat['amount']} of fruits from $type tree with total mass of {$stat['weight']} grami ";
}