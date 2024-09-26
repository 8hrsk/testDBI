<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/vueserv/Database/Visit.php');

class RequestController {

    private $location;
    private $RequestMethod;
    private $root;

    public function __construct() {
        $this->root = $_SERVER['DOCUMENT_ROOT'];
        $this->location = $_SERVER['PATH_INFO'];
        $this->RequestMethod = $_SERVER['REQUEST_METHOD'];

        $this->route();
    }

    private function route() {
        if ($this->location === NULL) { /// home page
            echo $_SERVER['PATH_INFO'];
            echo readfile($this->root . '/vueserv/dist/index.html');
            return;
        }

        if ($this->RequestMethod === 'POST' && $this->location === '/set') { // post request
            $rawInput = file_get_contents('php://input');
            print_r($rawInput);
            return;
        }

        if ($this->RequestMethod === 'GET' && $this->location === '/pixel.js') { // script request
            echo readfile($this->root . '/vueserv/src/pixel.js');
            return;
        }
    }
}