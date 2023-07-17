<?php

namespace App\Enums;

enum BoardEnum: int {
    case ENVIADAS = 1;
    case ACEPTADAS = 2;
    case AUTORIZADAS = 3;
    case EJECUTADAS = 4;
    case RECHAZADAS = 5;
}
