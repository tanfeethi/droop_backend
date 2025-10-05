<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Join Request</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; margin:0 }
        .email-container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,.08); overflow: hidden }
        .header { background: #2b6cb0; color:#fff; padding: 16px 20px }
        .content { padding: 20px; color:#333 }
        .content p { margin: 0 0 10px }
        .muted { color:#666; font-size: 12px; text-align:center; padding: 12px 0; background:#f7f7fb }
        .highlight { font-weight:bold; color:#2b6cb0 }
    </style>
    </head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>New Coach Join Request</h2>
        </div>
        <div class="content">
            <p><strong>Name:</strong> {{ $details['name'] ?? '' }}</p>
            <p><strong>Phone:</strong> {{ $details['phone'] ?? '' }}</p>
            <p><strong>LinkedIn:</strong> <a href="{{ $details['linkedin'] ?? '#' }}" class="highlight">{{ $details['linkedin'] ?? '' }}</a></p>
        </div>
        <div class="muted">This request was submitted from the website form.</div>
    </div>
</body>
</html>



