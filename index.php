<?php
// index.php - Homepage
include 'db.php'; // Include database connection if needed, but not used here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test - Homepage</title>
    <style>
        /* Internal CSS - Amazing, real-looking, professional design in Ivory color */
        body {
            background-color: #FFFFF0; /* Ivory */
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
        .container {
            max-width: 800px;
            padding: 40px;
            background-color: #FFFDF0; /* Slightly darker ivory shade */
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #4A4A4A;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        button {
            background-color: #FFD700; /* Gold accent for button */
            color: #333;
            border: none;
            padding: 15px 30px;
            font-size: 1.2em;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        button:hover {
            background-color: #FFC700;
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Responsive design */
        @media (max-width: 600px) {
            .container { padding: 20px; }
            h1 { font-size: 2em; }
            p { font-size: 1em; }
            button { padding: 10px 20px; font-size: 1em; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Online IQ Test</h1>
        <p>Intelligence Quotient (IQ) testing measures cognitive abilities such as logical reasoning, pattern recognition, and problem-solving skills. This test is designed to give you an estimate of your IQ and provide personalized feedback to help you understand your strengths and areas for improvement.</p>
        <button onclick="startTest()">Start Test</button>
    </div>
    <script>
        // Internal JS - For redirection using JS
        function startTest() {
            window.location.href = 'quiz.php';
        }
    </script>
</body>
</html>
