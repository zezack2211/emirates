<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Application Report - {{ $application->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.4;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 20px;
            margin-bottom: 30px;
            position: relative;
            background: linear-gradient(to right, #f8f9fa, #ffffff, #f8f9fa);
            padding-top: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .header::after {
            content: "";
            display: block;
            height: 3px;
            background: linear-gradient(to right, #3498db, #2c3e50, #3498db);
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
        }

        .header img {
            height: 80px;
            margin-bottom: 15px;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.1));
        }

        .college-name {
            font-size: 26px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 15px;
            text-align: center;
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
        }

        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 8px;
            color: #2c3e50;
            background-color: #f8f9fa;
            padding: 5px 10px;
            border-left: 4px solid #3498db;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 8px;
            margin-bottom: 5px;
        }

        .info-label {
            font-weight: bold;
            color: #7f8c8d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 11px;
        }

        table thead {
            background-color: #2c3e50;
            color: white;
        }

        table th {
            padding: 8px;
            text-align: left;
        }

        table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-weight: bold;
            font-size: 11px;
        }

        .status-accepted {
            background-color: #2ecc71;
            color: white;
        }

        .status-pending {
            background-color: #f39c12;
            color: white;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            color: #95a5a6;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        .watermark {
            position: fixed;
            bottom: 50%;
            right: 50%;
            transform: translate(50%, 50%);
            opacity: 0.1;
            font-size: 80px;
            color: #ccc;
            pointer-events: none;
            z-index: -1;
        }
    </style>
</head>

<body>

    <!-- Watermark -->
    <div class="watermark">CONFIDENTIAL</div>

    <!-- Header with Logo and College Name -->
    <div class="header">
        @if(file_exists(public_path('images/Emirateslogo.png')))
        <img src="{{ public_path('images/Emirateslogo.png') }}" alt="College Logo">
        @endif
        <div class="college-name">Emirates College For Science And Techonlogy</div>
        <div>Official Application Report</div>
    </div>

    <h1>Application Details #{{ $application->id }}</h1>

    <!-- Basic Info -->
    <div class="section">
        <div class="section-title">General Information</div>
        <div class="info-grid">
            <div class="info-label">Application ID:</div>
            <div>{{ $application->id }}</div>

            <div class="info-label">Application Date:</div>
            <div>{{ $application->created_at->format('d M Y H:i') }}</div>
        </div>
    </div>

    <!-- Personal Info -->
    <div class="section">
        <div class="section-title">Student Information</div>
        <div class="info-grid">
            <div class="info-label">Full Name:</div>
            <div>{{ $application->name ?? 'N/A' }}</div>

            <div class="info-label">Email:</div>
            <div>{{ $application->email ?? 'N/A' }}</div>

            <div class="info-label">Phone:</div>
            <div>{{ $application->phone ?? 'N/A' }}</div>

            <div class="info-label">Date of Birth:</div>
            <div>{{ $application->date_of_birth ?? 'N/A' }}</div>

            <div class="info-label">Address:</div>
            <div>{{ $application->address ?? 'N/A' }}</div>
        </div>
    </div>

    <!-- Program Info -->
    <div class="section">
        <div class="section-title">Academic Information</div>
        <div class="info-grid">
            <div class="info-label">Program:</div>
            <div>{{ $application->program->name ?? 'Not specified' }}</div>

            <div class="info-label">Department:</div>
            <div>{{ $application->program->department->name ?? 'Not specified' }}</div>
        </div>
    </div>

    <!-- Relative Info -->
    <div class="section">
        <div class="section-title">Relative Contact</div>
        <div class="info-grid">
            <div class="info-label">Relative Name:</div>
            <div>{{ $application->realtive_name ?? 'N/A' }}</div>

            <div class="info-label">Relative Phone:</div>
            <div>{{ $application->relative_phone ?? 'N/A' }}</div>
        </div>
    </div>

    <!-- Status Info -->
    <div class="section">
        <div class="section-title">Application Status</div>
        <div class="info-grid">
            <div class="info-label">Current Status:</div>
            <div>
                <span class="status-badge status-{{ $application->latestStatus->status->value ?? 'pending' }}">
                    {{ ucfirst($application->latestStatus->status->value ?? 'pending') }}
                </span>
            </div>

            <div class="info-label">Status Date:</div>
            <div>{{ $application->latestStatus->created_at->format('d M Y') ?? 'N/A' }}</div>
        </div>
    </div>

    <!-- Documents -->
    <div class="section">
        <div class="section-title">Attached Documents</div>
        @if($application->documents && $application->documents->count())
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Document Type</th>
                    <th>File Name</th>
                    <th>Upload Date</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                @foreach($application->documents as $index => $document)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>Perssonal Photo</td>
                    <td>{{ basename($document->photo ?? '') }}</td>
                    <td>{{ $document->created_at->format('d M Y') }}</td>
                    <td>
                        @if($document->photo)
                        <a href="{{ asset('storage/'.$document->photo) }}" target="_blank"
                            style="color: #3498db; text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16" style="vertical-align: middle;">
                                <path
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Download
                        </a>
                        @else
                        <span style="color: #95a5a6;">N/A</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ $index + 2 }}</td>
                    <td>Certificate</td>
                    <td>{{ basename($document->certificate ?? '') }}</td>
                    <td>{{ $document->created_at->format('d M Y') }}</td>
                    <td>
                        @if($document->certificate)
                        <a href="{{ asset('storage/'.$document->certificate) }}" target="_blank"
                            style="color: #3498db; text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16" style="vertical-align: middle;">
                                <path
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Download
                        </a>
                        @else
                        <span style="color: #95a5a6;">N/A</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ $index + 3 }}</td>
                    <td>National ID</td>
                    <td>{{ basename($document->national_id ?? '') }}</td>
                    <td>{{ $document->created_at->format('d M Y') }}</td>
                    <td>
                        @if($document->national_id)
                        <a href="{{ asset('storage/'.$document->national_id) }}" target="_blank"
                            style="color: #3498db; text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16" style="vertical-align: middle;">
                                <path
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Download
                        </a>
                        @else
                        <span style="color: #95a5a6;">N/A</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p style="color: #95a5a6; font-style: italic;">No documents uploaded with this application.</p>
        @endif
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>This document was generated on {{ now()->format('d F Y H:i') }}</p>
        <p>This document was Downloaded by {{ auth()->user()->name }}</p>
        <p>&copy; {{ date('Y') }} Emirates College . All rights reserved.</p>
        <p>This document is confidential and intended solely for the use of the individual or entity to whom it is
            addressed.</p>
    </div>

</body>

</html>
