<?php
require_once("connect.php");
$date = date("d/m/Y"); // Сегодняшняя дата в необходимом формате
$context = stream_context_create(array('http' => array('header' => 'Connection: close\r\n')));
$link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date"; // Ссылка на XML-файл с курсами валют
$content = file_get_contents($link, false, $context); // Скачиваем содержимое страницы
$dom = new domDocument("1.0", "utf8"); // Создаём DOM
$dom->loadXML($content); // Загружаем в DOM XML-документ
$root = $dom->documentElement; // Берём корневой элемент
$childs = $root->childNodes; // Получаем список дочерних элементов
$data = array(); // Набор данных
$childs_length = $childs->length;
for ($i = 0; $i < $childs_length; $i++) {
    $childs_new = $childs->item($i)->childNodes; // Берём дочерние узлы
    $childs_new_length = $childs_new->length;
    for ($j = 0; $j < $childs_new_length; $j++) {
        /* Ищем интересующие нас валюты */
        $el = $childs_new->item($j);
        $code = $el->nodeValue;
        if ($code == "USD")
            $data[] = $childs_new; // Добавляем необходимые валюты в массив
    }
}
/* Перебор массива с данными о валютах */
$len_data = count($data);
for ($i = 0; $i < $len_data; $i++) {
    $list = $data[$i];
    $list_len = $list->length;
    for ($j = 0; $j < $list_len; $j++) {
        $el = $list->item($j);
        if ($el->nodeName == "Value") {
            $mysqli->query("INSERT INTO hyip_rate (dollar_rate) VALUES ('{$el->nodeValue}')");
        }
    }
}