<?php


class Page  {

    public static $_title = "Lab 05 - Azin Mobedmehdiabadi - 90";

    static function header() { ?>
    
        <!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

            <title><?php echo self::$_title; ?></title>
        </head>
        <body class="p-5">
            <h1><?php echo self::$_title; ?></h1>


    <?php }

    static function footer() { ?>
    
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>

    <?php }

    static function listSections(Array $sections)   { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SectionID</th>
                    <th>Semester</th>
                    <th>Instructor</th>
                    <th>Course</th>
                    <th>Edit</th>
                    <th>Delete</th>
            </thead>

            <?php

            //List all the sections
            foreach($sections as $section)  {
                echo "<tr>";
                echo "<td>".$section->getSectionId()."</td>";
                echo "<td>".$section->getSemester()."</td>";
                echo "<td>".$section->getInstructorName()."</td>";
                echo "<td>".$section->ShortName."</td>";
                echo '<td><a href="?action=edit&id='.$section->getSectionId().'">Edit</td>';
                echo '<td><a href="?action=delete&id='.$section->getSectionId().'">Delete</td>';
                echo "</tr>";
            } ?>
            </table>
        
    <?php }

    static function editSectionForm(Section $sectionToEdit, Array $courses)   { ?>

        <hr>
        <h3>Edit Course - <?php echo $sectionToEdit->getSectionID(); ?></h3>
        <form ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST">
        <table>
            <tr>
                <td>Section ID:</td>
                <td><?php echo $sectionToEdit->getSectionID(); ?></td>
            </tr>
            <tr>
                <td>Semester:</td>
                <td><input type="text" name="Semester" value="<?php echo $sectionToEdit->getSemester(); ?>"></td>
            </tr>
            <tr>
                <td>Instructor:</td>
                <td><input type="text" name="InstructorName" value="<?php echo $sectionToEdit->getInstructorName(); ?>"></td>
            </tr>
            <tr>
                <td>Course:</td>
                <td>
                <select name="CourseID">
                    <?php
                        foreach ($courses as $course) {
                            $selected = ($course->getCourseID() == $sectionToEdit->getCourseID()) ? 'selected' : '';
                            echo '<option value="'.$course->getCourseID().'" '.$selected.'>'.$course->getShortName().'</option>';
                        }
                    ?>
                </select>

                </td>
            </tr>
        </table>
            <input type="hidden" name="SectionID" value="<?php  echo $sectionToEdit->getSectionID(); ?>">
            <input type="hidden" name="action" value="edit">
        <input type="submit" value="Edit">
        </form>

    <?php }

    static function createSectionForm(Array $courses)   { ?>
    <hr>
    <h3>Create Course</h3>
    <form ACTION="" METHOD="POST">
        <table>
            <tr>
                <td><label >Semester:</label></td>
                <td><input type="text" name="Semester"></td>
            </tr>
            <tr>
                <td><label>Instructor:</label></td>
                <td><input type="text" name="InstructorName" ></td>
            </tr>
            <tr>
                <td><label >Course:</label></td>
                <td>
                    <select name="CourseID">
                    <?php
                        foreach ($courses as $course)   {
                            echo '<option value="'.$course->getCourseID().'">'.$course->getShortName().'</option>';
                        }
                    ?>
                    </select>
                </td>
            </tr>
        </table>
        <input type="hidden" name="action" value="create">
        <input type="submit" value="create">
    </form>

<?php }
}

?>