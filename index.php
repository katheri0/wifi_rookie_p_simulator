<?php
session_start();
include 'conn.php';

// Initialize variables
$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($name) || empty($password)) {
        $errorMessage = "All fields are required.";
    } else {
        $conn1 = getconnaction();
        try {
            $sql = "SELECT * FROM lognet WHERE name = :name AND password = :password LIMIT 1";
            $stmt = $conn1->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION["logged"] = true;
                $_SESSION["user"] = $user;
                // Redirect only if login is successful
                header("Location: PS.php");
                exit(); // Important to stop further execution
            } else {
                $errorMessage = "Invalid name or password.";
            }

        } catch (PDOException $e) {
            $errorMessage = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!-- HTML START -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= htmlspecialchars($errorMessage) ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form  style="display:block;" class="form" method="post">
        <p class="form-title">Katheri Net</p>
        <div class="input-container">
            <input type="text" name="name" placeholder="ادخل اسم المستخدم " value="<?= htmlspecialchars($name) ?>">
        </div>
        <div class="input-container">
            <input type="password" name="password" placeholder="ادخل كلمة السر" value="<?= htmlspecialchars($password) ?>">
        </div>
        <button type="submit" class="submit">ادخل</button>
    </form>

    <?php include 'footer.php'; ?>
</body>
</html>
