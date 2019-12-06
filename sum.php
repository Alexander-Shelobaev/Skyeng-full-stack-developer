<?php
// Включаем режим строгой типизация
declare(strict_types = 1);
error_reporting(E_ALL);

/**
 * Возвращает результат сложения двух строковых представлений чисел (integer и float)
 *
 * @param $a string
 * @param $b string
 * 
 * @return string
 */
function sumBigInt(string $a, string $b) :string
{

    // Проверяем полученные данные от пользователя
    if (!preg_match('/^[0-9]+$|^[0-9]+\.[0-9]+$/', $a)) {
        return $result = 'Первый параметр не является строковым представлением числа';
    }
    if (!preg_match('/^[0-9]+$|^[0-9]+\.[0-9]+$/', $b)) {
        return $result = 'Второй параметр не является строковым представлением числа';
    }


    // Разбиваем полученные данные на целые и дробные части
    if (preg_match('/^[0-9]+\.[0-9]+$/', $a)) {
        list($integer_part_a, $fraction_part_a) = explode('.', $a);
    } else {
        $integer_part_a = $a;
        $fraction_part_a = '0';
    }
    if (preg_match('/^[0-9]+\.[0-9]+$/', $b)) {
        list($integer_part_b, $fraction_part_b) = explode('.', $b);
    } else {
        $integer_part_b = $b;
        $fraction_part_b = '0';
    }


    function sumIntegerPart($a, $b)
    {
        if (strlen($a) > strlen($b)) {
            $b = str_repeat('0', strlen($a) - strlen($b)) . $b;
        } elseif (strlen($a) < strlen($b)) {
            $a = str_repeat('0', strlen($b) - strlen($a)) . $a;
        }
        $result = '';
        for ($i = 0; $i < strlen($a); $i++) {
            $result .= $a[$i] + $b[$i];
        }
        return $result;
    }


    function sumFractionPart($a, $b)
    {
        if (strlen($a) > strlen($b)) {
            $b = $b . str_repeat('0', strlen($a) - strlen($b));
        } elseif (strlen($a) < strlen($b)) {
            $a = $a . str_repeat('0', strlen($b) - strlen($a));
        }
        $result = '';
        for ($i = 0; $i < strlen($a); $i++) {
            $result .= $a[$i] + $b[$i];
        }
        return $result;
    }


    // Сложение целой части
    $result = '';
    $result .= sumIntegerPart($integer_part_a, $integer_part_b);

    // Сложение дробной части
    $result .= '.';
    $result .= sumFractionPart($fraction_part_a, $fraction_part_b);

    if (preg_match('/\.0$/', $result)) {
        $result = rtrim($result, '.0');
    }
    // Возвращаем результат
    return $result;

}

var_dump(sumBigInt('121.1', '2.11'));
