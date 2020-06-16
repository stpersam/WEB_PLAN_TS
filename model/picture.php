<?php

class Picture
{
    var $name, $latitude, $longitude, $capturedate, $changedate, $state;


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of latitude
     */ 
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set the value of latitude
     *
     * @return  self
     */ 
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get the value of longitude
     */ 
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set the value of longitude
     *
     * @return  self
     */ 
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get the value of capturedate
     */ 
    public function getCapturedate()
    {
        return $this->capturedate;
    }

    /**
     * Set the value of capturedate
     *
     * @return  self
     */ 
    public function setCapturedate($capturedate)
    {
        $this->capturedate = $capturedate;

        return $this;
    }

    /**
     * Get the value of changedate
     */ 
    public function getChangedate()
    {
        return $this->changedate;
    }

    /**
     * Set the value of changedate
     *
     * @return  self
     */ 
    public function setChangedate($changedate)
    {
        $this->changedate = $changedate;

        return $this;
    }
}
