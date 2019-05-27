<?php
class Connection
{
    public static function make()
    {
        try
        {
            $opciones=[PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT=>true
            ];          //$opciones -> es un array de opciones

            $connection=new PDO( 'mysql:host=127.0.0.1; dbname=protectoraanimales', "elvira", "elvira", $opciones);

        }catch(PDOException $PDOException)
        {
            die($PDOException->getMessage());
        }
        return $connection;
    }
}

