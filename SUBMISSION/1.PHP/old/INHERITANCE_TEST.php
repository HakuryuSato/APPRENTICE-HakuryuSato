<?php
class VendingMachine
{
    private $manufacturer_name = "";
    private $coin = 0;
    private $cup = 0;
    private $cup_stock = 100;

    public function __construct($manufacturer_name)
    {
        $this->manufacturer = $manufacturer_name;
    }

    private function pressManufacturerName()
    {
        return $this->manufacturer_name;
    }

    public function isCup()
    {
        if ($this->cup >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function pressButton($item)
    {
        $item_price = $item->getItemPrice();
        $item_name = $item->getItemName();

        // echo $this->coin . "\n";
        // echo $item_price. "\n";
        // echo $item_name . "\n";


        // コーヒーの場合カップがあるか
        if ($item->getItemType() == 'coffee') {
            if ($this->isCup()) {
                if ($this->coin >= $item_price) {
                    return $item_name . "\n";
                } else {
                    return "error" . "\n";
                }
            }
        } else {
            if ($this->coin >= $item_price) {
                $this->coin -= $item_price;
                return $item_name . "\n";
            } else {
                return "error" . "\n";
            }
        }
    }

    public function depositCoin($depositCoin)
    {
        if ($depositCoin == 100) {
            $this->coin += $depositCoin;
        }
    }


    public function setCup()
    {
        $this->cup_stock -= 1;
        $this->cup += 1;
    }
}


class Items
{

    public $item_type;
    public $item_name;
    public $item_price;

    public function __construct($item_name)
    {
        $this->item_name = $item_name;
    }

    public function getItemName()
    {
        return $this->item_name;
    }

    public function setItemName($item_name)
    {
        $this->item_name = $item_name;
    }

    public function setItemPrice($price)
    {
        $this->item_price = $price;
    }

    public function getItemPrice()
    {
        return $this->item_price;
    }
    public function getItemType()
    {
        return $this->item_type;
    }
    public function setItemType($item_type)
    {
        return $this->item_type = $item_type;
    }
}

class Juice extends Items
{
    public function __construct($input_juice_name)
    {
        $this->setItemType('juice');
        if ($input_juice_name == 'cola') {
            $this->setItemPrice(150);
            $this->setItemName($input_juice_name);
        } else if ($input_juice_name == 'soda') {
            $this->setItemPrice(100);
            $this->setItemName($input_juice_name);
        }
    }
}

class Coffee extends Items
{
    public function __construct($input_hot_or_ice)
    {
        $this->setItemType('coffee');

        if ($input_hot_or_ice == 'hot') {
            $this->setItemPrice(100);
            $this->setItemName($input_hot_or_ice . "_coffee");
        } else if ($input_hot_or_ice == 'ice') {
            $this->setItemPrice(100);
            $this->setItemName($input_hot_or_ice . "_coffee");
        }
    }
}

class Snack extends Items
{
    public function __construct($input_snack_name)
    {
        $this->setItemType('snack');
        if ($input_snack_name == 'potato') {
            $this->setItemPrice(150);
            $this->setItemName($input_snack_name);
        }
    }
}


$vender = new VendingMachine('サントリー');
$cola = new Juice('cola');
$hot_coffee = new Coffee('hot');
$potato = new Snack('potato');

$vender->depositCoin(100);
echo $vender->pressButton($cola);
$vender->depositCoin(100);
echo $vender->pressButton($cola);

$vender->depositCoin(100);
echo $vender->pressButton($hot_coffee);
$vender->setCup();
echo $vender->pressButton($hot_coffee);

echo $vender->pressButton($potato);
echo $vender->pressButton($potato);