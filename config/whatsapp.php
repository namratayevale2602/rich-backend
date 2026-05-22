<?php
// config/whatsapp.php

return [
    /*
    |--------------------------------------------------------------------------
    | WhatsApp API Configuration
    |--------------------------------------------------------------------------
    */
    
    'api_url' => env('WHATSAPP_API_URL', 'https://partners.pinbot.ai/v1/messages'),
    'api_key' => env('WHATSAPP_API_KEY'),
    'phone_number_id' => env('WHATSAPP_PHONE_NUMBER'),
    
    /*
    |--------------------------------------------------------------------------
    | WhatsApp Template Names
    |--------------------------------------------------------------------------
    */
    'templates' => [
        'career' => env('WHATSAPP_TEMPLATE_CAREER', 'richwebcareerenquiry'),
        'internship' => env('WHATSAPP_TEMPLATE_INTERNSHIP', 'richwebinternshipinquiry'),
        'enquiry' => env('WHATSAPP_TEMPLATE_ENQUIRY', 'richwebinquiry'),
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Sales Team Recipients (2 numbers)
    |--------------------------------------------------------------------------
    */
    'recipients' => [
        env('WHATSAPP_RECIPIENT_1'),
        env('WHATSAPP_RECIPIENT_2'),
    ],
];