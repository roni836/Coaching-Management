<?php
$connect = new mysqli("localhost","root","","ecoach");

session_start();

if($connect->connect_error){
    echo "Failed";
}

function redirect($page){
    echo "<script>window.open('$page','_self')</script>";
}

function alert($msg){
    echo "<script>alert('$msg')</script>";
}

function insertData($table,$data){
    global $connect;
    $col = implode(",",array_keys($data));
    $values = implode("','",array_values($data));

    $q = $connect->query("INSERT INTO $table($col) values('$values')");

    return $q;
}

function callingData($table,$cond=NULL){
    global $connect;

    if($cond==NULL){
        $query = "SELECT * FROM $table";
    }
    else{
        $query = "SELECT * FROM $table WHERE $cond";
    }
    $q = $connect->query($query);
    $data = $q->fetch_all(MYSQLI_ASSOC);

    return $data;
}

function deleteRecord($table,$cond){
   global $connect;
   $query = $connect->query("DELETE FROM $table WHERE $cond");
   
   return $query;
}

function countRecords($table,$cond=NULL){
    global $connect;

    if($cond==NULL){
        $q = "SELECT * FROM $table";

    }
    else{
        $q = "SELECT * FROM $table WHERE $cond";
    }
    $result = $connect->query($q);
    $count = $result->num_rows;

    return $count;
}

// students approve

function approveStudent($roll){
    global $connect;
    $query = $connect->query("UPDATE students SET status='1' WHERE roll='$roll' AND status='0'");

    return $query;
}

// student disabled
function disableStudent($roll){
    global $connect;
    $query = $connect->query("UPDATE students SET status='2' WHERE roll='$roll' AND status='1'");

    return $query;
}
// Check if Admin loggin OR Not

function checkAdmin(){
    if(!isset($_SESSION['admin'])){
        redirect('login.php');
    }
}

function getUser(){
    global $connect;
    if(!isset($_SESSION['student'])){
        redirect("login.php");
    }
    $email = $_SESSION['student'];

    $user = callingData("students","email = '$email'");
    return $user[0];
}

// 

