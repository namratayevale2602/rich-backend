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
                'hero_title'        => 'Custom Software Development Services',
                'hero_description'  => 'We create bespoke software solutions designed specifically for your business needs. Our custom software development services transform your unique requirements into powerful, scalable applications that drive efficiency and growth.',
                'features'          => [
                    'Bespoke solutions tailored to your specific business processes',
                    'Scalable architecture that grows with your business',
                    'Integration with existing systems and third-party services',
                    'Robust security and data protection measures',
                    'Ongoing maintenance and support services',
                    'User-friendly interfaces for maximum productivity',
                ],
                'deliver_title'       => 'Comprehensive Custom Software Solutions',
                'deliver_description' => 'We provide end-to-end custom software development, from initial consultation to deployment and beyond.',
                'deliverables'        => [
                    [
                        'title'       => 'Enterprise Resource Planning (ERP)',
                        'description' => 'Integrated business management software that streamlines operations across departments.',
                        'features'    => ['Inventory and supply chain management', 'Financial accounting and reporting', 'Human resources management', 'Customer relationship management', 'Business intelligence and analytics', 'Workflow automation'],
                        'order'       => 1,
                    ],
                    [
                        'title'       => 'Customer Relationship Management (CRM)',
                        'description' => 'Custom CRM solutions to manage customer interactions and improve relationships.',
                        'features'    => ['Lead and contact management', 'Sales pipeline tracking', 'Marketing automation', 'Customer support ticketing', 'Email integration', 'Analytics and reporting'],
                        'order'       => 2,
                    ],
                ],
                'tech_title'       => 'Our Technology Stack',
                'tech_description' => 'We use modern technologies to build robust and scalable software solutions.',
                'tech_categories'  => [
                    ['category' => 'Backend Technologies',  'technologies' => ['Node.js', 'Python/Django', 'Java/Spring Boot', '.NET Core', 'Ruby on Rails', 'Go'],    'order' => 1],
                    ['category' => 'Frontend Technologies', 'technologies' => ['React.js', 'Angular', 'Vue.js', 'TypeScript', 'Next.js'],                               'order' => 2],
                    ['category' => 'Databases',             'technologies' => ['PostgreSQL', 'MySQL', 'MongoDB', 'Redis', 'Oracle'],                                    'order' => 3],
                    ['category' => 'Cloud & DevOps',        'technologies' => ['AWS', 'Azure', 'Google Cloud', 'Docker', 'Kubernetes'],                                 'order' => 4],
                ],
                'process_title'       => 'Our Development Process',
                'process_description' => 'A systematic approach to ensure quality and timely delivery.',
                'process_steps'       => [
                    ['title' => 'Requirement Analysis',   'description' => 'Understanding your business needs and objectives.',   'activities' => ['Business process analysis', 'Requirement gathering', 'Feasibility study', 'Documentation'],                         'order' => 1],
                    ['title' => 'Design & Architecture',  'description' => 'Creating the blueprint for your software solution.',  'activities' => ['System architecture design', 'Database design', 'UI/UX design', 'Technical specification'],                        'order' => 2],
                ],
                'benefits_title'       => 'Benefits of Custom Software',
                'benefits_description' => 'Custom software offers unique advantages over off-the-shelf solutions.',
                'benefits'             => [
                    ['title' => 'Complete Customization', 'description' => 'Software designed specifically for your business processes and needs.', 'order' => 1],
                    ['title' => 'Competitive Advantage',  'description' => 'Unique features that differentiate you from competitors.',              'order' => 2],
                ],
            ],

            [
                'slug'              => 'web-development',
                'label'             => 'Web Development',
                'order'             => 2,
                'hero_title'        => 'Professional Web Development Services: Build Scalable, High-Performance Websites',
                'hero_description'  => 'We specialize in creating custom web applications and websites that perfectly align with your business goals, engage your audience, and drive measurable results. Our full-stack web development services combine cutting-edge technologies with user-centered design to deliver exceptional digital experiences.',
                'features'          => [
                    'Responsive, mobile-first design that works flawlessly across all devices',
                    'SEO-optimized architecture for better search engine visibility',
                    'Fast loading times and superior performance optimization',
                    'Secure, scalable architecture with enterprise-grade security',
                    'Custom features tailored to your specific business requirements',
                    'Ongoing maintenance, support, and performance monitoring',
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
                'hero_title'       => 'Mobile App Development Services: Build High-Performance iOS & Android Apps',
                'hero_description' => 'We create stunning, functional mobile applications that engage users and drive business growth. Our mobile app development services cover both native and cross-platform solutions for maximum reach and impact.',
                'features'         => ['Native iOS and Android app development', 'Cross-platform apps using React Native and Flutter', 'User-centric design and intuitive interfaces', 'High performance and smooth animations', 'Secure data handling and encryption', 'App Store and Google Play deployment'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'ui-ux-design', 'label' => 'UI/UX Design', 'order' => 4,
                'hero_title'       => 'UI/UX Design Services: Create Exceptional Digital Experiences',
                'hero_description' => 'We design intuitive, beautiful user interfaces that provide seamless experiences across all devices. Our user-centered design approach ensures your digital products are both functional and delightful to use.',
                'features'         => ['User research and persona development', 'Wireframing and prototyping', 'Visual design and branding', 'Interaction design and animations', 'Usability testing and optimization', 'Design system creation'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'ecommerce-solutions', 'label' => 'E-commerce Solutions', 'order' => 5,
                'hero_title'       => 'E-commerce Solutions: Build High-Converting Online Stores',
                'hero_description' => 'Create powerful e-commerce platforms that drive sales and grow your business. We build custom online stores with seamless shopping experiences, secure payment processing, and robust inventory management.',
                'features'         => ['Custom e-commerce platform development', 'Shopping cart and checkout optimization', 'Payment gateway integration', 'Inventory and order management', 'Customer account management', 'Analytics and reporting dashboard'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'cloud-solutions', 'label' => 'Cloud Solutions', 'order' => 6,
                'hero_title'       => 'Cloud Solutions & Migration Services',
                'hero_description' => 'Transform your business with scalable cloud solutions. We help you migrate, deploy, and manage applications on AWS, Azure, and Google Cloud platforms for improved performance and reduced costs.',
                'features'         => ['Cloud migration strategy and execution', 'Infrastructure as Code (IaC)', 'Serverless architecture implementation', 'Cloud security and compliance', 'Performance monitoring and optimization', 'Cost optimization and management'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'api-integration', 'label' => 'API Integration', 'order' => 7,
                'hero_title'       => 'API Development & Integration Services',
                'hero_description' => 'Connect your business systems with robust API solutions. We develop custom APIs and integrate third-party services to streamline operations and enhance functionality.',
                'features'         => ['RESTful API development', 'GraphQL API implementation', 'Third-party API integration', 'API documentation and testing', 'API security and authentication', 'Performance optimization'],
                'deliver_title' => null, 'deliver_description' => null, 'deliverables' => [],
                'tech_title' => null, 'tech_description' => null, 'tech_categories' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'maintenance-support', 'label' => 'Maintenance & Support', 'order' => 8,
                'hero_title'       => 'Software Maintenance & Technical Support Services',
                'hero_description' => 'Keep your software running smoothly with our comprehensive maintenance and support services. We provide ongoing updates, bug fixes, and technical assistance to ensure optimal performance.',
                'features'         => ['24/7 technical support', 'Regular software updates', 'Bug fixes and troubleshooting', 'Performance monitoring', 'Security patches and updates', 'Feature enhancements'],
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
