 <?php
    
    // session_start();
    global $db;
    // print_r($_SESSION);

    try {
        $db = new PDO( "mysql:host=localhost;dbname=linkagency;charset=utf8", "linkagency", "linkagency123" );
        $salt = "o78kb6985g6j9hi9=6uj78kh9ikgjoku9kyrj7r";
        // var_dump($db);
    }

    catch(Exception $e) {
        echo $e->getMessage() ;
        echo "An error has occurred";
    }

?> 
