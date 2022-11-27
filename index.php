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

            switch($myteam){
                case 'Arsenal':
                    $cteam = '아스널';
                    $imgsrc = '../todaysoccer/eplimg/ars.svg';
                    break;
                case 'Manchester City':
                    $cteam = '맨시티';
                    $imgsrc = '../todaysoccer/eplimg/mac.svg';
                    break;
                case 'Tottenham Hotspur':
                    $cteam = '토트넘';
                    $imgsrc = '../todaysoccer/eplimg/tot.svg';
                    break;
                case 'Manchester United':
                    $cteam = '맨유';
                    $imgsrc = '../todaysoccer/eplimg/mau.svg';
                    break;
                case 'Newcastle United':
                    $cteam = '뉴캐슬';
                    $imgsrc = '../todaysoccer/eplimg/new.svg';
                    break;
                case 'Chelsea':
                    $cteam = '첼시';
                    $imgsrc = '../todaysoccer/eplimg/che.svg';
                    break;
                case 'Liverpool':
                    $cteam = '리버풀';
                    $imgsrc = '../todaysoccer/eplimg/liv.svg';
                    break;
                case 'Brighton and Hove Albion':
                    $cteam = '브라이턴';
                    $imgsrc = '../todaysoccer/eplimg/bri.svg';
                    break;
                case 'Fulham':
                    $cteam = '풀럼';
                    $imgsrc = '../todaysoccer/eplimg/ful.svg';
                    break;
                case 'Brentford':
                    $cteam = '브렌트퍼드';
                    $imgsrc = '../todaysoccer/eplimg/bre.svg';
                    break;
                case 'Crystal Palace':
                    $cteam ='크리스탈 팰리스' ;
                    $imgsrc = '../todaysoccer/eplimg/crs.svg';
                    break;
                case 'Aston Villa':
                    $cteam = '애스턴 빌라';
                    $imgsrc = '../todaysoccer/eplimg/ast.svg';
                    break;
                case 'Leicester City':
                    $cteam = '레스터 시티';
                    $imgsrc = '../todaysoccer/eplimg/les.svg';
                    break;
                case 'Bournemouth':
                    $cteam = '본머스';
                    $imgsrc = '../todaysoccer/eplimg/bon.svg';
                    break;
                case 'Leeds United':
                    $cteam = '리즈';
                    $imgsrc = '../todaysoccer/eplimg/lee.svg';
                    break;
                case 'West Ham United':
                    $cteam = '웨스트햄';
                    $imgsrc = '../todaysoccer/eplimg/wes.svg';
                    break;
                case 'Everton':
                    $cteam = '에버턴';
                    $imgsrc = '../todaysoccer/eplimg/eve.svg';
                    break;
                case 'Nottingham Forest':
                    $cteam = '노팅엄';
                    $imgsrc = '../todaysoccer/eplimg/not.svg';
                    break;
                case 'Southampton':
                    $cteam = '사우스햄튼';
                    $imgsrc = '../todaysoccer/eplimg/sou.svg';
                    break;
                case 'Wolverhamton Wanderers':
                    $cteam = '울브스';
                    $imgsrc = '../todaysoccer/eplimg/wol.svg';
                    break;
            }
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
        <table id="ranktable">
            <thead>
                <tr>
                    <th>순위</th>
                    <th>클럽</th>
                    <th>승</th>
                    <th>무</th>
                    <th>패</th>
                    <th>승점</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $conn = mysqli_connect("localhost","seokbangguri","1234","todaysoccer");
        $sql = "select rank,team,won,draw,lost,points from ranking";

        $result = mysqli_query($conn,$sql);


        while($row = mysqli_fetch_assoc($result)) {
            switch($row['team']){
                case 'Arsenal':
                    $cteam = '아스널';
                    $imgsrc = '../todaysoccer/eplimg/ars.svg';
                    break;
                case 'Manchester City':
                    $cteam = '맨시티';
                    $imgsrc = '../todaysoccer/eplimg/mac.svg';
                    break;
                case 'Tottenham Hotspur':
                    $cteam = '토트넘';
                    $imgsrc = '../todaysoccer/eplimg/tot.svg';
                    break;
                case 'Manchester United':
                    $cteam = '맨유';
                    $imgsrc = '../todaysoccer/eplimg/mau.svg';
                    break;
                case 'Newcastle United':
                    $cteam = '뉴캐슬';
                    $imgsrc = '../todaysoccer/eplimg/new.svg';
                    break;
                case 'Chelsea':
                    $cteam = '첼시';
                    $imgsrc = '../todaysoccer/eplimg/che.svg';
                    break;
                case 'Liverpool':
                    $cteam = '리버풀';
                    $imgsrc = '../todaysoccer/eplimg/liv.svg';
                    break;
                case 'Brighton and Hove Albion':
                    $cteam = '브라이턴';
                    $imgsrc = '../todaysoccer/eplimg/bri.svg';
                    break;
                case 'Fulham':
                    $cteam = '풀럼';
                    $imgsrc = '../todaysoccer/eplimg/ful.svg';
                    break;
                case 'Brentford':
                    $cteam = '브렌트퍼드';
                    $imgsrc = '../todaysoccer/eplimg/bre.svg';
                    break;
                case 'Crystal Palace':
                    $cteam ='크리스탈 팰리스' ;
                    $imgsrc = '../todaysoccer/eplimg/crs.svg';
                    break;
                case 'Aston Villa':
                    $cteam = '애스턴 빌라';
                    $imgsrc = '../todaysoccer/eplimg/ast.svg';
                    break;
                case 'Leicester City':
                    $cteam = '레스터 시티';
                    $imgsrc = '../todaysoccer/eplimg/les.svg';
                    break;
                case 'Bournemouth':
                    $cteam = '본머스';
                    $imgsrc = '../todaysoccer/eplimg/bon.svg';
                    break;
                case 'Leeds United':
                    $cteam = '리즈';
                    $imgsrc = '../todaysoccer/eplimg/lee.svg';
                    break;
                case 'West Ham United':
                    $cteam = '웨스트햄';
                    $imgsrc = '../todaysoccer/eplimg/wes.svg';
                    break;
                case 'Everton':
                    $cteam = '에버턴';
                    $imgsrc = '../todaysoccer/eplimg/eve.svg';
                    break;
                case 'Nottingham Forest':
                    $cteam = '노팅엄';
                    $imgsrc = '../todaysoccer/eplimg/not.svg';
                    break;
                case 'Southampton':
                    $cteam = '사우스햄튼';
                    $imgsrc = '../todaysoccer/eplimg/sou.svg';
                    break;
                case 'Wolverhampton Wanderers':
                    $cteam = '울브스';
                    $imgsrc = '../todaysoccer/eplimg/wol.svg';
                    break;
            }
            echo "<tr><td>".$row['rank']."</td><td>".$cteam."</td><td>".$row['won']."</td><td>".$row['draw']."</td><td>".$row['lost']."</td><td>".$row['points']."</td></tr>";
        }
        ?>
            <!--"<tr><td>".$row['rank']."</td><td>".$row['team']."</td><td>".$row['won']."</td><td>".$row['draw']."</td><td>".$row['lost']."</td><td>".$row['gf']."</td><td>".$row['ga']."</td><td>".$row['gd']."</td><td>".$row['points']."</td></tr>"-->
            </tbody>
        </table>
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