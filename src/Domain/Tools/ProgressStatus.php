<?php

namespace Domain\Tools;

enum ProgressStatus: string
{
    case OnBoarding = "onboarding";

    case Growing = "growing";

    case Improving = "improving";

    case CatchingUp = "catchingup";

    case Stagnating = "stagnating";
}
