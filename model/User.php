<?php

class User{
    var $anrede,$vorname,$nachname,$adresse,$plz,$ort,$username,$password,$email;
    /**
     * User constructor.
     * @param $anrede
     * @param $vorname
     * @param $nachname
     * @param $adresse
     * @param $plz
     * @param $ort
     * @param $username
     * @param $password
     * @param $email
     */
    public function __construct($anrede, $vorname, $nachname, $adresse, $plz, $ort, $username, $password, $email)
    {
        $this->anrede = $anrede;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->adresse = $adresse;
        $this->plz = $plz;
        $this->ort = $ort;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAnrede()
    {
        return $this->anrede;
    }

    /**
     * @param mixed $anrede
     */
    public function setAnrede($anrede): void
    {
        $this->anrede = $anrede;
    }

    /**
     * @return mixed
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * @param mixed $vorname
     */
    public function setVorname($vorname): void
    {
        $this->vorname = $vorname;
    }

    /**
     * @return mixed
     */
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * @param mixed $nachname
     */
    public function setNachname($nachname): void
    {
        $this->nachname = $nachname;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * @param mixed $plz
     */
    public function setPlz($plz): void
    {
        $this->plz = $plz;
    }

    /**
     * @return mixed
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * @param mixed $ort
     */
    public function setOrt($ort): void
    {
        $this->ort = $ort;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }



}