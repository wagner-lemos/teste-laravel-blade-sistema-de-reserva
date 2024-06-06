<?php

// resources/lang/pt/validation.php

return [
    'custom' => [
        'start_time' => [
            'required' => 'O campo de início é obrigatório.',
            'date_format' => 'O formato de início deve ser H:i.',
        ],
        'end_time' => [
            'required' => 'O campo de término é obrigatório.',
            'date_format' => 'O formato de término deve ser H:i.',
            'after' => 'A hora de término deve ser posterior à hora de início.',
        ],
    ],

    'attributes' => [
        'start_time' => 'hora início',
        'end_time' => 'hora término',
    ],
];
