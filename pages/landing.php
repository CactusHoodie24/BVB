<?php
include_once "index.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/style-home.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Fetch data from MySQL using PHP
      <?php
    include_once "index.php";
      // Fetch data from the database
      $sql = "SELECT pestcide_name, pest_reduction FROM pestcide";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Convert fetched data to JavaScript array
        echo "var data = google.visualization.arrayToDataTable([['Task', 'Hours per Day'],";
        while($row = $result->fetch_assoc()) {
          echo "['" . $row["pestcide_name"] . "', " . $row["pest_reduction"] . "],";
        }
        echo "]);";

        // JavaScript options for the chart
        echo "var options = {
          title: 'Pestcide Effectiveness',
          is3D: true,
        };";

        // Create and draw the chart
        echo "var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);";
      } else {
        echo "0 results";
      }
      ?>
    }
  </script>
    </head>
    <body>
        <header class="header">
            <a href="#" class="logo">Bvumbwe</a>
            <nav class="navbar">
                <a href="#" style="--i:1;" class="active">Home</a>
                <a href="#" style="--i:2;">About</a>
                <a href="#" style="--i:3;">Review</a>
                <a href="../movies/index.php"style="--i:4;">Get recommendations</a>
                <a href="#" style="--i:5;">Simulations</a>
            
                
            </nav>
            <div class="dropdown">
    <button class="dropbtn">Login 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <label for="show" class="show-btn">View Form</label>  
    </div>
  </div> 
  <?php
$sql = mysqli_query($conn, "SELECT * FROM article ORDER BY created_at DESC LIMIT 1");
while ($row = mysqli_fetch_assoc($sql)) {
    $unique_id = $row['unique_id'];
    $user_query = "SELECT firstName, lastName, img FROM researcher WHERE unique_id = '$unique_id'";
    $user_result = mysqli_query($conn, $user_query);

    // Initialize $firstname and $lastname
    $firstname = "";
    $lastname = "";
    $img = "";

    if ($user_result && mysqli_num_rows($user_result) > 0) {
        $user_row = mysqli_fetch_assoc($user_result);
        $firstname = $user_row['firstName'];
        $lastname = $user_row['lastName'];
        $img = $user_row['img'];
    } else {
        $firstname = "Unknown";
        $lastname = "Author";
    }
    ?>
    </header>
    <section class="home">
    <article id="news_heading" class="article-card" style="display: grid;
            grid-template-columns: 285px minmax(300px, 445px);
            max-width: 730px;
            border-radius: 10px;
            box-shadow: 6px 6px 5px hsla(0, 0%, 0%, 0.02),
                25px 25px 20px hsla(0, 0%, 0%, 0.03),
                100px 100px 80px hsla(0, 0%, 0%, 0.05); background: #4dca4d;">


            <div class="img-box">
                <img src="../images/<?php echo $row['img']; ?>" alt="" class="article-banner">
            </div>

            <div class="article-content">
        

     
                <a href="#">
                    <h3 class="article-title"><?php echo $row['heading']; ?> </h3>
                </a>
                <p class="article-text">Ever been in a room and felt like something was missing? Perhaps
        it felt slightly bare and uninviting. I’ve got some simple tips
        to help you make any room feel complete.</p>
                

                <div class="acticle-content-footer">

                    <div class="author">
                        <img src="../images/<?php echo $img ?>" class="author-avater">
                        <div class="author-info">
                            <a href="#">
                                <h4 class="author-name"><?php echo $firstname . " " . $lastname; ?></h4>
                            </a>
                            <div class="publish-date"><?php echo $row['created_at']; ?></div>
                        </div>
                    </div>

                    <div class="share">
                        <button class="short-btn">
                            <a href="article.php">See more</a>
                        </button>
                    </div>

                </div>

            </div>

        </article>
    
<?php
}
?>

            <div class="container-fluid">
    <div id="columnchart12" style="width: 100%; height: 500px;"></div>
</div>
<div class="center">
  <input type="checkbox" id="show">
  <section class="container">
     <label for="show" class="close-btn fas fa-times" title="close"></label>
     <div class="text">
        Login Form
     </div>
     <form action="#" method="POST" enctype="multipart/form-data">
     <div class="error-txt"></div>
        <div class="data">
           <label>Email or Phone</label>
           <input type="text"  name="firstName">
        </div>
        <div class="data">
           <label>Password</label>
           <input type="password"  name="password">
        </div>
        <div class="forgot-pass">
           <a href="#">Forgot Password?</a>
        </div>
        <div class="btn button">
           <div class="inner"></div>
           <input type="submit" name="login"  value="continue to chat">
        </div>
        <div class="signup-link">
           Not a member? <a href="signup.php">Signup now</a>
        </div>
     </form>
  </div>
