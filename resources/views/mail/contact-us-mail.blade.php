<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #dddddd;
        }

        .header h1 {
            margin: 0;
            color: #333333;
        }

        .header img {
            max-width: 100px;
            height: auto;
        }

        .content {
            padding: 20px 0;
        }

        .content p {
            margin: 0 0 10px;
            color: #555555;
        }

        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
            color: #777777;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            .header img {
                max-width: 80px;
            }

            .content p {
                margin: 0 0 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            {{-- <img src="https://i.ibb.co/YTmbfxT/Griha-Dwar-logo.png" alt="Griha-Dwar-logo" /> --}}
            <h1>Contact Us</h1>
        </div>
        <div class="content">
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $data['message'] }}</p>
        </div>
        <div class="footer">
            <p>Thank you for reaching out to us. We will get back to you shortly.</p>
        </div>
    </div>
</body>

</html>