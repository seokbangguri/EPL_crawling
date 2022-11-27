<?php
session_start();

$host = 'localhost';
$user = 'seokbangguri';
$pw = '1234';
$dbName = 'todaysoccer';
$con = new mysqli($host, $user, $pw, $dbName);

$userID = $_POST['userID']; // 아이디
$userPassword = $_POST['userPassword']; // 패스워드

$query = "select * from user where userID='$userID' and userPassword='$userPassword'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if($userID==NULL || $userPassword==NULL)
{
    echo "<script>alert('빈 칸을 모두 채워주세요');</script>";
    echo "<script> location.href = '../todaysoccer/login.html'; </script>";
}

if($userID==$row['userID'] && $userPassword==$row['userPassword']){ // id와 pw가 맞다면 login

    $_SESSION['is_logged'] = 'YES';
    $_SESSION['userID']=$userID;
	echo "<script> location.href = '../todaysoccer/index.php'; </script>";

}else{ // id 또는 pw가 다르다면 admin_login 폼으로

    $_SESSION['is_logged'] = 'NO';
    $_SESSION['userID']='';
    echo "<script> alert('로그인 실패'); </script>";
    echo "<script> location.href = '../todaysoccer/login.html'; </script>";

}

?>