</div>
<div id="piechart_3d" style="width: 400px; height: 400px; padding-left: 40px"></div>
</sectioh>
        </section>
        <section class="services2" style="background-color: whitesmoke;">
<div class="container-row">
  <h1>Our services</h1>
  <div class="row-container">
<div class="service">
<i class="fa-solid fa-laptop"></i>
  <h2>Consulations</h2>
  <p>Users of this system can communicate with the researchers, this is provided in the team section. </p>
</div>
<div class="service">
<i class="fa-solid fa-chart-simple"></i>
  <h2>Recommendations</h2>
  <p>This service is provided through content-based filtering. </p>
</div>
<div class="service">
<i class="fa-solid fa-laptop"></i>
  <h2>Data analysis</h2>
  <p>We make use of statistical modelling and machine learning to gain insights into the data collected. </p>
</div>
<div class="service">
<i class="fa-solid fa-laptop"></i>
  <h2>Simulations</h2>
  <p>Users can perform crop yield predictions based on the amount of fertilizer applied. </p>
</div>
<div class="service">
<i class="fa-solid fa-laptop"></i>
  <h2>Dissemination</h2>
  <p>We send out important information regarding our findings through sms alerts. </p>
</div>
<div class="service">
<i class="fa-solid fa-laptop"></i>
  <h2>Articles Library</h2>
  <p>Users can read through what has been uploaded on this website. </p>
</div>
  </div>
</div>
        </section>
        <section class="team">
            <h1 class="title">our team</h1>
            <div class="team-row">
            </div>
        </section>
        <footer id="Footer-myguy">
            <div class="container-footer">
              <div class="sec-abtus">
                <h2>About Us</h2>
                <p>The Station coordinates research activities on horticulture. The station also conducts research on soil fertility and plant nutrition, tree nuts, grain legumes, cereals, plant protection, tissue culture, livestock and technical services. Bvumbwe Agricultural Research Station is responsible for Kasinthula Experiment Station and Ngabu Sub-station.</p> 
              </div>
              <ul class="sc1">
              <a href="#"><img src="../images/insta.png"></a>
              <a href="#"><img src="../images/fb.png"></a>
              <a href="#"><img src="../images/icons8-twitter-circled-50.png"></a>
              <a href="#"><img src="../images/fb.png"></a>
              </ul>
            </div>
            <div class="sec-quicklinks">
              <h2>Quick Links</h2>
              <ul class="footer-nav">
                <li class="hoodie"><a href="#">Simulations</a></li>
                <li class="hoodie"><a href="#">Recommendations</a></li>
                <li class="hoodie"><a href="#">Articles</a></li>
                <li class="hoodie"><a href="#">About</a></li>
                
              </ul>
               </div>
               <div class="sec-contact">
                <h2>Contact Info</h2>
                <ul class="info">
                  <li>
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    <p>	Limbe<br>PO Box 5748.<br>Blantyre Malawi</p>
                  </li>
                  <li>
                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                    
                    <p><a href="tel:12345678">+265 1 662206</a>
                    <a href="tel:12345678900">+265 1 662206</a></p>
                  </li>
                  <li>
                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <p><a href="malito:gmail.com">preciousphimba@gmail.com</a></p>
                  </li>
                </ul>
               </div>
               </div>
          </footer>
          <div class="copyrighttext">
            <p>copyrightt @ 2024 Bvumbwe Research Station. All rights Reserved</p>
          </div>
          <script>
            // When the user scrolls down 20px from the top of the document, slide down the navbar
            window.onscroll = function() {scrollFunction()};
            
            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("bottom_nav").style.top = "0";
              } else {
                document.getElementById("bottom_nav").style.top = "-50px";
              }
            }
            </script>
        
     <script>
        // Call the function with PHP array data
        let rows = <?php echo json_encode($rows); ?>;
        switchRows(rows);
    </script>
    <script src="../Javascript/home.js"></script>
    <script src="../Javascript/landing.js"></script>
    </body>
</html>


