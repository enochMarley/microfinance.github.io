<?php
    #This is a functions module for handling the token code generator and the cryptographic scripts.

    #Function for the token code generator
    function tokenCodeGenerator(){
        $salt = array("@#$%****","~~@#$%","(*)%%^","!~~~*&^&&","~!!@~**(^","!!@#*(","!!(*)~~#@%","!*(<>>!");
        $hashed_password = crypt(rand(),$salt[rand(1,(count($salt) -1))]);
	       return substr(md5((string)$hashed_password), 0 ,10);
    }

    #function for the encryption of the data
    function encryptData($data){
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,'*&^%$#@!!@#$%^&*!@#$%^&*',$data,MCRYPT_MODE_CBC,"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"));
    }

    #function for the decryption of the data
    function decryptData($data){
        $decode = base64_decode($data);
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128,'*&^%$#@!!@#$%^&*!@#$%^&*',$decode,MCRYPT_MODE_CBC,"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
    }

    function getClientNames(){
        include "dbConfig.php";
        $query = "SELECT Id, fullName FROM clients;";
        $result = $database->query($query);
        if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
                $fullName = $row['fullName'];
                $id = $row['Id'];
               echo "<option value='$id'>$fullName</option>";
           }
        }else{
            echo "<option disabled>No Clients In Database</option>";
        }
    }

    function getLoanClientNames(){
        include "dbConfig.php";
        $query = "SELECT Id, fullName FROM clients WHERE debit > 0;";
        $result = $database->query($query);
        if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
                $fullName = $row['fullName'];
                $id = $row['Id'];
               echo "<option value='$id'>$fullName</option>";
           }
        }else{
            echo "<option disabled>No Clients In Database</option>";
        }
    }


?>
