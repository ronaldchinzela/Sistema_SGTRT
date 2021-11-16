<?php
    function saveCsv(){
     $file = file_get_contents($_FILES['csv']['tmp_name']);
     $lines = explode("\n", $file);
     
      array_map(function(string $str){
     
        $campos = explode(",", $str);
         $campos = array_map('trim', $campos);
     
         print_r("<pre>");
             print_r($campos);
         print_r("</pre>");
     
     }, $lines);

    }
     