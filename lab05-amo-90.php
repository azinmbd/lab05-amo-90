<?php

//Require config for database
require_once("inc/config.inc.php");

//Require Section and Course Class
require_once("inc/classes/Section.class.php");
require_once("inc/classes/Course.class.php");

//Require all the utility classes, Page, PDOService, Section and CourseDAO
require_once("inc/classes/page.class.php");
require_once("inc/classes/PDOService.class.php");
require_once("inc/classes/SectionDAO.class.php");
require_once("inc/classes/CourseDAO.class.php");

//Initialize the DAO(s)
SectionDAO::initialize();
CourseDAO::initialize();

//If there was post data from an edit form then process it
if (!empty($_POST)) {
    //If there was an edit action....
    if ($_POST["action"] == "edit") {
        //Assemble the Section to update
        $s = new Section();
        $s->setSectionID($_POST["SectionID"]);
        $s->setSemester($_POST["Semester"]);
        $s->setInstructorName($_POST["InstructorName"]);
        $s->setCourseID($_POST["CourseID"]);
        
        //Send the section to the DAO to be updated
        SectionDAO::updateSection($s);
        //Otherwise there must be create form adata
    } else if ($_POST["action"] == "create")    {
        //Assemble the Section to Insert
        $s = new Section();
        $s->setSemester($_POST["Semester"]);
        $s->setInstructorName($_POST["InstructorName"]);
        $s->setCourseID((int)$_POST["CourseID"]);
        
        //Send the section to the DAO for insertion

        //Send the section to the DAO to be created
        SectionDAO::createSection($s);

    }
}

//If there was a delete that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
    //Call the DAO and delete the respecitve Section
    $sectionId = $_GET['id'];
    SectionDAO::deleteSection((int)$sectionId);
}

Page::$_title = "Lab 05 - Azin Mobedmehdiabadi - 90";
Page::header();
//List all the sections
Page::listSections(SectionDAO::getSectionsList());
$courses = CourseDAO::getCourses();
//If someone clicked Edit
if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
    //Pull the section to Edit from the DAO
    $sectionId = $_GET['id'];
    $sectionToEdit = SectionDAO::getSection((int)$sectionId);
    //Render the  Edit Section form with the section to edit and  alist of the courses.
    Page::editSectionForm($sectionToEdit, $courses);
    //Otherwise just show the create form
} else {
    //Call the create Section form, pass in a list of current courses for the drop down.
    Page::createSectionForm($courses);
}
Page::footer();

?>