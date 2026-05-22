<?php

namespace Database\Seeders;

use App\Models\LegalPage;
use App\Models\LegalSection;
use App\Models\LegalSubsection;
use Illuminate\Database\Seeder;

class LegalSeeder extends Seeder
{
    public function run(): void
    {
        // Terms & Conditions
        $terms = LegalPage::updateOrCreate(
            ['type' => 'terms'],
            [
                'page_title'   => 'Terms and Conditions',
                'last_updated' => 'January 1, 2024',
                'introduction' => 'Welcome to Rich System Solutions. By accessing our website and using our services, you agree to be bound by these Terms and Conditions. Please read them carefully before using our services.',
                'is_active'    => true,
            ]
        );

        $termsSections = [
            [
                'title'   => '1. Acceptance of Terms',
                'content' => 'By accessing and using the services provided by Rich System Solutions Pvt Ltd ("Company", "we", "us", or "our"), you accept and agree to be bound by the terms and provisions of this agreement. If you do not agree to abide by the above, please do not use this service.',
                'order'   => 1,
            ],
            [
                'title'   => '2. Description of Services',
                'content' => 'Rich System Solutions provides Bulk SMS services, Marketing SMS services, website development, digital marketing, and related technology solutions. We reserve the right to modify, suspend or discontinue any part of our services at any time.',
                'order'   => 2,
            ],
            [
                'title'   => '3. User Responsibilities',
                'content' => 'You agree to use our services only for lawful purposes and in a manner that does not infringe on the rights of others. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.',
                'order'   => 3,
                'subsections' => [
                    ['title' => 'Account Security', 'content' => 'You are responsible for maintaining the security of your account. Notify us immediately of any unauthorized use.', 'order' => 1],
                    ['title' => 'Prohibited Content', 'content' => 'You may not use our SMS services to send spam, unsolicited messages, or content that violates applicable laws including the TRAI regulations.', 'order' => 2],
                ],
            ],
            [
                'title'   => '4. Intellectual Property',
                'content' => 'All content, trademarks, service marks, trade names, logos, and icons are proprietary to Rich System Solutions. Nothing in these Terms and Conditions grants you any right to use our trademarks without prior written permission.',
                'order'   => 4,
            ],
            [
                'title'   => '5. Payment Terms',
                'content' => 'Payment for services must be made in advance unless otherwise agreed in writing. All prices are exclusive of applicable taxes. We reserve the right to change pricing with 30 days notice.',
                'order'   => 5,
            ],
            [
                'title'   => '6. SMS Messaging Compliance',
                'content' => 'All SMS campaigns must comply with TRAI (Telecom Regulatory Authority of India) regulations and the National Do Not Call (DNC) registry. You are solely responsible for ensuring your messages comply with applicable laws and regulations.',
                'order'   => 6,
                'subsections' => [
                    ['title' => 'DND Compliance', 'content' => 'You must not send promotional messages to numbers registered on the National DND registry. We provide DND filtering as a value-added service but ultimate compliance responsibility rests with you.', 'order' => 1],
                    ['title' => 'Content Guidelines', 'content' => 'Message content must not be fraudulent, misleading, or contain prohibited content as defined by TRAI guidelines.', 'order' => 2],
                ],
            ],
            [
                'title'   => '7. Limitation of Liability',
                'content' => 'Rich System Solutions shall not be liable for any indirect, incidental, special, or consequential damages arising out of or in connection with our services. Our total liability shall not exceed the amount paid by you for the service in the preceding three months.',
                'order'   => 7,
            ],
            [
                'title'   => '8. Privacy Policy',
                'content' => 'Your use of our services is also governed by our Privacy Policy, which is incorporated into these Terms and Conditions by reference. Please review our Privacy Policy to understand our practices.',
                'order'   => 8,
            ],
            [
                'title'   => '9. Termination',
                'content' => 'We may terminate or suspend your account and access to our services immediately, without prior notice, for conduct that we believe violates these Terms and Conditions or is harmful to other users, us, or third parties.',
                'order'   => 9,
            ],
            [
                'title'   => '10. Governing Law',
                'content' => 'These Terms and Conditions shall be governed by and construed in accordance with the laws of India. Any disputes arising under these terms shall be subject to the exclusive jurisdiction of the courts in Nashik, Maharashtra.',
                'order'   => 10,
            ],
            [
                'title'            => '11. Contact Us',
                'content'          => 'If you have any questions about these Terms and Conditions, please contact us using the information below.',
                'order'            => 11,
                'show_contact_info' => true,
            ],
        ];

        foreach ($termsSections as $sectionData) {
            $subsections = $sectionData['subsections'] ?? [];
            unset($sectionData['subsections']);

            $section = LegalSection::updateOrCreate(
                ['legal_page_id' => $terms->id, 'order' => $sectionData['order']],
                array_merge($sectionData, ['legal_page_id' => $terms->id, 'is_active' => true, 'show_contact_info' => $sectionData['show_contact_info'] ?? false])
            );

            foreach ($subsections as $sub) {
                LegalSubsection::updateOrCreate(
                    ['legal_section_id' => $section->id, 'order' => $sub['order']],
                    array_merge($sub, ['legal_section_id' => $section->id, 'is_active' => true])
                );
            }
        }

        // Privacy Policy
        $privacy = LegalPage::updateOrCreate(
            ['type' => 'privacy'],
            [
                'page_title'   => 'Privacy Policy',
                'last_updated' => 'January 1, 2024',
                'introduction' => 'Welcome to Rich System Solution. We are committed to protecting your privacy. This policy explains how we handle your personal information when you visit our website or use our services.',
                'is_active'    => true,
            ]
        );

        $privacySections = [
            [
                'title'   => '1. Introduction',
                'content' => 'Welcome to Rich System Solution ("we," "us," or "our"). We are committed to protecting the privacy of our clients and website visitors. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website https://www.richsol.com, use our services, or submit your information through our online advertising lead forms. Please read this privacy policy carefully. If you do not agree with the terms of this privacy policy, please do not access the site or submit your information.',
                'order'   => 1,
            ],
            [
                'title'   => '2. Information We Collect',
                'content' => 'We may collect information about you in a variety of ways. The information we may collect includes:',
                'order'   => 2,
                'subsections' => [
                    ['title' => 'A. Personal Data You Provide to Us', 'content' => 'We collect personally identifiable information that you voluntarily provide to us when you express an interest in obtaining information about us or our products and services. This is most often collected through our website contact forms or our advertising lead forms. The personal information that we collect includes: Full Name, Email Address, Phone Number, Company Name, and any other information you choose to provide in the message field.', 'order' => 1],
                    ['title' => 'B. Data Collected Automatically', 'content' => 'Our servers may automatically collect information when you access our site, such as your IP address, your browser type, your operating system, your access times, and the pages you have viewed directly before and after accessing the site.', 'order' => 2],
                ],
            ],
            [
                'title'   => '3. How We Use Your Information',
                'content' => 'Having accurate information about you permits us to provide you with a smooth, efficient, and customized experience. Specifically, we may use information collected about you to: respond to your inquiries and fulfill your requests for quotes and information; deliver our services, such as Bulk SMS, to you; send you marketing and promotional communications that we believe may be of interest to you, with a clear option to opt-out; improve our website and service offerings; and comply with legal and regulatory requirements.',
                'order'   => 3,
            ],
            [
                'title'   => '4. Disclosure of Your Information',
                'content' => 'We do not sell, rent, or trade your personal information to third parties for their marketing purposes. We may share information we have collected about you in certain situations: by Law or to Protect Rights — if we believe the release of information about you is necessary to respond to legal process; with Third-Party Service Providers who perform services for us; or in connection with Business Transfers such as a merger or acquisition.',
                'order'   => 4,
            ],
            [
                'title'   => '5. Data Security',
                'content' => 'We use administrative, technical, and physical security measures to help protect your personal information. While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable, and no method of data transmission can be guaranteed against any interception or other type of misuse.',
                'order'   => 5,
            ],
            [
                'title'   => '6. Data Retention',
                'content' => 'We will only retain your personal information for as long as it is necessary for the purposes set out in this privacy policy, unless a longer retention period is required or permitted by law.',
                'order'   => 6,
            ],
            [
                'title'   => '7. Your Rights and Choices',
                'content' => 'You have certain rights regarding your personal information.',
                'order'   => 7,
                'subsections' => [
                    ['title' => 'Access and Correction', 'content' => 'You may request access to the personal information we hold about you and request that any inaccuracies be corrected.', 'order' => 1],
                    ['title' => 'Opt-Out', 'content' => 'You may opt-out of receiving future marketing communications from us at any time by clicking the "unsubscribe" link in the footer of our emails or by contacting us directly.', 'order' => 2],
                ],
            ],
            [
                'title'   => '8. Policy for Children',
                'content' => 'Our services are not directed to individuals under the age of 18. We do not knowingly collect personal information from children. If we become aware that a child has provided us with personal information, we will take steps to delete such information.',
                'order'   => 8,
            ],
            [
                'title'   => '9. Changes to This Privacy Policy',
                'content' => 'We may update this Privacy Policy from time to time. The updated version will be indicated by an updated "Effective Date" and the updated version will be effective as soon as it is accessible. We encourage you to review this privacy policy frequently to be informed of how we are protecting your information.',
                'order'   => 9,
            ],
            [
                'title'            => '10. Contact Us',
                'content'          => 'If you have questions or comments about this Privacy Policy, please contact us at:',
                'order'            => 10,
                'show_contact_info' => true,
            ],
        ];

        foreach ($privacySections as $sectionData) {
            $subsections = $sectionData['subsections'] ?? [];
            unset($sectionData['subsections']);

            $section = LegalSection::updateOrCreate(
                ['legal_page_id' => $privacy->id, 'order' => $sectionData['order']],
                array_merge($sectionData, ['legal_page_id' => $privacy->id, 'is_active' => true, 'show_contact_info' => $sectionData['show_contact_info'] ?? false])
            );

            foreach ($subsections as $sub) {
                LegalSubsection::updateOrCreate(
                    ['legal_section_id' => $section->id, 'order' => $sub['order']],
                    array_merge($sub, ['legal_section_id' => $section->id, 'is_active' => true])
                );
            }
        }
    }
}
