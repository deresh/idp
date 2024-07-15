<?php

namespace Domain\Member\Model;

enum SeniorityLevel: string
{
    case Any = 'any';
    case Intern = 'intern';
    case Junior1 = 'junior 1';
    case Junior2 = 'junior 2';
    case Junior3 = 'junior 3';
    case Medior1 = 'mid 1';
    case Medior2 = 'mid 2';
    case Medior3 = 'mid 3';

    case Senior1 = 'senior 1';
    case Senior2 = 'senior 2';
    case Principal = 'principal';

    public static function labels(): array
    {
        $labels = [];
        foreach (self::cases() as $value) {
            $labels[$value->value] = $value->name;
        }
        return $labels;
    }

}
