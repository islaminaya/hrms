<?php

declare(strict_types=1);

namespace App\Modules\Organization\Enums;

enum DepartmentType: string
{
    case DEPARTMENT = 'department';
    case COLLEGE = 'college';
    case ENTITY = 'entity';
}
