<?php
class VendingMachine
{

    private $manufacturer;
    private $coin = 0;


    public function __construct($manufacturer_name)
    {
        $this->manufacturer = $manufacturer_name;
    }

    private function pressManufacturerName()
    {
        return $this->manufacturer;
    }

    public function pressButton($item)
    {
        $item_price = $item->get_item_price();
        $item_name = $item->get_item_name();

        if ($this->coin >= $item_price) {
            $this->coin -= $item_price;
            return $item_name . "\n";
        } else {
            return "\n";
        }
    }

    public function depositCoin($coin)
    {
        if ($coin == 100) {
            $this->coin += $coin;
        }
    }
}



class Items
{
    private $item_name;
    private $item_price;

    public function __construct($name)
    {
        $this->item_name = $name;
        switch ($name) {
            case "cola":
                $this->item_price = 150;
                break;
            case "cider":
                $this->item_price = 100;
                break;
            default:
                break;
        }
    }

    public function get_item_price()
    {
        return $this->item_price;
    }

    public function get_item_name()
    {
        return $this->item_name;
    }
}


// $vendingMachine = new VendingMachine();
// echo $vendingMachine->pressButton();

// $vendingMachine = new VendingMachine('サントリー');
// echo $vendingMachine->pressManufacturerName();

// $vendingMachine = new VendingMachine('サントリー');
// echo $vendingMachine->pressButton();

// $vendingMachine->depositCoin(150);
// echo $vendingMachine->pressButton();

// $vendingMachine->depositCoin(100);
// echo $vendingMachine->pressButton();

// echo $vendingMachine->pressManufacturerName();


// $cola = new Items('cola');
// $vendingMachine = new VendingMachine('サントリー');
// $vendingMachine->depositCoin(100);
// echo $vendingMachine->pressButton($cola);
// $vendingMachine->depositCoin(100);
// echo $vendingMachine->pressButton($cola);

// hotCupCoffee = new #{カップコーヒーのクラス}('hot');
// cider = #{飲み物のクラス}.new('cider');
// vendingMachine = new VendingMachine('サントリー');
// vendingMachine->depositCoin(100);
// vendingMachine->depositCoin(100);
// echo vendingMachine->pressButton(cider);

// echo vendingMachine->pressButton(hotCupCoffee);
// vendingMachine->addCup(1);
// echo vendingMachine->pressButton(hotCupCoffee);