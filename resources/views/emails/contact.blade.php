<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .email-header {
            background-color: #6A3A78;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
            color: #333333;
        }
        .email-body table {
            width: 100%;
            border-collapse: collapse;
        }
        .email-body th,
        .email-body td {
            text-align: left;
            padding: 8px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .email-body th {
            width: 180px;
            color: #555555;
        }
        .email-message {
            margin-top: 20px;
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 4px;
        }
        .email-footer {
            text-align: center;
            font-size: 12px;
            color: #999999;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>New Contact Message</h2>
        </div>
        <div class="email-body">
            <table>
                <tr>
                    <th>Name:</th>
                    <td>{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $data['phone'] }}</td>
                </tr>
                <tr>
                    <th>Grade:</th>
                    <td>{{ $data['grade'] }}</td>
                </tr>
                <tr>
                    <th>Preferred Learning Format:</th>
                    <td>
                        {{ $data['learning_format'] == 'online' ? 'Online' : 'In Person' }}
                    </td>
                </tr>
                <tr>
                    <th>Preferred Time of Contact:</th>
                    <td>
                        @php
                            $timeMap = [
                                'morning' => 'Morning (9AM - 12PM)',
                                'afternoon' => 'Afternoon (12PM - 4PM)',
                                'evening' => 'Evening (4PM - 8PM)',
                                'anytime' => 'Anytime',
                            ];
                        @endphp
                        {{ $timeMap[$data['time_contact']] ?? $data['time_contact'] }}
                    </td>
                </tr>
            </table>

            <div class="email-message">
                <strong>Message:</strong>
                <p>{{ $data['message'] }}</p>
            </div>
        </div>

        <div class="email-footer">
            &copy; {{ date('Y') }} Tutor123. All rights reserved.
        </div>
    </div>
</body>
</html>