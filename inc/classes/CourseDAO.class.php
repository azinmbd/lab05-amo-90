<?php

//SectionID	Semester	InstructorName	CourseID

class CourseDAO  {

    //Static DB
    private static $_db;

    //Initialize the CourseDAO
    static function initialize()    {
        self::$_db = new PDOService("Course");
    }

    //Get all the courses
    static function getCourses() {
        //Select *
        $sql = "SELECT * FROM Course;";
        //Prepare the Query
        self::$_db->query($sql);
        //Return the results
        self::$_db->execute();
        //Return resultSet
        return self::$_db->resultSet();
    }
}


?>