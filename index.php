<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Project</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            padding: 30px;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 6px;
            color: #444;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102,126,234,0.5);
        }

        .gender {
            display: flex;
            gap: 20px;
            margin-top: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }

        .result-card p {
            margin-bottom: 10px;
            font-size: 15px;
            color: #444;
        }

        .result-card span {
            font-weight: 600;
            color: #000;
        }

        .success {
            text-align: center;
            color: #4CAF50;
            font-weight: 600;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $fullname = htmlspecialchars($_POST['fullname']);
        $email    = htmlspecialchars($_POST['email']);
        $age      = htmlspecialchars($_POST['age']);
        $gender   = htmlspecialchars($_POST['gender']);
        $feedback = htmlspecialchars($_POST['feedback']);
?>
    <!-- RESULT CARD -->
    <div class="card result-card">
        <div class="success">✔ Form Submitted Successfully</div>
        <h1>Your Details</h1>

        <p><span>Full Name:</span> <?php echo $fullname; ?></p>
        <p><span>Email:</span> <?php echo $email; ?></p>
        <p><span>Age:</span> <?php echo $age; ?></p>
        <p><span>Gender:</span> <?php echo $gender; ?></p>
        <p><span>Feedback:</span> <?php echo $feedback; ?></p>
    </div>

<?php } else { ?>

    <!-- FORM CARD -->
    <div class="card">
        <h1>Feedback Form</h1>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="text" name="age" required>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="gender">
                    <label><input type="radio" name="gender" value="Male" required> Male</label>
                    <label><input type="radio" name="gender" value="Female"> Female</label>
                </div>
            </div>

            <div class="form-group">
                <label>Feedback</label>
                <textarea name="feedback" rows="4" required></textarea>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

<?php } ?>

</div>

</body>
</html>
