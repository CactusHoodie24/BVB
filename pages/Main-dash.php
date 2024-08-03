<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: Login.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Accusoft admin</title>
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style-dash.css">
        <script src="https://kit.fontawesome.com/5a50a80444.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/market.css">
    </head>
    <body>
        <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
        <h2><span class="lab la-accusoft"></span><span>Bvumbwe</span></h2>
        </div>
        <div class="sidebar-menu">
<ul>
    <li>
        <a href="#main" class="active"><span class="las la-igloo"></span><span>Status</span></a>
    </li>
    <li>
        <a href="#container"><span class="las la-book"></span><span>Collect Market info</span></a>
    </li>
    <li>
        <a href="collect/articlePost.php"><span class="las la-clipboard-list"></span><span>Post Articles</span></a>
    </li>
    <li>
        <a href="collect/cropData.php"><span class="las la-clipboard-list"></span><span>Collect Yield Data</span></a>
    </li>
    <li>
        <a href=""><span class="las la-clipboard-list"></span><span>Collect Pestcide Data</span></a>
    </li>
    <li>
        <a href="#news"><span class="las la-clipboard-list"></span><span>Acc Info</span></a>
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
                <input type="search" id="search-box" placeholder="search here" />
            </div>  
            <div class="bell-wrapper">
            <i class="las la-bell" aria-hidden="true" id="message_count"></i>
</div>
            <div class="user-wrapper">
            <?php
            include_once "index.php";
            $sql = mysqli_query($conn, "SELECT * FROM researcher WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
       <?php
include_once "index.php";
$sql_branch = mysqli_query($conn, "SELECT branch.branch_name, branch.department, branch.Project_title
            FROM branch
            JOIN researcher ON branch.branch_id = researcher.branch_id
            WHERE researcher.unique_id = '{$_SESSION['unique_id']}'");
if(mysqli_num_rows($sql_branch) > 0){
    $row_branch = mysqli_fetch_assoc($sql_branch);
    $branch_name = $row_branch['branch_name'];
    $department = $row_branch['department'];
    $project_title = $row_branch['Project_title'];
}
?>

          
                    <img src="../images/<?php echo $row['img']; ?>" width="40px" height="30px" alt="">
                    
                <div>
                <h4><span><?php echo $row['firstName'] ?></span></h4>
                <small>Researcher</small>
            </div>
        </div>
        </header>
        <section id="main">
        <?php
     $sql_article_count = mysqli_query($conn, "SELECT COUNT(*) AS article_count FROM article WHERE unique_id = {$_SESSION['unique_id']}");
     $article_count = 0; 
     if(mysqli_num_rows($sql_article_count) > 0){
         $row_article_count = mysqli_fetch_assoc($sql_article_count);
         $article_count = $row_article_count['article_count'];
     }
                    ?>
                     <?php
     $pql_crop_count = mysqli_query($conn, "SELECT COUNT(*) AS crop_count FROM crops WHERE unique_id = {$_SESSION['unique_id']}");
     $crop_count = 0; 
     if(mysqli_num_rows($sql_article_count) > 0){
         $row_crop_count = mysqli_fetch_assoc($pql_crop_count);
         $crop_count = $row_crop_count['crop_count'];
     }
                    ?>
<?php
    $sql_pesticide_count = mysqli_query($conn, "SELECT COUNT(*) AS pesticide_count FROM pestcide WHERE unique_id = {$_SESSION['unique_id']}");
    $pesticide_count = 0; 
    if(mysqli_num_rows($sql_pesticide_count) > 0){
        $row_pesticide_count = mysqli_fetch_assoc($sql_pesticide_count);
        $pesticide_count = $row_pesticide_count['pesticide_count'];
    }
?>

                   
            <div class="cards">
                <div class="card-single">
                    <div>
                    <h1><?php echo $article_count ?></h1>
                        <span>Articles</span>
                    </div>
                    <div>
                        <span class="las la-book"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $crop_count ?></h1>
                        <span>Crop entries</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <span>Market Entries</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $pesticide_count ?></h1>
                        <span style="color: white;">Articles</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-reader">
                            <h3>Recent Projects</h3>
                            <button> See all <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Project title</td>
                                        <td>Department</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $project_title ?></td>
                                        <td><?php echo $department ?></td>
                                        <td><span class="Status-green"></span>In-progress</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customers">
                <div class="card">
    <div class="card-reader">
        <h3>New Customer</h3>
        <button> See all <span class="las la-arrow-right"></span></button>
    </div>
    <div class="card-body">
    </div>
            </div>
    </section>
    <section id="container" class="container">
      <h1 class="man">Submit an article<h1>
      <form action="insertData.php"  method="post" enctype="multipart/form-data" class="form">
        <div class="input-box">
          <label>Date</label>
          <input type="date" name="climateDate" placeholder="Enter article name" required />
        </div>
        <div class="input-box">
          <div class="input-box">
            <label>Temperature reading</label>
            <input type="number" name="temperature" placeholder="Enter temperature reading" required />
          </div>
          <div class="input-box">
            <label>Rainfall reading</label>
            <input type="number" name="rainfall" placeholder="Enter temperature reading" required />
          </div>
        <div class="input-box">
          <label>humidity reading</label>
          <input type="number" name="humidity" placeholder="Enter humidity reading" required />
        </div>
        <div class="input-box">
          <label>windspeed reading</label>
          <input type="number" name="windspeed" placeholder="Enter windspeed reading" required />
        </div>
        </div>
        <button type="submit" value="submit">Submit</button>
      </form>
    </section>
              
    <section id="news">
    <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="../images/<?php echo $row['img']; ?>" alt
                                    class="hoodie" style="width: 120px" >
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                    
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $row['firstName'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="<?php echo $row['lastName'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $row['Email'] ?>">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control" value="<?php echo $branch_name ?>">
                                </div>
                            </div>
                        </div>
                </section>
              
                 
    </div>
    </body>
    
    <script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("message_count").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "not.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>

<script src="../Javascript/dash.js"></script>
<script src="../Javascript/Researchers.js"></script>
<script>
  
  function handleSearch() {
    
    var searchText = document.getElementById('search-box').value.toLowerCase();
    
    var contentItems = document.querySelectorAll('#main > *');
    
    
    for (var i = 0; i < contentItems.length; i++) {
      var contentItem = contentItems[i];
      
      
      if (contentItem.textContent.toLowerCase().includes(searchText)) {
        contentItem.style.display = 'block';
      } else {
        contentItem.style.display = 'none';
      }
    }
  }
  document.getElementById('search-box').addEventListener('input', handleSearch);
</script>
</html>