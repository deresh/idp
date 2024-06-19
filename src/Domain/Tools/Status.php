<?php

namespace Domain\Tools;

enum Status: string
{
    case ToDo = "TO DO";
    case InProgress = 'IN PROGRESS';

    case OnHold = 'ON HOLD';

    case Completed = 'COMPLETED';

    case Rejected = 'REJECTED';
}
