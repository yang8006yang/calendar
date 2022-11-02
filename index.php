<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-weight: bold;
        }

        body {
            background-color: #D6AC8C;
        }

        .mycontainer {
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
            align-self: center;
            /* flex-wrap: wrap; */
            /* width: 600px; */
            height: 1000px;
            width: 800px;
            margin: 5rem auto;
            box-shadow: 20px 20px rgb(0, 0, 0, 0.2);
            background-color: #FFF9F3;
            height: 850px;

        }

        .header {
            display: flex;
            flex-wrap: wrap;
            justify-items: center;
            text-align: center;
        }

        .chinessYear {
            text-align: center;
            writing-mode: vertical-lr;
            border: 2px solid black;
            margin: 20px 50px;
            width: 49px;
            padding: 10px;
        }


        .year {
            text-align: center;
            font-size: large;
            background-color: #D6533E;
            margin-left: 520px;
            margin-right: 30px;
            padding: 15px;
            width: 80px;

        }

        @import url('https://fonts.googleapis.com/css2?family=Secular+One&display=swap');

        .month {
            font-size: 160px;
            font-family: 'Secular One', sans-serif;
            margin-top: 5rem;
            padding-left: 105px;
            width: 700px;
        }

        .monthE {
            background-color: #ccc;
            margin: 0 50px;
            width: 800px;
            font-weight: bolder;
        }

        .joke {

            writing-mode: vertical-lr;
            text-align: start;
            width: 60px;
            height: 300px;
            margin-top: 20px;
            padding: 10px 0;
        }

        .ans{
            display: none;
        }

        .joke:hover .ans{
            display: block;
        }


        table {
            border-collapse: collapse;
            margin: 30px 50px;

        }

        table td {
            /* border: 2px solid #ccc; */
            padding: 3px 9px;
            width: 80px;
            /* text-align: center; */
            transition-duration: 0.5s;
        }

        td:hover {
            transform: scale(1.2);
        }

        #today {
            color: #D6533E;
        }

        #today::after {
            color: white;
            font-weight: 900;
            content: '🌼';
            font-size: large;
        }

        a {
            text-decoration: none;
            color: #784719;
        }

        tr>td:nth-child(6):not(td:nth-child(1)),
        td:nth-child(7) {
            background-color: #F2CF7B;
            color: #000;
        }

        .circle {
            width: 100px;
            height: 100px;
            background-color: white;
            position: absolute;
            top: 450px;
            left: -40px;
            border-radius: 50%;
            transition-duration: 2s;
            text-align: center;

        }

        #p {
            position: relative;
            top: 35px;
            left: 15px;
            z-index: 10;
            font-size: larger;
        }

        #demo {
            position: absolute;
            top: 250px;
            padding: 10px;
            width: 300px;
            height: 300px;
            background-color: white;
            color: black;
            text-align: center;
            border-radius: 5px;

        }

        #demo>p {
            text-align: start;
            color: white;
            font-weight: 900;
        }

        .scene {
            position: relative;
            right: -1200px;
            bottom: 250px;
            transform-style: preserve-3d;
            perspective: 800px;
            perspective-origin: 50% -100px;

            width: 500px;
            height: 500px;
        }

        .cube {
            position: relative;
            left: 280px;
            top: 30px;
            width: 100px;
            height: 100px;
            transform-style: preserve-3d;
            /* backface-visibility: visible; */
        }

        .side {
            position: absolute;
            width: 100px;
            height: 100px;
            background-color: #E6A96D;
            border: 1px solid white;
        }

        .back {
            transform: translateZ(-50px)
        }

        .left {
            transform: translateX(-50px) rotateY(-90deg);
        }

        .right {
            transform: translateX(50px) rotateY(90deg);
        }

        .top {
            transform: translateY(-50px) rotateX(90deg);
            background-color: transparent;
            transform-style: preserve-3d;
        }

        .top div {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            transition: 1s;
        }

        .top .topl {
            left: 0;
            background-color: #E6A96D;
            width: 50px;
            transform-origin: 0;

        }

        .cube:hover .topl {
            transform: rotateY(-135deg);
        }

        .topr {
            transition: 1s;
            background-color: #E6A96D;
            width: 50px;
            right: 0;
            transform-origin: right;
        }

        .cube:hover .topr {
            transform: rotateY(135deg);
        }

        .bottom {
            transform: translateY(50px) rotateX(-90deg);
            box-shadow: 5px -15px 15px rgba(0, 0, 0, 0.4);
        }


        .front {
            transform: translateZ(50px);
            text-align: center;
            padding-top: 40%;
        }

        .cube .text {
            width: 100px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            transition: 0.6s;
        }

        .cube:hover .text {
            transform: translateY(-60px);
        }
    </style>
</head>

