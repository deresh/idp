<?php

namespace Domain\Member\Model;

enum Role: string
{
    case Backend = 'back';
    case Frontend = 'front';
    case QualityAssurance = 'qa';
    case ScrumMaster = 'sm';
    case ProductOwner = 'po';
    case Director = 'dir';
    case Lead = 'lead';

    case Any = 'any';

}
