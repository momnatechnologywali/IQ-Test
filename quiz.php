<?php
// quiz.php - Quiz page
include 'db.php';
 
// Fetch questions dynamically from DB
$stmt = $pdo->prepare("SELECT * FROM questions ORDER BY RAND() LIMIT 10"); // Randomize for variety
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test - Quiz</title>
    <style>
        /* Internal CSS - Amazing, real-looking, professional in Ivory */
        body {
            background-color: #FFFFF0;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .quiz-container {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            background-color: #FFFDF0;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .question {
            display: none;
            animation: slideIn 0.5s ease;
        }
        .question.active {
            display: block;
        }
        h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0;
            font-size: 1.1em;
            cursor: pointer;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        .nav-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        button {
            background-color: #FFD700;
            color: #333;
            border: none;
            padding: 12px 25px;
            font-size: 1.1em;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        button:hover {
            background-color: #FFC700;
            transform: scale(1.05);
        }
        button:disabled {
            background-color: #CCC;
            cursor: not-allowed;
            transform: none;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        /* Responsive */
        @media (max-width: 600px) {
            .quiz-container { padding: 20px; }
            h2 { font-size: 1.5em; }
            label { font-size: 1em; }
            button { padding: 10px 20px; font-size: 1em; }
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <form id="quizForm" method="POST" action="results.php">
            <?php foreach ($questions as $index => $q): ?>
                <div class="question <?php echo $index === 0 ? 'active' : ''; ?>" id="question<?php echo $index; ?>">
                    <h2><?php echo ($index + 1) . '. ' . htmlspecialchars($q['question_text']); ?></h2>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="1"> <?php echo htmlspecialchars($q['option1']); ?></label>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="2"> <?php echo htmlspecialchars($q['option2']); ?></label>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="3"> <?php echo htmlspecialchars($q['option3']); ?></label>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="4"> <?php echo htmlspecialchars($q['option4']); ?></label>
                    <input type="hidden" name="correct[<?php echo $q['id']; ?>]" value="<?php echo $q['correct_option']; ?>">
                </div>
            <?php endforeach; ?>
            <div class="nav-buttons">
                <button type="button" id="prevBtn" onclick="navigateQuestion(-1)" disabled>Previous</button>
                <button type="button" id="nextBtn" onclick="navigateQuestion(1)">Next</button>
                <button type="submit" id="submitBtn" style="display:none;">Submit</button>
            </div>
        </form>
    </div>
    <script>
        // Internal JS - Handle navigation and temporary storage (via form)
        let currentQuestion = 0;
        const totalQuestions = <?php echo count($questions); ?>;
        const questions = document.querySelectorAll('.question');
 
        function navigateQuestion(direction) {
            questions[currentQuestion].classList.remove('active');
            currentQuestion += direction;
            questions[currentQuestion].classList.add('active');
 
            document.getElementById('prevBtn').disabled = currentQuestion === 0;
            document.getElementById('nextBtn').style.display = currentQuestion === totalQuestions - 1 ? 'none' : 'inline';
            document.getElementById('submitBtn').style.display = currentQuestion === totalQuestions - 1 ? 'inline' : 'none';
        }
    </script>
</body>
</html>
