<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome Email</title>
</head>

<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:Arial,sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
        style="background-color:#f3f4f6;padding:40px 0;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
                    style="max-width:600px;background-color:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 10px rgba(0,0,0,0.1);">

                    <tr>
                        <td style="background-color:#1d4ed8;padding:20px 0;text-align:center;">
                            <img src="https://cdn-icons-png.flaticon.com/512/2910/2910768.png"
                                alt="Ordering and Billing System"
                                style="width:80px;height:auto;border-radius:50%;box-shadow:0 2px 6px rgba(0,0,0,0.3);">
                            <h1 style="color:#ffffff;font-size:24px;margin-top:10px;">Ordering & Billing System</h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:30px;color:#1f2937;">
                            <h2 style="font-size:22px;font-weight:700;margin-bottom:10px;">🎉 Welcome, {{
                                $details['name'] }}!</h2>
                            <p style="margin-bottom:15px;font-size:16px;">
                                Thank you for registering with us. We’re excited to have you on board!
                            </p>
                            <p style="font-size:16px;margin-bottom:8px;">
                                <strong>Email:</strong> {{ $details['email'] }}
                            </p>
                            <p style="font-size:16px;margin-bottom:20px;">
                                <strong>Password:</strong> <span style="color:#16a34a;">{{ $details['password']
                                    }}</span>
                            </p>
                            <p style="font-size:15px;margin-bottom:20px;">
                                ✅ Please log in using the credentials above.<br>
                                🔒 We recommend updating your password after your first login for security.
                            </p>

                            <div style="text-align:center;margin:30px 0;">
                                <a href="{{ url('/') }}"
                                    style="display:inline-block;background-color:#2563eb;color:#ffffff;padding:12px 24px;font-size:16px;border-radius:6px;text-decoration:none;">
                                    Go to Website
                                </a>
                            </div>

                            <p style="font-size:14px;color:#6b7280;">
                                If you didn’t sign up for this account, you can ignore this email.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td
                            style="background-color:#f9fafb;text-align:center;padding:20px;color:#9ca3af;font-size:12px;">
                            &copy; {{ date('Y') }} Ordering & Billing System. All rights reserved.<br>
                            Made with ❤️ for better business.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>
