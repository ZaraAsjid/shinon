<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_code = $_POST['admin_code'];
    $correct_code = 'ayesha24'; 
    
    if ($entered_code === $correct_code) {
        $_SESSION['is_admin'] = true;
        header("Location: admin.php"); 
        exit();
    } else {
        $error_message = "Invalid code. Please try again.";
    }
}
?>
<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Access</title>
    <style>
        form{
            
            margin: 200px;
        }
      
input {
    width: 30%; 
    padding: 10px;
    border: 1px solid pink; 
    border-radius: 5px; 
    box-shadow: 0 2px 4px rgba(0, 0,0, 0.8); 
    font-size: 16px;
    margin-right: 10px;
}
input[type="text"] {
    border-color: #ff89a4; 
}
input[type="password"] {
    border-color:#ff89a4;
}

input[type="number"] {
    border-color: pink; 
    margin: 10px;
}
input[type="password"]:hover{
    border: #ff89a4;
}

button[type="submit"] {
    background-color: #ff89a4 ; 
    color: white; 
    border: none; 
    padding: 10px 20px; 
    border-radius: 5px; 
    cursor: pointer;
    font-size: 10px;
}

button[type="submit"]:hover {
    background-color: black;
    color: pink; 
}

    </style>
</head>
<body>
    <label for="admin_code" class="d-flex justify-content-center mt-3 pt-5 fs-2"><i><b>Enter Admin Code</b></i></label>
    <form action="admin_access.php" method="post" class="d-flex justify-content-center">
        <input type="password" id="admin_code" name="admin_code" required>
        <button class="fs-5 w-20 btn btn-outline-success"  type="submit">Submit</button>
    </form>
    <?php if (isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
<script>
  AOS.init();
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
