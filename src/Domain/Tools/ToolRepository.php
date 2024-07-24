<?php

namespace Domain\Tools;
 use Domain\Member\Model\Member;

 interface ToolRepository
{
    public function byMember(Member $member);
}