<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | Your Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Styles */
        :root {
            --primary: #3b82f6;
            --dark: #1e293b;
            --light: #f8fafc;
            --error: #ef4444;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: var(--light);
            color: var(--dark);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            text-align: center;
        }
        
        .error-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .error-content {
            max-width: 600px;
            padding: 2rem;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }
        
        .error-code {
            font-size: 5rem;
            font-weight: 800;
            color: var(--error);
            margin: 0;
            line-height: 1;
        }
        
        .error-title {
            font-size: 1.75rem;
            margin: 1rem 0 0.5rem;
        }
        
        .error-message {
            color: #64748b;
            margin-bottom: 2rem;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .error-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: #e2e8f0;
            color: var(--dark);
        }
        
        .btn-secondary:hover {
            background-color: #cbd5e1;
        }
        
        .error-illustration {
            max-width: 300px;
            margin: 0 auto 2rem;
        }
        
        footer {
            padding: 1.5rem;
            color: #64748b;
            font-size: 0.9rem;
        }
        
        @media (max-width: 640px) {
            .error-code {
                font-size: 3.5rem;
            }
            .error-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-content">
            <div class="error-illustration">
                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <h1 class="error-code">404</h1>
            <h2 class="error-title">Page Not Found</h2>
            <p class="error-message">
                Oops! The page you're looking for doesn't exist or has been moved.
                Please check the URL or navigate back to our homepage.
            </p>
            <?php echo $message; ?>
            <div class="error-actions">
                <a href="/" class="btn btn-primary">
                    <i class="fas fa-home"></i> Back to Home
                </a> 
            </div>
        </div>
    </div>
    <footer>
        &copy; <script>document.write(new Date().getFullYear())</script> QRION Smart School. All rights reserved.
    </footer>

    <script>
        console.log('Information : ','<?php echo $message; ?>');
    </script>
</body>
</html>