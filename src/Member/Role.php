<?php

namespace Member;

enum Role
{
    case Backend;
    case Frontend;
    case QualityAssurance;
    case ScrumMaster;
    case ProductOwner;
    case Director;
    case Lead;

}
