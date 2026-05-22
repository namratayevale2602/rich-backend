<?php
// app/Services/WhatsAppService.php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $apiUrl;
    protected $apiKey;
    protected $phoneNumberId;
    protected $recipientNumbers;
    
    // Template names
    protected $templates = [
        'career' => 'richwebcareerenquiry',
        'internship' => 'richwebinternshipinquiry',
        'enquiry' => 'richwebinquiry'
    ];

    public function __construct()
    {
        $this->apiKey = config('whatsapp.api_key');
        $this->phoneNumberId = config('whatsapp.phone_number_id');

        $baseUrl = rtrim(config('whatsapp.api_url', 'https://partnersv1.pinbot.ai/v3'), '/');
        $this->apiUrl = "{$baseUrl}/{$this->phoneNumberId}/messages";

        // ONLY send to these two recipient numbers (sales team)
        $this->recipientNumbers = array_filter(config('whatsapp.recipients', []));

        Log::info('WhatsApp Service initialized', [
            'api_url' => $this->apiUrl,
            'api_key_set' => !empty($this->apiKey),
            'api_key_preview' => !empty($this->apiKey) ? substr($this->apiKey, 0, 8) . '...' : 'NULL',
            'phone_number_id' => $this->phoneNumberId ?? 'NULL',
            'recipients' => $this->recipientNumbers,
        ]);
    }

    /**
     * Send WhatsApp template message to sales team only
     */
    private function sendTemplateMessage($to, $templateName, $parameters = [])
    {
        if (empty($to)) {
            Log::warning('WhatsApp: No recipient number provided');
            return ['success' => false, 'error' => 'No recipient number'];
        }

        // Check if API credentials are configured
        if (empty($this->apiKey) || empty($this->phoneNumberId)) {
            Log::error('WhatsApp API credentials missing', [
                'api_key_exists' => !empty($this->apiKey),
                'phone_number_id_exists' => !empty($this->phoneNumberId)
            ]);
            return ['success' => false, 'error' => 'API credentials not configured'];
        }

        $to = $this->formatPhoneNumber($to);

        $data = [
            "to" => $to,
            "type" => "template",
            "template" => [
                "language" => ["code" => "en"],
                "name" => $templateName,
            ],
            "messaging_product" => "whatsapp",
        ];

        // Add parameters if any — first param is text (name), second is contact (phone)
        if (!empty($parameters)) {
            $mapped = [];
            foreach (array_values($parameters) as $i => $param) {
                $mapped[] = [
                    "type" => $i === 0 ? "text" : "contact",
                    "text" => (string) $param,
                ];
            }
            $data['template']['components'] = [
                ["type" => "body", "parameters" => $mapped]
            ];
        }

        return $this->sendRequest($data);
    }

    /**
     * Send HTTP request to WhatsApp API
     */
    private function sendRequest($data)
    {
        try {
            $headers = [
                'Content-Type: application/json',
                'apikey: ' . $this->apiKey,
            ];

            Log::debug('WhatsApp outgoing request', [
                'url'          => $this->apiUrl,
                'to'           => $data['to'] ?? 'unknown',
                'template'     => $data['template']['name'] ?? 'N/A',
                'apikey_sent'  => !empty($this->apiKey) ? substr($this->apiKey, 0, 8) . '...' : 'EMPTY',
                'wanumber_sent'=> $this->phoneNumberId ?? 'EMPTY',
                'body'         => $data,
            ]);

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $this->apiUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYPEER => false
            ]);

            $response = curl_exec($curl);
            $error = curl_error($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            if ($error) {
                Log::error('WhatsApp API Error: ' . $error);
                return ['success' => false, 'error' => $error];
            }

            $decoded = json_decode($response, true);
            
            // Check if response indicates invalid credentials
            if (isset($decoded['status']) && $decoded['status'] === 'failed') {
                $errorMsg = $decoded['data'] ?? 'Unknown error';
                Log::error('WhatsApp API returned error', [
                    'to' => $data['to'] ?? 'unknown',
                    'error' => $errorMsg,
                    'full_response' => $decoded
                ]);
                return ['success' => false, 'error' => $errorMsg];
            }
            
            if ($httpCode >= 400 || isset($decoded['error'])) {
                $errorMsg = $decoded['error']['message'] ?? $decoded['data'] ?? 'Unknown WhatsApp API error';
                Log::error('WhatsApp API Response Error', [
                    'http_code' => $httpCode,
                    'error' => $errorMsg
                ]);
                return ['success' => false, 'error' => $errorMsg];
            }

            Log::info('WhatsApp message sent successfully', [
                'to' => $data['to'] ?? 'unknown',
                'template' => $data['template']['name'] ?? 'text'
            ]);
            
            return ['success' => true, 'response' => $decoded];

        } catch (\Exception $e) {
            Log::error('WhatsApp Exception: ' . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Format phone number to international format
     */
    private function formatPhoneNumber($number)
    {
        // Remove any non-numeric characters
        $number = preg_replace('/[^0-9]/', '', $number);
        
        // Add country code if missing (assuming India +91)
        if (strlen($number) === 10) {
            $number = '91' . $number;
        }
        
        return $number;
    }

    /**
     * Send to both sales team recipients only
     */
    private function sendToBothRecipients($method, $params)
    {
        $results = [];
        
        if (empty($this->recipientNumbers)) {
            Log::warning('WhatsApp: No recipient numbers configured. Please set WHATSAPP_RECIPIENT_1 and WHATSAPP_RECIPIENT_2 in .env');
            return $results;
        }
        
        foreach ($this->recipientNumbers as $recipient) {
            $params['to'] = $recipient;
            $result = call_user_func_array([$this, $method], array_values($params));
            $results[] = $result;
            
            // Log individual result
            if ($result['success']) {
                Log::info("WhatsApp sent successfully to {$recipient}");
            } else {
                Log::error("WhatsApp failed for {$recipient}: " . ($result['error'] ?? 'Unknown error'));
            }
        }
        
        return $results;
    }

    // ========== PUBLIC METHODS - SEND ONLY TO SALES TEAM ==========

    /**
     * Send Career Application Notification to sales team only
     * Template: richwebcareerenquiry
     * Parameters: {{1}} = Candidate Name, {{2}} = Contact
     */
    public function sendCareerNotification($fullname, $mobile)
    {
        Log::info('Sending career notification to sales team', [
            'candidate_name' => $fullname,
            'candidate_mobile' => $mobile,
            'recipients' => $this->recipientNumbers
        ]);
        
        return $this->sendToBothRecipients('sendTemplateMessage', [
            'to' => null,
            'templateName' => $this->templates['career'],
            'parameters' => [$fullname, $mobile]
        ]);
    }

    /**
     * Send Internship Application Notification to sales team only
     * Template: richwebinternshipinquiry
     * Parameters: {{1}} = Applicant Name, {{2}} = Contact
     */
    public function sendInternshipNotification($name, $mobile)
    {
        Log::info('Sending internship notification to sales team', [
            'applicant_name' => $name,
            'applicant_mobile' => $mobile,
            'recipients' => $this->recipientNumbers
        ]);
        
        return $this->sendToBothRecipients('sendTemplateMessage', [
            'to' => null,
            'templateName' => $this->templates['internship'],
            'parameters' => [$name, $mobile]
        ]);
    }

    /**
     * Send Enquiry Notification to sales team only
     * Template: richwebinquiry
     * Parameters: {{1}} = Name, {{2}} = Contact
     */
    public function sendEnquiryNotification($fullname, $mobile, $formType = 'enquiry')
    {
        Log::info('Sending enquiry notification to sales team', [
            'customer_name' => $fullname,
            'customer_mobile' => $mobile,
            'form_type' => $formType,
            'recipients' => $this->recipientNumbers
        ]);
        
        return $this->sendToBothRecipients('sendTemplateMessage', [
            'to' => null,
            'templateName' => $this->templates['enquiry'],
            'parameters' => [$fullname, $mobile]
        ]);
    }

    /**
     * Get template names for debugging
     */
    public function getTemplateNames()
    {
        return $this->templates;
    }
    
    /**
     * Get recipient numbers for debugging
     */
    public function getRecipients()
    {
        return $this->recipientNumbers;
    }
}