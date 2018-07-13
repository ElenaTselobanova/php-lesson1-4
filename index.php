<?php

$link = 'http://api.openweathermap.org/data/2.5/';
$apiKey = '0ed880e3728d3e96b54cf2e148e00152';
$city = 'Novosibirsk';
$apiURL = "http://api.openweathermap.org/data/2.5/find?q=Novosibirsk&type=like&APPID=0ed880e3728d3e96b54cf2e148e00152";

$json = file_get_contents($apiURL) or exit('Не удалось получить данные');
$data = json_decode($json, true) or exit('Ошибка декодирования json');

function checkData($data) {
    if (empty($data)) {
        return 'не удалось получить данные';
    }
    return $data;
}

$temp = round(checkData($data['list']['0']['main']['temp']-272.15));
$temp_min = round(checkData($data['list']['0']['main']['temp_min']-272.15));
$temp_max = round(checkData($data['list']['0']['main']['temp_max']-272.15));
$wind = checkData($data['list']['0']['wind']['speed']);
$cloudness = checkData($data['list']['0']['weather']['0']['main']);
$pressure = round(checkData($data['list']['0']['main']['pressure']*0.750063755419211));
$humidity = checkData($data['list']['0']['main']['humidity']);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание к лекции 1.5 "Стандартные функции"</title>
</head>
<body>
<section>
    <?= "<h1> Температура в $city</h1>"; ?>
    <table>
        <tr>
            <td>Температура</td>
            <td><?= $temp. " °С" ?></td>
        </tr>
        <tr>
            <td>Минимальная температура</td>
            <td><?= $temp_min. " °С" ?></td>
        </tr>
        <tr>
            <td>Максимальная температура</td>
            <td><?= $temp_max. " °С" ?></td>
        </tr>
        <tr>
            <td>Ветер</td>
            <td><?= $wind. " m/s" ?></td>
        </tr>
        <tr>
            <td>Облачность</td>
            <td><?= $cloudness ?></td>
        </tr>
        <tr>
            <td>Давление</td>
            <td><?= $pressure. " mm Hg" ?></td>
        </tr>
        <tr>
            <td>Влажность</td>
            <td><?= $humidity. " %" ?></td>
        </tr>
    </table>
</section>
</body>
</html>