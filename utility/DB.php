<?php

class DB
{
    private $dbname;
    function connect($name)
    {
        $this->dbname = $name;
        return new mysqli("localhost", "webProjekt", "cprn66ae", "webprojekt");
    }

    // ger UserList form database
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

    // function to get the password of a specific user
    function getPassword($username)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("SELECT Password AS c FROM users WHERE Username=?");
        $statement->bind_param('s', $username);
        $statement->execute();
        $z = $statement->get_result()->fetch_assoc();
        $statement->close();
        $dbobjekt->close();
        return $z['c'];
    }

    // function to get the user-object by the username
    function getUser($username)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("SELECT * FROM users WHERE Username=?");
        $statement->bind_param('s', $username);
        $statement->execute();
        $z = $statement->get_result()->fetch_assoc();
        $statement->close();
        $dbobjekt->close();
        return $z;
    }

    // function to get the username by id
    function getUsername($id)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("SELECT Username AS c FROM users WHERE ID=?");
        $statement->bind_param('i', $id);
        $statement->execute();
        $username = $statement->get_result()->fetch_assoc();
        $statement->close();
        $dbobjekt->close();
        return $username['c'];
    }

    // function to get the Status of a specific user (aktiv/inaktive)
    function getStatus($username)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("SELECT Status AS c FROM users WHERE Username=?");
        $statement->bind_param('s', $username);
        $statement->execute();
        $status = $statement->get_result()->fetch_assoc();
        $statement->close();
        $dbobjekt->close();
        return $status['c'];
    }

    // function to change the state of a specific user (aktiv/inaktive)
    function changeStatus($id, $status)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("UPDATE users SET Status=? Where ID=?");
        $statement->bind_param('si', $status, $id);
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
    }

    // function to get the state of a user (online/offline)
    function getState($username)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("SELECT State AS c FROM users WHERE Username=?");
        $statement->bind_param('s', $username);
        $statement->execute();
        $status = $statement->get_result()->fetch_assoc();
        $statement->close();
        $dbobjekt->close();
        return $status['c'];
    }

    // function to change the state of a user (online/offline)
    function changeState($username, $status)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("UPDATE users SET State=? Where Username=?");
        $statement->bind_param('ss', $status, $username);
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
    }

    // function to count the users
    function countUser($username)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("SELECT COUNT(*) AS c FROM users WHERE Username=?");
        $statement->bind_param('s', $username);
        $statement->execute();
        $z = $statement->get_result()->fetch_assoc();
        $dbobjekt->close();
        return $z['c'];
    }


    //Adds User to the Database
    function registerUser($userObjekt)
    {
        $dbobjekt = $this->connect("users");
        $status = "aktive";
        $state = "offline";
        $statement = $dbobjekt->prepare("Insert INTO users (Anrede,Vorname,Nachname,Adresse,PLZ,Ort,Username,Password,Email,Rolle,Status,State) values (?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->bind_param('ssssisssssss', $userObjekt->getAnrede(), $userObjekt->getVorname(), $userObjekt->getNachname(), $userObjekt->getAdresse(), $userObjekt->getPlz(), $userObjekt->getOrt(), $userObjekt->getUsername(), $userObjekt->getPassword(), $userObjekt->getEmail(), $userObjekt->getRolle(), $status, $state);
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
        $stmt->bind_param('s', $username);
        $stmt->execute();

        if ($stmt) {
            $erg = true;
        } else {
            $erg = false;
        }
        $z = $stmt->get_result()->fetch_object();
        $stmt->close();

        $statement = $dbobjekt->prepare('UPDATE users SET Anrede=?,Vorname=?,Nachname=?,Adresse=?,PLZ=?,Ort=?,Username=?,Password=?,Email=?,Rolle=? WHERE ID=?');
        $statement->bind_param('ssssisssssi', $userObjekt->getAnrede(), $userObjekt->getVorname(), $userObjekt->getNachname(), $userObjekt->getAdresse(), $userObjekt->getPlz(), $userObjekt->getOrt(), $userObjekt->getUsername(), $userObjekt->getPassword(), $userObjekt->getEmail(), $userObjekt->getRolle(), $z->ID);
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
        return $erg;
    }

    //Deletes User From the Databased
    function deleteUser($userID)
    {
        $dbobjekt = $this->connect("users");
        $statement = $dbobjekt->prepare("DELETE FROM users Where ID =?");
        $statement->bind_param('i', $userID);
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

    // function to get the tags of a specific picture
    function getTags($tag)
    {
        $dbobjekt = $this->connect("pictures");
        $statement = $dbobjekt->prepare("SELECT * from pictures WHERE Name LIKE ? ");
        $tag = "%" . $tag . "%";
        $statement->bind_param('s', $tag);
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
    function getPictureArray($name, $tag, $date, $state, $owner)
    {
        $dbobjekt = $this->connect("pictures");

        $statement = $dbobjekt->prepare("SELECT * from pictures WHERE Name=? or tags LIKE ? or capturedate = ? or changedate = ? AND state LIKE ? or owner = ?");
        $tag = "%" . $tag . "%";
        $statement->bind_param('ssddss', $name, $tag, $date, $date, $state, $owner);
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
    function getrestrictedPictureArray($state, $owner)
    {
        $dbobjekt = $this->connect("pictures");

        $statement = $dbobjekt->prepare("SELECT * from pictures WHERE state LIKE ? AND owner = ?");
        $statement->bind_param('ss', $state, $owner);
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
    function getPictureArrayAll($state)
    {
        $dbobjekt = $this->connect("pictures");

        $statement = $dbobjekt->prepare("SELECT * from pictures WHERE state LIKE ? ");
        $statement->bind_param('s', $state);
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

    // create picture
    function createPicture($Name,$latitude,$longitude,$capturedate,$changedate,$state,$href,$tags,$owner)
    {
        $dbobjekt = $this->connect("pictures");
        //Insert INTO pictures (Name,latitude,longitude,capturedate,changedate,state,href,tags,owner) values ('Test','48.20','16.36','2018-12-17','2019-12-17','freigegeben','test.png','test,klaus','Samuel');
        $statement = $dbobjekt->prepare("INSERT INTO pictures (Name,latitude,longitude,capturedate,changedate,state,href,tags,owner) values (?,?,?,?,?,?,?,?,?)");
        $statement->bind_param('sssssssss', $Name,$latitude,$longitude,$capturedate,$changedate,$state,$href,$tags,$owner);
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

    // delete picture by name
    function deletePicture($name)
    {
        $dbobjekt = $this->connect("pictures");
        $statement = $dbobjekt->prepare("DELETE FROM pictures Where Name =?");
        $statement->bind_param('s', $name);
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

    // get picture owner by name
    function getOwner($name)
    {
        $dbobjekt = $this->connect("pictures");
        $statement = $dbobjekt->prepare("Select owner As c FROM pictures Where Name=?");
        $statement->bind_param('s', $name);
        $statement->execute();
        $status = $statement->get_result()->fetch_assoc();
        $statement->close();
        $dbobjekt->close();
        return $status['c'];
    }

    // get state of Pictures
    function getPictureState($name)
    {
        $dbobjekt = $this->connect("pictures");
        $statement = $dbobjekt->prepare("Select state As c FROM pictures Where Name=?");
        $statement->bind_param('s', $name);
        $statement->execute();
        $status = $statement->get_result()->fetch_assoc();
        $statement->close();
        $dbobjekt->close();
        return $status['c'];
    }

    function changePictureState($name, $state)
    {
        $dbobjekt = $this->connect("pictures");
        $statement = $dbobjekt->prepare("UPDATE pictures SET state=? Where Name=?");
        $statement->bind_param('ss', $state, $name);
        $statement->execute();
        $statement->close();
        $dbobjekt->close();
    }
}
