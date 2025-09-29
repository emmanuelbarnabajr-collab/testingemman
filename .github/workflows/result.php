<?php
session_start();
include 'questions.php';

$score = $_SESSION['score'] ?? 0;
$total = count($questions);

// Clear session
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Result</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
    .result-container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align: center; }
    h2 { color: #333; }
    a { margin-top: 20px; display: inline-block; padding: 12px 20px; background: #007BFF; color: white; text-decoration: none; border-radius: 8px; }
    a:hover { opacity: 0.9; }
  </style>
</head>
<body>
  <div class="result-container">
    <h2>Your Score: <?= $score ?> / <?= $total ?></h2>
    <a href="class-d.php">Try Again</a>
  </div>
</body>
</html>