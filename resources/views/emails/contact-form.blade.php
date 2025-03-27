<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #3182CE; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { padding: 20px; text-align: center; font-size: 0.9em; color: #666; }
        .detail { margin-bottom: 15px; }
        .detail-label { font-weight: bold; color: #3182CE; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
        </div>
        
        <div class="content">
            <div class="detail">
                <span class="detail-label">From:</span> {{ $data['name'] }}
            </div>
            
            <div class="detail">
                <span class="detail-label">Email:</span> {{ $data['email'] }}
            </div>
            
            @if($data['phone'])
            <div class="detail">
                <span class="detail-label">Phone:</span> {{ $data['phone'] }}
            </div>
            @endif
            
            <div class="detail">
                <span class="detail-label">Subject:</span> {{ $data['subject'] }}
            </div>
            
            <div class="detail">
                <span class="detail-label">Message:</span>
                <p>{{ $data['message'] }}</p>
            </div>
        </div>
        
        <div class="footer">
            <p>This email was sent from the contact form on your website.</p>
        </div>
    </div>
</body>
</html>