<!DOCTYPE html>
<html>

<head>
    <title>Appointment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 10px 0;
        }

        .header h1 {
            margin: 0;
            color: #01be60;
        }

        .content {
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            color: #fff;
            background-color: #01be60;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #019f52;
        }

        .details {
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            background-color: #f7f7f7;
        }

        .details p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Appointment Confirmation</h1>
        </div>
        <div class="content">
            <p>Dear {{ $patient->username }},</p>
            <p>Your appointment has been successfully scheduled. Below are the details of your appointment:</p>
            <div class="details">
                <p><strong>Department:</strong> {{ $department->username }}</p>
                <p><strong>Doctor:</strong> {{ $doctor->user_name ?? 'Not Assigned Yet' }}</p>
                <p><strong>Treatment:</strong> {{ $data['treatment'] ?? 'General Consultation' }}</p>
                <p><strong>Date:</strong> {{ $data['appointment_date'] }}</p>
                <p><strong>Time:</strong> {{ $data['from_time'] }} - {{ $data['to_time'] }}</p>
                <p><strong>Status:</strong> {{ $data['status'] }}</p>
            </div>
            <p>If you have any questions or need to reschedule, please contact us at support@example.com or call
                +123-456-7890.</p>
            <p>We look forward to seeing you!</p>
            <a href="https://clinic.muhammadafzal.com/" class="btn">View Appointment</a>
        </div>
        <div class="footer">
            <p>&copy; 2024 Your Clinic Name. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
