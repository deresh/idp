<?php

namespace Domain\Tools;

enum Priority: int
{
    case High = 3;
    case Medium = 2;
    case Low = 1;
}