<?php

return [
    'survey' => [
        'name' => 'How do You stay in shape?',
        'description' => 'Share with us how often do You go to the gym to increase the quality of our service and to get a free ticket',
        'input' => [
            'select' => [
                'label' => 'Do You visit the gym?',
                'option' => [
                    'a' => 'Yes, often',
                    'b' => 'Sometimes',
                    'c' => 'No, never',
                ]
            ],
            'radio' => [
                'label' => 'What could be Your main goal?',
                'option' => [
                    'a' => 'To build my health and career',
                    'b' => 'To build my business and health',
                    'c' => 'To try something new',
                ]
            ],
            'checkbox' => [
                'label' => 'What apps have You already tried?',
                'option' => [
                    'a' => 'Calories-tracker (App1, App2)',
                    'b' => 'Exercise tracker (App1, App2)',
                    'c' => 'Time management (App1, App2)',
                    'd' => 'I don\'t use any apps',
                ]
            ],
            'text' => [
                'label' => 'If You already know what You need, what offer You want to get?',
                'placeholder' => 'I would like to get free gym access and healty food'
            ],
            'textarea' => [
                'label' => 'If You have any offer for us, describe it here',
                'placeholder' => 'I would like to join Your sport program and offer You our gym-program'
            ]
        ]
    ]
];