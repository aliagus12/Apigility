<?php
return [
    'router' => [
        'routes' => [
            'attendance.rest.attendance' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/attendance[/:attendance_id]',
                    'defaults' => [
                        'controller' => 'Attendance\\V1\\Rest\\Attendance\\Controller',
                    ],
                ],
            ],
            'attendance.rpc.absensi' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/absensi',
                    'defaults' => [
                        'controller' => 'Attendance\\V1\\Rpc\\Absensi\\Controller',
                        'action' => 'absensi',
                    ],
                ],
            ],
            'attendance.rpc.login' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/login',
                    'defaults' => [
                        'controller' => 'Attendance\\V1\\Rpc\\Login\\Controller',
                        'action' => 'login',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'attendance.rest.attendance',
            2 => 'attendance.rpc.absensi',
            3 => 'attendance.rpc.login',
        ],
    ],
    'zf-rest' => [
        'Attendance\\V1\\Rest\\Attendance\\Controller' => [
            'listener' => 'Attendance\\V1\\Rest\\Attendance\\AttendanceResource',
            'route_name' => 'attendance.rest.attendance',
            'route_identifier_name' => 'attendance_id',
            'collection_name' => 'attendance',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'meet',
                1 => 'location',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Attendance\V1\Rest\Attendance\AttendanceEntity::class,
            'collection_class' => \Attendance\V1\Rest\Attendance\AttendanceCollection::class,
            'service_name' => 'attendance',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Attendance\\V1\\Rest\\Attendance\\Controller' => 'Json',
            'Attendance\\V1\\Rpc\\Absensi\\Controller' => 'Json',
            'Attendance\\V1\\Rpc\\Login\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Attendance\\V1\\Rest\\Attendance\\Controller' => [
                0 => 'application/vnd.attendance.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Attendance\\V1\\Rpc\\Absensi\\Controller' => [
                0 => 'application/vnd.attendance.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Attendance\\V1\\Rpc\\Login\\Controller' => [
                0 => 'application/vnd.attendance.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'Attendance\\V1\\Rest\\Attendance\\Controller' => [
                0 => 'application/vnd.attendance.v1+json',
                1 => 'application/json',
            ],
            'Attendance\\V1\\Rpc\\Absensi\\Controller' => [
                0 => 'application/vnd.attendance.v1+json',
                1 => 'application/json',
            ],
            'Attendance\\V1\\Rpc\\Login\\Controller' => [
                0 => 'application/vnd.attendance.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Attendance\V1\Rest\Attendance\AttendanceEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'attendance.rest.attendance',
                'route_identifier_name' => 'attendance_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Attendance\V1\Rest\Attendance\AttendanceCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'attendance.rest.attendance',
                'route_identifier_name' => 'attendance_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'Attendance\\V1\\Rest\\Attendance\\AttendanceResource' => [
                'adapter_name' => 'db_Attendance',
                'table_name' => 'attendance',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'Attendance\\V1\\Rest\\Attendance\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'Attendance\\V1\\Rest\\Attendance\\AttendanceResource\\Table',
            ],
        ],
    ],
    'zf-content-validation' => [
        'Attendance\\V1\\Rest\\Attendance\\Controller' => [
            'input_filter' => 'Attendance\\V1\\Rest\\Attendance\\Validator',
        ],
        'Attendance\\V1\\Rpc\\Absensi\\Controller' => [
            'input_filter' => 'Attendance\\V1\\Rpc\\Absensi\\Validator',
        ],
        'Attendance\\V1\\Rpc\\Login\\Controller' => [
            'input_filter' => 'Attendance\\V1\\Rpc\\Login\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Attendance\\V1\\Rest\\Attendance\\Validator' => [
            0 => [
                'name' => 'email',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '50',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\EmailAddress::class,
                        'options' => [],
                    ],
                ],
                'allow_empty' => false,
            ],
            1 => [
                'name' => 'meet',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '50',
                        ],
                    ],
                ],
                'allow_empty' => true,
            ],
            2 => [
                'name' => 'location',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '50',
                        ],
                    ],
                ],
                'allow_empty' => true,
            ],
            3 => [
                'name' => 'time',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '65535',
                        ],
                    ],
                ],
                'allow_empty' => true,
            ],
        ],
        'Attendance\\V1\\Rpc\\Presence\\Validator' => [],
        'Attendance\\V1\\Rpc\\Absensi\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\EmailAddress::class,
                        'options' => [
                            'message' => 'email not valid!',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'ID',
                'field_type' => '',
            ],
        ],
        'Attendance\\V1\\Rpc\\Login\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\EmailAddress::class,
                        'options' => [
                            'message' => 'should valid email',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'ID',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'action',
                'description' => '',
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'Attendance\\V1\\Rpc\\Absensi\\Controller' => \Attendance\V1\Rpc\Absensi\AbsensiControllerFactory::class,
            'Attendance\\V1\\Rpc\\Login\\Controller' => \Attendance\V1\Rpc\Login\LoginControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'Attendance\\V1\\Rpc\\Absensi\\Controller' => [
            'service_name' => 'absensi',
            'http_methods' => [
                0 => 'POST',
                1 => 'GET',
            ],
            'route_name' => 'attendance.rpc.absensi',
        ],
        'Attendance\\V1\\Rpc\\Login\\Controller' => [
            'service_name' => 'login',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'attendance.rpc.login',
        ],
    ],
    'service_manager' => [
        'factories' => [],
    ],
];
