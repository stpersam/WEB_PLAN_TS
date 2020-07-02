<?php
//Picture class
class picture
{
    var $name, $latitude, $longitude, $capturedate, $changedate, $state, $href, $tags, $owner;

    /**
     * constructur
     */
    public function __construct()
    {
    }

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

    /**
     * Get the value of href
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set the value of href
     *
     * @return  self
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * Get the value of tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @return  self
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get the value of owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set the value of owner
     *
     * @return  self
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }
}
