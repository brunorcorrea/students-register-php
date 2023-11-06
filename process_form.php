<?php
$students_data = array();

if (file_exists('students.txt')) {
    $students_data = unserialize(file_get_contents('students.txt'));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($students_data) {
        for ($i = 0; $i < count($students_data); $i++) {
            if ($students_data[$i]['student_id'] === $_POST['student_id']) {
                echo "Student ID already exists!";
                exit();
            }
        }
    }

    $new_student = array(
        'student_id' => $_POST['student_id'],
        'name' => $_POST['name'],
        'gender' => $_POST['gender'],
        'age' => $_POST['age'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email']
    );

    $students_data[] = $new_student;
    file_put_contents('students.txt', serialize($students_data));

    echo "Student successfully registered!";
    echo "<br>";
    echo "<a href='index.html'>Back to register form!</a>";
    echo "<br>";
    echo "<a href='students.php'>List Students!</a>";
}
