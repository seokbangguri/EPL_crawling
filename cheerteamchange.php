<?php
    session_start();
    $is_logged = $_SESSION['is_logged'];
    if($is_logged=='YES'){
        $userID = $_SESSION['userID'];
    }
    var_dump($_SESSION);

$host = 'localhost';
$user = 'seokbangguri';
$pw = '1234';
$dbName = 'todaysoccer';
$con = new mysqli($host, $user, $pw, $dbName);

$cheerteam = $_POST['cheerteam'];

if($cheerteam==NULL)
{
    echo "<script>alert('팀을 선택하세요.');</script>";
    echo "<script> location.href = '../todaysoccer/user.php'; </script>";
}
else
{
    $query = "update user set cheerteam = '$cheerteam' where userID = '$userID'";
    $signup = mysqli_query($con, $query);
    if($signup)
    {
        echo "<script>alert('응원팀 선택 완료!');</script>";
        echo "<script> location.href = '../todaysoccer/user.php'; </script>";
    }
}
?>