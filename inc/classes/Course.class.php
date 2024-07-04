<?php

Class Course    {
    
    //Attributes
    private $CourseID;
    private $ShortName;
    private $LongName;
 
    //Getters (for the lab we only need courseID and ShortName)

    public function getCourseID() {
        return $this->CourseID;
    }

    public function getShortName() {
        return $this->ShortName;
    }

    // public function getLongName() {
    //     return $this->LongName;
    // }

    // // Setters
    // public function setCourseID($CourseID) {
    //     $this->CourseID = $CourseID;
    // }

    // public function setShortName($ShortName) {
    //     $this->ShortName = $ShortName;
    // }

    // public function setLongName($LongName) {
    //     $this->LongName = $LongName;
    // }
}

?>