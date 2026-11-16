<?php

return [
    'basic-health-checkup' => [
        'slug' => 'basic-health-checkup',
        'name' => 'Basic Health Checkup',
        'description' => 'Sample preventive health screening package.',
        'image' => null,
        'icon' => 'heart-pulse',
        'tests' => [
            'Complete Blood Count (CBC)',
            'Blood Sugar',
            'Urine Examination',
            'General Consultation',
        ],
    ],

    'diabetes-screening' => [
        'slug' => 'diabetes-screening',
        'name' => 'Diabetes Screening',
        'description' => 'Sample diabetes-related screening package.',
        'image' => null,
        'icon' => 'activity',
        'tests' => [
            'Fasting Blood Sugar',
            'HbA1c',
            'Kidney Function',
            'General Consultation',
        ],
    ],

    'comprehensive-health-checkup' => [
        'slug' => 'comprehensive-health-checkup',
        'name' => 'Comprehensive Health Checkup',
        'description' => 'Sample comprehensive health screening package.',
        'image' => null,
        'icon' => 'clipboard-check',
        'tests' => [
            'Complete Blood Count',
            'Liver Function',
            'Kidney Function',
            'Lipid Profile',
        ],
    ],
];