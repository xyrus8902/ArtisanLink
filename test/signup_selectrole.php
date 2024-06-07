<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
</head>
<body>

<h2>Signup</h2>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Validate form data (you can add more validation as needed)
    if (empty($username) || empty($password) || empty($role)) {
        echo "Please fill in all fields.";
    } else {
        // Process the signup (you can save to database or do other actions here)
        // For demonstration, I'm just echoing the data
        echo "Username: " . $username . "<br>";
        echo "Password: " . $password . "<br>";
        echo "Role: " . $role . "<br>";

        // Redirect to a success page or do other actions after signup
        // header("Location: success.php");
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    
    <label for="role">Role:</label><br>
    <select id="role" name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
        <option value="moderator">Moderator</option>
    </select><br><br>
    
    <input type="submit" value="Signup">
</form>

</body>
</html>
