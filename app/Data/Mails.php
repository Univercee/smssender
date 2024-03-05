<?php
namespace App\Data;


class Mails {
    public static function getBirthdayMessage(string $name): string{
        return "Уважаемый $name! Поздравляем Вас с днем рождения!";
    }
}
