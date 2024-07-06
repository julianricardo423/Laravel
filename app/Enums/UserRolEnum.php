<?php 

namespace App\Enums;

enum UserRolEnum : string{
    
    case STUDENT = 'estudiante';

    case TEACHER = 'docente';
    
    case ADMINISTRATIVE = 'administrativo';

    // public static function getRoles(){
    //     return [self::STUDENT, self::TEACHER, self::ADMINISTRATIVE];
    // }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
