<?php


    // GET ALL FROM DB
    function getAllDataFromDatabase($sql, $payload = [])
    {
        global $db;

        $stmt = $db->prepare($sql);
        $stmt->execute($payload);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // GET FROM DB
    function getDataFromDatabase($sql, $payload = [])
    {
        global $db;

        $stmt = $db->prepare($sql);
        $stmt->execute($payload);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ---------------------------------------

    // INSTERT IN DB
    function insertDataInToDataBase($sql, $payload){

        global $db;

        $stmt = $db->prepare($sql);
        $stmt->execute($payload);

        return true;

    }

    // INSTERT IN DB2
    function insertDataInToDataBaseDemo($sql, $payload){
        global $db;

        $stmt = $db->prepare($sql);
        if($stmt->execute($payload)){
            // echo '<br>sucssesfull<br>';
            
        }else{return false;}

        return $db->lastInsertId();

    }

    











?>