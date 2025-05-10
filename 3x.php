<?php

// 1. Создайте строку с текстом
$text = 'Пароль: P@ssw0rd<br>Email: test@example.com<br>Телефон: +7(999)123-45-67';

// 2. Проверьте пароль на соответствие требованиям
$pattern = "/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
$password = "P@ssw0rd";
print('Пароль ' . ($password ? 'соответствует' : 'не соответствует') . ' требованиям<br>');

// 3. Найдите все email адреса
$pattern = "/[\w.-]+@[\w.-]+\.\w+/";
$emails = [];
preg_match_all($pattern, $text, $emails);
print('Найдены email: ' . implode(', ', $emails[0]) . '<br>');

// 4. Замените все телефоны на "Номер скрыт"
$pattern = "/\+7\(\d{3}\)\d{3}-\d{2}-\d{2}/";
$new_text = preg_replace($pattern, 'Номер скрыт', $text);
print('<br>Текст после замены телефонов:<br>');
print($new_text);