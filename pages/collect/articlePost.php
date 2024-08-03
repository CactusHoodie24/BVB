<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: ../Login.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Accusoft admin</title>
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/style-dash.css">
        <script src="https://kit.fontawesome.com/5a50a80444.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/market.css">
    </head>
    <body>
        <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
        <h2><span class="lab la-accusoft"></span><span>Accusoft</span></h2>
        </div>
        <div class="sidebar-menu">
<ul>
    <li>
        <a href="../Main-dash.php" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
    </li>
    <li>
        <a href="#container"><span class="las la-book"></span><span>Collect Market info</span></a>
    </li>
    <li>
        <a href="collect/articlePost.php"><span class="las la-clipboard-list"></span><span>Post Articles</span></a>
    </li>
    <li>
        <a href="cropData.php"><span class="las la-clipboard-list"></span><span>Collect Crop Data</span></a>
    </li>
    <li>
    <a href="../Main-dash.php#news"><span class="las la-clipboard-list"></span><span>Acc Info</span></a>
    </li>
</ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="search here" />
            </div>  
            <div class="bell-wrapper">
            <i class="las la-bell" aria-hidden="true" id="noti_number"></i>
</div>
            <div class="user-wrapper">
            <?php
            include_once "../index.php";
            $sql = mysqli_query($conn, "SELECT * FROM researcher WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
                    <img src="../../images/<?php echo $row['img']; ?>" width="40px" height="30px" alt="">
                    
                <div>
                <h4><span><?php echo $row['firstName'] ?></span></h4>
                <small>Super admin</small>
            </div>
        </div>
        </header>
        <section class="container">
      <h1 class="man">Submit an article<h1>
      <form action="market inc.php"  method="post" enctype="multipart/form-data" class="form">
        <div class="input-box">
          <label>Article Name</label>
          <input type="text" name="heading" placeholder="Enter article name" required />
        </div>
        <div class="input-box">
          <div class="input-box">
            <label>description</label>
            <input type="text" name="description" placeholder="Enter description name" required />
          </div>
        <div class="input-box">
          <label>article date</label>
          <input type="date" name="article_date" placeholder="Enter article date" required />
        </div>
        <div class="input-box">
                    <label>Select Image</label>
                    <input type="file" name="document">
                </div>
          <div class="input-box">
                    <label>Select Image</label>
                    <input type="file" name="img">
                </div>
                
        </div>
        <button type="submit" value="submit">Submit</button>
      </form>
    </section>
</html>