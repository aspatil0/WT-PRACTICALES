<?php
include 'db.php';

$id = $_GET['id'];
$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!empty($name) && !empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                $message = "<p class='success'>User updated successfully!</p>";
                header("Location: index.php");
                exit();
            } else {
                $message = "<p class='error'>Error updating record: " . $conn->error . "</p>";
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
    <title>Update User</title>
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
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }
        button:hover {
            background: #218838;
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
        .back-link {
            display: block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update User</h2>
    <?= $message; ?>
    <form method="post">
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        <button type="submit">Update User</button>
    </form>
    <a href="index.php" class="back-link">Back to User List</a>
</div>

</body>
</html>
