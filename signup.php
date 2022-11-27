<?php

$host = 'localhost';
$user = 'seokbangguri';
$pw = '1234';
$dbName = 'todaysoccer';
$con = new mysqli($host, $user, $pw, $dbName);

$userID = $_POST['userID']; // 아이디
$userPassword = $_POST['userPassword']; // 패스워드
$userName = $_POST['userName'];
$userMobile = $_POST['userMobile'];

if($userID==NULL || $userPassword==NULL || $userName==NULL || $userMobile==NULL)
{
    echo "<script>alert('빈 칸을 모두 채워주세요');</script>";
    echo "<script> location.href = '../todaysoccer/signup.html'; </script>";
}
$check="select * from user where userID = '$userID'";
$compare=mysqli_query($con,$check);
if($compare->num_rows==1)
{
    echo "<script>alert('중복된 아이디입니다.');</script>";
    echo "<script> location.href = '../todaysoccer/signup.html'; </script>";
}
else
{
    $query = "insert into user(userid,userPassword,userName,userMobile) values('$userID','$userPassword','$userName','$userMobile')";
    $signup = mysqli_query($con, $query);
    if($signup)
    {
        echo "<script>alert('회원가입 완료!');</script>";
        echo "<script> location.href = '../todaysoccer/login.html'; </script>";
    }
}
?>