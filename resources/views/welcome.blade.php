<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emirates College of Science and Technology - Electronic Admission Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0d3b66',
                        secondary: '#1d7a85',
                        accent: '#f4a261',
                        light: '#f8f9fa'
                    },
                    fontFamily: {
                        'tajawal': ['Tajawal', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }

        .step-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .requirement-item {
            transition: all 0.3s ease;
        }

        .requirement-item:hover {
            background-color: #e9f7f9;
            border-left: 4px solid #1d7a85;
        }

        .hero-pattern {
            background: radial-gradient(circle, rgba(13, 59, 102, 0.1) 0%, rgba(255, 255, 255, 1) 100%);
        }

        .department-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
        }

        .department-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .department-header {
            padding: 20px;
            color: white;
            background: linear-gradient(135deg, #0d3b66, #1d7a85);
        }

        .specialty-list li {
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
        }

        .specialty-list li:last-child {
            border-bottom: none;
        }

        .fee-table th {
            background-color: #f0f7f9;
        }

        .fee-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .tab-button {
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .tab-button.active {
            background-color: #0d3b66;
            color: white;
        }

        .comparison-card {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
        }

        .comparison-card:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .comparison-header {
            padding: 20px;
            color: white;
            background: linear-gradient(135deg, #1d7a85, #0d3b66);
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="sticky top-0 z-50 py-4 bg-white shadow-md">
        <div class="container flex items-center justify-between px-4 mx-auto">
            <div class="flex items-center">
                <div class="flex items-center justify-center w-10 h-10 text-white bg-primary rounded-full">
                    <x-app-logo-icon class="w-8 h-8" />
                </div>
                <h1 class="ml-3 text-xl font-bold text-primary">Electronic Admission Portal</h1>
            </div>
            <div>
                <a href="{{ route('login') }}"
                    class="px-5 py-2 font-medium text-white transition rounded-lg bg-primary hover:bg-secondary">
                    Start Application
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="py-16 hero-pattern">
        <div class="container flex flex-col items-center px-4 mx-auto md:flex-row">
            <div class="mb-10 md:w-1/2 md:mb-0">
                <h2 class="mb-4 text-4xl font-bold md:text-5xl text-primary">
                    Online Application for Emirates College <br> <span class="text-secondary">Simple and Easy
                        Steps</span>
                </h2>
                <p class="mb-6 text-lg leading-relaxed text-gray-600">
                    Join our distinguished academic community through the electronic admission portal. Submit your
                    application easily and conveniently and enjoy the benefits of instant electronic submission and
                    accurate follow-up.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('login') }}"
                        class="px-6 py-3 font-medium text-white transition rounded-lg bg-primary hover:bg-secondary">
                        Start Application Now <i class="ml-2 fas fa-arrow-right"></i>
                    </a>
                    <button
                        class="px-6 py-3 font-medium transition border-2 rounded-lg border-primary text-primary hover:bg-primary hover:text-white">
                        <i class="mr-2 fas fa-info-circle"></i> Admission Requirements
                    </button>
                </div>
            </div>

            <div class="flex justify-center md:w-1/2">
                <div class="relative">
                    <div class="flex items-center justify-center rounded-full bg-secondary w-80 h-80">
                        <div class="flex items-center justify-center w-64 h-64 bg-white rounded-full shadow-xl">
                            <img src="https://cdn.pixabay.com/photo/2016/11/14/17/39/person-1824144_1280.png"
                                alt="Online Application" class="w-56">
                        </div>
                    </div>
                    <div class="absolute p-4 text-white rounded-lg shadow-lg -top-5 -left-5 bg-accent">
                        <p class="font-bold">More than 50 Specializations</p>
                    </div>
                    <div class="absolute p-4 bg-white border-2 rounded-lg shadow-lg -bottom-5 -right-5 border-primary">
                        <p class="font-bold text-primary">100% Online Application</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Online Application Requirements -->
    <section class="py-16 bg-light">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl text-primary">Online Application Requirements</h2>
                <div class="w-20 h-1 mx-auto bg-secondary"></div>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="p-6 bg-white shadow-md rounded-xl step-card">
                    <div
                        class="flex items-center justify-center w-12 h-12 mb-4 text-xl text-white rounded-full bg-primary">
                        1
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-primary">General Requirements</h3>
                    <ul class="pl-5 space-y-2 text-gray-600 list-disc">
                        <li>The applicant must have a high school diploma</li>
                        <li>Must be valid in the Noor system</li>
                        <li>Must have obtained the certificate within the last 5 years</li>
                        <li>Meet the admission requirements of the desired college</li>
                    </ul>
                </div>

                <div class="p-6 bg-white shadow-md rounded-xl step-card">
                    <div
                        class="flex items-center justify-center w-12 h-12 mb-4 text-xl text-white rounded-full bg-primary">
                        2
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-primary">Required Documents</h3>
                    <ul class="pl-5 space-y-2 text-gray-600 list-disc">
                        <li>Recent personal photo with white background</li>
                        <li>Copy of national ID card</li>
                        <li>Copy of high school diploma</li>
                        <li>Copy of general aptitude test result</li>
                        <li>Copy of achievement test result</li>
                    </ul>
                </div>

                <div class="p-6 bg-white shadow-md rounded-xl step-card">
                    <div
                        class="flex items-center justify-center w-12 h-12 mb-4 text-xl text-white rounded-full bg-primary">
                        3
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-primary">Special Requirements</h3>
                    <ul class="pl-5 space-y-2 text-gray-600 list-disc">
                        <li>Commitment to application deadlines</li>
                        <li>Accuracy of data entered in the application form</li>
                        <li>Submission of all required documents in high quality</li>
                        <li>Accurate selection of preferences according to priority</li>
                        <li>Not applying to more than one university at the same time</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- University Application Requirements -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl text-primary">University Application Requirements</h2>
                <p class="max-w-2xl mx-auto text-gray-600">To complete your online application successfully, please
                    ensure you meet all the following requirements</p>
                <div class="w-20 h-1 mx-auto mt-3 bg-secondary"></div>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="p-6 mb-6 bg-white border-l-4 rounded-lg shadow requirement-item border-primary">
                    <div class="flex items-start">
                        <div class="p-3 mr-4 text-white rounded-lg bg-primary">
                            <i class="text-xl fas fa-id-card"></i>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-primary">Identification Documents</h3>
                            <p class="text-gray-600">Clear copy of a valid national ID card or passport for residents,
                                along with a recent personal photo with white background.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 mb-6 bg-white border-l-4 rounded-lg shadow requirement-item border-accent">
                    <div class="flex items-start">
                        <div class="p-3 mr-4 text-white rounded-lg bg-accent">
                            <i class="text-xl fas fa-file-certificate"></i>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-primary">Academic Qualifications</h3>
                            <p class="text-gray-600">Clear copy of high school diploma or equivalent, with aptitude and
                                achievement test results if available.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 mb-6 bg-white border-l-4 rounded-lg shadow requirement-item border-secondary">
                    <div class="flex items-start">
                        <div class="p-3 mr-4 text-white rounded-lg bg-secondary">
                            <i class="text-xl fas fa-credit-card"></i>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-primary">Online Payment</h3>
                            <p class="text-gray-600">Valid credit card or account with one of the electronic payment
                                services to pay the application fees (non-refundable).</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 mb-6 bg-white border-l-4 rounded-lg shadow requirement-item border-primary">
                    <div class="flex items-start">
                        <div class="p-3 mr-4 text-white rounded-lg bg-primary">
                            <i class="text-xl fas fa-user-graduate"></i>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-primary">Study Preferences</h3>
                            <p class="text-gray-600">Specify desired majors and colleges according to priority, taking
                                into account the admission requirements for each major.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-white border-l-4 rounded-lg shadow requirement-item border-accent">
                    <div class="flex items-start">
                        <div class="p-3 mr-4 text-white rounded-lg bg-accent">
                            <i class="text-xl fas fa-laptop"></i>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-primary">Technical Requirements</h3>
                            <p class="text-gray-600">Computer or smartphone connected to the internet, with a modern
                                browser (preferably Chrome or Firefox), and PDF reader software.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Academic Departments -->
    <section class="py-16 bg-light">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl text-primary">Academic Departments</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Discover our diverse specializations that meet future labor
                    market needs</p>
                <div class="w-20 h-1 mx-auto mt-3 bg-secondary"></div>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Medicine and Surgery Department -->
                <div class="department-card bg-white shadow-md">
                    <div class="department-header">
                        <h3 class="text-xl font-bold"><i class="fas fa-user-md mr-2"></i> Medicine and Surgery</h3>
                        <p class="mt-2 text-sm opacity-80">Advanced programs in medical sciences</p>
                    </div>
                    <div class="p-6">
                        <ul class="specialty-list text-gray-600">
                            <li><i class="fas fa-stethoscope mr-2 text-secondary"></i> Bachelor of Medicine and Surgery
                            </li>
                            <li><i class="fas fa-heartbeat mr-2 text-secondary"></i> Cardiovascular Medicine</li>
                            <li><i class="fas fa-brain mr-2 text-secondary"></i> Neurology</li>
                            <li><i class="fas fa-child mr-2 text-secondary"></i> Pediatrics</li>
                        </ul>
                        <div class="mt-6 text-center">
                            <span class="px-3 py-1 text-sm font-medium text-white bg-secondary rounded-full">6 years of
                                study</span>
                        </div>
                    </div>
                </div>

                <!-- Medical Laboratories Department -->
                <div class="department-card bg-white shadow-md">
                    <div class="department-header">
                        <h3 class="text-xl font-bold"><i class="fas fa-microscope mr-2"></i> Medical Laboratories</h3>
                        <p class="mt-2 text-sm opacity-80">Precise specializations in medical analysis</p>
                    </div>
                    <div class="p-6">
                        <ul class="specialty-list text-gray-600">
                            <li><i class="fas fa-vial mr-2 text-secondary"></i> Bachelor of Medical Laboratories</li>
                            <li><i class="fas fa-dna mr-2 text-secondary"></i> Medical Genetics</li>
                            <li><i class="fas fa-bacteria mr-2 text-secondary"></i> Microbiology</li>
                            <li><i class="fas fa-tint mr-2 text-secondary"></i> Hematology</li>
                        </ul>
                        <div class="mt-6 text-center">
                            <span class="px-3 py-1 text-sm font-medium text-white bg-secondary rounded-full">4 years of
                                study</span>
                        </div>
                    </div>
                </div>

                <!-- Information Technology Department -->
                <div class="department-card bg-white shadow-md">
                    <div class="department-header">
                        <h3 class="text-xl font-bold"><i class="fas fa-laptop-code mr-2"></i> Information Technology
                        </h3>
                        <p class="mt-2 text-sm opacity-80">Advanced programs in the digital age</p>
                    </div>
                    <div class="p-6">
                        <ul class="specialty-list text-gray-600">
                            <li><i class="fas fa-code mr-2 text-secondary"></i> Bachelor of Computer Science</li>
                            <li><i class="fas fa-shield-alt mr-2 text-secondary"></i> Information Security</li>
                            <li><i class="fas fa-network-wired mr-2 text-secondary"></i> Computer Networks</li>
                            <li><i class="fas fa-robot mr-2 text-secondary"></i> Artificial Intelligence</li>
                        </ul>
                        <div class="mt-6 text-center">
                            <span class="px-3 py-1 text-sm font-medium text-white bg-secondary rounded-full">4 years of
                                study</span>
                        </div>
                    </div>
                </div>

                <!-- Administrative Sciences Department -->
                <div class="department-card bg-white shadow-md">
                    <div class="department-header">
                        <h3 class="text-xl font-bold"><i class="fas fa-chart-line mr-2"></i> Administrative Sciences
                        </h3>
                        <p class="mt-2 text-sm opacity-80">Specializations in business administration and economics</p>
                    </div>
                    <div class="p-6">
                        <ul class="specialty-list text-gray-600">
                            <li><i class="fas fa-briefcase mr-2 text-secondary"></i> Bachelor of Business Administration
                            </li>
                            <li><i class="fas fa-coins mr-2 text-secondary"></i> Economics and Financial Sciences</li>
                            <li><i class="fas fa-file-invoice-dollar mr-2 text-secondary"></i> Accounting Information
                                Systems</li>
                            <li><i class="fas fa-globe mr-2 text-secondary"></i> International Marketing</li>
                        </ul>
                        <div class="mt-6 text-center">
                            <span class="px-3 py-1 text-sm font-medium text-white bg-secondary rounded-full">4 years of
                                study</span>
                        </div>
                    </div>
                </div>

                <!-- Architectural Engineering Department -->
                <div class="department-card bg-white shadow-md">
                    <div class="department-header">
                        <h3 class="text-xl font-bold"><i class="fas fa-drafting-compass mr-2"></i> Architectural
                            Engineering</h3>
                        <p class="mt-2 text-sm opacity-80">Sustainable environmental design and planning</p>
                    </div>
                    <div class="p-6">
                        <ul class="specialty-list text-gray-600">
                            <li><i class="fas fa-draw-polygon mr-2 text-secondary"></i> Bachelor of Architecture and
                                Environmental Planning</li>
                            <li><i class="fas fa-city mr-2 text-secondary"></i> Urban Planning</li>
                            <li><i class="fas fa-leaf mr-2 text-secondary"></i> Sustainable Architecture</li>
                            <li><i class="fas fa-home mr-2 text-secondary"></i> Interior Design</li>
                        </ul>
                        <div class="mt-6 text-center">
                            <span class="px-3 py-1 text-sm font-medium text-white bg-secondary rounded-full">5 years of
                                study</span>
                        </div>
                    </div>
                </div>

                <!-- Health Sciences Department -->
                <div class="department-card bg-white shadow-md">
                    <div class="department-header">
                        <h3 class="text-xl font-bold"><i class="fas fa-heart mr-2"></i> Health Sciences</h3>
                        <p class="mt-2 text-sm opacity-80">Programs in healthcare and nursing</p>
                    </div>
                    <div class="p-6">
                        <ul class="specialty-list text-gray-600">
                            <li><i class="fas fa-user-nurse mr-2 text-secondary"></i> Bachelor of Nursing Sciences</li>
                            <li><i class="fas fa-teeth mr-2 text-secondary"></i> Public Health</li>
                            <li><i class="fas fa-pills mr-2 text-secondary"></i> Clinical Pharmacy</li>
                            <li><i class="fas fa-x-ray mr-2 text-secondary"></i> Diagnostic Radiology</li>
                        </ul>
                        <div class="mt-6 text-center">
                            <span class="px-3 py-1 text-sm font-medium text-white bg-secondary rounded-full">4 years of
                                study</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tuition Fees -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl text-primary">Tuition Fees</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Learn about the tuition fees for different programs for the
                    year 2023/2024</p>
                <div class="w-20 h-1 mx-auto mt-3 bg-secondary"></div>
            </div>

            <!-- Tab System -->
            <div class="flex justify-center mb-8 space-x-4">
                <div class="tab-button active" data-tab="annual">Annual Fees</div>
                <div class="tab-button" data-tab="semester">Semester Fees</div>
                <div class="tab-button" data-tab="comparison">Program Comparison</div>
            </div>

            <!-- Annual Fees Table -->
            <div id="annual-tab" class="tab-content">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 fee-table">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left border-b">Study Program</th>
                                <th class="px-6 py-3 border-b">Annual Fees (USD)</th>
                                <th class="px-6 py-3 border-b">Annual Fees (SDG)</th>
                                <th class="px-6 py-3 border-b">Registration Fees (SDG)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Medicine and Surgery</td>
                                <td class="px-6 py-4 text-center">4,500</td>
                                <td class="px-6 py-4 text-center">3,000,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Medical Laboratories</td>
                                <td class="px-6 py-4 text-center">2,500</td>
                                <td class="px-6 py-4 text-center">2,000,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Nursing Sciences</td>
                                <td class="px-6 py-4 text-center">2,500</td>
                                <td class="px-6 py-4 text-center">2,200,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Architecture and Environmental Planning</td>
                                <td class="px-6 py-4 text-center">2,000</td>
                                <td class="px-6 py-4 text-center">1,000,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Information Technology</td>
                                <td class="px-6 py-4 text-center">1,500</td>
                                <td class="px-6 py-4 text-center">1,000,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Administrative Sciences</td>
                                <td class="px-6 py-4 text-center">1,500</td>
                                <td class="px-6 py-4 text-center">750,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Economics and Financial Sciences</td>
                                <td class="px-6 py-4 text-center">1,500</td>
                                <td class="px-6 py-4 text-center">700,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Accounting Information Systems</td>
                                <td class="px-6 py-4 text-center">1,500</td>
                                <td class="px-6 py-4 text-center">750,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Management Information Systems</td>
                                <td class="px-6 py-4 text-center">1,500</td>
                                <td class="px-6 py-4 text-center">750,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Banking Information Systems</td>
                                <td class="px-6 py-4 text-center">1,500</td>
                                <td class="px-6 py-4 text-center">750,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of General Information Systems</td>
                                <td class="px-6 py-4 text-center">1,500</td>
                                <td class="px-6 py-4 text-center">750,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Computer Science</td>
                                <td class="px-6 py-4 text-center">1,500</td>
                                <td class="px-6 py-4 text-center">500,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of English Language and Literature</td>
                                <td class="px-6 py-4 text-center">1,500</td>
                                <td class="px-6 py-4 text-center">750,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Diploma in Information Technology</td>
                                <td class="px-6 py-4 text-center">750</td>
                                <td class="px-6 py-4 text-center">250,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Diploma in Accounting and Banking Information Technology
                                </td>
                                <td class="px-6 py-4 text-center">750</td>
                                <td class="px-6 py-4 text-center">250,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Diploma in Computer Networks</td>
                                <td class="px-6 py-4 text-center">750</td>
                                <td class="px-6 py-4 text-center">250,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Diploma in Information Systems</td>
                                <td class="px-6 py-4 text-center">750</td>
                                <td class="px-6 py-4 text-center">250,000</td>
                                <td class="px-6 py-4 text-center">200,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Semester Fees Table -->
            <div id="semester-tab" class="hidden tab-content">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 fee-table">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left border-b">Study Program</th>
                                <th class="px-6 py-3 border-b">Semester Fees (SDG)</th>
                                <th class="px-6 py-3 border-b">Registration Fees (SDG)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Medicine and Surgery</td>
                                <td class="px-6 py-4 text-center">1,500,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Medical Laboratories</td>
                                <td class="px-6 py-4 text-center">1,000,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Nursing Sciences</td>
                                <td class="px-6 py-4 text-center">1,100,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Architecture and Environmental Planning</td>
                                <td class="px-6 py-4 text-center">500,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Information Technology</td>
                                <td class="px-6 py-4 text-center">500,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Administrative Sciences</td>
                                <td class="px-6 py-4 text-center">375,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Economics and Financial Sciences</td>
                                <td class="px-6 py-4 text-center">375,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Accounting Information Systems</td>
                                <td class="px-6 py-4 text-center">375,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Management Information Systems</td>
                                <td class="px-6 py-4 text-center">375,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Banking Information Systems</td>
                                <td class="px-6 py-4 text-center">375,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of General Information Systems</td>
                                <td class="px-6 py-4 text-center">375,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of Computer Science</td>
                                <td class="px-6 py-4 text-center">250,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Bachelor of English Language and Literature</td>
                                <td class="px-6 py-4 text-center">375,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Diploma in Information Technology</td>
                                <td class="px-6 py-4 text-center">125,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Diploma in Accounting and Banking Information Technology
                                </td>
                                <td class="px-6 py-4 text-center">125,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Diploma in Computer Networks</td>
                                <td class="px-6 py-4 text-center">125,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-left">Diploma in Information Systems</td>
                                <td class="px-6 py-4 text-center">125,000</td>
                                <td class="px-6 py-4 text-center">100,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Program Comparison -->
            <div id="comparison-tab" class="hidden tab-content">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    <div class="comparison-card">
                        <div class="comparison-header">
                            <h3 class="text-xl font-bold">Medical Programs</h3>
                            <p class="mt-1 text-sm opacity-80">Medicine, Laboratories, Nursing</p>
                        </div>
                        <div class="p-6">
                            <div class="mb-4 text-center">
                                <span class="text-2xl font-bold text-primary">2,500$+</span>
                                <p class="text-gray-600">Average Annual Fees</p>
                            </div>
                            <ul class="space-y-3 text-gray-600">
                                <li><i class="fas fa-check text-secondary mr-2"></i> Intensive practical programs</li>
                                <li><i class="fas fa-check text-secondary mr-2"></i> Modern advanced laboratories</li>
                                <li><i class="fas fa-check text-secondary mr-2"></i> Practical training in hospitals
                                </li>
                                <li><i class="fas fa-check text-secondary mr-2"></i> Excellent employment opportunities
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="comparison-card">
                        <div class="comparison-header">
                            <h3 class="text-xl font-bold">Engineering and Technical Programs</h3>
                            <p class="mt-1 text-sm opacity-80">Architecture, Information Technology</p>
                        </div>
                        <div class="p-6">
                            <div class="mb-4 text-center">
                                <span class="text-2xl font-bold text-primary">1,500$+</span>
                                <p class="text-gray-600">Average Annual Fees</p>
                            </div>
                            <ul class="space-y-3 text-gray-600">
                                <li><i class="fas fa-check text-secondary mr-2"></i> Advanced computer labs</li>
                                <li><i class="fas fa-check text-secondary mr-2"></i> Sustainable environmental design
                                </li>
                                <li><i class="fas fa-check text-secondary mr-2"></i> Internationally accredited
                                    certificates</li>
                                <li><i class="fas fa-check text-secondary mr-2"></i> High salaries after graduation</li>
                            </ul>
                        </div>
                    </div>

                    <div class="comparison-card">
                        <div class="comparison-header">
                            <h3 class="text-xl font-bold">Administrative Programs</h3>
                            <p class="mt-1 text-sm opacity-80">Management, Economics, Systems</p>
                        </div>
                        <div class="p-6">
                            <div class="mb-4 text-center">
                                <span class="text-2xl font-bold text-primary">1,500$+</span>
                                <p class="text-gray-600">Average Annual Fees</p>
                            </div>
                            <ul class="space-y-3 text-gray-600">
                                <li><i class="fas fa-check text-secondary mr-2"></i> Collaboration programs with global
                                    companies</li>
                                <li><i class="fas fa-check text-secondary mr-2"></i> Practical training in institutions
                                </li>
                                <li><i class="fas fa-check text-secondary mr-2"></i> Job opportunities in diverse
                                    sectors</li>
                                <li><i class="fas fa-check text-secondary mr-2"></i> Qualification for local and
                                    international job markets</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Section -->
    <section class="py-16 text-white bg-primary">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="mb-6 text-3xl font-bold md:text-4xl">Do you need help with your application?</h2>
                <p class="mb-8 text-xl">Our technical support team is ready to assist you 24/7</p>

                <div class="flex flex-wrap justify-center gap-6">
                    <div class="w-64 p-6 bg-white rounded-lg shadow-lg text-primary">
                        <div class="mb-4 text-4xl text-secondary">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-bold">Phone Support</h3>
                        <p class="mb-4">0922560004</p>
                        <p class="text-sm text-gray-600">From 8 AM to 8 PM</p>
                    </div>

                    <div class="w-64 p-6 bg-white rounded-lg shadow-lg text-primary">
                        <div class="mb-4 text-4xl text-secondary">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-bold">Email</h3>
                        <p class="mb-4">add_eust@gmail.om</p>
                        <p class="text-sm text-gray-600">Response within 24 working hours</p>
                    </div>

                    <div class="w-64 p-6 bg-white rounded-lg shadow-lg text-primary">
                        <div class="mb-4 text-4xl text-secondary">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-bold">WhatsApp</h3>
                        <p class="mb-4">Available all day</p>
                        <p class="text-sm text-gray-600">From 8 AM to 4 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 text-white bg-gray-800">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                <div>
                    <h3 class="mb-4 text-xl font-bold text-accent">Electronic Admission Portal</h3>
                    <p class="text-gray-400">The official platform for online applications to Emirates College of
                        Science and Technology, we aim to facilitate the admission process and provide an exceptional
                        experience for students.</p>
                </div>

                <div>
                    <h3 class="mb-4 text-xl font-bold text-accent">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 transition hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 transition hover:text-white">Admission Requirements</a>
                        </li>
                        <li><a href="#" class="text-gray-400 transition hover:text-white">Available Specializations</a>
                        </li>
                        <li><a href="#" class="text-gray-400 transition hover:text-white">User Guide</a></li>
                        <li><a href="#" class="text-gray-400 transition hover:text-white">FAQs</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="mb-4 text-xl font-bold text-accent">Important Dates</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex"><span class="font-medium w-28">Application Start:</span>{{ now() }}</li>
                        <li class="flex"><span class="font-medium w-28">Application End:</span> {{
                            \Carbon\Carbon::parse('2025/8/10')->format('Y-m-d') }}
                        </li>
                        <li class="flex"><span class="font-medium w-28">Results Announcement:</span> {{
                            \Carbon\Carbon::parse('2025/8/25')->format('Y-m-d') }}
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="mb-4 text-xl font-bold text-accent">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 transition bg-gray-700 rounded-full hover:bg-accent">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 transition bg-gray-700 rounded-full hover:bg-accent">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 transition bg-gray-700 rounded-full hover:bg-accent">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 transition bg-gray-700 rounded-full hover:bg-accent">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="pt-6 mt-12 text-center text-gray-400 border-t border-gray-700">
                <p>© 2025 Electronic Admission Portal for Emirates College. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Tab switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));

                    // Add active class to clicked tab
                    this.classList.add('active');

                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.add('hidden'));

                    // Show the selected tab content
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(`${tabId}-tab`).classList.remove('hidden');
                });
            });

            // Initialize animations for department cards
            const departmentCards = document.querySelectorAll('.department-card');
            departmentCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.5s ease';

                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 100);
            });
        });
    </script>
</body>

</html>