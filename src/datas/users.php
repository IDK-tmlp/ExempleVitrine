<?php
    $filename = "users.csv";
    $users = [];
    // echo dirname(__FILE__)."/".$filename."<br>";
    // Check the existence of file
    if (file_exists(dirname(__FILE__)."/".$filename)) {
        // Reading the entire file into an array
        $content = file(dirname(__FILE__)."/".$filename) or die("ERROR: Cannot open the file.");
        foreach($content as $line){
            $user = explode(",",$line, 4);//limit en cas de , dans le mdp
            $users[] = [$user[0],$user[1],$user[2],$user[3]];
            // var_dump($user);
            // echo "<br>";
        }
    } else {
        echo "ERROR: File does not exist.";
    }
?>