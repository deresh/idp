<?php

namespace Domain\Member\Model;

enum SelfAssesmentType: string
{
    case Strengths = 'Strengths';
    case Weaknesses = 'Weaknesses';
}