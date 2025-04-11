<?php

// 1. Создайте строку с текстом
$text = 'Телефон: +7(999)123-45-67<br>Email: test@example.com';

// 2. Найдите все цифры в тексте
$pattern = "/\d/";
$numbers = [];
preg_match_all($pattern, $text, $numbers);
print('Найдены цифры: ' . implode(', ', $numbers[0]) . '<br>');

// 3. Найдите все буквы
$pattern = "/[a-zA-Zа-яА-Я]/";
$letters = [];
preg_match_all($pattern, $text, $letters);
print('Найдены буквы: ' . implode(', ', $letters[0]) . '<br>');

// 4. Найдите все спецсимволы
$pattern = "/[^a-zA-Zа-яА-Я0-9\s]/";
$symbols = [];
preg_match_all($pattern, $text, $symbols);
print('Найдены спецсимволы: ' . implode(', ', $letters[0]) . '<br>');
