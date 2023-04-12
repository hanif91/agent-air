<?php

return [
    'roles' => [
        'admin',
        'user'
    ],

    'permissions' => [
        'admin' => ["*"],
        'user' => ['agent']
    ],

];
