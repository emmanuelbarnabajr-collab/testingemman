<?php
session_start();
include 'questions.php';

// Initialize current question index
if (!isset($_SESSION['q_index'])) {
    $_SESSION['q_index'] = 0;
    $_SESSION['score'] = 0;
}

$feedback = "";
$showFeedback = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected = $_POST['q'] ?? '';
    $correct = $questions[$_SESSION['q_index']]['answer'];

    if ($selected === $correct) {
        $_SESSION['score']++;
        $feedback = "✅ Correct!";
    } else {
        $feedback = "❌ Wrong! Correct answer is " . $questions[$_SESSION['q_index']]['choices'][$correct];
    }

    $_SESSION['q_index']++;

    // If no more questions, go to result
    if ($_SESSION['q_index'] >= count($questions)) {
        header("Location: result.php");
        exit;
    }

    $showFeedback = true;
}

$current = $questions[$_SESSION['q_index']];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Start Quiz - Amateur Radio NTC Reviewer</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
    .quiz-container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 90%; max-width: 500px; text-align: left; }
    h2 { font-size: clamp(1.5rem, 3vw, 2rem); margin-bottom: 20px; color: #333; }
    .choices { display: flex; flex-direction: column; gap: 12px; }
    label { background: #f9f9f9; padding: 12px; border-radius: 8px; cursor: pointer; transition: background 0.3s ease; }
    label:hover { background: #e6f0ff; }
    .btn-container { text-align: center; margin-top: 20px; }
    .btn-submit { padding: 12px 20px; font-size: 1rem; border: none; border-radius: 8px; background: #007BFF; color: white; cursor: pointer; transition: 0.3s ease; }
    .btn-submit:hover { opacity: 0.9; }

    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
      animation: fadeIn 0.3s ease;
    }
    .modal-content {
      background: white;
      padding: 20px 30px;
      border-radius: 10px;
      text-align: center;
      font-size: 1.2rem;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      animation: popUp 0.3s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    @keyframes popUp {
      from { transform: scale(0.7); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body>
  <div class="quiz-container">
    <h2>Question <?= $_SESSION['q_index'] + 1 ?>: <?= $current['question'] ?></h2>
    <form method="post">
      <div class="choices">
        <?php foreach ($current['choices'] as $key => $value): ?>
          <label><input type="radio" name="q" value="<?= $key ?>" required> <?= $value ?></label>
        <?php endforeach; ?>
      </div>
      <div class="btn-container">
        <button type="submit" class="btn-submit">Submit</button>
      </div>
    </form>
  </div>

  <!-- Modal -->
  <div id="feedbackModal" class="modal">
    <div class="modal-content" id="modalText"></div>
  </div>

  <?php if ($showFeedback): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let modal = document.getElementById("feedbackModal");
      let modalText = document.getElementById("modalText");
      modalText.textContent = "<?= $feedback ?>";
      modal.style.display = "flex";

      // Wait 1.5s then reload to show next question
      setTimeout(() => {
        window.location.href = "start.php";
      }, 1500);
    });
  </script>
  <?php endif; ?>
</body>
</html>