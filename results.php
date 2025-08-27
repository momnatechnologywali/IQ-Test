<?php
// results.php - Results page
include 'db.php'; // If needed, but not here
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = $_POST['answer'] ?? [];
    $corrects = $_POST['correct'] ?? [];
    $score = 0;
    $total = count($corrects);
 
    foreach ($corrects as $id => $correct) {
        if (isset($answers[$id]) && (int)$answers[$id] === (int)$correct) {
            $score++;
        }
    }
 
    // Simple IQ calculation: (score / total) * 100 + 50 (dummy formula for estimation)
    $iq = round(($score / $total) * 100 + 50);
    $feedback = "Your IQ is estimated at $iq. ";
    if ($iq > 130) {
        $feedback .= "Exceptional intelligence! Strengths in all areas.";
    } elseif ($iq > 110) {
        $feedback .= "Above average. Good problem-solving skills.";
    } elseif ($iq > 90) {
        $feedback .= "Average. Focus on pattern recognition for improvement.";
    } else {
        $feedback .= "Below average. Practice logical reasoning daily.";
    }
    $feedback .= " Recommendations: Read books on logic, solve puzzles regularly.";
} else {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test - Results</title>
    <style>
        /* Internal CSS - Amazing, real-looking in Ivory */
        body {
            background-color: #FFFFF0;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .results-container {
            max-width: 800px;
            padding: 40px;
            background-color: #FFFDF0;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .score {
            font-size: 3em;
            color: #FFD700;
            margin: 20px 0;
        }
        button {
            background-color: #FFD700;
            color: #333;
            border: none;
            padding: 15px 30px;
            font-size: 1.2em;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            margin: 10px;
        }
        button:hover {
            background-color: #FFC700;
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Responsive */
        @media (max-width: 600px) {
            .results-container { padding: 20px; }
            h1 { font-size: 2em; }
            p { font-size: 1em; }
            .score { font-size: 2em; }
            button { padding: 10px 20px; font-size: 1em; }
        }
    </style>
</head>
<body>
    <div class="results-container">
        <h1>Your IQ Test Results</h1>
        <div class="score"><?php echo $iq; ?></div>
        <p><?php echo $feedback; ?></p>
        <button onclick="retakeTest()">Retake Test</button>
        <button onclick="shareResults()">Share Results</button>
    </div>
    <script>
        // Internal JS - Redirection and share
        function retakeTest() {
            window.location.href = 'quiz.php';
        }
        function shareResults() {
            alert('Share your IQ score of <?php echo $iq; ?> on social media!');
            // Could add actual share logic, but keeping simple
        }
    </script>
</body>
</html>
