<?php

    function getClientNames(){
        include "dbConfig.php";
        $query = "SELECT Id, accountNumber FROM clients;";
        $result = $database->query($query);
        if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
                $accountNumber = $row['accountNumber'];
                $id = $row['Id'];
               echo "<option value='$id'>$accountNumber</option>";
           }
        }else{
            echo "<option disabled>No Clients In Database</option>";
        }
    }

    function getLoanClientNames(){
        include "dbConfig.php";
        $query = "SELECT Id, accountNumber FROM clients WHERE debit > 0;";
        $result = $database->query($query);
        if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
                $accountNumber = $row['accountNumber'];
                $id = $row['Id'];
               echo "<option value='$id'>$accountNumber</option>";
           }
        }else{
            echo "<option disabled>No Clients In Database</option>";
        }
    }

    function getLoanNames(){
        include "dbConfig.php";
        $query = "SELECT Id, accountNumber FROM loans WHERE debit > 0;";
        $result = $database->query($query);
        if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
                $accountNumber = $row['accountNumber'];
                $id = $row['Id'];
               echo "<option value='$id'>$accountNumber</option>";
           }
        }else{
            echo "<option disabled>No Clients In Database</option>";
        }
    }

?>
