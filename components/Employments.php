<?php


namespace app\components;


class Employments
{
    public static function getEmploymentCheckboxItems()
    {
        return [
            '0' => 'Полная занятость',
            '1' => 'Частичная занятость',
            '2' => 'Проектная/Временная работа',
            '3' => 'Волонтёрство',
            '4' => 'Стажировка'
        ];
    }
}
