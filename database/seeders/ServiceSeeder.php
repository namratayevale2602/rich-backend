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
                'title'         => 'Bulk SMS / Alert System',
                'subtitle'      => 'Fast, DLT-Compliant Bulk SMS Service Provider in India',
                'full_desc'     => 'Rich System Solutions has been providing bulk SMS services across India since 2009. With over 16 years of platform reliability, DLT-compliant infrastructure, and a delivery rate that consistently exceeds 99%, we are the bulk SMS partner that businesses trust when it matters most.',
                'detailed_desc' => 'Think about the last time a message from a brand actually made you stop and read. Chances are, it came as an SMS — short, direct, delivered straight to your phone. No algorithm. No ad budget competition. Just your message, in front of your customer, within seconds. Our DLT-compliant bulk SMS platform supports promotional, transactional, and OTP messaging with real-time delivery reports, API integration, and multi-language support. We also handle the complete DLT registration process — ensuring your campaigns are fully compliant and protecting your brand from penalties.',
                'image'         => null,
                'order'         => 1,
                'subtypes' => [
                    ['title' => 'Promotional Bulk SMS', 'description' => 'Send offers, discounts, event invitations, and marketing messages to a large opted-in audience. Promotional SMS is the most cost-effective way to run flash sales and time-sensitive campaigns. Messages are delivered during permitted hours as per TRAI regulations.', 'image' => null, 'order' => 1],
                    ['title' => 'Transactional SMS Service', 'description' => 'Transactional SMS delivers critical information — order confirmations, booking alerts, delivery updates, and account notifications — 24 hours a day, 7 days a week, including Sundays and public holidays. These messages carry your registered sender ID and are DLT-compliant by default.', 'image' => null, 'order' => 2],
                    ['title' => 'OTP SMS Service', 'description' => 'One-Time Passwords need to reach your users in under 3 seconds. Our OTP SMS service is built on a priority routing infrastructure that ensures the fastest possible delivery, making it ideal for fintech apps, e-commerce checkouts, healthcare portals, and any platform requiring secure authentication.', 'image' => null, 'order' => 3],
                    ['title' => 'API-Based SMS Integration', 'description' => 'Integrate our SMS gateway directly into your website, app, or CRM using our simple REST API. Developers get clean documentation, sandbox testing environment, and dedicated technical support. Automate SMS triggers for virtually any customer action.', 'image' => null, 'order' => 4],
                ],
                'benefits' => [
                    ['title' => 'Maximize Your Reach with Bulk SMS', 'subtitle' => 'Engage Customers, Boost Sales and Deliver Instant Communication.', 'description' => 'Bulk SMS provides a direct, reliable way to connect with your audience for promotions, alerts, reminders, or updates. With open rates exceeding traditional email marketing, your message is seen instantly. Our platform supports retail flash sale alerts, healthcare appointment reminders, education fee notifications, and real estate property launch alerts.', 'image' => null, 'list' => ['Send messages instantly for real-time communication.', 'Over 98% open rate ensures visibility.', 'Low-cost marketing with excellent ROI.', 'Reach anyone globally with a mobile phone.', 'DLT-compliant platform protects your brand from penalties.', 'Real-time delivery reports on your dashboard.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What is DLT registration and is it mandatory for bulk SMS?', 'answer' => 'DLT (Distributed Ledger Technology) registration is mandatory for all businesses sending bulk SMS in India as per TRAI regulations effective from 2020. You must register your entity, sender ID, and message templates on a DLT portal. Rich System Solutions assists with the complete DLT registration process.', 'order' => 1],
                    ['question' => 'What is the difference between promotional and transactional SMS?', 'answer' => 'Promotional SMS is used for marketing messages like offers and discounts — sent only to opted-in numbers during permitted hours (9 AM to 9 PM). Transactional SMS delivers service-critical information like OTPs, alerts, and confirmations — available 24/7 to any number, including DND.', 'order' => 2],
                    ['question' => 'How fast is SMS delivery on your platform?', 'answer' => 'Our platform delivers transactional and OTP SMS within 3 to 5 seconds on average. Promotional SMS campaigns to large lists are processed in batches with delivery typically completed within 2 to 5 minutes for lists up to 1 lakh numbers.', 'order' => 3],
                    ['question' => 'Can I integrate your SMS service with my CRM or website?', 'answer' => 'Yes. We provide a clean REST API with full documentation. Our API supports sending single and bulk SMS, checking delivery status, managing contact lists, and scheduling messages. We also support popular CRM integrations.', 'order' => 4],
                ],
            ],
            [
                'slug'          => 'bulk-voice',
                'title'         => 'Bulk Voice Call',
                'subtitle'      => 'Automated Voice Broadcasting at Scale — Bulk Voice Call Service Provider India',
                'full_desc'     => 'Rich System Solutions provides bulk voice call services across India — enabling businesses to send pre-recorded voice messages to thousands of numbers simultaneously, with real-time delivery reports, DTMF response capture, and full DLT compliance.',
                'detailed_desc' => 'Some messages need to be heard, not read. When you need to reach thousands of customers simultaneously with an urgent update, a personal invitation, or a critical alert — bulk voice calls deliver your message with a human touch that text simply cannot replicate. Our platform supports promotional voice calls, transactional voice alerts, interactive DTMF campaigns, and OTP voice delivery. Campaigns to 1 lakh numbers complete in under 90 minutes, with real-time monitoring of answered calls, DTMF responses, and recordings.',
                'image'         => null,
                'order'         => 2,
                'subtypes' => [
                    ['title' => 'Promotional Voice Calls', 'description' => 'Announce product launches, sale events, grand openings, and special offers through a personalised recorded message from your brand. Voice calls have far higher recall than SMS or email because hearing a message creates a stronger memory trace.', 'image' => null, 'order' => 1],
                    ['title' => 'Transactional Voice Alerts', 'description' => 'Send critical business notifications through voice — payment due reminders, appointment confirmations, order dispatch alerts, and compliance notifications. For customers who may not read SMS or email promptly, a voice call demands immediate attention.', 'image' => null, 'order' => 2],
                    ['title' => 'Interactive Voice Campaigns (DTMF)', 'description' => 'Run interactive voice campaigns where recipients respond by pressing a key — Press 1 to confirm your appointment, Press 2 to speak to an agent, Press 3 to opt out. DTMF responses are captured and reported in real time, enabling two-way communication at scale.', 'image' => null, 'order' => 3],
                    ['title' => 'OTP Voice Calls', 'description' => 'For users who cannot receive SMS OTPs — due to network issues, DND registration, or device limitations — voice OTP calls deliver the one-time password through a spoken message. This significantly reduces authentication drop-off rates.', 'image' => null, 'order' => 4],
                ],
                'benefits' => [
                    ['title' => 'Amplify Your Reach with Bulk Voice Solutions', 'subtitle' => 'Effortless Voice Messaging for Maximum Impact', 'description' => 'Communicate effectively with Bulk Voice services. Deliver personalised voice messages to thousands of recipients instantly. Whether for promotions, updates, or alerts, this solution ensures your message is heard loud and clear, creating a lasting impression. Answer rates typically range between 40% and 65% — far exceeding email open rates for urgent communications.', 'image' => null, 'list' => ['Send messages to thousands of contacts simultaneously.', 'Deliver a human-like experience with customisable voice messages.', 'DTMF response capture enables two-way communication at scale.', 'Campaigns to 1 lakh numbers complete in under 90 minutes.', 'Ideal for marketing campaigns, reminders, surveys, and emergency alerts.', 'Fully TRAI-compliant with DND filtering.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'Are bulk voice calls legal in India?', 'answer' => 'Yes. Bulk voice calls are legal in India when conducted in compliance with TRAI regulations. Commercial voice calls must respect DND preferences and calling time windows (typically 9 AM to 9 PM). Rich System Solutions ensures all voice campaigns are fully TRAI-compliant.', 'order' => 1],
                    ['question' => 'What is the average answer rate for bulk voice calls in India?', 'answer' => 'Answer rates for bulk voice calls in India typically range between 40% and 65%, depending on the time of day, the industry, and whether the number is known to the recipient. Calls made between 10 AM to 12 PM and 5 PM to 7 PM generally achieve the highest answer rates.', 'order' => 2],
                    ['question' => 'Can I personalise the voice message with the customer\'s name?', 'answer' => 'Yes. Using text-to-speech personalisation, each call can be customised with the recipient\'s name, account number, or any variable data pulled from your contact list. Personalised voice calls achieve significantly higher engagement than generic recorded messages.', 'order' => 3],
                    ['question' => 'How quickly can I launch a bulk voice campaign?', 'answer' => 'Once your audio message is ready and contacts are uploaded, a campaign can be launched within 30 minutes. For new accounts, a brief onboarding and compliance verification is completed first — typically taking less than 2 hours.', 'order' => 4],
                ],
            ],
            [
                'slug'          => 'whatsapp-service',
                'title'         => 'WhatsApp Business API',
                'subtitle'      => 'Official Meta Verified WhatsApp Business API Provider India',
                'full_desc'     => 'Rich System Solutions is an officially Meta Verified WhatsApp Business API provider in India. When your business sends a message through our platform, it carries the weight of a verified business identity — the green tick, your brand name, and full compliance with Meta\'s messaging policies.',
                'detailed_desc' => 'In India, people do not just use WhatsApp — they live on it. Over 500 million active users check WhatsApp multiple times every day. The WhatsApp Business API is the enterprise-grade version of WhatsApp for business — designed for companies that need to send high volumes of messages, automate customer interactions, and manage conversations at scale. Unlike the regular WhatsApp Business App (limited to 256 contacts per broadcast), the API has no such limits. Our onboarding process covers business verification, phone number registration, message template approval, platform integration, and go-live within 24 to 72 hours.',
                'image'         => null,
                'order'         => 3,
                'subtypes' => [
                    ['title' => 'Broadcast Campaigns', 'description' => 'Send promotional messages, product launches, offers, and event invitations to your entire customer database at once. Unlike email, WhatsApp messages are read by over 90% of recipients within the first hour. Your broadcast reaches people where they are already active.', 'image' => null, 'order' => 1],
                    ['title' => 'Automated Drip Campaigns', 'description' => 'Set up automated message sequences that nurture leads over time. When someone enquires about your product, your WhatsApp automation can follow up with information, testimonials, and a booking link — all without manual intervention.', 'image' => null, 'order' => 2],
                    ['title' => 'Two-Way Customer Conversations', 'description' => 'Enable real-time two-way conversations between your customers and your sales or support team. Multiple agents can handle conversations simultaneously through a shared inbox — no more single-device limitations.', 'image' => null, 'order' => 3],
                    ['title' => 'WhatsApp Catalogue Selling', 'description' => 'Showcase your products directly inside WhatsApp using the Catalogue feature. Customers can browse, ask questions, and place orders — all within the same chat. This is especially powerful for retail, FMCG, and D2C brands.', 'image' => null, 'order' => 4],
                    ['title' => 'Transactional Notifications', 'description' => 'Send order confirmations, payment receipts, appointment reminders, delivery tracking updates, and OTPs through WhatsApp. These messages have higher open rates than email and faster read times than SMS.', 'image' => null, 'order' => 5],
                ],
                'benefits' => [
                    ['title' => 'Boost Your Business with Advanced WhatsApp Services', 'subtitle' => 'Bulk Messaging, Blue Tick Verification, and WhatsApp Business API Solutions', 'description' => 'Enhance your business communication with our WhatsApp Business API. From broadcast campaigns to automated drip sequences and two-way conversations, we provide the tools to connect, engage, and grow efficiently — all through India\'s most trusted messaging platform.', 'image' => null, 'list' => ['Instantly reach a broad audience with promotional messages.', 'Build trust with a Meta Verified badge that ensures authenticity.', 'Automate responses and follow-ups without human intervention.', 'Multiple agents handle conversations through one shared inbox.', 'Catalogue selling lets customers browse and order inside WhatsApp.', 'Go live within 24 to 72 hours of complete documentation.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What is a Meta Verified WhatsApp Business API provider?', 'answer' => 'A Meta Verified provider is an official partner approved by Meta (Facebook\'s parent company) to resell and implement the WhatsApp Business API. Working with a verified provider ensures your business messaging is compliant, reliable, and carries the trust of an officially sanctioned platform.', 'order' => 1],
                    ['question' => 'How much does WhatsApp Business API cost in India?', 'answer' => 'WhatsApp Business API pricing in India is based on conversation charges set by Meta (billed in INR). Rich System Solutions offers transparent pricing with no hidden setup fees. Contact us for the current rate card based on your estimated monthly conversation volume.', 'order' => 2],
                    ['question' => 'Can I send bulk WhatsApp messages without getting blocked?', 'answer' => 'Yes — through the official WhatsApp Business API with proper opt-in compliance, your messages are delivered reliably without risk of blocking. Unofficial bulk WhatsApp tools risk permanent account bans. The API is the only safe, scalable solution for bulk WhatsApp messaging.', 'order' => 3],
                    ['question' => 'How long does WhatsApp Business API setup take?', 'answer' => 'With complete business documents, our onboarding process takes 24 to 72 hours for most businesses. Meta\'s verification timeline can vary, but our team manages the entire process to minimise delays.', 'order' => 4],
                ],
            ],
            [
                'slug'          => 'digital-marketing',
                'title'         => 'Digital Marketing',
                'subtitle'      => 'Full-Service Digital Marketing Agency in Nashik That Turns Clicks Into Customers',
                'full_desc'     => 'Rich System Solutions is a full-service digital marketing agency in Nashik with over 16 years of experience helping brands grow online. We have run SEO campaigns that pushed local businesses to Google Page 1, social media strategies that built communities of thousands, and PPC campaigns that returned ₹8 for every ₹1 spent.',
                'detailed_desc' => 'Every business in Nashik today has a phone number on a hoarding, a shop on the high street, and word-of-mouth working overtime. What most do not have is a digital presence that works while they sleep. Our digital marketing services cover SEO, social media marketing, PPC advertising on Google and Meta platforms, WhatsApp marketing via official Meta Verified API, content marketing, email marketing, and graphic design. Our proven 5-step process: Discovery & Audit → Strategy & Roadmap → Campaign Execution → Tracking & Reporting → Optimisation & Scaling.',
                'image'         => null,
                'order'         => 4,
                'subtypes' => [],
                'benefits' => [],
                'case_studies' => [
                    ['title' => 'Real Estate', 'industry' => 'Real Estate', 'image' => null, 'order' => 1],
                    ['title' => 'Healthcare', 'industry' => 'Healthcare', 'image' => null, 'order' => 2],
                    ['title' => 'E-Commerce', 'industry' => 'E-Commerce', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'How much does digital marketing cost in Nashik?', 'answer' => 'Digital marketing packages at Rich System Solutions start at affordable SME-friendly rates. Pricing depends on the channels required, campaign scale, and business goals. Contact us for a customised quote — we do not believe in one-size-fits-all pricing.', 'order' => 1],
                    ['question' => 'How long does SEO take to show results?', 'answer' => 'SEO is a long-term investment. Most businesses begin to see measurable improvement in rankings and organic traffic within 3 to 6 months of consistent effort. Local SEO for Nashik keywords can often deliver results faster, within 4 to 8 weeks.', 'order' => 2],
                    ['question' => 'Do you run Google Ads and Meta Ads together?', 'answer' => 'Yes. We recommend a combined approach for maximum coverage. Google Ads captures high-intent search traffic, while Meta Ads (Facebook and Instagram) build brand awareness and retarget visitors who have already shown interest.', 'order' => 3],
                ],
            ],
            [
                'slug'          => 'whats-chatbot',
                'title'         => 'WhatsApp Chatbot',
                'subtitle'      => 'WhatsApp Marketing Software & Chatbot for Business — Automate, Engage, Convert',
                'full_desc'     => 'Our WhatsApp marketing software combines the power of automation, AI-driven responses, and CRM integration to turn WhatsApp into your most productive sales and support channel. No coding skills required — our team handles the entire setup, flow design, and deployment.',
                'detailed_desc' => 'Imagine a sales assistant who never sleeps, never misses a follow-up, and handles a hundred conversations at once — all on WhatsApp, in the customer\'s own language, at any hour of the day. That is what a WhatsApp chatbot from Rich System Solutions delivers for your business. Our platform features a drag-and-drop chatbot flow builder, broadcast campaign manager, CRM integration, multi-agent shared inbox, keyword-triggered auto-replies, and abandoned lead recovery sequences. Support for Hindi, Marathi, and English is built in — and when the chatbot cannot answer, the conversation transfers seamlessly to a live human agent.',
                'image'         => null,
                'order'         => 5,
                'subtypes' => [
                    ['title' => 'Drag-and-Drop Chatbot Flow Builder', 'description' => 'Build your WhatsApp chatbot conversations visually — no developer needed. Create branching conversation flows, decision trees, and auto-reply sequences that guide customers from their first question to a completed sale or support resolution.', 'image' => null, 'order' => 1],
                    ['title' => 'Broadcast Campaign Manager', 'description' => 'Schedule and send WhatsApp broadcast messages to segmented customer lists. Target by location, purchase history, interest, or any custom tag. Track open rates, reply rates, and link clicks in real time.', 'image' => null, 'order' => 2],
                    ['title' => 'CRM Integration & Lead Management', 'description' => 'Every WhatsApp conversation is captured in your CRM automatically. Leads are tagged, scored, and routed to the right sales agent. Integration with popular CRMs like Zoho, HubSpot, and Salesforce is supported.', 'image' => null, 'order' => 3],
                    ['title' => 'Multi-Agent Shared Inbox', 'description' => 'Multiple team members handle customer conversations from a single WhatsApp number. Assign conversations, add internal notes, track response times, and ensure no customer message goes unanswered — even during peak hours.', 'image' => null, 'order' => 4],
                    ['title' => 'Abandoned Lead Recovery', 'description' => 'Automatically follow up with leads who enquired but did not convert. A well-timed sequence of WhatsApp messages — sent at 1 day, 3 days, and 7 days after the first contact — can recover 20–35% of lost leads.', 'image' => null, 'order' => 5],
                ],
                'benefits' => [
                    ['title' => 'Enhance Customer Engagement with WhatsApp Chatbot', 'subtitle' => 'Automate Conversations and Deliver Instant Support via WhatsApp', 'description' => 'Streamline your customer service and boost engagement with our WhatsApp Chatbot. This AI-powered solution enables 24/7 interaction, automating responses, answering FAQs, and guiding customers through their journey — all within the WhatsApp they already use every day.', 'image' => null, 'list' => ['Provide immediate replies to customer inquiries at any time of day.', 'Reduce wait times and improve customer satisfaction.', 'Recover 20–35% of lost leads with automated follow-up sequences.', 'Automate repetitive tasks such as FAQs, order status, and booking confirmations.', 'Multi-language support for Hindi, Marathi, and English.', 'Seamless human agent handover when the bot cannot help.']],
                ],
                'case_studies' => [
                    ['title' => 'Real Estate', 'industry' => 'Real Estate', 'image' => null, 'order' => 1],
                    ['title' => 'Education', 'industry' => 'Education', 'image' => null, 'order' => 2],
                    ['title' => 'Healthcare', 'industry' => 'Healthcare', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'Do I need coding skills to set up a WhatsApp chatbot?', 'answer' => 'No. Our WhatsApp chatbot platform uses a visual drag-and-drop builder. Your team can design and update conversation flows without any technical knowledge. For more complex integrations, our development team handles the backend.', 'order' => 1],
                    ['question' => 'Can the chatbot handle conversations in Hindi and Marathi?', 'answer' => 'Yes. Our WhatsApp chatbot supports multiple languages including Hindi, Marathi, and English. You can set up separate conversation flows for each language or allow the bot to detect the customer\'s language and respond accordingly.', 'order' => 2],
                    ['question' => 'What happens when the chatbot cannot answer a question?', 'answer' => 'When a customer\'s query falls outside the chatbot\'s defined flows, the conversation is instantly transferred to a live human agent through the shared inbox. The agent can see the full conversation history and respond seamlessly.', 'order' => 3],
                ],
            ],
            [
                'slug'          => 'digital-auto',
                'title'         => 'Digital Automation',
                'subtitle'      => 'Business Automation Services India — Cut Manual Work, Scale Faster',
                'full_desc'     => 'Rich System Solutions\' business automation services are designed to identify exactly these processes — and eliminate the manual effort permanently. Our digital automation solutions connect your communication channels, CRM, and operations into a seamless, self-running workflow.',
                'detailed_desc' => 'There are tasks in your business being done by a human today that should not require a human at all. Data entry. Follow-up emails. Lead assignment. Invoice generation. Report compilation. Each one individually is manageable. Together, they consume hours every day that your team could spend on work that actually grows the business. India\'s SME sector loses an estimated 20–30% of productive hours to repetitive manual tasks. Businesses with automated follow-up systems convert 2–3x more leads than those without. Our automation approach: Business Audit → Tool Selection → Workflow Design → Integration & Testing → Training & Handover.',
                'image'         => null,
                'order'         => 6,
                'subtypes' => [
                    ['title' => 'Marketing Automation', 'description' => 'Automate your entire marketing funnel — from the first ad click to the final purchase. Set up triggered email sequences, WhatsApp follow-ups, SMS campaigns, and lead scoring rules that run automatically based on customer behaviour. Your marketing works even when your team is offline.', 'image' => null, 'order' => 1],
                    ['title' => 'WhatsApp & SMS Communication Automation', 'description' => 'Connect your WhatsApp Business API and bulk SMS platform to your CRM and trigger automated messages based on customer actions. New lead registered? They get a WhatsApp greeting immediately. Order placed? SMS confirmation in seconds. Payment overdue? Automated gentle reminder — no manual follow-up needed.', 'image' => null, 'order' => 2],
                    ['title' => 'Lead Management Automation', 'description' => 'Stop manually sorting leads from different sources — website forms, Facebook Ads, Google Ads, WhatsApp enquiries. Our lead automation system captures all leads in one place, scores them based on defined criteria, assigns them to the right salesperson, and triggers the first follow-up automatically.', 'image' => null, 'order' => 3],
                    ['title' => 'Reporting & Analytics Automation', 'description' => 'Generate and distribute business performance reports automatically on daily, weekly, or monthly schedules. Your team starts each Monday with an inbox report — no one needs to manually compile data from five different tools.', 'image' => null, 'order' => 4],
                    ['title' => 'Workflow & Approval Automation', 'description' => 'Automate internal workflows — document approvals, task assignments, escalation rules, and team notifications. When a deal moves to a new stage, the right person gets notified automatically and the next action is triggered without anyone having to remember.', 'image' => null, 'order' => 5],
                ],
                'benefits' => [
                    ['title' => 'Transform Your Business with Digital Automation', 'subtitle' => 'Streamline Processes, Boost Efficiency, and Enhance Productivity', 'description' => 'Digital Automation streamlines business operations by automating repetitive tasks, improving efficiency, reducing errors, and saving costs. It helps businesses scale seamlessly, enhance customer experiences, and focus on strategic growth. Businesses with automated follow-up systems convert 2–3x more leads than those without.', 'image' => null, 'list' => ['Automate routine tasks to save time and reduce human error.', 'Convert 2–3x more leads with automated follow-up sequences.', 'Reduce 20–30% wasted productive hours in your team.', 'Enhance data reliability for better decision-making.', 'Scale your business without hiring more people for every growth step.', 'Integrate with Zoho CRM, Tally, WhatsApp API, Google Sheets, Razorpay, and more.']],
                ],
                'case_studies' => [
                    ['title' => 'E-Commerce', 'industry' => 'E-Commerce', 'image' => null, 'order' => 1],
                    ['title' => 'Real Estate', 'industry' => 'Real Estate', 'image' => null, 'order' => 2],
                    ['title' => 'Healthcare', 'industry' => 'Healthcare', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What kind of businesses benefit most from automation?', 'answer' => 'Any business that handles volume — multiple leads per day, repetitive customer communication, recurring reports, or multi-step approval processes — benefits significantly from automation. E-commerce, real estate, education, healthcare, and FMCG businesses see the most immediate impact.', 'order' => 1],
                    ['question' => 'Is business automation expensive for small businesses?', 'answer' => 'Not with the right approach. Rich System Solutions designs automation solutions specifically for Indian SMEs — starting with high-impact, low-cost automations that deliver measurable ROI within the first month. We do not over-engineer solutions that are bigger than your business needs.', 'order' => 2],
                    ['question' => 'Can automation integrate with tools I already use?', 'answer' => 'Yes. We support integration with popular Indian and global platforms — Zoho CRM, Tally, WhatsApp Business API, Google Sheets, Facebook Ads, Google Ads, Razorpay, Shopify, and more. Our API-first approach ensures your existing tools work together seamlessly.', 'order' => 3],
                ],
            ],
            [
                'slug'          => 'design-develop',
                'title'         => 'Software Development Company in Nashik & India',
                'subtitle'      => 'End-to-End IT Solutions — Custom Software, Web, and Mobile App Development',
                'full_desc'     => 'Behind every growing business is a system that works reliably — software that manages inventory, tracks customers, processes orders, and connects every department without friction. Building that system is what Rich System Solutions has been doing since 2009. As a full-service software development company based in Nashik, we have delivered over 1,000 custom projects for businesses across manufacturing, healthcare, retail, education, and fintech.',
                'detailed_desc' => 'Our team builds software that solves real problems — not software that looks good in a demo and struggles in production. Custom Software Development. Web Application Development — from dynamic business websites to complex multi-tier web apps. Mobile App Development for Android and iOS. SaaS Product Development. API Development & Third-Party Integration. IT Consulting & System Architecture. Technologies: React.js, Next.js, Node.js, PHP (Laravel), Python, React Native, Flutter. Our development process follows two-week sprint cycles with regular demos so you always know what is being built.',
                'image'         => null,
                'order'         => 7,
                'subtypes' => [
                    ['title' => 'Custom Software Development', 'description' => 'We build software from the ground up based on your exact business requirements. Whether you need an ERP system for your manufacturing plant, a patient management platform for your hospital, or an inventory tool for your retail chain — our custom software is built to fit your workflow, not the other way around.', 'image' => null, 'order' => 1],
                    ['title' => 'Web Application Development', 'description' => 'From dynamic business websites to complex multi-tier web applications, our web development team works with Next.js, React, Node.js, PHP, and Python. We build web apps that are fast, secure, scalable, and SEO-ready from day one.', 'image' => null, 'order' => 2],
                    ['title' => 'Mobile App Development', 'description' => 'We develop native and cross-platform mobile apps for Android and iOS. Whether you need a customer-facing app for your business or an internal operations tool for your field team, our mobile apps are built for performance, usability, and long-term maintainability.', 'image' => null, 'order' => 3],
                    ['title' => 'SaaS Product Development', 'description' => 'If you have a SaaS product idea, we have the team to build it. From architecture design and MVP development to scaling and feature expansion, we partner with SaaS founders across India and provide end-to-end product engineering services.', 'image' => null, 'order' => 4],
                ],
                'benefits' => [
                    ['title' => 'Why Rich System Solutions for Software Development', 'subtitle' => 'Over 1,000 Custom Projects Delivered Since 2009', 'description' => 'As a full-service software development company based in Nashik, we have delivered over 1,000 custom projects for businesses across manufacturing, healthcare, retail, education, and fintech. Our team builds software that solves real problems — not software that looks good in a demo and struggles in production.', 'image' => null, 'list' => ['1,000+ custom projects delivered since 2009.', 'In-house team — no outsourcing, faster delivery and quality control.', 'Two-week sprint cycles with demos — you always know progress.', 'Technologies: React.js, Next.js, Node.js, PHP, Python, Flutter.', 'Complete source code ownership transferred to you on completion.', 'Annual Maintenance Contract (AMC) available post-delivery.']],
                ],
                'case_studies' => [
                    ['title' => 'Manufacturing', 'industry' => 'Manufacturing', 'image' => null, 'order' => 1],
                    ['title' => 'Healthcare', 'industry' => 'Healthcare', 'image' => null, 'order' => 2],
                    ['title' => 'Retail & E-Commerce', 'industry' => 'E-Commerce', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'How much does custom software development cost in India?', 'answer' => 'Custom software development costs in India vary based on complexity, features, and technology stack. A basic business management application might start from ₹2–5 lakhs, while a full enterprise platform or SaaS product can range from ₹10 lakhs to ₹50 lakhs and beyond. Rich System Solutions provides a detailed scope and cost estimate after a free requirement consultation.', 'order' => 1],
                    ['question' => 'How long does it take to build custom software?', 'answer' => 'A simple web application typically takes 6 to 12 weeks. A mid-complexity platform with integrations takes 3 to 6 months. Enterprise-level systems take 6 to 12 months. We provide a realistic timeline during the proposal stage — and we stick to it.', 'order' => 2],
                    ['question' => 'Do you provide software maintenance after delivery?', 'answer' => 'Yes. All our software projects come with a warranty period and the option for an ongoing Annual Maintenance Contract (AMC). This covers bug fixes, security patches, hosting support, and minor feature updates.', 'order' => 3],
                ],
            ],
            [
                'slug'          => 'graphic-design',
                'title'         => 'Graphic Design',
                'subtitle'      => 'Creative Design That Builds Brands — Graphic Design Agency in Nashik',
                'full_desc'     => 'Rich System Solutions\' graphic design team in Nashik creates visual identities and marketing materials that make brands look credible, professional, and distinctly themselves. We design for businesses that take their image seriously — from startups building a brand from scratch to established companies refreshing their look.',
                'detailed_desc' => 'Your brand is not just your logo. It is the feeling someone gets when they see your Instagram post, read your brochure, or land on your website. Every colour, every typeface, every visual element sends a signal about who you are and why you are worth their attention. Studies consistently show that consistent brand presentation increases revenue by an average of 23%. Our design process: Brief & Discovery → Concept Development (2–3 directions) → Feedback & Refinement → Final Delivery in all formats.',
                'image'         => null,
                'order'         => 8,
                'subtypes' => [
                    ['title' => 'Logo Design & Brand Identity', 'description' => 'A great logo is simple, memorable, and works at every size — from a business card to a billboard. Our brand identity packages include logo design, colour palette, typography selection, brand guidelines document, and a complete visual identity system that gives your brand a consistent look across all touchpoints.', 'image' => null, 'order' => 1],
                    ['title' => 'Social Media Graphic Design', 'description' => 'Consistent, on-brand social media graphics for Instagram, Facebook, LinkedIn, and WhatsApp. We design post templates, story templates, ad creatives, cover photos, and profile graphics that make your social presence look polished and professional — even when your team is posting in a hurry.', 'image' => null, 'order' => 2],
                    ['title' => 'Marketing & Print Design', 'description' => 'Brochures, flyers, posters, banners, standees, and hoardings. We design marketing collateral that communicates your message clearly and persuasively — whether it is a Diwali sale poster for your shop or a corporate capability document for a client pitch.', 'image' => null, 'order' => 3],
                    ['title' => 'Digital Ad Creatives', 'description' => 'High-converting ad visuals for Google Display, Facebook Ads, Instagram Ads, and WhatsApp campaigns. Our ad creatives are designed with conversion in mind — the right visual hierarchy, the right copy placement, and the right call-to-action format for each platform\'s specifications.', 'image' => null, 'order' => 4],
                    ['title' => 'UI/UX Design for Web & Mobile', 'description' => 'User interface design for websites, web applications, and mobile apps. We create wireframes, high-fidelity mockups, and interactive prototypes that are both aesthetically strong and user-friendly. Our UI/UX work is delivered in Figma with complete design system documentation.', 'image' => null, 'order' => 5],
                    ['title' => 'Presentation Design', 'description' => 'Investor decks, sales presentations, product demos, and corporate reports — designed to impress. A well-designed presentation does not just look good; it structures information so clearly that your message lands every time.', 'image' => null, 'order' => 6],
                ],
                'benefits' => [
                    ['title' => 'Unleash Creativity with Expert Graphic Design', 'subtitle' => 'Crafting Visual Experiences That Captivate and Inspire', 'description' => 'Our Graphic Design services create compelling visuals that bring your brand\'s message to life, helping you connect with your audience and stand out in the market. Consistent brand presentation increases revenue by an average of 23% — a one-time investment in professional design pays for itself many times over.', 'image' => null, 'list' => ['Builds a memorable and unique brand identity.', 'Consistent brand presentation increases revenue by 23% on average.', 'Simplifies complex messages through visuals.', 'Gives your business a polished and credible look.', 'Captures attention and drives interaction.', 'All files delivered in print-ready, web-optimised, and vector formats.']],
                ],
                'case_studies' => [
                    ['title' => 'Retail', 'industry' => 'Retail', 'image' => null, 'order' => 1],
                    ['title' => 'Real Estate', 'industry' => 'Real Estate', 'image' => null, 'order' => 2],
                    ['title' => 'Hospitality', 'industry' => 'Hospitality', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'How many revisions are included in logo design?', 'answer' => 'Our standard logo design package includes three rounds of revisions after the initial concept presentation. Additional revision rounds can be requested for a nominal charge. We work until you are genuinely happy with the result.', 'order' => 1],
                    ['question' => 'What file formats will I receive for my logo?', 'answer' => 'You receive your logo in all major formats: SVG and AI (vector, for infinite scalability), PNG (transparent background, for digital use), PDF (print-ready), and JPEG. You also receive a version on white background and a version on dark background.', 'order' => 2],
                    ['question' => 'Can you redesign my existing brand without losing brand recognition?', 'answer' => 'Yes. Brand evolution — rather than revolution — is often the right approach for established businesses. We can modernise your visual identity while preserving the elements your existing customers recognise and associate with your brand.', 'order' => 3],
                ],
            ],
            [
                'slug'          => 'alert-system',
                'title'         => 'Bulk SMS / Alert System',
                'subtitle'      => 'Fast, DLT-Compliant Bulk SMS Service Provider in India',
                'full_desc'     => 'Rich System Solutions has been providing bulk SMS services across India since 2009. With over 16 years of platform reliability, DLT-compliant infrastructure, and a delivery rate that consistently exceeds 99%, we are the bulk SMS partner that businesses trust when it matters most.',
                'detailed_desc' => 'Think about the last time a message from a brand actually made you stop and read. Chances are, it came as an SMS — short, direct, delivered straight to your phone. No algorithm. No ad budget competition. Just your message, in front of your customer, within seconds. Our DLT-compliant platform handles promotional, transactional, and OTP messaging with real-time delivery reports and API integration. We also manage the complete DLT registration process — ensuring your campaigns are fully TRAI-compliant.',
                'image'         => null,
                'order'         => 9,
                'subtypes' => [
                    ['title' => 'Promotional Bulk SMS', 'description' => 'Send offers, discounts, event invitations, and marketing messages to a large opted-in audience. Promotional SMS is the most cost-effective way to run flash sales and time-sensitive campaigns. Messages are delivered during permitted hours as per TRAI regulations.', 'image' => null, 'order' => 1],
                    ['title' => 'Transactional SMS Service', 'description' => 'Transactional SMS delivers critical information — order confirmations, booking alerts, delivery updates, and account notifications — 24 hours a day, 7 days a week, including Sundays and public holidays. These messages carry your registered sender ID and are DLT-compliant by default.', 'image' => null, 'order' => 2],
                    ['title' => 'OTP SMS Service', 'description' => 'One-Time Passwords need to reach your users in under 3 seconds. Our OTP SMS service is built on a priority routing infrastructure that ensures the fastest possible delivery, making it ideal for fintech apps, e-commerce checkouts, healthcare portals, and any platform requiring secure authentication.', 'image' => null, 'order' => 3],
                    ['title' => 'API-Based SMS Integration', 'description' => 'Integrate our SMS gateway directly into your website, app, or CRM using our simple REST API. Developers get clean documentation, sandbox testing environment, and dedicated technical support. Automate SMS triggers for virtually any customer action.', 'image' => null, 'order' => 4],
                ],
                'benefits' => [
                    ['title' => 'Bulk SMS Service Provider in India', 'subtitle' => 'Fast, DLT-Compliant & Reliable — Since 2009', 'description' => 'Rich System Solutions has been providing bulk SMS services across India since 2009. With over 16 years of platform reliability, DLT-compliant infrastructure, and a delivery rate that consistently exceeds 99%, we are the bulk SMS partner that businesses trust when it matters most.', 'image' => null, 'list' => ['99%+ delivery rate on transactional and OTP SMS.', 'DLT-compliant platform — full TRAI compliance handled for you.', 'Promotional, transactional, and OTP SMS on one platform.', 'OTP delivery in under 3 seconds on priority routing.', 'REST API integration for developers with clean documentation.', 'Campaigns to 1 lakh numbers processed in 2 to 5 minutes.']],
                ],
                'case_studies' => [
                    ['title' => 'Healthcare', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Retail & E-Commerce', 'industry' => 'E-Commerce', 'image' => null, 'order' => 2],
                    ['title' => 'Education', 'industry' => 'Education', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What is DLT registration and is it mandatory for bulk SMS?', 'answer' => 'DLT (Distributed Ledger Technology) registration is mandatory for all businesses sending bulk SMS in India as per TRAI regulations effective from 2020. You must register your entity, sender ID, and message templates on a DLT portal. Rich System Solutions assists with the complete DLT registration process.', 'order' => 1],
                    ['question' => 'What is the difference between promotional and transactional SMS?', 'answer' => 'Promotional SMS is used for marketing messages like offers and discounts — sent only to opted-in numbers during permitted hours (9 AM to 9 PM). Transactional SMS delivers service-critical information like OTPs, alerts, and confirmations — available 24/7 to any number, including DND.', 'order' => 2],
                    ['question' => 'How fast is SMS delivery on your platform?', 'answer' => 'Our platform delivers transactional and OTP SMS within 3 to 5 seconds on average. Promotional SMS campaigns to large lists are processed in batches with delivery typically completed within 2 to 5 minutes for lists up to 1 lakh numbers.', 'order' => 3],
                    ['question' => 'Can I integrate your SMS service with my CRM or website?', 'answer' => 'Yes. We provide a clean REST API with full documentation. Our API supports sending single and bulk SMS, checking delivery status, managing contact lists, and scheduling messages. We also support popular CRM integrations.', 'order' => 4],
                ],
            ],
            [
                'slug'          => 'ivr-system',
                'title'         => 'IVR System',
                'subtitle'      => 'Professional Call Handling — Cloud-Based IVR Solutions for Indian Businesses',
                'full_desc'     => 'Rich System Solutions provides cloud-based IVR system solutions for businesses across India. Whether you are a single-office business handling 20 calls a day or a multi-location company managing hundreds of daily inbound calls, our IVR system scales to your needs.',
                'detailed_desc' => 'The first impression a customer gets when they call your business sets the tone for everything that follows. A professional IVR system — Press 1 for Sales, Press 2 for Support — immediately signals that your business is organised, responsive, and serious about customer experience. IVR (Interactive Voice Response) is a telephone technology that allows customers to interact with your business through a pre-recorded voice menu using keypad inputs or voice commands. Our cloud IVR requires no hardware, sets up in 24–48 hours, and lets you make changes from the dashboard in real time.',
                'image'         => null,
                'order'         => 10,
                'subtypes' => [
                    ['title' => 'Multi-Level Call Menu', 'description' => 'Design multi-level menus that guide callers efficiently — Department selection on Level 1, specific service options on Level 2, and agent connection on Level 3. Customers reach the right person faster, and your team handles fewer misdirected calls.', 'image' => null, 'order' => 1],
                    ['title' => 'Intelligent Call Routing', 'description' => 'Route calls based on time of day, caller location, agent availability, or customer data pulled from your CRM. After-hours calls go to a voicemail or WhatsApp message automatically. Priority customers are routed to senior agents.', 'image' => null, 'order' => 2],
                    ['title' => 'Call Recording & Monitoring', 'description' => 'Every call is recorded and stored securely. Use recordings for quality assurance, dispute resolution, and agent training. Our dashboard lets you listen to calls, tag them, and generate reports on call volume, duration, and outcomes.', 'image' => null, 'order' => 3],
                    ['title' => 'Outbound IVR Campaigns', 'description' => 'Run automated outbound calling campaigns for payment reminders, appointment confirmations, survey collection, and event notifications. The IVR delivers a recorded message, captures a keypress response, and logs the outcome — all automatically.', 'image' => null, 'order' => 4],
                    ['title' => 'CRM & API Integration', 'description' => 'Connect your IVR system to your CRM so agents see the caller\'s complete history the moment the call connects. API integration enables dynamic IVR — where the menu and responses are personalised based on the caller\'s data in real time.', 'image' => null, 'order' => 5],
                ],
                'benefits' => [
                    ['title' => 'Enhance Customer Experience with IVR Systems', 'subtitle' => 'Streamline Call Management and Improve Customer Interaction', 'description' => 'An IVR system automates call handling by allowing customers to interact with a pre-recorded voice menu. It helps businesses efficiently route calls, provide information, and reduce wait times — ensuring a smooth and professional experience for every caller. Cloud IVR from Rich System Solutions requires no hardware, sets up in 24–48 hours, and scales instantly.', 'image' => null, 'list' => ['Direct customers to the right department without delays.', 'Provide automated support around the clock, even outside business hours.', 'Reduce the need for live agents to handle routine inquiries.', 'Offer faster service with minimal wait times.', 'No hardware required — cloud-based setup in 24–48 hours.', 'Multi-language support for Hindi, Marathi, and English.']],
                ],
                'case_studies' => [
                    ['title' => 'Hospital', 'industry' => 'Healthcare', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Insurance', 'industry' => 'Finance', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'What is the difference between IVR and a regular phone system?', 'answer' => 'A regular phone system connects the caller directly to a person. An IVR system presents a voice menu first — allowing the caller to self-select their need, which routes them to the right agent or handles their query automatically. This improves efficiency for both the caller and your team.', 'order' => 1],
                    ['question' => 'Can the IVR system handle calls in Hindi and Marathi?', 'answer' => 'Yes. Our IVR system supports multi-language voice prompts. You can have your menu recorded in Hindi, Marathi, and English — with callers selecting their preferred language at the start of the call. This is especially valuable for businesses in Maharashtra serving a diverse customer base.', 'order' => 2],
                    ['question' => 'How quickly can an IVR system be set up for my business?', 'answer' => 'For a standard multi-level IVR setup, we complete configuration within 24 to 48 hours of receiving your menu script and call routing requirements. More complex systems with CRM integration typically take 3 to 5 business days.', 'order' => 3],
                ],
            ],
            [
                'slug'          => 'bulk-email',
                'title'         => 'Bulk Email',
                'subtitle'      => 'High Deliverability Bulk Email Marketing Service India',
                'full_desc'     => 'Rich System Solutions\' bulk email marketing service is built for businesses that want to do email properly — with professional templates, clean list management, DKIM and SPF authentication, and the technical infrastructure that ensures your emails land in inboxes, not spam folders.',
                'detailed_desc' => 'Email is still the highest-ROI channel in digital marketing. Research consistently shows email marketing returns ₹42 for every ₹1 invested — higher than social media, higher than PPC, and higher than SMS. The biggest challenge in bulk email marketing is deliverability — getting your email into the inbox rather than the spam folder. Our technical setup includes DKIM authentication, SPF records, DMARC policy, dedicated IP addresses for high-volume senders, and bounce and complaint management. Over 60% of emails are opened on mobile in India — all our templates are designed mobile-first.',
                'image'         => null,
                'order'         => 11,
                'subtypes' => [
                    ['title' => 'Promotional Email Campaigns', 'description' => 'Announce sales, launches, and special offers to your full subscriber base. Our email campaign tool lets you segment your list, personalise subject lines, A/B test variations, and schedule sends at the optimal time for your audience.', 'image' => null, 'order' => 1],
                    ['title' => 'Transactional Email Service', 'description' => 'Order confirmations, shipping notifications, password resets, and account alerts — sent automatically in response to user actions. Transactional emails have 8x higher open rates than promotional emails because they are expected and relevant. We configure DKIM, SPF, and DMARC authentication to ensure these critical emails always reach the inbox.', 'image' => null, 'order' => 2],
                    ['title' => 'Email Drip Campaigns & Automation', 'description' => 'Welcome sequences, onboarding flows, re-engagement campaigns, and post-purchase nurturing — automated based on subscriber behaviour. When someone signs up for your newsletter, they receive a tailored welcome sequence. When they have not opened an email in 90 days, a re-engagement campaign fires automatically.', 'image' => null, 'order' => 3],
                    ['title' => 'Newsletter Email Marketing', 'description' => 'Stay top-of-mind with your audience through regular newsletters. We design, write, and send monthly or weekly newsletters that keep your brand relevant — featuring company updates, industry insights, product spotlights, and customer stories.', 'image' => null, 'order' => 4],
                ],
                'benefits' => [
                    ['title' => 'Enhance Your Marketing Strategy with Bulk Email', 'subtitle' => 'Reach a Wider Audience with Effective Email Campaigns — ₹42 ROI per ₹1 Spent', 'description' => 'Bulk email allows businesses to efficiently communicate with large groups of recipients through personalised email campaigns. Research shows email marketing returns ₹42 for every ₹1 invested. Our technical infrastructure — DKIM, SPF, DMARC, dedicated IPs — ensures your emails land in inboxes, not spam folders.', 'image' => null, 'list' => ['₹42 ROI for every ₹1 invested — highest ROI of any digital channel.', 'DKIM, SPF, and DMARC authentication ensures inbox delivery.', 'Mobile-first templates for the 60%+ of users opening email on mobile.', 'Segment, personalise, and A/B test for maximum engagement.', 'Automated drip sequences work while your team is offline.', 'Monitor campaign performance and optimise future emails.']],
                ],
                'case_studies' => [
                    ['title' => 'E-Commerce', 'industry' => 'E-Commerce', 'image' => null, 'order' => 1],
                    ['title' => 'Banking', 'industry' => 'Finance', 'image' => null, 'order' => 2],
                    ['title' => 'Education', 'industry' => 'Education', 'image' => null, 'order' => 3],
                ],
                'faqs' => [
                    ['question' => 'Why are my bulk emails going to spam?', 'answer' => 'Emails land in spam for several reasons: missing SPF/DKIM/DMARC records, poor sender reputation, high bounce rate, spam trigger words in subject lines, or sending to purchased lists. Rich System Solutions audits your current email setup and fixes all technical and list-quality issues before your campaign goes live.', 'order' => 1],
                    ['question' => 'How many emails can I send per day?', 'answer' => 'Sending limits depend on your plan, domain reputation, and IP warm-up stage. For new senders, we recommend starting at 500 to 1,000 emails per day and scaling up over 4 to 6 weeks. Established senders with good reputation can send several lakh emails per day.', 'order' => 2],
                    ['question' => 'Can I send emails from my own domain?', 'answer' => 'Yes, and we strongly recommend it. Sending from your own business domain (e.g. info@yourbusiness.com) builds brand trust and sender reputation. We handle the complete DNS configuration — DKIM, SPF, DMARC — on your domain.', 'order' => 3],
                ],
            ],
        ];

        foreach ($services as $serviceData) {
            $service = Service::updateOrCreate(
                ['slug' => $serviceData['slug']],
                [
                    'title'         => $serviceData['title'],
                    'subtitle'      => $serviceData['subtitle'],
                    'full_desc'     => $serviceData['full_desc'],
                    'detailed_desc' => $serviceData['detailed_desc'],
                    'image'         => $serviceData['image'],
                    'order'         => $serviceData['order'],
                    'is_active'     => true,
                ]
            );

            $service->subtypes()->delete();
            $service->benefits()->delete();
            $service->caseStudies()->delete();
            $service->faqs()->delete();

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
            ['question' => 'What is your pricing model?', 'answer' => 'We offer flexible pricing models including project-based pricing for one-time projects, monthly retainers for ongoing services, and performance-based pricing for certain marketing services. We provide custom quotes based on your specific requirements.', 'order' => 1],
            ['question' => 'How do I get started with your services?', 'answer' => 'Getting started is easy! Contact us for a free consultation where we discuss your goals, analyse your needs, and provide a customised proposal. Once approved, we begin the onboarding process and kick off your project.', 'order' => 2],
            ['question' => 'Do you work with businesses of all sizes?', 'answer' => 'Yes, we work with startups, small businesses, medium enterprises, and large corporations across various industries. We tailor our services to meet the specific needs and budgets of each client.', 'order' => 3],
        ];

        foreach ($generalFaqs as $faq) {
            ServiceFaq::firstOrCreate(
                ['question' => $faq['question'], 'service_id' => null],
                [...$faq, 'service_id' => null, 'is_general' => true, 'is_active' => true]
            );
        }
    }
}
