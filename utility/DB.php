<?php


class DB
{
    private $dbname;
    function connect($name)
    {
        $this->dbname = $name;
        return new mysqli("localhost", "webProjekt", "cprn66ae", "webprojekt");
    }

    //Gets and Returns User Array
    function getUserList()
    {
        $dbobjekt = $this->connect("users");
        $result = $dbobjekt->query("Select * from users");
        $arrayuser = array();

        while ($z = $result->fetch_assoc()) {
            array_push($arrayuser, (object) $z);
        }
        $dbobjekt->close();
        return $arrayuser;
    }

    function getPassword($username){
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("SELECT Password AS c FROM users WHERE Username=?");
        $statement->bind_param('s',$username);
        $statement->execute();
        $z = $statement->get_result()->fetch_assoc();
        $statement->close();
        $dbobjekt->close();
        return $z['c'];
    }

    function getUser($username){
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("SELECT * FROM users WHERE Username=?");
        $statement->bind_param('s',$username);
        $statement->execute();
        $z = $statement->get_result()->fetch_assoc();
        $statement->close();
        $dbobjekt->close();
        return $z;
    }

    function countUser($username){
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("SELECT COUNT(*) AS c FROM users WHERE Username=?");
        $statement->bind_param('s',$username);
        $statement->execute();
        $z = $statement->get_result()->fetch_assoc();
        $dbobjekt->close();
        return $z['c'];
    }

    //Adds User to the Database
    function registerUser($userObjekt)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("Insert INTO users (Anrede,Vorname,Nachname,Adresse,PLZ,Ort,Username,Password,Email,Rolle) values (?,?,?,?,?,?,?,?,?,?)");
        $statement->bind_param('ssssisssss', $userObjekt->getAnrede(), $userObjekt->getVorname(), $userObjekt->getNachname(), $userObjekt->getAdresse(), $userObjekt->getPlz(), $userObjekt->getOrt(), $userObjekt->getUsername(), $userObjekt->getPassword(), $userObjekt->getEmail(), $userObjekt->getRolle());
        if ($statement) {
            $erg = true;
        } else {
            $erg = false;
        }
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
        return $erg;
    }

    //Updates User From the Database
    function updateUser($userObjekt)
    {
        $username = $userObjekt->getUsername();
        $dbobjekt = $this->connect("users");
        $stmt = $dbobjekt->prepare("SELECT * FROM users WHERE Username=?");
        $stmt->bind_param('s',$username);
        $stmt->execute();

        if ($stmt) {
            $erg = true;
        } else {
            $erg = false;
        }
        $z = $stmt->get_result()->fetch_object();
        $stmt->close();

        $statement = $dbobjekt->prepare('UPDATE users SET Anrede=?,Vorname=?,Nachname=?,Adresse=?,PLZ=?,Ort=?,Username=?,Password=?,Email=?,Rolle=? WHERE ID=?');
        $statement->bind_param('ssssisssssi',$userObjekt->getAnrede(), $userObjekt->getVorname(), $userObjekt->getNachname(), $userObjekt->getAdresse(), $userObjekt->getPlz(), $userObjekt->getOrt(), $userObjekt->getUsername(), $userObjekt->getPassword(), $userObjekt->getEmail(), $userObjekt->getRolle(), $z->ID);
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
        return $erg;
    }

    //Deletes User From the Databased
    function deleteUser($userID)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("DELETE FROM ? Where ID =?");
        $statement->bind_param('si', $this->dbname, $userID);
        if ($statement) {
            $erg = true;
        } else {
            $erg = false;
        }
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
        return $erg;
    }


    //getArray of Pictures from database
    function getPictureArray($name, $tag, $date, $state,$owner)
    {
        $dbobjekt = $this->connect("pictures");

        $statement = $dbobjekt->prepare("SELECT * from pictures WHERE Name=? or tags LIKE ? or capturedate = ? or changedate = ? or state = ? or owner = ?");
        $tag = "%" . $tag . "%";
        $statement->bind_param('ssddss', $name, $tag, $date, $date, $state,$owner);
        $statement->execute();
        $result = $statement->get_result();

        $arraypictures = array();
        while ($row = $result->fetch_assoc()) {
            array_push($arraypictures, (object) $row);

        }

        $arraypictures2 = array();
        foreach ($arraypictures as $a) {
            $ab = new picture();
            $ab->setName($a->Name);
            $ab->setLatitude($a->latitude);
            $ab->setLongitude($a->longitude);
            $ab->setCapturedate($a->capturedate);
            $ab->setChangedate($a->changedate);
            $ab->setState($a->state);
            $ab->setHref($a->href);
            $ab->setTags($a->tags);
            $ab->setOwner($a->owner);

            array_push($arraypictures2, $ab);
        }
        $statement->close();
        $dbobjekt->close();
        return $arraypictures2;
    }


    //getArray of Pictures from database
    function getrestrictedPictureArray($state,$owner)
    {
        $dbobjekt = $this->connect("pictures");

        $statement = $dbobjekt->prepare("SELECT * from pictures WHERE state = ? AND owner = ?");
        $statement->bind_param('ss', $state,$owner);
        $statement->execute();
        $result = $statement->get_result();

        $arraypictures = array();
        while ($row = $result->fetch_assoc()) {
            array_push($arraypictures, (object) $row);

        }

        $arraypictures2 = array();
        foreach ($arraypictures as $a) {
            $ab = new picture();
            $ab->setName($a->Name);
            $ab->setLatitude($a->latitude);
            $ab->setLongitude($a->longitude);
            $ab->setCapturedate($a->capturedate);
            $ab->setChangedate($a->changedate);
            $ab->setState($a->state);
            $ab->setHref($a->href);
            $ab->setTags($a->tags);
            $ab->setOwner($a->owner);

            array_push($arraypictures2, $ab);
        }
        $statement->close();
        $dbobjekt->close();
        return $arraypictures2;
    }


}