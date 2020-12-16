<?php

use app\models\Position;
use yii\helpers\ArrayHelper;

/**
 * добавляет правильные окончания к возрасту (год/года/лет)
 */
function num2word($num, $words)
{
    $num = $num % 100;
    if ($num > 19) {
        $num = $num % 10;
    }
    switch ($num) {
        case 1:
        {
            return ($words[0]);
        }
        case 2:
        case 3:
        case 4:
        {
            return ($words[1]);
        }
        default:
        {
            return ($words[2]);
        }
    }
}

/**
 * получить массив с названиями должностей
 */
function getPositionTitles()
{
    return array_flip(
        ArrayHelper::map(Position::find()->all(), 'id', 'position_title')
    );
}

