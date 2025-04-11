<?php

// 1. Создайте строку с текстом
$text = "Привет, мир!";

// 2. Найдите слово "мир" в тексте
$pattern = "/мир/";
$result = preg_match($pattern, $text);
print('Найдено: ' . ($result ? 'да' : 'нет') . '<br>');

// 3. Попробуйте найти слово "привет" в начале строки
$pattern = "/^привет/";
$result = preg_match($pattern, $text);
print('Найдено в начале: ' . ($result ? 'да' : 'нет') . '<br>');

// 4. Найдите слово "конец" в конце строки
$pattern = "/конец$/";
$result = preg_match($pattern, $text);
print('Найдено в конце: ' . ($result ? 'да' : 'нет') . '<br>');