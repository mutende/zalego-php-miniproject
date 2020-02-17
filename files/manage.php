<?php
include_once('dbconnection.php');
session_start();


function getStudents($dbc){
    $query="SELECT * FROM `students` ORDER BY `id` DESC";
    $result = $dbc->prepare($query);
    $result->execute();
    $rows=$result->rowCount();
    if ($rows>0) {
        while($row = $result->fetchAll())
        {
            $students[]=$row;
        }
    }else{
        $students = array();
    }
    return $students;
    }


function addStudent($name,$phone,$course, $dbc){
    $add = "INSERT INTO `students` (name, phone, course, date)
            VALUES (?,?,?,?)";
    $stmt = $dbc->prepare($add);
    try{
        
        if($stmt->execute([$name,$phone,$course, date('Y-m-d')])){
            header('location: ../student');

        }else{
            $_SESSION["Error"] ="Insertion Failed";
            header('location: ../student');

        }
        
    }catch(ErrorException $e){
        echo 'Erro'. $e->getMessage();
    }
    


}


function deleteStudent($id, $dbc){
    $delete = "DELETE FROM 	students WHERE id=?";
    $pre = $dbc->prepare($delete);    
    if($pre->execute([$id])){
        header('location: ../student');
    }
}


function updateStudent($id,$name,$phone,$course,$dbc){
    $update = "UPDATE `students` SET `name`=?,`phone`=?, `course`=? WHERE `id`=?";
    $pre = $dbc->prepare($update);
    
    if($pre->execute([$name,$phone,$course,$id])){

        header('location: ../student');
    }
}

if(isset($_POST['addstudent'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    if(empty($name) || empty($phone) || empty($course)){
        $_SESSION["Error"] = "Some fields are empty";
        header("Location: ../student");
    }else{

        addStudent($name,$phone,$course, $pdo);

    }
}

if(isset($_POST['updateStudent'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $id = $_POST['id'];

    if(empty($name) || empty($phone) || empty($course)){
        $_SESSION["Error"] = "Some fields are empty";
        header("Location: ../student");
    }else{
    updateStudent($id,$name,$phone,$course,$pdo);
    }

}

if(isset($_GET['id'])){
    $del_id = $_GET['id'];
    deleteStudent( $del_id, $pdo);
}


