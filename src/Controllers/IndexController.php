<?php

namespace Aleksandr\KzPostal\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use RustemKaimolla\KazPost\KazPostAPI;

class IndexController
{
    private $postalApi;

    public function __construct() {
        $this->postalApi = new KazPostAPI();
    }

    public function index() {

    }

    public function details() {
        $track = '';
        if (isset($_GET['track'])) {
            $track = trim($_GET['track']);
        }

        $row = null;
        if (strlen($track)) {
            try {
                $row = $this->postalApi->get($track);
            } catch (GuzzleException $e) {
            }
        }
        return ['row'=>$row ?$row->getData():null];
    }
}