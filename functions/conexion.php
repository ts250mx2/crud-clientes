<?php

 $config = include 'config.php';
 
 try {
      $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
      $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    } catch(PDOException $error) {
      $error= $error->getMessage();
    }