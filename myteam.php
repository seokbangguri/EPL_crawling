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

$query = "select cheerteam from user where userID='$userID'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$myteam = $row['cheerteam'];

switch($myteam){
    case '아스널':
        $cteam = 'Arsenal';
        $imgsrc = '../todaysoccer/eplimg/ars.svg';
        break;
    case '맨시티':
        $cteam = 'Manchester City';
        $imgsrc = '../todaysoccer/eplimg/mac.svg';
        break;
    case '토트넘':
        $cteam = 'Tottenham Hotspur';
        $imgsrc = '../todaysoccer/eplimg/tot.svg';
        break;
    case '맨유':
        $cteam = 'Manchester United';
        $imgsrc = '../todaysoccer/eplimg/mau.svg';
        break;
    case '뉴캐슬':
        $cteam = 'Newcastle United';
        $imgsrc = '../todaysoccer/eplimg/new.svg';
        break;
    case '첼시':
        $cteam = 'Chelsea';
        $imgsrc = '../todaysoccer/eplimg/che.svg';
        break;
    case '리버풀':
        $cteam = 'Liverpool';
        $imgsrc = '../todaysoccer/eplimg/liv.svg';
        break;
    case '브라이턴':
        $cteam = 'Brighton and Hove Albion';
        $imgsrc = '../todaysoccer/eplimg/bri.svg';
        break;
    case '풀럼':
        $cteam = 'Fulham';
        $imgsrc = '../todaysoccer/eplimg/ful.svg';
        break;
    case '브렌트퍼드':
        $cteam = 'Brentford';
        $imgsrc = '../todaysoccer/eplimg/bre.svg';
        break;
    case '크리스탈 팰리스':
        $cteam = 'Crystal Palace';
        $imgsrc = '../todaysoccer/eplimg/crs.svg';
        break;
    case '애스턴 빌라':
        $cteam = 'Aston Villa';
        $imgsrc = '../todaysoccer/eplimg/ast.svg';
        break;
    case '레스터 시티':
        $cteam = 'Leicester City';
        $imgsrc = '../todaysoccer/eplimg/les.svg';
        break;
    case '본머스':
        $cteam = 'Bournemouth';
        $imgsrc = '../todaysoccer/eplimg/bon.svg';
        break;
    case '리즈':
        $cteam = 'Leeds United';
        $imgsrc = '../todaysoccer/eplimg/lee.svg';
        break;
    case '웨스트햄':
        $cteam = 'West Ham United';
        $imgsrc = '../todaysoccer/eplimg/wes.svg';
        break;
    case '에버턴':
        $cteam = 'Everton';
        $imgsrc = '../todaysoccer/eplimg/eve.svg';
        break;
    case '노팅엄':
        $cteam = 'Nottingham Forest';
        $imgsrc = '../todaysoccer/eplimg/not.svg';
        break;
    case '사우스햄튼':
        $cteam = 'Southampton';
        $imgsrc = '../todaysoccer/eplimg/sou.svg';
        break;
    case '울브스':
        $cteam = 'Wolverhampton Wanderers';
        $imgsrc = '../todaysoccer/eplimg/wol.svg';
        break;
}

$search = "select * from ranking where team = '$cteam'";
$answer = mysqli_query($con, $search);
$ans = mysqli_fetch_array($answer);
$rank = $ans['rank'];
$won = $ans['won'];
$draw = $ans['draw'];
$lost = $ans['lost'];
$gf = $ans['gf'];
$ga = $ans['ga'];
$gd = $ans['gd'];
$points = $ans['points'];

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
            <div id="myteam">
                <img id="cteamlogo" src="<?php echo $imgsrc;?>">
                <?php
                if($myteam==null){
                    echo "<h2>응원팀을 설정하여 주십시오.";
                }
                else{
                echo "<h3>".$myteam." 순위 : ".$rank."</h3>";
                echo "<h4>".$won."승 ".$draw."무 ".$lost."패</h4>";
                echo "<h4>골 : ".$gf." 실점 : ".$ga." 골득실 : ".$gd." 승점 : ".$points;
                }
                ?>
            </div>
            <hr>
            <div id="news">
                <table id="newstable">
                    <thead>
                        <tr>
                            <th>날짜</th>
                            <th>제목</th>
                            <th>뉴스</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $news = "select date,name,link,brand from news where team = '$cteam'";
                            $newssearch = mysqli_query($con,$news);
                            $gang = mysqli_fetch_array($newssearch);

                            while($gang = mysqli_fetch_array($newssearch)) {
                                echo "<tr><td>".$gang['date']."</td><td><a href=".$gang['link'].">".$gang['name']."</a></td><td>".$gang['brand']."</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
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