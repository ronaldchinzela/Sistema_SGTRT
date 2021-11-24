<?php
    
    class Conexion{

         public static function conectar(){
            
            $link = new PDO("pgsql:host=localhost options='--client_encoding=UTF8';dbname=sistemaSGTRT ;port=5433","postgres","Ptab3gr5");
            return $link;
        }
    }

    /*class Conexion{

        public static function conectar(){
            
            $link = new PDO("mysql:host=localhost;dbname=pos","root","");

            $link->exec("set names utf8");
            return $link;
        }
    }*/