<body>
    <?php
    $cal = [];

    $month = (isset($_GET['m'])) ? $_GET['m'] : date("n");
    $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y");

    $nextMonth = $month + 1;
    $prevMonth = $month - 1;
    $nextyear = $year;
    $pretyear = $year;


    if ($month == 12) {
        $prevMonth = $month - 1;
        $pretyear = $year;

        $nextMonth = 1;
        $nextyear = $year + 1;
    };
    if ($month == 1) {
        $prevMonth = 12;
        $pretyear = $year - 1;

        $nextMonth = $month + 1;
        $nextyear = $year;
    }


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

    $joke = [
        '媽媽弄丟了一個東西，為什麼媽媽還特別高興?
         <span class="ans">答 : 她丟掉了壞習慣</span>',
        '什麼把刀塗成藍色的槍就會很憂鬱?
         <span class="ans">答 : 刀槍不入(BLUE)</span>',
        '什麼時候二加一會不等於三?
         <span class="ans">答 : 算錯的時候</span>',
        '人最怕屁股上有什麼東西?
         <span class="ans">答 : 一屁股債</span>',
        '有十隻羊，九隻蹲在羊圈，一隻蹲在豬圈?
         <span class="ans">答 : 抑揚頓挫(一羊蹲錯)</span>',
        '羊打電話給老鷹，老鷹接起電話說"喂"?
         <span class="ans">答 : 陽奉陰違(羊PHONE鷹"喂")</span>',
        '古人為什麼要臥冰求鯉?
         <span class="ans">答 : 彬彬有禮(冰冰有鯉)</span>',
        '蔣公如果還在世的話，世界會怎樣?
         <span class="ans">答 : 多一個人</span>',
        '芥末生日是哪一天?
         <span class="ans">答 : 世界末日(是芥末日)</span>',
        '汽車會飛，猜一種飲料?
         <span class="ans">答 : 咖啡 (Car飛)</span>',
        '什麼東西在倒立之後會增加一半?
         <span class="ans">答 : 六(6)</span>',
        '地震的時候，在什麼地方最安全?
         <span class="ans">答 : 在飛機上</span>'
    ];

    $a = ['甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'];
    $b = ['子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥'];

    $years4 = [];
    $startYear = 1024;

    for ($i = 0; $i < 60; $i++) {
        $years4[$i] = $a[$i % 10] . $b[$i % 12];
    }
    ?>

    <div class="mycontainer">

        <div class="header">
            <div class="chinessYear">
                <?php echo $years4[($year - $startYear) % 60] . "年"; ?></div>
            <div class="year"><br><?= $year; ?></div>
            <div class="month"><?= $M ?></div>
            <div class="joke">
                <?php echo  $joke[rand(0, 11)] ?>
            </div>
            <div class="monthE"><?= $m ?></div>
        </div>

        <table>
            <tr style="text-align: center;height: 50px;">
                <td>Mon</td>
                <td>Tue</td>
                <td>Wed</td>
                <td>Thu</td>
                <td>Fri</td>
                <td>Sat</td>
                <td>Sun</td>
            </tr>
            <?php
            foreach ($cal as $i => $day) {
                if ($i % 7 == 0) {
                    echo "<tr>";
                }
                if ($day == date("Y-m-d")) {
                    echo "<td id=today>" . substr($day, 8) . "</td>";
                } else if ($day == "$year-10-30"){
                    echo "<td>30🎃</td>";
                } else  if ($day == "$year-12-25"){
                    echo "<td>25🎅</td>";
                } else if ($day == "$year-02-05"){
                    echo "<td>05🏮</td>";
                }else if ($day == "$year-01-01"){
                    echo "<td>01🕛</td>";
                }else if ($day == "$year-02-14"){
                    echo "<td>14💌</td>";
                }else{
                    echo "<td>" . substr($day, 8) . "</td>";
                }

                if ($i % 7 == 6) {
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <div style="display:flex; justify-content: space-between; align-items: flex-start;width:300px;margin: 3rem auto; ">
            <a href="?y=<?= $pretyear; ?>&m=<?= $prevMonth; ?>"> &lt; &lt; &lt;</a>
            <a href="./index.php">Today</a>
            <a href="?y=<?= $nextyear; ?>&m=<?= $nextMonth; ?>"> &gt; &gt; &gt;</a>

        </div>
    </div>
    <div>
        <a href="#demo" data-bs-toggle="collapse" class="circle">
            <p id="p">查</p>
        </a>
        <div id="demo" class="collapse collapse-horizontal">
            <br><br>
            <form action="index.php" method="get">
                <div style="color: #000; font-size:24px; background-color: white; border-radius: 5px;">月份查詢</div>
                <br>
                <div style="color: #000;">年 : <input type="number" name="y" id="" min="1" style="width: 200px;"></div>
                <div style="color: #000;">月 : <input type="number" name="m" id="" max="12" min="1" style="width: 200px;"></div>
                <br>
                <div><input type="submit" value="submit" id=""></div>
            </form>
            <br>
            <p>X</p>
        </div>
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
                <div class="side front">HELLO</div>
                <div class="text">©2022 🐑 JingHan</div>
            </div>
        </div>

</body>

</html>