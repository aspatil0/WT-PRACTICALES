<?php
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!empty($name) && !empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
            if ($conn->query($sql) === TRUE) {
                $message = "<p class='success'>User added successfully!</p>";
            } else {
                $message = "<p class='error'>Error: " . $conn->error . "</p>";
            }
        } else {
            $message = "<p class='error'>Invalid email format!</p>";
        }
    } else {
        $message = "<p class='error'>All fields are required!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }
        .container {
            background: white;
            padding: 20px;
            width: 350px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }
        button:hover {
            background: #0056b3;
        }
        .message {
            margin: 10px 0;
            font-weight: bold;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add User</h2>
    <?= $message; ?>
    <form method="post">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <button type="submit">Add User</button>
    </form>
</div>

</body>
</html>
