<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Registration</title>
    <style>
        .error {
            color: red;
            font-size: small;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <form method="POST">
            <h1>Form Registration</h1>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Name">
            <br>
            <label for="phone">Telephone:</label>
            <input type="tel" id="phone" name="phone" placeholder="Telephone (e.g., 1234567890)">
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email">
            <br>
            <label for="address">Address:</label>
            <textarea id="address" name="address" placeholder="Address"></textarea>
            <br>
            <label for="qlf">Qualification:</label>
            <select id="qlf" name="qlf">
                <option value="">Select a Qualification</option>
                <option value="bachelors">Bachelor's Degree</option>
                <option value="masters">Master's Degree</option>
            </select>
            <br>
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" placeholder="Password">
            <br>
            <label for="cpass">Confirm Password:</label>
            <input type="password" id="cpass" name="cpass" placeholder="Confirm Password">
            <br>
            <button type="submit">Register</button>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'] ?? '';
                $phone = $_POST['phone'] ?? '';
                $email = $_POST['email'] ?? '';
                $qlf = $_POST['qlf'] ?? '';
                $pass = $_POST['pass'] ?? '';
                $cpass = $_POST['cpass'] ?? '';
                $address = $_POST['address'] ?? '';

                $errors = [];

                if (empty($name)) {
                    $errors['name'] = "Name is required.";
                }
                if (empty($phone)) {
                    $errors['phone'] = "Phone is required.";
                } else if (!preg_match("/^[0-9]{10}$/", $phone)) {
                    $errors['phone'] = "Phone number must be a valid 10-digit number.";
                }
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Valid email is required.";
                }
                if (empty($qlf)) {
                    $errors['qlf'] = "Qualification is required.";
                }
                if (empty($address)) {
                    $errors['address'] = "Address is required.";
                }
                if (empty($pass) || empty($cpass)) {
                    $errors['pass'] = "Password is required.";
                } else if ($pass != $cpass) {
                    $errors['cpass'] = "Passwords do not match.";
                } else if (strlen($pass) < 8) {
                    $errors['pass'] = "Password must be at least 8 characters.";
                }

                echo "<script>";
                if (!empty($errors)) {
                    foreach ($errors as $field => $message) {
                        echo "
                        if (document.getElementById('{$field}')) {
                            var errorElement = document.createElement('p');
                            errorElement.className = 'error';
                            errorElement.textContent = '{$message}';
                            document.getElementById('{$field}').insertAdjacentElement('afterend', errorElement);
                        }";
                    }
                } else {
                    echo "alert('Registration successful!');";
                }
                echo "</script>";
            }
            ?>
        </form>
    </center>
</body>

</html>