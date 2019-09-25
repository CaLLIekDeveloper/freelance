<?php
class Account
{
    public $id;

    public $firstName = "";
    public $lastName = "";
    public $password = "";
    public $gender = 0;
    public $email = "";
    public $phone = "";
    public $address = "";
    public $date = "01.01.2000";
    public $cardNo = "";
    public $isAdmin = 0;
    public $orders = "";
    public $salt = "*@!";

    private $hashedPassword = "";
    private $lastTimeLogin;

    public $name;

    //Отправить сессию
    public function setAccount($arr)
    {
        if ($arr == null) {
            return;
        } else {
            $this->id = $arr["accountId"];
            $this->firstName = $arr["firstName"];
            $this->lastName = $arr["lastName"];
            $this->email = $arr["email"];
            $this->password = $arr["password"];
            $this->address = $arr["address"];
            $this->cardNo = $arr["cardNo"];

            $this->phone = $arr["phone"];
            $this->gender = (int) $arr["gender"];
            $this->date = $arr["date"];
            $this->isAdmin = (int) $arr["isAdmin"];

            $this->name = $this->firstName . " " . $this->lastName;
            $this->hashedPassword = md5($this->salt . $this->password . $this->salt);

            //echo "{$arr["firstName"]} <br>";
            //$string = implode(", ", $arr);
            //return $string;
            
        }

    }

    public function getInserQuery()
    {
        return "INSERT INTO account(firstName, lastName, password, gender, email, phone, address, date, cardNo, orders, isAdmin)
    VALUES ('$this->firstName', '$this->lastName', '$this->hashedPassword', $this->gender, '$this->email', '$this->phone', '$this->address', '$this->date', '$this->cardNo', '$this->orders', $this->isAdmin)";
    }

    public function getUpdateQuery()
    {
        return "UPDATE account
        SET firstName = '$firstName',
            lastName = '$lastName',
            email = '$postEmail',
            password = '$hashedPwd',
            address = '$address',
            cardNo = '$cardNo',
            gender = '$gender',
            date = '$date',
            orders = '$orders',
            phone = '$phone'
            where email = '$currentEmail'";
    }
}
