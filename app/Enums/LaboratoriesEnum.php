<?php

namespace App\Enums;

enum LaboratoriesEnum : string
{
    case PHOTOGRAPHY = 'fotografia';
    case VIDEO = 'video';
    case SOUND = 'sonido';

    public static function values(): array
    {
        // return [self::PHOTOGRAPHY, self::VIDEO, self::SOUND];
        return array_column(self::cases(), 'value');
    }
}
