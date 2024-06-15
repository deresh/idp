<?php

namespace Domain\Member\Model;

enum Seniority
{
    case Any;
    case Intern;
    case Junior;
    case Medior;
    case Senior;
    case Principal;
}
