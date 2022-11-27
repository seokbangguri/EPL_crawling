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
        <img class="logo" src="../todaysoccer/img/TodaySoccer.png">
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
                    <th>득점</th>
                    <th>실점</th>
                    <th>골득실</th>
                    <th>승점</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $conn = mysqli_connect("localhost","seokbangguri","1234","todaysoccer");
        $sql = "select rank,team,won,draw,lost,points from ranking";

        $result = mysqli_query($conn,$sql);
        //echo "rank | team                     | won  | draw | lost | gf   | ga   | gd   | points<br>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['rank']."</td><td>".$row['team']."</td><td>".$row['won']."</td><td>".$row['draw']."</td><td>".$row['lost']."</td><td>".$row['gf']."</td><td>".$row['ga']."</td><td>".$row['gd']."</td><td>".$row['points']."</td></tr>";
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
    </div>
</body>
</html>