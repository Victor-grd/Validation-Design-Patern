<?php

    namespace App;

    class Config {

        private $settings = [];

        // attribut statique qui conservera l'instance unique de notre classe
        private static $_instance;

        /**
        * La méthode statique qui permet d'instancier ou de récupérer l'instance unique
        **/
        public static function getInstance(){
            if(is_null(self::$_instance)){
                self::$_instance = new Config();
            }
            return self::$_instance;
        } 

        public function __construct(){
            $this->settings = require __DIR__ . '/config/config.php';
        }

        public function get($key){

            if(!isset($this->settings[$key])){
                return null;
            }
            return $this->settings[$key];
        }
    }