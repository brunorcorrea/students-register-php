<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>List_Students</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/students.css">
</head>
<body>

<div id="menu">
    <ul>
        <li><a href="index.html">Register Students</a></li>
    </ul>
</div>

<div id="content">
    <h1>List Students ordering by ID</h1>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>

        <?php
        $students_data = array();
        if (file_exists('students.txt')) {
            $students_data = unserialize(file_get_contents('students.txt'));
            if ($students_data) {
                function compareById($a, $b)
                {
                    return $a['student_id'] - $b['student_id'];
                }

                usort($students_data, 'compareById');

                foreach ($students_data as $student) {
                    echo "<tr>";
                    echo "<td>" . $student['student_id'] . "</td>";
                    echo "<td>" . $student['name'] . "</td>";
                    echo "<td>" . $student['gender'] . "</td>";
                    echo "<td>" . $student['age'] . "</td>";
                    echo "<td>" . $student['address'] . "</td>";
                    echo "<td>" . $student['phone'] . "</td>";
                    echo "<td>" . $student['email'] . "</td>";
                    echo "</tr>";
                }
            }

        }
        ?>
    </table>
</div>
</body>
</html>
