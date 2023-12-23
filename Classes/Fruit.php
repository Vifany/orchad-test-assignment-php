<?php



class Fruit
{

    private TreeType $treeType;

    private int $weight;

    public function __construct(TreeType $type)
    {
        $this->treeType = $type;
        match ($type){
            TreeType::Apple =>
                $this->weight = rand(150,180),
            TreeType::Pear =>
                $this->weight = rand(130,170)
        };
    }

    public function getWeight(): int{
        return $this ->weight;
    }

    public function getType():TreeType{
        return $this->treeType;
    }

}