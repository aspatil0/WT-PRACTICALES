<?php
include 'db.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
            text-transform: uppercase;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        td a {
            text-decoration: none;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            transition: 0.3s;
        }
        .edit-btn {
            background-color: #28a745;
        }
        .edit-btn:hover {
            background-color: #218838;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<h2>User List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
                <a href="update_user.php?id=<?= $row['id'] ?>" class="edit-btn">Edit</a>
                <a href="delete_user.php?id=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
