<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d,e',
            'subjects' => 'c,r,u,d,e',
            'programs' => 'c,r,u,d,e',
            'classrooms' =>'c,r,u,d,e',
            'grades' => 'c,r,u,d,e',
            'sections' =>'c,r,u,d,e',
            'students' => 'c,r,u,d,e',
            'books' => 'c,r,u,d,e',
            'history' => 'c,r,u,d,e',

        ],
        'moshref' => [
            'users' => 'r',
            'subjects' =>  'r',
            'programs' =>  'r',
            'classrooms' =>  'r',
            'grades' =>  'r',
            'sections' => 'r',
            'students' =>  'r',
            'books' =>  'r',
            'history' =>  'r',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'e'=>'edit'
    ]
];
