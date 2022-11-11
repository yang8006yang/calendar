<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calander</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <style>
        body{
            overflow: hidden;
        }
        .time {
            position: fixed;
            top: 620px;
            width: 60px;
            height: 200px;
            background-color: white;
            border-radius: 0 10px 10px 0;
            writing-mode: vertical-lr;
            text-align: center;
            font-size: 26px;
        }
    </style>
</head>

<body onload="ShowTime()">
    <?php
    /*請在這裹撰寫你的萬年曆程式碼*/

    // 月曆
    $cal = [];

    $month = (isset($_GET['m'])) ? $_GET['m'] : date("n");
    $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y");


    $firstDay = $year . "-" . $month . "-1";
    $firstDayWeek = date("N", strtotime($firstDay));
    $monthDays = date("t", strtotime($firstDay));
    $lastDay = $year . '-' . $month . '-' . $monthDays;
    $spaceDays = $firstDayWeek - 1;
    $weeks = ceil(($monthDays + $spaceDays) / 7);

    for ($i = 0; $i < $spaceDays; $i++) {
        $cal[] = '';
    }

    for ($i = 0; $i < $monthDays; $i++) {
        $cal[] = date("Y-m-d", strtotime("+$i days", strtotime($firstDay)));
        $m = date("M", strtotime("+$i days", strtotime($firstDay)));
        $M = date("m", strtotime("+$i days", strtotime($firstDay)));
    }
    ?>

    <div class="mycontainer">
       <iframe src="./cal.php" frameborder="0" width="800px" height="1000px" style="overflow: hidden;"></iframe>
    </div>
    <!-- search -->
    <div>
        <a href="#demo" data-bs-toggle="collapse" class="circle">
            <p id="p"><i class="fa-solid fa-magnifying-glass"></i></p>
        </a>
        <div id="demo" class="collapse collapse-horizontal">
            <br><br>
            <form action="index.php" method="get">
                <div style="color: #000; font-size:24px; background-color: white; border-radius: 5px;">月份查詢</div>
                <br>
                <div style="color: #000;">年 : <input type="number" name="y" id="" max="4000" min="1912" style="width: 200px;"></div>
                <div style="color: #000;">月 : <input type="number" name="m" id="" max="12" min="1" style="width: 200px;"></div>
                <br>
                <div><input type="submit" value="submit" id=""></div>
            </form>
            <br>
        </div>
    </div>
    <!-- TODO -->
    <div class="offcanvas offcanvas-end" id="todo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">To-Do List</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="addtodo row">
                <input type="text" class="form-control col me-2" id="myInput" placeholder="Things to do..." required>
                <button type="submit" class="btn btn-outline-dark col-sm-3 addBN" id="" onclick="newElement()"><i class="fa-solid fa-plus"></i></button>
            </div>
            <ul id='myUL' class="p-3">
            </ul>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="circler" type="button" data-bs-toggle="offcanvas" data-bs-target="#todo">
            <i class="fa-regular fa-note-sticky" style="padding-top: 40px;padding-left: 25px;"></i>
        </div>
    </div>
    <!-- 時間 -->
    <div class="time" id="showbox">
    </div>

    <!-- 箱子 -->
    <div class="scene">
        <div class="cube">
            <div class="side back"></div>
            <div class="side left"></div>
            <div class="side right"></div>
            <div class="side top">
                <div class="side topl"></div>
                <div class="side topr"></div>
            </div>
            <div class="side bottom"></div>
            <div class="side front">Welcome</div>
            <div class="text">©2022 🐑 JingHan</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        function ShowTime() {
            var NowDate = new Date();
            var h = NowDate.getHours();
            var m = NowDate.getMinutes();
            var s = NowDate.getSeconds();
            document.getElementById('showbox').innerHTML = h + ':' + m + ':' + s ;
            setTimeout('ShowTime()', 1000);
        }
    </script>
    <script src="./todo.js"> </script>
</body>

</html>