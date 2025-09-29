<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Amateur Radio NTC Reviewer Online</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
      background: #f4f4f4;
      font-family: Arial, sans-serif;
      flex-direction: column; /* Stack elements vertically */
      opacity: 1;
      transition: opacity 0.6s ease; /* Transition effect */
    }

    body.fade-out {
      opacity: 0;
    }

    h1 {
      font-size: clamp(2rem, 5vw, 4rem); /* Responsive size */
      color: #333;
      margin-bottom: 30px;
    }

    .button-container {
      display: flex;
      gap: 20px;
    }

    .btn {
      padding: 15px 30px;
      font-size: clamp(1rem, 2.5vw, 1.5rem);
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-d {
      background-color: #007BFF;
      color: white;
    }

    .btn-c {
      background-color: #28A745;
      color: white;
    }

    .btn:hover {
      opacity: 0.85;
    }
  </style>
</head>
<body>
  <h1>Welcome to Amateur Radio NTC Reviewer Online</h1>

  <div class="button-container">
    <a href="class-d.php" class="btn btn-d">Class D</a>
    <a href="class-c.php" class="btn btn-c">Class C</a>
  </div>

  <script>
    // Apply fade-out effect on button click
    document.querySelectorAll('.btn').forEach(button => {
      button.addEventListener('click', function (event) {
        event.preventDefault(); // Stop default link behavior
        const target = this.getAttribute('href'); // Get link
        document.body.classList.add('fade-out'); // Add fade-out class
        setTimeout(() => {
          window.location.href = target; // Redirect after fade
        }, 600); // Match transition duration
      });
    });
  </script>
</body>
</html>