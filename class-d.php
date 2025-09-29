<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Class D - Amateur Radio NTC Reviewer</title>
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
      flex-direction: column; /* Stack vertically */
      opacity: 1;
      transition: opacity 0.6s ease; /* Smooth transition */
    }

    body.fade-out {
      opacity: 0;
    }

    h1 {
      font-size: clamp(2rem, 5vw, 4rem);
      color: #333;
      margin-bottom: 40px;
    }

    .btn {
      padding: 15px 40px;
      font-size: clamp(1rem, 2.5vw, 1.5rem);
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s ease;
      text-decoration: none;
      background-color: #007BFF;
      color: white;
      display: inline-block;
      margin-bottom: 20px;
    }

    .btn:hover {
      opacity: 0.85;
    }

    .back-link {
      font-size: 0.9rem;
      color: #007BFF;
      text-decoration: none;
      cursor: pointer;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>ELEMENT 2</h1>

  <a href="start.php" class="btn">START NOW</a>
  <a href="index.php" class="back-link">Go Back</a>

  <script>
    // Add fade-out transition for both START and GO BACK
    document.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent instant redirect
        const target = this.getAttribute('href');
        document.body.classList.add('fade-out'); // Fade out effect
        setTimeout(() => {
          window.location.href = target; // Redirect after animation
        }, 600); // Match transition time
      });
    });
  </script>
</body>
</html>