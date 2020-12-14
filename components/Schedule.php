<?php


namespace app\components;


class Schedule
{
    public static function getScheduleCheckboxItems()
    {
        return [
            '0' => 'Полный день',
            '1' => 'Сменный график',
            '2' => 'Гибкий график',
            '3' => 'Удаленная работа',
        ];
    }
}
