<?php

class DB
{
    private $dbname;
    function connect(){
        $this->dbname = "user";
        return new mysqli("localhost","webProjekt","cprn66ae","webProjekt");
    }

    //Gets and Returns User Array
    function getUserList(){
        $dbobjekt = $this->connect();
        $result = $dbobjekt->query("Select * from login_2");
        $arrayuser = array();

        while($z = $result->fetch_assoc()){
            array_push($arrayuser,(object)$z);
        }
        $dbobjekt->close();
        return $arrayuser;
    }

    //Adds User to the Database
    function registerUser($userObjekt){
        $dbobjekt = $this->connect();
        $statement = $dbobjekt->prepare("Insert INTO ? (Anrede,Vorname,Nachname,Adresse,PLZ,Ort,Username,Password,E_Mail_Adresse) values (?,?,?,?,?,?,?,?,?)");
        $statement->bind_param('sssssissss',$this->dbname,$userObjekt->getAnrede(),$userObjekt->getVorname(),$userObjekt->getNachname(),$userObjekt->getAdresse(),$userObjekt->getPlz(),$userObjekt->getOrt(),$userObjekt->getUsername(),$userObjekt->getPassword(),$userObjekt->getEmail());
        if($statement){
            $erg = true;
        }else{
            $erg = false;
        }
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
        return $erg;
    }

    //Updates User From the Database
    function updateUser($userObjekt){
        $dbobjekt = $this->connect();
        $result = $dbobjekt->query("SELECT * FROM '$this->dbname' Where ID = " . $_GET["id"]);

        if($result){
            $erg = true;
        }else{
            $erg = false;
        }
        $z = $result->fetch_object();

        $statement = $dbobjekt->prepare('UPDATE ? SET Anrede=?,Vorname=?,Nachname=?,Adresse=?,PLZ=?,Ort=?,Username=?,Password=?,E_Mail_Adresse=? WHERE ID=?');
        $statement->bind_param('sssssissssi',$this->dbname,$userObjekt->getAnrede(),$userObjekt->getVorname(),$userObjekt->getNachname(),$userObjekt->getAdresse(),$userObjekt->getPlz(),$userObjekt->getOrt(),$userObjekt->getUsername(),$userObjekt->getPassword(),$userObjekt->getEmail(),$z->ID);
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
        return $erg;
    }

    //Deletes User From the Databased
    function deleteUser($userID){
        $dbobjekt = $this->connect();
        $statement = $dbobjekt->prepare("DELETE FROM ? Where ID =?");
        $statement->bind_param('si',$this->dbname,$userID);
        if($statement){
            $erg = true;
        }else{
            $erg = false;
        }
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
        return $erg;
    }


    //getArray of Pictures from database
    function getPictureArray($name, $tag, $date){
        $dbobjekt = $this->connect();
        $result = $dbobjekt->query('SELECT * from pictures WHERE Name=' . $name . ' or tags=' . $tag . '');  
        $arraypictures = array();

        while($z = $result->fetch_object()){
            array_push($arraypictures,(object)$z);
        }

        $dbobjekt->close();
        return $arraypictures;
    }
}