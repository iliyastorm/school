<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title> School Database Sample </title>
    <link href="css/style.css" rel="stylesheet"/>
</head>

<body>
<div id="wrapper">
    <div id="row1">
        <div id="row1_col1">
            <form action="" method="post">
                <fieldset>
                    <legend>Class</legend>
                    <label>class name:</label>
                    <input type="text" name="txt_class"/>
                    <input type="submit" name="submit1" value="inser-class">
                </fieldset>
            </form><!-- form 1-->
            <table border="1">
                <tr>
                    <td>classid</td>
                    <td>class name</td>
                </tr>

                <?php
                include "connection.php";
                $query = "SELECT * FROM class";
                $result = $db->prepare($query);
                $result->execute();
                while ($row = $result->fetch(PDO:: FETCH_ASSOC)) {

                    echo "
    <tr>
    <td>" . $row['class_id'] . "</td>
    <td>" . $row['class_name'] . "</td>
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
                    <label>name</label>
                    <input type="text" name="stud_name"/><br/>
                    <label>family</label><br/>
                    <input type="text" name="stud_family"/> <br/>
                    <label average </label><br/>
                    <input type="text" name="stud_ave"/><br/>
                    <input type="submit" name="submit1" value="inser-student"/>
                </fieldset>

            </form>
            <table border="1">
                <tr>

                    <td>name</td>
                    <td>family</td>
                    <td>average</td>
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





