<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registered Users</title>
  <link rel="stylesheet" href="assets/css/users.css">
  
</head>
<body>
  <h1>Registered Users</h1>

  <?php if (!empty($_SESSION['users'])): ?>
    <table>
      <thead>
        <tr>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Suffix</th>
          <th>Mobile</th>
          <th>Email</th>
          <th>Batch</th>
          <th>Section</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION['users'] as $user): ?>
          <tr>
            <td><?= htmlspecialchars($user['firstName']) ?></td>
            <td><?= htmlspecialchars($user['middleName']) ?></td>
            <td><?= htmlspecialchars($user['lastName']) ?></td>
            <td><?= htmlspecialchars($user['suffix']) ?></td>
            <td><?= htmlspecialchars($user['mobile']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['batch']) ?></td>
            <td><?= htmlspecialchars($user['section']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No users registered yet.</p>
  <?php endif; ?>

  <p><a href="index.php">⬅ Back to Registration</a></p>
</body>
</html>
