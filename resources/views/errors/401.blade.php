<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>401 Unauthorized</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
    }
    .error-container {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      background-color: #f8f9fa;
    }
    .error-code {
      font-size: 10rem;
      font-weight: bold;
      color: #dc3545;
    }
    .error-message {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }
    .btn-home {
      background-color: #007bff;
      color: white;
    }
  </style>
</head>
<body>

  <div class="container error-container">
    <div>
      <h1 class="error-code">401</h1>
      <p class="error-message">Oops! Unauthorized Access.</p>
      <p>You don’t have permission to view this page.</p>
      <a href="{{ route('home') }}" class="btn btn-home btn-lg">Go to Home</a>
    </div>
  </div>

</body>
</html>
