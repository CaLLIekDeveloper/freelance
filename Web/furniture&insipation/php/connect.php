<?php
class Connect
{
    public $mysqli;

    function __construct()
    {
        $this->mysqli = new mysqli("localhost", "root", "", "furniture&insipation");
        $this->mysqli->set_charset("utf8");
    }

    function __destruct()
    {
        $this->mysqli->close();
    }
}
$connect = new Connect();
?>
