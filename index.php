<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title> School Database Sample </title>
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<?php
include "connection.php";
if (isset($_POST['submit1'])) {
    $classid = $_POST['txt_classid'];
    $classname = $_POST['txt_class'];
    $ins_sql = "INSERT INTO class(class_id,class_name)
VALUES ('$classid','$classname')";
    $ins_sql_pre = $db->prepare($ins_sql);
    $ins_sql_pre->execute();
}
if (isset($_POST['submit2'])) {
    $classid = $_POST['classid'];
    $student_id = $_POST['stud_id'];
    $stud_name = $_POST['stud_name'];
    $stud_family = $_POST['stud_family'];
    $stud_ave = $_POST['stud_ave'];
    $ins_sql = "INSERT INTO student(stud_id,class_id,name,family,ave)
VALUES ('$student_id','$classid','$stud_name','$stud_family','$stud_ave')";
    $ins_sql_pre = $db->prepare($ins_sql);
    $ins_sql_pre->execute();
}
?>
<div id="wrapper">
    <div id="row1">
        <div id="row1_col1">
            <form action="" method="post">
                <fieldset>
                    <legend>Class</legend>
                    <label>class name:</label>
                    <input type="text" name="txt_class"/> <br/>
                    <label>class id:</label>
                    <input type="text" name="txt_classid"/>
                    <input type="submit" name="submit1" value="insert-class">
                </fieldset>
            </form><!-- form 1-->
            <table border="1">
                <tr>
                    <td>classid</td>
                    <td>class name</td>
                    <td>delete</td>
                    <td>edit</td>
                </tr>

                <?php
                include "connection.php";
                $query = "SELECT * FROM class";
                $result = $db->prepare($query);
                $result->execute();
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    echo "
    <tr>
    <td>" . $row['class_id'] . "</td>
    <td>" . $row['class_name'] . "</td>
    <td><a href='delete.php?id=" . $row['class_id'] . "&page=1'>delete</a></td>
    <td><a href='edit.php?id=" . $row['class_id'] . "&page=1'>edit</a></td>
    </tr>
    ";

                }

                ?>

            </table>
        </div>

        <div id="row1_col2">
            <form action="" method="post">
                <fieldset>
                    <legend>Student</legend>
                    <label>classid</label><br/>
                    <input type="text" name="classid"/><br/>
                    <label>student id</label><br/>
                    <input type="text" name="stud_id"/><br/>
                    <label>name</label><br/>
                    <input type="text" name="stud_name"/><br/>
                    <label>family</label><br/>
                    <input type="text" name="stud_family"/> <br/>
                    <label>average</label><br/>
                    <input type="text" name="stud_ave"/><br/>
                    <input type="submit" name="submit2" value="insert-student"/> <br/>
                </fieldset>

            </form>
            <table border="1">
                <tr>

                    <td>name</td>
                    <td>family</td>
                    <td>average</td>
                    <td>delete</td>
                    <td>edit</td>
                </tr>

                <?php
                include "connection.php";
                $query = "SELECT * FROM student";
                $result = $db->prepare($query);
                $result->execute();
                while ($row = $result->fetch(PDO:: FETCH_ASSOC)) {

                    echo "
    <tr>
    <td>" . $row['name'] . "</td>
    <td>" . $row['family'] . "</td>
    <td>" . $row['ave'] . "</td>
    <td><a href='delete.php?id=" . $row['stud_id'] . "&page=2'>delete</a></td>
    <td><a href='edit.php?id=" . $row['stud_id'] . "&page=2'>edit</a></td>
    </tr>
    ";

                }

                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
