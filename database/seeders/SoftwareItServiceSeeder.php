<?php

namespace Database\Seeders;

use App\Models\SoftwareItService;
use App\Models\SoftwareItServiceFeature;
use App\Models\SoftwareItServiceDeliverable;
use App\Models\SoftwareItServiceTechCategory;
use App\Models\SoftwareItServiceProcessStep;
use App\Models\SoftwareItServiceBenefit;
use Illuminate\Database\Seeder;

class SoftwareItServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'slug'              => 'custom-software-development',
                'label'             => 'Custom Software Development',
                'order'             => 1,
                'hero_title'        => 'Custom Software Development Services in India — Built Around Your Business',
                'hero_description'  => 'Off-the-shelf software comes with one fundamental problem: it was built for someone else\'s business. It has features you will never use and it is missing the exact workflow that makes your business run. You end up adapting your process to fit the software — when it should be the other way around. Custom software development from Rich System Solutions means every feature, every screen, and every database field is designed specifically for how your business operates. No unnecessary complexity. No compromises on the things that matter most to your team.',
                'features'          => [
                    '100% fit to your process — built specifically for your business workflow',
                    'No monthly subscription fees after development — you own it outright',
                    'Unlimited scalability — build any feature, any integration, at any time',
                    'Competitive advantage — unique software that competitors cannot replicate',
                    'Source code ownership transferred to you upon project completion',
                    'Phased development available — start lean, build features as you grow',
                ],
                'deliver_title'       => 'What We Build — Custom Software Development Services',
                'deliver_description' => 'We build software from the ground up based on your exact business requirements. Whether you need an ERP system for your manufacturing plant, a patient management platform for your hospital, or an inventory tool for your retail chain — our custom software is built to fit your workflow, not the other way around.',
                'deliverables'        => [
                    [
                        'title'       => 'Enterprise Resource Planning (ERP) Systems',
                        'description' => 'Custom ERP systems that connect your finance, inventory, HR, procurement, and operations on a single platform. Unlike generic ERPs that need expensive consultants just to configure, our custom ERP is built to your workflow from day one.',
                        'features'    => ['Finance and accounting integration', 'Inventory and stock management', 'HR and payroll module', 'Procurement and purchase orders', 'Operations and production tracking', 'Custom reporting and business intelligence'],
                        'order'       => 1,
                    ],
                    [
                        'title'       => 'Customer Relationship Management (CRM) Software',
                        'description' => 'A CRM built for the way your sales team actually works — with lead stages, follow-up triggers, quotation management, and reporting that matches your sales cycle, not a generic template.',
                        'features'    => ['Lead pipeline and stage management', 'Automated follow-up triggers', 'Quotation and proposal management', 'Sales cycle reporting', 'WhatsApp and SMS integration', 'Customer interaction history'],
                        'order'       => 2,
                    ],
                    [
                        'title'       => 'Inventory & Supply Chain Management Software',
                        'description' => 'Real-time inventory tracking, multi-location stock management, purchase order automation, and supplier management — built for your product catalogue and your warehouse layout.',
                        'features'    => ['Real-time stock tracking', 'Multi-location inventory management', 'Purchase order automation', 'Supplier management portal', 'Low-stock alerts and reorder triggers', 'Barcode and QR code integration'],
                        'order'       => 3,
                    ],
                    [
                        'title'       => 'Healthcare Management Systems',
                        'description' => 'Patient registration, appointment scheduling, EMR (electronic medical records), billing, and pharmacy management integrated into one secure, HIPAA-aware platform for hospitals, clinics, and diagnostic centres.',
                        'features'    => ['Patient registration and records', 'Appointment scheduling and reminders', 'Electronic Medical Records (EMR)', 'Billing and insurance claims', 'Pharmacy management module', 'Lab report integration'],
                        'order'       => 4,
                    ],
                    [
                        'title'       => 'E-Commerce Platforms & Marketplaces',
                        'description' => 'Custom-built e-commerce platforms with your exact product catalogue structure, pricing rules, delivery logic, and payment gateway integration — without the monthly subscription fees and feature limitations of Shopify or WooCommerce.',
                        'features'    => ['Custom product catalogue and pricing rules', 'Payment gateway integration (Razorpay, PayU)', 'Delivery and logistics management', 'Order management and tracking', 'Customer account and loyalty module', 'Vendor marketplace capability'],
                        'order'       => 5,
                    ],
                    [
                        'title'       => 'Field Force & Operations Management Software',
                        'description' => 'Track your field team, manage job assignments, capture on-site data, and generate real-time reports from any device. Ideal for logistics companies, service businesses, and manufacturing field teams.',
                        'features'    => ['Live field team tracking', 'Job assignment and dispatch', 'On-site data capture and forms', 'Real-time reporting dashboard', 'Route optimisation', 'Mobile app for field agents'],
                        'order'       => 6,
                    ],
                ],
                'tech_title'       => 'Technologies We Work With',
                'tech_description' => 'We use proven, modern technology stacks chosen to match your project requirements, team capabilities, and long-term maintenance needs.',
                'tech_categories'  => [
                    ['category' => 'Frontend',  'technologies' => ['React.js', 'Next.js', 'Vue.js', 'Angular', 'HTML5', 'Tailwind CSS'], 'order' => 1],
                    ['category' => 'Backend',   'technologies' => ['Node.js', 'Python (Django/Flask)', 'PHP (Laravel)', '.NET'],         'order' => 2],
                    ['category' => 'Mobile',    'technologies' => ['React Native', 'Flutter', 'Android (Kotlin)', 'iOS (Swift)'],        'order' => 3],
                    ['category' => 'Database',  'technologies' => ['MySQL', 'PostgreSQL', 'MongoDB', 'Firebase', 'Redis'],               'order' => 4],
                    ['category' => 'Cloud',     'technologies' => ['AWS', 'Google Cloud', 'Azure', 'DigitalOcean'],                      'order' => 5],
                    ['category' => 'DevOps',    'technologies' => ['Docker', 'Kubernetes', 'CI/CD pipelines', 'GitHub Actions'],         'order' => 6],
                ],
                'process_title'       => 'Our Custom Software Development Process',
                'process_description' => 'A structured, transparent process that delivers exactly what you need — on time and without surprises.',
                'process_steps'       => [
                    ['title' => 'Discovery Workshop',       'description' => 'We conduct structured sessions with your team to document every requirement, edge case, and integration need.',                                          'activities' => ['Stakeholder interviews', 'Business process mapping', 'Edge case documentation', 'Integration requirements', 'Timeline and budget planning'],                     'order' => 1],
                    ['title' => 'Wireframes & Prototypes',  'description' => 'You see exactly how the software will look and work before a single line of production code is written.',                                                'activities' => ['UI/UX wireframing', 'Interactive prototype development', 'User flow design', 'Client review and approval', 'Design system creation'],                         'order' => 2],
                    ['title' => 'Architecture Review',      'description' => 'Our senior architects sign off on the database design, security model, and scalability approach.',                                                       'activities' => ['Database schema design', 'API architecture planning', 'Security model review', 'Scalability assessment', 'Technology stack finalisation'],                    'order' => 3],
                    ['title' => 'Development Sprints',      'description' => 'Two-week sprints with demos at the end of each sprint — you see progress constantly and can provide feedback throughout.',                              'activities' => ['Sprint planning', 'Feature development', 'Code review', 'Sprint demo', 'Feedback incorporation'],                                                             'order' => 4],
                    ['title' => 'User Acceptance Testing',  'description' => 'Your team tests every feature against the documented requirements before sign-off.',                                                                     'activities' => ['Functional testing', 'Performance testing', 'Security testing', 'Cross-browser and device testing', 'Bug fixing and retesting'],                             'order' => 5],
                    ['title' => 'Deployment & Training',    'description' => 'We deploy to your environment and train your team before handover.',                                                                                    'activities' => ['Production deployment', 'Data migration', 'User training sessions', 'Documentation handover', 'Go-live support'],                                           'order' => 6],
                    ['title' => 'Support & Enhancement',    'description' => 'Ongoing AMC for maintenance, security patches, and feature additions after go-live.',                                                                    'activities' => ['Bug fixes and patches', 'Security updates', 'Performance monitoring', 'Feature enhancements', 'Annual Maintenance Contract (AMC)'],                           'order' => 7],
                ],
                'benefits_title'       => 'Custom Software vs. Off-the-Shelf — Why Custom Wins',
                'benefits_description' => 'Off-the-shelf software is built for everyone, which means it is perfect for no one. Custom software is built for exactly how your business operates.',
                'benefits'             => [
                    ['title' => '100% Fit to Your Process',     'description' => 'Built specifically for you — every feature, every screen, and every workflow matches how your team actually operates. No adapting your process to fit the software.',     'order' => 1],
                    ['title' => 'No Recurring Subscription Fees', 'description' => 'Off-the-shelf software charges monthly or annual subscriptions forever. Custom software has a one-time development cost — no ongoing licensing fees.',               'order' => 2],
                    ['title' => 'Unlimited Scalability',         'description' => 'You own the software, so you can build any new feature, integrate any system, and scale to any volume — you are never limited by a vendor\'s product roadmap.',        'order' => 3],
                    ['title' => 'Full Integration Flexibility',  'description' => 'Build any integration — Tally, Razorpay, WhatsApp API, Zoho, Salesforce, Shiprocket, and more. If an API exists, we can connect it to your software.',               'order' => 4],
                    ['title' => 'Competitive Advantage',         'description' => 'Your competitors use the same off-the-shelf tools. Custom software gives you capabilities they cannot replicate — processes, automations, and features unique to you.', 'order' => 5],
                    ['title' => 'You Own the Source Code',       'description' => 'Complete source code ownership is transferred to you upon project completion. You receive all repositories, documentation, and deployment files.',                      'order' => 6],
                ],
            ],

            [
                'slug'              => 'web-development',
                'label'             => 'Web Development',
                'order'             => 2,
                'hero_title'        => 'Web Application Development',
                'hero_description'  => 'From dynamic business websites to complex multi-tier web applications, our web development team works with Next.js, React, Node.js, PHP, and Python. We build web apps that are fast, secure, scalable, and SEO-ready from day one.',
                'features'          => [
                    'Dynamic business websites and complex multi-tier web applications',
                    'Built with Next.js, React, Node.js, PHP (Laravel), and Python',
                    'Fast, secure, and scalable architecture',
                    'SEO-ready from day one — structured for Google ranking',
                    'Mobile-first responsive design for all screen sizes',
                    'Ongoing maintenance and Annual Maintenance Contract (AMC) available',
                ],
                'deliver_title'       => 'Comprehensive Web Development Solutions',
                'deliver_description' => 'We provide end-to-end web development services that transform your ideas into powerful, functional web applications.',
                'deliverables'        => [
                    ['title' => 'Custom Web Application Development', 'description' => 'We build responsive, scalable web applications using modern frameworks like React.js, Next.js, Angular, Vue.js, and .NET Core.',    'features' => ['React/Next.js applications with server-side rendering for optimal SEO', 'Angular/Vue.js applications with component-based architecture', 'Progressive Web Apps (PWAs) with offline capabilities', 'Real-time applications with WebSocket integration', 'RESTful API and GraphQL development', 'Database integration with PostgreSQL, MySQL, MongoDB, or Firebase'], 'order' => 1],
                    ['title' => 'Corporate Website Development',       'description' => 'Professional corporate websites that effectively communicate your brand story.',                                                         'features' => ['CMS integration (WordPress, Contentful, Sanity, Strapi)', 'Custom theme development with brand-consistent design', 'Multi-language and localization support', 'Blog/news integration with SEO-friendly structure', 'Contact forms, lead capture, and CRM integration', 'Performance optimization for fast loading'],                 'order' => 2],
                    ['title' => 'E-commerce Website Development',      'description' => 'High-conversion e-commerce platforms using Shopify, Magento, WooCommerce, or custom solutions.',                                        'features' => ['Custom theme development with mobile-first responsive design', 'Product catalog management with variants and bundles', 'Secure payment gateway integration (Razorpay, Stripe, PayPal)', 'Shopping cart, checkout optimization, and order management', 'Inventory management and real-time stock synchronization', 'SEO optimization and marketing tool integration'],    'order' => 3],
                    ['title' => 'API Development & Integration',       'description' => "Robust APIs and third-party services integration to extend your web application's functionality.",                                       'features' => ['RESTful API and GraphQL API development with documentation', 'Third-party API integration (payment gateways, maps, SMS, email)', 'Microservices architecture for scalable applications', 'Legacy system integration and data migration services', 'Webhook implementation for real-time data synchronization', 'API security, rate limiting, and monitoring'],         'order' => 4],
                    ['title' => 'Performance Optimization & SEO',      'description' => 'Optimization for speed, performance, and search engine visibility.',                                                                        'features' => ['Core Web Vitals optimization for better Google rankings', 'Image optimization and lazy loading implementation', 'Code splitting and bundle optimization', 'SEO-friendly URL structure and meta tags implementation', 'Schema markup and structured data implementation', 'Performance monitoring and continuous optimization'],             'order' => 5],
                ],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title'       => 'Our Web Development Process',
                'process_description' => 'We follow a proven, collaborative development methodology that ensures quality, transparency, and timely delivery.',
                'process_steps'       => [
                    ['title' => 'Discovery & Planning',        'description' => 'Understanding your requirements, goals, and target audience.',   'activities' => ['Requirement analysis', 'Technical consultation', 'Project scope definition', 'Technology stack selection', 'Timeline estimation'],                 'order' => 1],
                    ['title' => 'Design & Prototyping',        'description' => 'Creating user-centered designs and interactive prototypes.',      'activities' => ['UI/UX design', 'Wireframing', 'Prototype development', 'User feedback collection', 'Design approval'],                                         'order' => 2],
                    ['title' => 'Development',                 'description' => 'Building your web application with clean, maintainable code.',    'activities' => ['Frontend development', 'Backend development', 'API integration', 'Third-party integration', 'Version control'],                                'order' => 3],
                    ['title' => 'Testing & Quality Assurance', 'description' => 'Ensuring your application is bug-free and performs optimally.',   'activities' => ['Unit testing', 'Integration testing', 'Performance testing', 'Cross-browser testing', 'Security testing'],                                     'order' => 4],
                    ['title' => 'Deployment & Launch',         'description' => 'Deploying your application and ensuring smooth launch.',          'activities' => ['Server setup', 'Domain configuration', 'SSL implementation', 'Performance optimization', 'Go-live support'],                                   'order' => 5],
                    ['title' => 'Maintenance & Support',       'description' => 'Providing ongoing support and continuous improvement.',            'activities' => ['Bug fixes', 'Security updates', 'Performance monitoring', 'Feature enhancements', 'Technical support'],                                        'order' => 6],
                ],
                'benefits_title'       => 'Benefits of Professional Web Development',
                'benefits_description' => 'Investing in professional web development delivers significant advantages for your business.',
                'benefits'             => [
                    ['title' => 'Custom Solutions for Unique Needs',    'description' => 'Unlike template-based solutions, custom web development addresses your specific business requirements, workflows, and goals.',           'order' => 1],
                    ['title' => 'Better Performance & User Experience', 'description' => 'Optimized code and architecture ensure faster loading times, smoother navigation, and higher user engagement.',                          'order' => 2],
                    ['title' => 'SEO-Friendly Architecture',            'description' => 'Properly structured code and semantic markup improve search engine rankings and organic traffic.',                                        'order' => 3],
                    ['title' => 'Scalability for Growth',               'description' => 'Built with future growth in mind, our web applications can easily accommodate increased traffic and features.',                          'order' => 4],
                    ['title' => 'Enhanced Security',                    'description' => 'Enterprise-grade security measures protect your data, users, and business reputation.',                                                  'order' => 5],
                    ['title' => 'Competitive Advantage',                'description' => 'Unique features and superior user experiences set you apart from competitors using generic solutions.',                                   'order' => 6],
                ],
            ],

            [
                'slug' => 'mobile-app-development', 'label' => 'Mobile App Development', 'order' => 3,
                'hero_title'       => 'Mobile App Development',
                'hero_description' => 'We develop native and cross-platform mobile apps for Android and iOS. Whether you need a customer-facing app for your business or an internal operations tool for your field team, our mobile apps are built for performance, usability, and long-term maintainability.',
                'features'         => ['Native Android app development (Kotlin)', 'Native iOS app development (Swift)', 'Cross-platform apps with React Native and Flutter', 'Customer-facing apps and internal field operations tools', 'Built for performance, usability, and long-term maintainability', 'App Store and Google Play deployment with ongoing support'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'ui-ux-design', 'label' => 'UI/UX Design', 'order' => 4,
                'hero_title'       => 'UI/UX Design for Web & Mobile',
                'hero_description' => 'User interface design for websites, web applications, and mobile apps. We create wireframes, high-fidelity mockups, and interactive prototypes that are both aesthetically strong and user-friendly. Our UI/UX work is delivered in Figma with complete design system documentation.',
                'features'         => ['Wireframes and high-fidelity mockups in Figma', 'Interactive prototypes for user testing before development', 'Complete design system with components and documentation', 'User research and persona development', 'Mobile-first UI design for iOS and Android', 'Handover-ready design files for your development team'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'ecommerce-solutions', 'label' => 'E-commerce Solutions', 'order' => 5,
                'hero_title'       => 'E-Commerce Platforms & Marketplaces',
                'hero_description' => 'Custom-built e-commerce platforms with your exact product catalogue structure, pricing rules, delivery logic, and payment gateway integration — without the monthly subscription fees and feature limitations of Shopify or WooCommerce.',
                'features'         => ['Custom product catalogue structure and pricing rules', 'Payment gateway integration — Razorpay, PayU', 'Delivery and logistics management', 'Order management, tracking, and returns', 'Customer account and loyalty module', 'Vendor marketplace capability for multi-seller platforms'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'cloud-solutions', 'label' => 'Cloud Solutions', 'order' => 6,
                'hero_title'       => 'Cloud Solutions — AWS, Google Cloud & Azure',
                'hero_description' => 'If you have a SaaS product idea, we have the team to build it. From architecture design and MVP development to scaling and feature expansion, we partner with SaaS founders across India and provide end-to-end product engineering services. We deploy on AWS, Google Cloud, Azure, and DigitalOcean.',
                'features'         => ['SaaS product architecture design and MVP development', 'Cloud deployment on AWS, Google Cloud, Azure, DigitalOcean', 'Containerisation with Docker and Kubernetes', 'CI/CD pipeline setup with GitHub Actions', 'Cloud cost optimisation and infrastructure monitoring', 'Scaling from MVP to enterprise-grade platform'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'api-integration', 'label' => 'API Integration', 'order' => 7,
                'hero_title'       => 'API Development & Third-Party Integration',
                'hero_description' => 'Connect your software ecosystem. We build custom APIs and integrate third-party services — payment gateways (Razorpay, PayU), shipping platforms (Shiprocket, Delhivery), CRMs (Zoho, Salesforce), accounting tools (Tally, QuickBooks), and communication platforms (WhatsApp, SMS, IVR).',
                'features'         => ['Custom REST API development with full documentation', 'Payment gateway integration — Razorpay, PayU, Stripe', 'Shipping platform integration — Shiprocket, Delhivery', 'CRM integration — Zoho, Salesforce, HubSpot', 'Accounting tool integration — Tally, QuickBooks', 'Communication platform integration — WhatsApp, SMS, IVR'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'maintenance-support', 'label' => 'Maintenance & Support', 'order' => 8,
                'hero_title'       => 'IT Consulting & Software Maintenance',
                'hero_description' => 'Not sure what technology stack is right for your project? Our IT consultants assess your requirements, budget, and growth roadmap to recommend the right architecture — saving you from costly rebuilds down the line. All our software projects come with a warranty period and the option for an ongoing Annual Maintenance Contract (AMC) covering bug fixes, security patches, hosting support, and minor feature updates.',
                'features'         => ['Technology stack recommendation and IT consulting', 'Annual Maintenance Contract (AMC) for all delivered projects', 'Bug fixes and security patches', 'Hosting support and server management', 'Minor feature updates and enhancements', 'System architecture review and scalability planning'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],
        ];

        foreach ($services as $data) {
            $service = SoftwareItService::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'label'               => $data['label'],
                    'order'               => $data['order'],
                    'is_active'           => true,
                    'hero_title'          => $data['hero_title'],
                    'hero_description'    => $data['hero_description'],
                    'deliver_title'       => $data['deliver_title'] ?? null,
                    'deliver_description' => $data['deliver_description'] ?? null,
                    'tech_title'          => $data['tech_title'] ?? null,
                    'tech_description'    => $data['tech_description'] ?? null,
                    'process_title'       => $data['process_title'] ?? null,
                    'process_description' => $data['process_description'] ?? null,
                    'benefits_title'      => $data['benefits_title'] ?? null,
                    'benefits_description'=> $data['benefits_description'] ?? null,
                ]
            );

            // Sync features
            $service->features()->delete();
            foreach ($data['features'] as $i => $feature) {
                SoftwareItServiceFeature::create(['service_id' => $service->id, 'feature' => $feature, 'order' => $i + 1]);
            }

            // Sync deliverables
            $service->deliverables()->delete();
            foreach ($data['deliverables'] as $d) {
                SoftwareItServiceDeliverable::create([
                    'service_id'  => $service->id,
                    'title'       => $d['title'],
                    'description' => $d['description'],
                    'features'    => array_map(fn($f) => ['item' => $f], $d['features']),
                    'order'       => $d['order'],
                ]);
            }

            // Sync tech categories
            $service->techCategories()->delete();
            foreach ($data['tech_categories'] as $c) {
                SoftwareItServiceTechCategory::create([
                    'service_id'   => $service->id,
                    'category'     => $c['category'],
                    'technologies' => array_map(fn($t) => ['item' => $t], $c['technologies']),
                    'order'        => $c['order'],
                ]);
            }

            // Sync process steps
            $service->processSteps()->delete();
            foreach ($data['process_steps'] as $s) {
                SoftwareItServiceProcessStep::create([
                    'service_id'  => $service->id,
                    'title'       => $s['title'],
                    'description' => $s['description'],
                    'activities'  => array_map(fn($a) => ['item' => $a], $s['activities']),
                    'order'       => $s['order'],
                ]);
            }

            // Sync benefits
            $service->benefits()->delete();
            foreach ($data['benefits'] as $b) {
                SoftwareItServiceBenefit::create([
                    'service_id'  => $service->id,
                    'title'       => $b['title'],
                    'description' => $b['description'],
                    'order'       => $b['order'],
                ]);
            }
        }
    }
}
