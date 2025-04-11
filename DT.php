<?php

// 1. Создайте строку с текстом
$text = 'Дата: 31.12.2022<br>Тег: <div class="test">Content</div><br>Карта: 4111 1111 1111 1111';

// 2. Проверьте дату на корректность формата ДД.ММ.ГГГГ
$pattern = "/^(0[1-9]|[12][0-9]|3[01])\.(0[1-9]|1[0-2])\.(19|20)\d{2}$/";
$date = "31.12.2022";
$isDateValid = preg_match($pattern, $date);
print('Дата ' . ($isDateValid ? 'корректна' : 'некорректна') . '<br>');

// 3. Найдите все HTML-теги
$pattern = "/<([a-zA-Z][a-zA-Z0-9]*)(\s[^>]*)?>([\s\S]*?)<\/\\1>|<([a-zA-Z][a-zA-Z0-9]*)(\s[^>]*)?\/?>/";
$tags = [];
preg_match_all($pattern, $text, $tags);
print('Найдены теги: ' . implode(', ', $tags[0]) . '<br>');

// 4. Проверьте номер кредитной карты
function isValidCreditCard($number) {
    $number = preg_replace('/\D/', '', $number);
    return preg_match('/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|6(?:011|5[0-9]{2})[0-9]{12}|(?:2131|1800|35\d{3})\d{11})$/',
               $number) 
           && checkLuhn($number);
}

function checkLuhn($number) {
    $sum = 0;
    $length = strlen($number);
    for ($i = 0; $i < $length; $i++) {
        $digit = (int)$number[$length - 1 - $i];
        $sum += ($i % 2 === 0) ? $digit : (($digit * 2 > 9) ? $digit * 2 - 9 : $digit * 2);
    }
    return ($sum % 10 === 0);
}

$card = "4111 1111 1111 1111";
$isCardValid = isValidCreditCard($card);
print('Номер карты ' . ($isCardValid ? 'валиден' : 'невалиден') . '<br>');

// 5. Выведите исходный текст
print('<br>Исходный текст:<br>');
print($text);