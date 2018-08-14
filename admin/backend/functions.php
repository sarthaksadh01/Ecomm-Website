<?php

function connect_to_database(){
    
        $link = mysqli_connect("your database details here");
        if( mysqli_connect_error()){
             die("error connecting to database..");
         }
    return $link;
    
}


?>