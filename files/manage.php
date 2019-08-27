<?php
include_once('dbconnection.php');

// get students
function getStudents($dbc){
    $query="SELECT * FROM `students` ORDER BY `id` DESC";
    $result = $dbc->query($query);
    $rows=$result->num_rows;
    if ($rows>0) {
        while($row = $result->fetch_assoc())
        {
            $students[]=$row;
        }
    }else{
        $students = array();
    }
    return $students;
    }

// add student
function addStudent($name,$phone,$course, $dbc){
    $add = "INSERT INTO `students` (name, phone, course, date)
    VALUES ('$name','$phone', '$course', Now())";
    if($dbc->query($add) === true ){
        header('location: ../student');
    }else{
        echo "Error: " . $add . "<br>" . $dbc->error;
    }
}

//delete student
function deleteStudent($id, $dbc){
    $delete = "DELETE FROM 	students WHERE id='$id'";
    if($dbc->query($delete) === true ){
        header('location: ../student');
    }else{
        echo "Error: " . $delete . "<br>" . $dbc->error;
    }
}


// update students
function updateStudent($id,$name,$phone,$course,$dbc){
    $update = "UPDATE students SET name='$name',phone='$phone', course='$course' WHERE id='$id'";
    if($dbc->query($update) === true ){
        header('location: ../student');
    }else{
        echo "Error: " . $update . "<br>" . $dbc->error;
    }

}

if(isset($_POST['addstudent'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    addStudent($name,$phone,$course, $dbc);
}

if(isset($_POST['updateStudent'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $id = $_POST['id'];
    updateStudent($id,$name,$phone,$course,$dbc);

}

if(isset($_GET['id'])){
    $del_id = $_GET['id'];
    deleteStudent( $del_id, $dbc);
}


