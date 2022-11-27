<?php
    session_start();
    $is_logged = $_SESSION['is_logged'];
    if($is_logged=='YES'){
        $userID = $_SESSION['userID'];
    }
    if($is_logged=='NO'){
        echo "<script>alert('세션이 만료되었습니다. 다시 로그인 해주세요.');</script>";
        echo "<script> location.href = '../todaysoccer/login.html'; </script>";
    }
    var_dump($_SESSION);

$con = new mysqli('localhost', 'seokbangguri', '1234', 'todaysoccer');

$query = "select userName,cheerteam from user where userID='$userID'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$myteam = $row['cheerteam'];
$userName = $row['userName'];

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../todaysoccer/style.css">
    <link rel="shortcut icon" href="../todaysoccer/img/fabicon.ico">
    <title>TodaySoccer</title>
    
</head>
<body>
    <div id="nav">
        <img class="logo" src="../todaysoccer/img/TODAYSOCCER_LOGO.png">
    </div>
    <div id="container">
        <div id="ranking">
            <div id="user">
                <?php
                    echo "<h2>".$userName."</h2><h4>  ID : ".$userID."<h4>";
                ?>
            </div>
            <div id="cheer">
                <?php
                    echo "<h1>응원 팀 : ".$myteam."</h1>";
                ?>
                <form action="../todaysoccer/cheerteamchange.php" method="post" enctype="multipart/form-data">
                    <select name="cheerteam">
                        <option value="아스널">아스널</option>
                        <option value="맨시티">맨시티</option>
                        <option value="토트넘">토트넘</option>
                        <option value="맨유">맨유</option>
                        <option value="뉴캐슬">뉴캐슬</option>
                        <option value="첼시">첼시</option>
                        <option value="리버풀">리버풀</option>
                        <option value="브라이턴">브라이턴</option>
                        <option value="풀럼">풀럼</option>
                        <option value="브렌트퍼드">브렌트퍼드</option>
                        <option value="크리스탈 팰리스">크리스탈 팰리스</option>
                        <option value="애스턴 빌라">애스턴 빌라</option>
                        <option value="레스터 시티">레스터 시티</option>
                        <option value="본머스">본머스</option>
                        <option value="리즈">리즈</option>
                        <option value="웨스트햄">웨스트햄</option>
                        <option value="에버턴">에버턴</option>
                        <option value="노팅엄">노팅엄</option>
                        <option value="사우스햄튼">사우스햄튼</option>
                        <option value="울브스">울브스</option>
                    </select>
                    <input type="submit" value="응원 팀 변경하기">
                </form>
                
            </div>
        </div>
    </div>
    <div id="bottomnav">
        <div id="bottomimg">
            <a href="../todaysoccer/index.php"><img id="img1" src="../todaysoccer/img/podium.png"></a>
            <a href="../todaysoccer/myteam.php"><img id="img2" src="../todaysoccer/img/management.png"></a>
            <a href="../todaysoccer/user.php"><img id="img3" src="../todaysoccer/img/user.png"></a>
        </div>
        <div id="bottomtext">
            <p>홈</p>
            <p>응원 팀</p>
            <p>내정보</p>
        </div>
    </div>
</body>
</html>
