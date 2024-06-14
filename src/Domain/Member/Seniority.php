<?php

namespace Domain\Member;

enum Seniority
{
    case Any;
    case Intern;
    case Junior;
    case Medior;
    case Senior;
    case Principal;
}
