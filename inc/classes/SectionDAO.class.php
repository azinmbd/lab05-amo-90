<?php

//SectionID	Semester	InstructorName	CourseID

class SectionDAO  {

    //Hold the $_db in a variable.
    private static $_db;

    static function initialize()    {
      //Create the PDOService instance locally, be sure to specify the class.
      self::$_db = new PDOService("Section");
    }

    static function createSection(Section $newSection) {
        //Create means INSERT
        $sql = "INSERT INTO section (Semester,InstructorName,CourseID)
                VALUES (:semester,:instructorName,:courseID);";

        //QUERY BIND EXECUTE RETURN
        self::$_db->query($sql);

        self::$_db->bind(":semester",$newSection->getSemester());
        self::$_db->bind(":instructorName",$newSection->getInstructorName());        
        self::$_db->bind(":courseID",$newSection->getCourseID());        

        self::$_db->execute();

        return self::$_db->lastInsertedId();
    }

    static function getSection(int $sectionId)  {
        $query = "SELECT * FROM Section WHERE SectionID = :sectionID";
        //Gget means get one
        //QUERY, BIND, EXECUTE, RETURN
        self::$_db->query($query);
        self::$_db->bind(":sectionID" , $sectionId);
        self::$_db->execute();
        return self::$_db->singleResult();
    }

    static function getSections() {
        $sql = "SELECT * FROM Section;";
        //No parameters so no bind

        //Prepare the Query
        self:: $_db -> query($sql);
        //execute the query
        self:: $_db -> execute();
        //Return results
        return self::$_db->resultSet();
    }
    
    static function updateSection (Section $sectionToUpdate) {
            //update means UPDATE query
            $sql = "UPDATE Section SET 
            Semester = :semester, 
            InstructorName = :instructorName, 
            CourseID = :courseID 
            WHERE SectionID = :sectionID";
            
        self::$_db->query($sql);

        //QUERY BIND EXECUTE RETURN THE RESULTS
        self::$_db->bind(":semester", $sectionToUpdate->getSemester());
        self::$_db->bind(":instructorName", $sectionToUpdate->getInstructorName());        
        self::$_db->bind(":courseID", $sectionToUpdate->getCourseID());        
        self::$_db->bind(":sectionID", $sectionToUpdate->getSectionID());
        
        self:: $_db -> execute();
        
    }
    
    static function deleteSection(int $sectionId) {
        $sql = "DELETE FROM Section WHERE SectionID = :sectionID;";

        //... blah blah blah blah....
        self::$_db->query($sql);
        self::$_db->bind(":sectionID" , $sectionId);
        self::$_db->execute();
        return self::$_db->rowCount();
    }
    //We have a little hack with a joing to get the sections list with the appropriate course name instead of CourseID :)
    static function getSectionsList() {
        $sql = "SELECT * FROM Section, Course WHERE Section.CourseID = Course.CourseID;";

        //Prepare the Query
        self::$_db->query($sql);
        self::$_db->execute();
        //Return the results
        //Return row
        return self::$_db->resultSet();
    }

}


?>