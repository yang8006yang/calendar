<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
</head>
<style>
    *{
            overflow: hidden;
        }
        .mycontainer{
            /* overflow: hidden; */
        }
</style>

<body>
<?php
    /*請在這裹撰寫你的萬年曆程式碼*/

    // 月曆
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

    // 節日
    $holiday = [
        "10-30" => "🎃",
        "12-25" => "🎅",
        "02-05" => "🏮",
        "02-14" => "💌",
        "11-11" => "🛍",
        "10-10" => "🇹🇼",
        "05-01" => "👷",
        "03-08" => "👩",
        "04-04" => "👶",
    ];

    // 冷笑話
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
    // 天干地支
    $a = ['甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'];
    $b = ['子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥'];

    $years4 = [];
    $startYear = 3;

    for ($i = 0; $i < 60; $i++) {
        $years4[$i] = $a[$i % 10] . $b[$i % 12];
    }
    // 生肖
    $animal = ['🐀', '🐄', '🐅', '🐇', '🐉', '🐍', '🐎', '🐏', '🐒', '🐓', '🐕', '🐖'];


?>
    <div class="mycontainer" style="margin-top: 0px;">
        <div class="header">
            <div class="chinessYear">
                <?php echo $years4[($year - $startYear) % 60] . "年"; ?>
            </div>
            <div class="animalyear"><?php
                                    if ($year >= 1912) {
                                        echo $animal[($year - 1912) % 12];
                                    };
                                    ?></div>
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
                };

                if ($day == date("Y-m-d")) {
                    echo "<td id=today>" . substr($day, 8);
                    foreach ($holiday as $key => $value) {
                        if ($key == date("m-d")) {
                            echo $value;
                        }
                    }
                    echo "</td>";
                } else {
                    echo "<td>" . substr($day, 8);
                    foreach ($holiday as $key => $value) {
                        if ($key == substr($day, 5)) {
                            echo $value;
                        };
                    }
                    echo "</td>";
                }

                if ($i % 7 == 6) {
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <div style="display:flex; justify-content: space-between; align-items: flex-start;width:300px;margin: 3rem auto;">
            <a data-bs-toggle="tooltip" title="Prev" href="?y=<?= $pretyear; ?>&m=<?= $prevMonth; ?>"> &lt; &lt; &lt;</a>
            <a href="./index.php">Today</a>
            <a data-bs-toggle="tooltip" title="Next" href="?y=<?= $nextyear; ?>&m=<?= $nextMonth; ?>"> &gt; &gt; &gt;</a>

        </div>
    </div>
</body>

</html>