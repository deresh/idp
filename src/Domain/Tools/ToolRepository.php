<?php

namespace Domain\Tools;
 use Domain\Member\Model\Member;

 interface ToolRepository
{
    public function all(array $filters);
}