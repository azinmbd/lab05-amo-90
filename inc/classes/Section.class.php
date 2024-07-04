<?php

class Section {

//SectionID	Semester InstructorName	CourseID

    //Attributes, make sure they match the column names!
    private $SectionID;
    private $Semester;
    private $InstructorName;
    private $CourseID;

    //Cant use a constructor! Why!?
    //Getters
    public function getSectionID(): int {
        return $this->SectionID;
    }

    public function getSemester(): string {
        return $this->Semester;
    }

    public function getInstructorName(): string {
        return $this->InstructorName;
    }

    public function getCourseID(): int {
        return $this->CourseID;
    }
    
    //Setters
    public function setSectionID(int $SectionID){
        $this->SectionID = $SectionID;
    }

    public function setSemester(string $Semester){
        $this->Semester = $Semester;
    }

    public function setInstructorName(string $InstructorName){
        $this->InstructorName = $InstructorName;
    }

    public function setCourseID(int $CourseID){
        $this->CourseID = $CourseID;
    }


}