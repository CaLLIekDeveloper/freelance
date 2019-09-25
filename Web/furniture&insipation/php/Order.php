<?php
class Order
{
    public $id;

    public $accountId = 0;
    public $orderCustomer = "";
    public $orderBasket = "";
    public $orderDate = "";
    public $orderPrice = 0;
    public $orderType = 0;
    //0 - Ожидание осмотрения
    //1 - В процесе
    //2 - Доставлен

    //$firstName == "" || $email == "" || $address == "" || $cardNo== "" || $phone == "" || $cardMonth == "" || $cardYear == ""

    public $firstName = "";
    public $email = "";
    public $address = "";
    public $cardNo="";
    public $phone="";
    public $cardMonth="";
    public $cardYear="";
    public $orderComment = "";

    public $arrProducts;

    
    private $separator  = "/___/"; 

    public function __constructor()
    {

    }

    public function setOrderCustomer()
    {
        $this->orderCustomer = 
        $this->firstName.$this->separator.$this->email.$this->separator.$this->address.$this->separator.$this->cardNo
        .$this->separator.$this->phone.$this->separator.$this->cardMonth.$this->separator.$this->cardYear.$this->separator.$this->orderComment;
    }

    public function setOrderBasket($arr)
    {
        $nextBasketItem = "|next|";
        $orderInfo2 ="";
        foreach ($arr as $key => $item)      
        {
            $id = $item["id"];
            $type = $item["type"];
            $imgName = $item["imageName"]; 
            $name = $item["name"];
            $price = $item["price"];
            $qty = $arr[$key]["qty"];
            $orderInfo2 = $orderInfo2.$id.$this->separator.$price.$this->separator.$qty.$nextBasketItem;
            $this->orderPrice+=(int)$price*(int)$qty;
        }
        $this->orderBasket = $orderInfo2;
    }

    public function setOrderFromFetchRow($fetchedRow)
    {
        $this->id = $fetchedRow[0];
        $this->accountId = $fetchedRow[1];
        $this->setFieldOrderCustomer($fetchedRow[2]);
        $this->setFieldOrderBasket($fetchedRow[3]);
        $this->orderDate = $fetchedRow[4];
        $this->orderPrice = $fetchedRow[5];
  
    }

    public function setFieldOrderCustomer($string)
    {
        $arr = explode($this->separator, $string);
        $this->firstName = $arr[0];
        $this->email = $arr[1];
        $this->address = $arr[2];
        $this->cardNo=$arr[3];
        $this->phone=$arr[4];
        $this->cardMonth=$arr[5];
        $this->cardYear=$arr[6];
        $this->orderComment = $arr[7];
    }
    public function setFieldOrderBasket($string)
    {
        $this->arrProducts = explode("|next|", $string);
    }

    public function getInsertQuery()
    {
        $this->orderDate = date('d-m-Y');
        return "INSERT INTO orders(accountId,orderCustomer,orderBasket,orderDate,orderPrice) 
            VALUES ('$this->accountId', '$this->orderCustomer', '$this->orderBasket', '$this->orderDate', '$this->orderPrice')";
    }
}
