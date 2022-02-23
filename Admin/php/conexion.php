<?php
    try{
        $base=new PDO("mysql:host=localhost; dbname=villaroca", "root", "root");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET UTF8");
    }catch(Exception $e){
        die("error: " . $e->getMessage());
        echo "Error en la linea: " . $e->getLine();
    }
?>