<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceSubtype;
use App\Models\ServiceBenefit;
use App\Models\ServiceCaseStudy;
use App\Models\ServiceFaq;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'slug'          => 'bulk-sms',
                'title'         => 'Bulk SMS',
                'subtitle'      => 'Mass Communication Made Easy',
                'full_desc'     => 'Reliable bulk SMS services for marketing campaigns, alerts, and notifications. Reach thousands instantly with our robust SMS platform.',
                'detailed_desc' => 'Our Bulk SMS service allows you to send thousands of messages instantly with high delivery rates. Perfect for marketing campaigns, notifications, alerts, and customer engagement. Features include real-time analytics, scheduled messaging, and easy API integration. With open rates exceeding 98%, your message is seen instantly. This cost-effective channel helps businesses strengthen customer relationships and achieve marketing goals faster.',
                'image'         => null,
                'order'         => 1,
                'subtypes' => [
                    ['title' => 'Promotional SMS', 'description' => 'Promotional SMS are sent with the objective of promoting a product or service, and this category includes any sales and marketing messages, whether solicited by the recipient or not. These messages can only be sent to non-DND (Do Not Disturb) numbers between 9 AM and 9 PM.', 'image' => null, 'order' => 1],
                    ['title' => 'Transactional SMS', 'description' => 'Transactional SMS are messages sent to customers to provide necessary information for using a product or service. For example, a bank might send an SMS to an account holder regarding their available account balance.', 'image' => null, 'order' => 2],
                    ['title' => 'OTP SMS', 'description' => 'OTP (One-Time Password) messages are secure, time-sensitive SMS used for authentication and verification. They are commonly used to confirm a user\'s identity during login or transactions.', 'image' => null, 'order' => 3],
                ],
                'benefits' => [
                    ['title' => 'Maximize Your Reach with Bulk SMS', 'subtitle' => 'Engage Customers, Boost Sales and Deliver Instant Communication.', 'description' => 'Bulk SMS provides a direct, reliable way to connect with your audience for promotions, alerts, reminders, or updates. With open rates exceeding traditional email marketing, your message is seen instantly.', 'image' => null, 'list' => ['Send messages instantly for real-time communication.', 'Over 98% open rate ensures visibility.', 'Low-cost marketing with excellent ROI.', 'Reach anyone globally with a mobile phone.', 'Boost interaction with call-to-action features.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'How does Bulk SMS service work?', 'answer' => 'Our Bulk SMS service allows you to send promotional or transactional messages to thousands of recipients simultaneously through our robust and reliable platform with high delivery rates.', 'order' => 1],
                    ['question' => 'What is the delivery rate for Bulk SMS?', 'answer' => 'We maintain over 99% delivery rate with advanced DND filtration, multi-language support, and real-time delivery reports to ensure your messages reach the intended recipients.', 'order' => 2],
                    ['question' => 'Can I schedule Bulk SMS messages?', 'answer' => 'Yes, our platform allows you to schedule SMS campaigns in advance, set specific delivery times, and automate your messaging workflows.', 'order' => 3],
                ],
            ],
            [
                'slug'          => 'bulk-voice',
                'title'         => 'Bulk Voice',
                'subtitle'      => 'Voice Broadcasting at Scale',
                'full_desc'     => 'Professional bulk voice messaging services for customer engagement, alerts, and marketing campaigns with high delivery rates.',
                'detailed_desc' => 'Reach your audience with personalized voice messages. Our Bulk Voice service supports multiple languages, scheduling, and detailed reporting. Deliver personalized voice messages to thousands of recipients instantly. Whether for promotions, updates, or alerts, this solution ensures your message is heard loud and clear, creating a lasting impression.',
                'image'         => null,
                'order'         => 2,
                'subtypes' => [],
                'benefits' => [
                    ['title' => 'Amplify Your Reach with Bulk Voice Solutions', 'subtitle' => 'Effortless Voice Messaging for Maximum Impact', 'description' => 'Communicate effectively with Bulk Voice services. Deliver personalized voice messages to thousands of recipients instantly. Whether for promotions, updates, or alerts, this solution ensures your message is heard loud and clear, creating a lasting impression.', 'image' => null, 'list' => ['Send messages to thousands of contacts simultaneously.', 'Deliver a human-like experience with customizable voice messages.', 'Save time and money compared to traditional communication methods.', 'Ideal for marketing campaigns, reminders, surveys, and emergency alerts.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What is Bulk Voice service?', 'answer' => 'Bulk Voice service allows you to send pre-recorded voice messages to thousands of phone numbers simultaneously, perfect for announcements, alerts, and personalized communications.', 'order' => 1],
                ],
            ],
            [
                'slug'          => 'whatsapp-service',
                'title'         => 'WhatsApp Service',
                'subtitle'      => 'Official WhatsApp Business API',
                'full_desc'     => 'Official WhatsApp Business API services for marketing, customer support, and automated messaging with high engagement rates.',
                'detailed_desc' => 'Integrate WhatsApp Business API for seamless customer communication. Send notifications, alerts, and marketing messages directly through WhatsApp. High engagement rates with rich media support and template messaging. Enhance your business communication with Bulk Messaging, Blue Tick Verification, and advanced WhatsApp Business API solutions.',
                'image'         => null,
                'order'         => 3,
                'subtypes' => [
                    ['title' => 'Bulk WhatsApp Messaging', 'description' => 'Effortlessly reach a wider audience with our Bulk WhatsApp Messaging solution. Send text, images, videos, and PDFs to thousands of users at once.', 'image' => null, 'order' => 1],
                    ['title' => 'Blue Tick Verified WhatsApp', 'description' => 'Boost trust and credibility with a Blue Tick Verified WhatsApp account. Showcase your brand as authentic and reliable with WhatsApp\'s verified badge.', 'image' => null, 'order' => 2],
                    ['title' => 'WhatsApp Business API', 'description' => 'Streamline customer communication with the powerful WhatsApp Business API. Automate responses, integrate with CRMs, and send personalized notifications.', 'image' => null, 'order' => 3],
                ],
                'benefits' => [
                    ['title' => 'Boost Your Business with Advanced WhatsApp Services', 'subtitle' => 'Bulk Messaging, Blue Tick Verification, and WhatsApp Business API Solutions', 'description' => 'Enhance your business communication with our WhatsApp services. From Bulk Messaging to Blue Tick Verification and advanced WhatsApp Business API, we provide tools to connect, engage, and grow efficiently.', 'image' => null, 'list' => ['Instantly reach a broad audience with promotional messages.', 'Build trust with a verified badge that ensures authenticity.', 'Automate responses with chatbots for faster customer service.', 'Drive better engagement with your official account.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What is WhatsApp Business API?', 'answer' => 'WhatsApp Business API is an official solution for businesses to communicate with customers at scale, send notifications, and provide customer support through the WhatsApp platform.', 'order' => 1],
                    ['question' => 'Can I send promotional messages via WhatsApp?', 'answer' => 'Yes, you can send promotional messages using approved message templates. However, all promotional content must comply with WhatsApp\'s business policy and template approval process.', 'order' => 2],
                ],
            ],
            [
                'slug'          => 'digital-marketing',
                'title'         => 'Digital Marketing',
                'subtitle'      => 'Complete Digital Marketing Solutions',
                'full_desc'     => 'Comprehensive digital marketing services including SEO, social media marketing, PPC, and content marketing to grow your business online.',
                'detailed_desc' => 'Comprehensive digital marketing services including SEO, SEM, social media marketing, and content strategy. Drive traffic, generate leads, and increase conversions with our data-driven approach. We help businesses establish strong online presence and achieve measurable results.',
                'image'         => null,
                'order'         => 4,
                'subtypes' => [],
                'benefits' => [],
                'case_studies' => [
                    ['title' => 'Digital Marketing Campaigns', 'industry' => 'Marketing', 'image' => null, 'order' => 1],
                ],
                'faqs' => [
                    ['question' => 'What digital marketing services do you offer?', 'answer' => 'We offer comprehensive digital marketing services including SEO, SEM, social media marketing, content marketing, email marketing, and analytics to help you grow your online presence.', 'order' => 1],
                    ['question' => 'How long does it take to see SEO results?', 'answer' => 'SEO is a long-term strategy. Typically, you can see initial results in 3-6 months, with significant improvements occurring over 6-12 months of consistent optimization.', 'order' => 2],
                ],
            ],
            [
                'slug'          => 'whats-chatbot',
                'title'         => 'WhatsApp Chatbot',
                'subtitle'      => 'AI-Powered WhatsApp Automation',
                'full_desc'     => 'Intelligent WhatsApp chatbots for customer service, lead generation, and automated conversations. 24/7 customer support solutions.',
                'detailed_desc' => 'Automate customer interactions with our intelligent WhatsApp Chatbot. Handle queries, provide support, and engage customers 24/7 with natural language processing and seamless integration. Streamline your customer service and boost engagement with AI-powered conversations.',
                'image'         => null,
                'order'         => 5,
                'subtypes' => [],
                'benefits' => [
                    ['title' => 'Enhance Customer Engagement with WhatsApp Chatbot', 'subtitle' => 'Automate Conversations and Deliver Instant Support via WhatsApp', 'description' => 'Streamline your customer service and boost engagement with our WhatsApp Chatbot. This AI-powered solution enables 24/7 interaction, automating responses, answering FAQs, and guiding customers through their journey on your WhatsApp Business account.', 'image' => null, 'list' => ['Provide immediate replies to customer inquiries at any time of day.', 'Reduce wait times and improve customer satisfaction.', 'Keep your business accessible round-the-clock, even outside working hours.', 'Automate repetitive tasks such as FAQs, order status, or booking confirmations.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What can a WhatsApp Chatbot do?', 'answer' => 'Our WhatsApp Chatbot can handle customer queries, provide instant responses, collect information, schedule appointments, process orders, and integrate with your CRM systems 24/7.', 'order' => 1],
                ],
            ],
            [
                'slug'          => 'digital-auto',
                'title'         => 'Digital Automation',
                'subtitle'      => 'Streamline Your Business Processes',
                'full_desc'     => 'Streamline your business processes with our digital automation solutions for marketing, sales, and customer relationship management.',
                'detailed_desc' => 'Automate repetitive tasks and workflows with our digital automation solutions. From lead management to customer support, increase efficiency and reduce manual errors. Transform your business operations by streamlining processes, boosting efficiency, and enhancing productivity.',
                'image'         => null,
                'order'         => 6,
                'subtypes' => [
                    ['title' => 'Customer Relationship Management (CRM)', 'description' => 'Optimize your customer interactions with our advanced CRM solutions. Track leads, manage customer data, and automate follow-ups to boost sales and improve client retention.', 'image' => null, 'order' => 1],
                    ['title' => 'Content Management System (CMS)', 'description' => 'Simplify content creation and management with our intuitive CMS platform. Easily update your website, organize media, and ensure seamless user experiences.', 'image' => null, 'order' => 2],
                    ['title' => 'Workflow Automation', 'description' => 'Transform your processes with Workflow Automation. Streamline repetitive tasks, improve team collaboration, and boost productivity with tailored solutions for your business needs.', 'image' => null, 'order' => 3],
                ],
                'benefits' => [
                    ['title' => 'Transform Your Business with Digital Automation', 'subtitle' => 'Streamline Processes, Boost Efficiency, and Enhance Productivity', 'description' => 'Digital Automation streamlines business operations by automating repetitive tasks, improving efficiency, reducing errors, and saving costs. It helps businesses scale seamlessly, enhance customer experiences, and focus on strategic growth.', 'image' => null, 'list' => ['Automate routine tasks to save time and reduce human error.', 'Speed up processes like data entry, customer inquiries, and reporting.', 'Enhance data reliability for better decision-making.', 'Allocate resources more effectively by focusing on high-impact tasks.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What is Digital Automation?', 'answer' => 'Digital Automation involves using technology to automate repetitive business processes, workflows, and customer interactions to improve efficiency and reduce manual errors.', 'order' => 1],
                ],
            ],
            [
                'slug'          => 'design-develop',
                'title'         => 'Design Development',
                'subtitle'      => 'Web and Application Development',
                'full_desc'     => 'Professional website design, web development, and mobile app development services to establish your strong digital presence.',
                'detailed_desc' => 'Custom web and mobile application development services. From concept to deployment, we create responsive, scalable, and user-friendly solutions tailored to your business needs. Our expert team delivers high-quality digital products that engage users and drive business growth.',
                'image'         => null,
                'order'         => 7,
                'subtypes' => [],
                'benefits' => [],
                'case_studies' => [],
                'faqs' => [
                    ['question' => 'What design and development services do you offer?', 'answer' => 'We offer complete design and development services including website development, mobile apps, UI/UX design, e-commerce solutions, and custom software development.', 'order' => 1],
                ],
            ],
            [
                'slug'          => 'graphic-design',
                'title'         => 'Graphic Design',
                'subtitle'      => 'Creative Visual Solutions',
                'full_desc'     => 'Professional graphic design services including logos, branding, marketing materials, and digital graphics for your business.',
                'detailed_desc' => 'Professional graphic design services including branding, logo design, marketing materials, and social media graphics. Create compelling visual identities that resonate with your audience and help your brand stand out in a competitive market.',
                'image'         => null,
                'order'         => 8,
                'subtypes' => [
                    ['title' => 'Logo Design', 'description' => 'Our Logo Design service creates unique, memorable logos that reflect your brand\'s identity. Tailored to your vision, we design logos that make a lasting impression.', 'image' => null, 'order' => 1],
                    ['title' => 'Infographic Design', 'description' => 'Transform complex information into visually engaging infographics that simplify communication.', 'image' => null, 'order' => 2],
                    ['title' => 'PowerPoint Design', 'description' => 'Elevate your presentations with custom PowerPoint designs that captivate and engage your audience.', 'image' => null, 'order' => 3],
                    ['title' => 'Catalogue Design', 'description' => 'Create stunning product catalogues that showcase your offerings in a visually appealing and organized manner.', 'image' => null, 'order' => 4],
                    ['title' => 'Business Card Design', 'description' => 'Make a strong first impression with custom-designed business cards that reflect your professional brand.', 'image' => null, 'order' => 5],
                    ['title' => 'Web Banner Design', 'description' => 'Capture attention with eye-catching web banners designed to promote your brand or special offers.', 'image' => null, 'order' => 6],
                ],
                'benefits' => [
                    ['title' => 'Unleash Creativity with Expert Graphic Design', 'subtitle' => 'Crafting Visual Experiences That Captivate and Inspire', 'description' => 'Our Graphic Design services create compelling visuals that bring your brand\'s message to life, helping you connect with your audience and stand out in the market.', 'image' => null, 'list' => ['Builds a memorable and unique brand identity.', 'Simplifies complex messages through visuals.', 'Gives your business a polished and credible look.', 'Captures attention and drives interaction.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What graphic design services are available?', 'answer' => 'Our graphic design services include logo design, branding packages, marketing materials, social media graphics, infographics, and complete visual identity development.', 'order' => 1],
                ],
            ],
            [
                'slug'          => 'alert-system',
                'title'         => 'Alert System',
                'subtitle'      => 'Real-time Notification Platform',
                'full_desc'     => 'Custom alert and notification systems for businesses. Real-time alerts via SMS, voice, email, and push notifications.',
                'detailed_desc' => 'Comprehensive alert system for emergency notifications, system alerts, and important updates. Multi-channel delivery including SMS, voice, email, and push notifications. Never miss important customer inquiries with automated alert systems that ensure prompt follow-ups.',
                'image'         => null,
                'order'         => 9,
                'subtypes' => [],
                'benefits' => [
                    ['title' => 'Never Miss a Lead with Miss Call Alert System', 'subtitle' => 'Stay Connected with Automated Alerts for Missed Calls', 'description' => 'The Miss Call Alert System ensures that you never miss an important customer inquiry. By automatically notifying you whenever a customer misses a call, this system helps you follow up promptly, improving customer satisfaction and lead conversion rates.', 'image' => null, 'list' => ['Get notified immediately whenever a call is missed.', 'Follow up on missed calls quickly to capture potential leads.', 'Ensure prompt responses and maintain customer trust.', 'No need for expensive call tracking systems.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What is an Alert System?', 'answer' => 'Our Alert System provides real-time notifications across multiple channels including SMS, voice calls, email, and push notifications for emergency alerts, system updates, and important announcements.', 'order' => 1],
                ],
            ],
            [
                'slug'          => 'ivr-system',
                'title'         => 'IVR System',
                'subtitle'      => 'Intelligent Voice Response Solutions',
                'full_desc'     => 'Professional IVR system development for call centers and businesses. Automate customer interactions and improve call management.',
                'detailed_desc' => 'Advanced IVR system to automate customer interactions, reduce wait times, and improve customer satisfaction. Features include natural language processing, CRM integration, and detailed analytics. Streamline call management and enhance customer experience with intelligent voice response.',
                'image'         => null,
                'order'         => 10,
                'subtypes' => [],
                'benefits' => [
                    ['title' => 'Enhance Customer Experience with IVR Systems', 'subtitle' => 'Streamline Call Management and Improve Customer Interaction', 'description' => 'An IVR (Interactive Voice Response) system automates call handling by allowing customers to interact with a pre-recorded voice menu. It helps businesses efficiently route calls, provide information, and reduce wait times, ensuring a smooth and professional experience for customers.', 'image' => null, 'list' => ['Direct customers to the right department without delays.', 'Provide automated support around the clock, even outside business hours.', 'Reduce the need for live agents to handle routine inquiries.', 'Offer faster service with minimal wait times.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What is an IVR System?', 'answer' => 'IVR (Interactive Voice Response) is an automated telephone system that interacts with callers, gathers information, and routes calls to the appropriate recipient without human intervention.', 'order' => 1],
                    ['question' => 'Can IVR system handle multiple languages?', 'answer' => 'Yes, our IVR system supports multiple languages and can be customized to provide voice prompts in regional languages based on your customer demographics.', 'order' => 2],
                ],
            ],
            [
                'slug'          => 'bulk-email',
                'title'         => 'Bulk Email',
                'subtitle'      => 'Email Marketing Platform',
                'full_desc'     => 'Professional bulk email marketing services for newsletters, promotions, and customer engagement campaigns with high deliverability rates.',
                'detailed_desc' => 'Send bulk email campaigns with high deliverability rates. Features include email templates, audience segmentation, A/B testing, and comprehensive analytics. Enhance your marketing strategy with effective email campaigns that reach a wider audience and drive engagement.',
                'image'         => null,
                'order'         => 11,
                'subtypes' => [],
                'benefits' => [
                    ['title' => 'Enhance Your Marketing Strategy with Bulk Email', 'subtitle' => 'Reach a Wider Audience with Effective Email Campaigns', 'description' => 'Bulk email allows businesses to efficiently communicate with large groups of recipients through personalized email campaigns. It helps in promoting products, services, or special offers to a targeted audience, driving engagement and increasing conversions.', 'image' => null, 'list' => ['Send emails to a large audience at once, increasing brand exposure.', 'Achieve high returns with a low-cost marketing solution.', 'Customize emails to increase engagement and relevance.', 'Monitor campaign performance and optimize future emails.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What are the benefits of Bulk Email marketing?', 'answer' => 'Bulk Email marketing offers cost-effective reach, personalized communication, measurable results, automation capabilities, and high ROI for customer engagement and retention.', 'order' => 1],
                ],
            ],
        ];

        foreach ($services as $serviceData) {
            $service = Service::create([
                'slug'          => $serviceData['slug'],
                'title'         => $serviceData['title'],
                'subtitle'      => $serviceData['subtitle'],
                'full_desc'     => $serviceData['full_desc'],
                'detailed_desc' => $serviceData['detailed_desc'],
                'image'         => $serviceData['image'],
                'order'         => $serviceData['order'],
                'is_active'     => true,
            ]);

            foreach ($serviceData['subtypes'] as $st) {
                ServiceSubtype::create([...$st, 'service_id' => $service->id]);
            }

            foreach ($serviceData['benefits'] as $b) {
                ServiceBenefit::create([...$b, 'service_id' => $service->id]);
            }

            foreach ($serviceData['case_studies'] as $cs) {
                ServiceCaseStudy::create([...$cs, 'service_id' => $service->id]);
            }

            foreach ($serviceData['faqs'] as $faq) {
                ServiceFaq::create([...$faq, 'service_id' => $service->id, 'is_general' => false, 'is_active' => true]);
            }
        }

        // General FAQs (not tied to any service)
        $generalFaqs = [
            ['question' => 'What is Rich System Solution?', 'answer' => 'Rich System Solution is a leading provider of digital communication and marketing services with over 6 years of experience in helping businesses grow.', 'order' => 1],
            ['question' => 'Do you provide API integration?', 'answer' => 'Yes, we provide comprehensive API documentation and support for seamless integration with your existing systems and applications.', 'order' => 2],
            ['question' => 'What are the pricing plans?', 'answer' => 'We offer competitive and flexible pricing plans tailored to your business needs. Contact our sales team for customized quotes based on your requirements and volume.', 'order' => 3],
        ];

        foreach ($generalFaqs as $faq) {
            ServiceFaq::create([...$faq, 'service_id' => null, 'is_general' => true, 'is_active' => true]);
        }
    }
}
