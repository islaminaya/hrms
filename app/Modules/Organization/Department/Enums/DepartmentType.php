<?php

namespace App\Modules\Organization\Department\Enums;

enum DepartmentType: string
{
    case DEPARTMENT = 'department';
    case COLLEGE = 'college';
    case ENTITY = 'entity';
}
