
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="../css/style-home.css">
    <script src="https://kit.fontawesome.com/5a50a80444.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get recommendations</title>
</head>
<header class="header">
            <a href="#" class="logo">Bvumbwe</a>
            <nav class="navbar">
                <a href="../pages/home.php" style="--i:1;" class="active">Home</a>
                <a href="#" style="--i:2;">About</a>
                <a href="#" style="--i:3;">Review</a>
                <a href="#"style="--i:4;">Get recommendations</a>
                <a href="#" style="--i:5;">Contact</a>
            </nav>
        </header>
<body>
    <div class="container_me">
        <h1>Crop recommendations</h1>
        <form action="recommendation.php" method="post">
            <label for="climate">Climate:</label>
            <input type="text" id="climate" name="climate" placeholder="Enter climate preference">

            <label for="soil">Soil Type:</label>
            <input type="text" id="soil" name="soil" placeholder="Enter soil type preference">

            <label for="yield">Yield Potential:</label>
            <select id="yield" name="yield">
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>

            <input type="submit" value="Get Recommendations">
        </form>
    </div>
</body>
</html>
