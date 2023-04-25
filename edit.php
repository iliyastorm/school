<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php session_start();
ob_start();
include "connection.php";
if (isset($_GET['id']) && isset($_GET['page'])) {
    $id = $_GET['id'];
    $page = $_GET['page'];
    switch ($page) {
        case 1:
            include "connection.php";
            $query = " SELECT * FROM class WHERE class_id=" . $id;
            $result = $db->prepare($query);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if (isset($_POST['submit1'])) {
                $class_name = $_POST['txt_class'];
                $query = " UPDATE class SET class_name='" . $class_name . "' WHERE class_id= " . $id;
                $del = $db->prepare($query);
                $del->execute();
                header("location:index.php");

            }
            echo ' <div id="row1_col1">
 <form action="" method="post">
 <fieldset>
 <legend>Class</legend>
 <label>class name:</label>
 <input type="text" name="txt_class" value="' . $row['class_name'] . '"/>
 <input type="submit" name="submit1" value="Edit-class"/>
 </fieldset>
 </form>
 </div>
            ';
            break;
        case 2:
            include "connection.php";
            $query = " SELECT * FROM student WHERE stud_id=" . $id;
            $result = $db->prepare($query);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if (isset($_POST['submit2'])) {
                $name = $_POST['stud_name'];
                $family = $_POST['stud_family'];
                $ave = $_POST['stud_ave'];
                $query = " UPDATE student SET name='" . $name . "'" . ",family='" . $family . "'" . ",ave=" . $ave .
                    " WHERE stud_id= " . $id;
                $edit = $db->prepare($query);
                $edit->execute();
                header("location:index.php");
            }
            echo '
            <div id="row1_col2">
            <form action="" method="post">
            <fieldset>
            <legend>Student</legend>
            <label>name</label> <br/>
            <input type="text" name="stud_name" value="' . $row['name'] . '"/> <br/>
            <label>family</label> <br/>
            
         <input type="text" name="stud_family" value="' . $row['family'] . '"/> <br/>
         <label>average</label> <br/>
         <input type="text" name="stud_ave" value="' . $row['ave'] . '"/> <br/>
         <input type="submit" name="submit2" value="edit-student"/>
         </fieldset>
         
         </form>
         </div>
            ';

    }
}
?>
</body>
</html>