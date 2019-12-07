<?php
// Включаем режим строгой типизация
declare(strict_types = 1);
error_reporting(E_ALL);

/**
 * Возвращает результат сложения двух строковых представлений чисел (integer и / или float)
 *
 * @param $integer_part_a string
 * @param $integer_part_b string
 * 
 * @return string
 */
function sumBigInt(string $integer_part_a, string $integer_part_b) :string
{

    // Проверяем полученные данные от пользователя
    if (!preg_match('/^[0-9]+$|^[0-9]+\.[0-9]+$/', $integer_part_a)) {
        return $result = 'Первый параметр не является строковым представлением числа';
    }
    if (!preg_match('/^[0-9]+$|^[0-9]+\.[0-9]+$/', $integer_part_b)) {
        return $result = 'Второй параметр не является строковым представлением числа';
    }


    // Разбиваем полученные данные на целые и дробные части
    if (preg_match('/^[0-9]+\.[0-9]+$/', $integer_part_a)) {
        list($integer_part_a, $fraction_part_a) = explode('.', $integer_part_a);
    } else {
        $integer_part_a = $integer_part_a;
        $fraction_part_a = '0';
    }
    if (preg_match('/^[0-9]+\.[0-9]+$/', $integer_part_b)) {
        list($integer_part_b, $fraction_part_b) = explode('.', $integer_part_b);
    } else {
        $integer_part_b = $integer_part_b;
        $fraction_part_b = '0';
    }


    // Уравниваем длины целой и дробной части с помощью нулей
    if (strlen($integer_part_a) > strlen($integer_part_b)) {
        $integer_part_b = str_repeat('0', strlen($integer_part_a) - strlen($integer_part_b)) . $integer_part_b;
    } elseif (strlen($integer_part_a) < strlen($integer_part_b)) {
        $integer_part_a = str_repeat('0', strlen($integer_part_b) - strlen($integer_part_a)) . $integer_part_a;
    }
    if (strlen($fraction_part_a) > strlen($fraction_part_b)) {
        $fraction_part_b = $fraction_part_b . str_repeat('0', strlen($fraction_part_a) - strlen($fraction_part_b));
    } elseif (strlen($fraction_part_a) < strlen($fraction_part_b)) {
        $fraction_part_a = $fraction_part_a . str_repeat('0', strlen($fraction_part_b) - strlen($fraction_part_a));
    }


    // Вычисляем сумму дробных частей
    $intermediate_result = 0;
    $balance = 0;
    $result_fraction_part = '';
    for ($i = strlen($fraction_part_a)-1; $i >= 0 ; $i--) {
        $intermediate_result = $fraction_part_a[$i] + $fraction_part_b[$i] + $balance;
        $balance = 0;
        $result_fraction_part = (string)($intermediate_result % 10) . $result_fraction_part;
        $balance = (int)($intermediate_result / 10);
    }


    // Вычисляем сумму челых частей
    $result_integer_part = '';
    for ($i = strlen($integer_part_a)-1; $i >= 0 ; $i--) {
        $intermediate_result = $integer_part_a[$i] + $integer_part_b[$i] + $balance;
        $balance = 0;
        $result_integer_part = (string)($intermediate_result % 10) . $result_integer_part;
        $balance = (int)($intermediate_result / 10);
    }
    if ($balance == 1) {
        $result_integer_part = (string)$balance . $result_integer_part;
    }


    // Соединяем целую и дробную часть
    $result = $result_integer_part . '.' . $result_fraction_part;


    // Возвращаем результат
    return $result;

}

var_dump(sumBigInt('439989.9990009', '38169804.00189409'));
