<?php

return [
    // 'user_type' => [
    //     1 => 'Normal User',
    //     2 => 'Agent',
    //     3 => 'Inspector',
    // ],
    // 'admin_roles' => [
    //     2 => 'Agent',
    //     3 => 'Inspector'
    // ],
    'role_for' => [
        2 => 'admin'
    ],
    'subscription_plan' => 'default',
    'admin' => 2,
    'builtin_roles' => [
        'admin',
        'agent',
        'inspector',
        'viewer',
        'requestManager',
    ],
    'admin_predefined_roles' => [
        'agent',
        'inspector',
        'viewer',
        'requestManager',
    ],
    'builtin_role_id' => [
        'admin',
        'agent',
        'inspector',
        'viewer',
        'requestManager',
    ],
    'year_built' => [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
    ],
    'order_status' => [
        1 =>"JustCreated",
        2=> "Scheduled",
        3=> "InProgress",
        4=> "Canceled",
        5=> "Completed"
    ]
];
