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
        $result = $dbobjekt->query("Select * from login_2");
        $arrayuser = array();

        while ($z = $result->fetch_assoc()) {
            array_push($arrayuser, (object) $z);
        }
        $dbobjekt->close();
        return $arrayuser;
    }

    //Adds User to the Database
    function registerUser($userObjekt)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("Insert INTO ? (Anrede,Vorname,Nachname,Adresse,PLZ,Ort,Username,Password,Email,Rolle) values (?,?,?,?,?,?,?,?,?)");
        $statement->bind_param('sssssisssss', $this->dbname, $userObjekt->getAnrede(), $userObjekt->getVorname(), $userObjekt->getNachname(), $userObjekt->getAdresse(), $userObjekt->getPlz(), $userObjekt->getOrt(), $userObjekt->getUsername(), $userObjekt->getPassword(), $userObjekt->getEmail(), $userObjekt->getRolle());
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
        $dbobjekt = $this->connect("users");
        $result = $dbobjekt->query("SELECT * FROM '$this->dbname' Where ID = " . $_GET["id"]);

        if ($result) {
            $erg = true;
        } else {
            $erg = false;
        }
        $z = $result->fetch_object();

        $statement = $dbobjekt->prepare('UPDATE ? SET Anrede=?,Vorname=?,Nachname=?,Adresse=?,PLZ=?,Ort=?,Username=?,Password=?,Email=?,Rolle=? WHERE ID=?');
        $statement->bind_param('sssssisssssi', $this->dbname, $userObjekt->getAnrede(), $userObjekt->getVorname(), $userObjekt->getNachname(), $userObjekt->getAdresse(), $userObjekt->getPlz(), $userObjekt->getOrt(), $userObjekt->getUsername(), $userObjekt->getPassword(), $userObjekt->getEmail(), $userObjekt->getRolle(), $z->ID);
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
    
    function getPictureArray($name, $tag, $date, $state)
    {
        $dbobjekt = $this->connect("pictures");

        $statement = $dbobjekt->prepare("SELECT * from pictures WHERE Name=? or tags LIKE ? or capturedate = ? or changedate = ? or state = ?");
        $tag = "%" . $tag . "%";
        $statement->bind_param('ssdds', $name, $tag, $date, $date, $state);
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

            array_push($arraypictures2, $ab);
        }

        $dbobjekt->close();
        return $arraypictures2;
    }
}
