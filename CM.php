<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            color: #ccc;
            font-weight: bold;
        }

        body {
            background-color: gray;
        }

        .header{
            opacity: 0.3;
            font-size: 120px;
            position: absolute;
            top: 100px;
            left: 20px;
            transform: rotate(330deg);
            z-index: 0;
        }
        .header>div{
            position: absolute;
            top: 1100px;
            left: 700px;

        }



        .mycontainer {
            display: flex;
            justify-content: center;
            align-self: center;
            /* flex-wrap: wrap; */
            /* width: 600px; */
            height: 600px;
            width: 1200px;
            margin: 10rem auto;
            box-shadow: 20px 20px rgb(227, 226, 226, 0.2);
            border: 5px solid #ccc;
            border-radius: 8px;
        }

        table {
            border-collapse: collapse;
            margin: 20px;
            margin-left: 50px;
        }

        table td {
            border: 2px solid #ccc;
            padding: 3px 9px;
            width: 80px;
            transition-duration: 0.5s;
        }

        td:hover {
            transform: scale(1.2);
        }

        #today{
            color: white;
        }

        #today::after{
            color: white; 
            font-weight: 900;
            content: '🌼';
            font-size: large;
        }

        a {
            text-decoration: none;
            color: lightgray;
        }

        tr>td:nth-child(6),
        td:nth-child(7) {
            background-color: rgb(231, 231, 231);
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
            background-color: #ccc;
            color: black;
            text-align: center;
            border-radius: 5px;

        }

        #demo>p{
            text-align: start;
            color: gray;
            font-weight: 900;
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
        $prevMonth = $month-1;
        $pretyear=$year;

        $nextMonth =1;
        $nextyear =$year+1;
    };
    if ($month == 1) {
        $prevMonth = 12;
        $pretyear=$year-1;

        $nextMonth =$month+1;
        $nextyear =$year;
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
    }

    $joke = [
        '媽媽弄丟了一個東西，為什麼媽媽還特別高興?
        答:她丟掉了壞習慣',
        '什麼把刀塗成藍色的槍就會很憂鬱?
        答:刀槍不入(BLUE)',
        '什麼時候二加一會不等於三?
        答:算錯的時候',
        '人最怕屁股上有什麼東西?
        答:一屁股債',
        '有十隻羊，九隻蹲在羊圈，一隻蹲在豬圈?
        答:抑揚頓挫(一羊蹲錯)',
        '羊打電話給老鷹，老鷹接起電話說"喂"?
        答:陽奉陰違(羊PHONE鷹"喂")',
        '古人為什麼要臥冰求鯉?
        答:彬彬有禮(冰冰有鯉)',
        '蔣公如果還在世的話，世界會怎樣?
        答:多一個人',
        '芥末生日是哪一天?
        答:世界末日(是芥末日)',
        '汽車會飛，猜一種飲料?
        答:咖啡 (Car飛)',
        '什麼東西在倒立之後會增加一半?
        答:六(6)',
        '地震的時候，在什麼地方最安全?
        答:在飛機上'
    ];



    ?>
    <div class="header">CALENDAR
        <div>CALENDAR</div>
    </div>
    <div class="mycontainer">

        <div style="display:flex;width:80%;justify-content:space-around;flex-direction: column;width:300px; margin: 5px;">
            <div style="height: 200px;"></div>
            <h1><?= $year; ?><br>
                <pre> /</pre>
                <?= $m ?>
            </h1>
            <?php echo "<pre style='width: auto;height: 50px;'>" . $joke[rand(0, 11)] . "</pre>"; ?>
            <div style="height: 150px;"></div>
            <div style="display:flex; justify-content: space-between; align-items: flex-start;width:300px">
                <!-- <a href="" style="width: 50px;"></a> -->
                <a href="?y=<?= $pretyear; ?>&m=<?= $prevMonth; ?>"> &lt; &lt; &lt;</a>
                <a href="./CM.php">Today</a>
                <a href="?y=<?= $nextyear; ?>&m=<?= $nextMonth; ?>"> &gt; &gt; &gt;</a>
                <!-- <a href="" style="width: 5px;"></a> -->
            </div>
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
                    echo "<td id=today>".substr($day,8)."</td>";
                } else {
                    
                    echo "<td>".substr($day,8)."</td>";
                }

                if ($i % 7 == 6) {
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
    <div>
        <a href="#demo" data-bs-toggle="collapse" class="circle">
            <p id="p">查</p>
        </a>
        <div id="demo" class="collapse collapse-horizontal">
        <br><br>
            <form action="CM.php" method="get">
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
    </div>

</body>

</html>