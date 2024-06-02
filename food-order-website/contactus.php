<?php include('config/constants.php'); ?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contactstyles.css" />
</head>

<body>
    <div class="container">
        <h1>Contact Us</h1>
        <?php
        if (isset($_SESSION['msg_sent'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['msg_sent']; //Display the Session Message if SEt
            unset($_SESSION['msg_sent']); //Remove Session Message
            header("refresh:3; url=" . SITEURL . "index.php");
            echo "Redirecting to Home Page in 3 seconds....";
        }
        ?>
        <br><br>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="remarks">Remarks:</label>
                <textarea id="remarks" name="remarks" rows="4" required></textarea>
            </div>
            <button><a href="index.php">Back to Home</a></button>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $remarks = $_POST['remarks'];

    if ($username != "" && $email != "" && $remarks != "") {
        // Prepare the SQL query using prepared statement
        $sql = "INSERT INTO tbl_contactsus (username, email, remarks) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bind_param("sss", $username, $email, $remarks);
            $res = $stmt->execute();
            if ($res === TRUE) {
                $_SESSION['msg_sent'] = "<div class='success'>Remarks added successfully.</div>";
                header('location:' . SITEURL . 'contactus.php');
            } else
                echo "Error: " . $stmt->error;
            $stmt->close();
        } else {
            echo "Error in  preparing statement: " . $conn->error;
        }
    } else
        $_SESSION['msg_sent'] = "<div class='success'>Enter valid details</div>";
}
?>