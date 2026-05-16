<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli(
    "db",
    "appuser",
    "123Abc!!!",
    "myapp"
);

if ($conn->connect_error) {
    die("DB Connection Failed");
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL Injection 對策
    $stmt = $conn->prepare(
        "SELECT password FROM loginusers WHERE username = ?"
    );

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        // 驗證 hash password
        if (password_verify($password, $row["password"])) {

            $message = "Login Success";

        } else {

            $message = "Wrong Password";
        }

    } else {

        $message = "User Not Found";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Login Form</h1>

<form method="POST">

    <label>Username:</label>
    <input type="text" name="username">

    <br><br>

    <label>Password:</label>
    <input type="password" name="password">

    <br><br>

    <button type="submit">
        Login
    </button>

</form>

<p>
<?php echo $message; ?>
</p>

</body>
</html>
