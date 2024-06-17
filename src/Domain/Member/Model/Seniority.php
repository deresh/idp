<?php

namespace Domain\Member\Model;

enum Seniority: string
{
    case Any = 'any';
    case Intern = 'intern';
    case Junior = 'junior';
    case Medior = 'mid';
    case Senior = 'senior';
    case Principal = 'principal';

}
