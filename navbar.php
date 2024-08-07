<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .link {
            background-color: pink;
            color: white;
            padding-left: 24px;
            font-size: 20px;
            text-decoration: dashed;
        }
        .link:hover {
            background-color: white;
            color: pink;
            text-decoration: dashed;
            font-size: 25px;
            font-style: italic;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;
        }
        .container-fluid {
            background-color: pink;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <ul class="list-unstyled d-flex justify-content-center mb-0">
                    <li>
                        <a class="link text-decoration-none" href="home.php">Home</a>
                    </li>
                    <li>
                        <a class="link text-decoration-none" href="Nails.php">Nails</a>
                    </li>
                    <li>
                        <a class="link text-decoration-none" href="Cosmatics.php">Cosmetics</a>
                    </li>
                    <li>
                        <a class="link text-decoration-none" href="Dresses.php">Dresses</a>
                    </li>
                    <li>
                        <a class="link text-decoration-none" href="Jewelry.php">Jewelry</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
