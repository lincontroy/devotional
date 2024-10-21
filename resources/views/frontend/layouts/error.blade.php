<!-- resources/views/signup-success.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup error</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .check-icon {
            font-size: 4rem; /* Adjust size as needed */
            color: green;
        }
        .message {
            font-size: 1.5rem; /* Adjust font size as needed */
        }
    </style>
</head>
<body>
    <div class="container text-center mt-5">
        <div class="check-icon">
            <image src="error.gif" width="200" height="150">
            <!-- <i class="fas fa-check-circle"></i> Font Awesome check icon -->
        </div>
        <div class="message mt-3">
            <strong>An error occured</strong>
            <p>Either your email or phone is already registered.</p><br>
            <p>Please communicate with an admin via +2547..... for assistance.</p>
        </div>

        <a href="user/register" class="btn btn-primary">Retry</a>
      
    </div>

    <!-- Font Awesome CDN for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
