<?php

return [
    'status'    => [
        'P'     => 'Pendiente',
        'A'     => 'Activo',
        'I'     => 'Inactivo',
        'S'     => 'Suspendido',
        'D'     => 'Eliminado',
    ],
    'type_payment'  => [
        'T'     => 'Transferencia',
        'E'     => 'Efectivo',
        'P'     => 'Pasarela de Pago'
    ],
    'code_http'    => [
        'OK'    => 200,
        'CREATED'    => 201,
        'ACCEPTED'    => 202,
        'MULTIPLE_CHOICES'  => 300,
        'UNAUTHORIZED'  => 401,
        'FORBIDDEN' => 403,
        'NOT_FOUND' => 404,
        'METHOD_NOT_ALLOWED'    => 405,
        'NOT_ACCEPTABLE'    => 406,
        'PRECONDITION_FAILED'   => 412,
        'EXPECTATION_FAILED'    => 417,
        'INTERNAL_SERVER_ERROR' => 500,
        'SERVICE_UNAVAILABLE'   => 503,
    ],
    'status_turn'    => [
        'PEN'     => 'Pendiente',
        'CON'     => 'Confirmado',
        'CAN'     => 'Cancelado',
        'PRO'     => 'Proceso',
        'FIN'     => 'Finalizado',
    ],
];