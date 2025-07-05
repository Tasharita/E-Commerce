<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Find user by email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
      // ✅ STEP 1: Set session on successful login
        $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email']

        
    ];
        
        // Redirect back to where they came from (optional)
    $redirectTo = $_SESSION['redirect_after_login'] ?? 'index.php';
    unset($_SESSION['redirect_after_login']);
    header("Location: $redirectTo");
    exit();
    
    } else {
        $error = "Invalid email or password.";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - MyDuka</title>
  <link rel="stylesheet" href="index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php ?>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card p-4 shadow rounded-4">
          <h2 class="mb-4 text-center">Login to MyDuka</h2>
          <?php if (!empty($error)): ?>
            <div class="alert alert-danger"> <?= htmlspecialchars($error) ?> </div>
          <?php endif; ?>

          <form method="POST" action="">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-warning">Login</button>
            </div>
          </form>

          <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a>.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
