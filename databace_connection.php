<?php

    $host="localhost";  //Specifies a host name or an IP address
    $username="root";   //Specifies the MySQL username
    $password="";       //Specifies the MySQL password
    $dbname = "webproject";  //Specifies the default database to be used

    //Open a new connection to the MySQL server:

    $connection = mysqli_connect($host,$username,$password,$dbname);

    if(!$connection)
    {
        die('Could not Connect MySql Server:' .mysql_error());
    }
    else
    {
        //echo "Connected Successfully";
    }
?>