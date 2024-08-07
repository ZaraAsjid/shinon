<?php
$host = 'localhost'; 
$db = 'shine'; 
$user = 'root';
$pass = '1218';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add_product') {
            $product_name = $_POST['product_name'];
            $category = $_POST['category'];
            $price = $_POST['price'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];
                $fileSize = $_FILES['image']['size'];
                $fileType = $_FILES['image']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

                if (in_array($fileExtension, $allowedExts)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = './uploads/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0755, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $stmt = $conn->prepare("INSERT INTO products (product_name, category, price, image) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssis", $product_name, $category, $price, $newFileName);

                        if ($stmt->execute()) {
                            echo "Product added successfully!";
                        } else {
                            echo "Error: " . $stmt->error;
                        }

                        $stmt->close();
                    } else {
                        echo "Error moving the uploaded file. Check directory permissions.";
                    }
                } else {
                    echo "Unsupported file type.";
                }
            } else {
                echo "No file uploaded or there was an upload error.";
            }
        } elseif ($_POST['action'] == 'delete_product') {
            $product_id = $_POST['product_id'];

            $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $stmt->bind_result($image);
            $stmt->fetch();
            $stmt->close();

            $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
            $stmt->bind_param("i", $product_id);

            if ($stmt->execute()) {
                if ($image && file_exists('./uploads/' . $image)) {
                    unlink('./uploads/' . $image);
                }
                echo "Product deleted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}

$result = $conn->query("SELECT id, product_name FROM products");
$conn->close();
?>
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
        }
        .form-control {
            margin-bottom: 10px;
        }
        .btn-custom {
            background-color: #ff89a4;
            border: none;
            color: white;
            border-radius: 4px;
        }
        .btn-custom:hover {
            background-color: gold;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Admin Page</h1>
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add_product">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" class="form-control" required>

            <label for="category">Category:</label>
            <select id="category" name="category" class="form-control" required>
                <option value="Nails">Nails</option>
                <option value="Cosmetics">Cosmetics</option>
                <option value="Dresses">Dresses</option>
                <option value="Jewelry">Jewelry</option>
            </select>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" class="form-control" required>

            <label for="image">Product Image:</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
            <button type="submit" class="btn btn-custom">Add Product</button>
        </form>
        <h2>Delete Product</h2>
        <form action="admin.php" method="post">
            <input type="hidden" name="action" value="delete_product">
            <label for="product_id">Product ID:</label>
            <select id="product_id" name="product_id" class="form-control" required>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo htmlspecialchars($row['id']); ?>">
                        <?php echo htmlspecialchars($row['product_name']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <button type="submit" class="btn btn-custom">Delete Product</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
