<?php

namespace CrowCMS;

require __DIR__ . "/../vendor/autoload.php";


class CartController {
    private $client;
    public $error;

    /**
     * Create a database client
     * 
     * @return void;
     */
    public function __construct() {
        $this->client = new \mysqli('localhost', 'root', 'potato', 'crowcms');
    }

    public function fetch_items() {
        try {
            $this->result = $this->client->query('select * from item;');
            $arr = [];
            while ($row = $this->result->fetch_assoc()) {
                array_push($arr, $row);
            }
            return $arr;
        } catch (\Throwable $th) {
            $this->error = $th->message;
            return false;
        }
    }

    public function getFormattedPrice($id) {
    
        $this->result = $this->client->query("select price from item where item_id = {$id}");
        $price = $this->result->fetch_assoc()['price'];
        $fmt = new \NumberFormatter('en-US', \NumberFormatter::CURRENCY);
        $newprice = $fmt->parseCurrency($price, $curr);
        return $newprice;

    }

    public function getCheckoutItem($id) {
        $this->result = $this->client->query("select title, price from item where item_id = {$id}");
        $res = $this->result->fetch_assoc();
        return $res;
    }
}