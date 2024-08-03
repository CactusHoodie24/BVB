<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: home.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Accusoft admin</title>
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style-dash.css">

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
        <a href="#main" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
    </li>
    <li>
        <a href="#news"><span class="las la-users"></span><span>Info</span></a>
    </li>
    <li>
        <a href=""><span class="las la-clipboard-list"></span><span>Projects</span></a>
    </li>
    <li>
        <a href=""><span class="las la-shopping-bag"></span><span>Orders</span></a>
    </li>
    <li>
        <a href=""><span class="las la-receipt"></span><span>Inventory</span></a>
    </li>
    <li>
        <a href=""><span class="las la-user-circle"></span><span>Accounts</span></a>
    </li>
    <li>
        <a href=""><span class="las la-clipboard-list"></span><span>Tasks</span></a>
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
            include_once "index.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
                    <img src="images/<?php echo $row['img']; ?>" width="40px" height="30px" alt="">
                    
                <div>
                <h4><span><?php echo $row['fname']. " " . $row['lname'] ?></span></h4>
                <small>Super admin</small>
            </div>
        </div>
        </header>
        <section id="main">
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>79</h1>
                        <span>Projects</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>56K</h1>
                        <span>Income</span>
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
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                        <td><span class="Status-green"></span>review</td>
                                    </tr>
                                    <tr>
                                        <td> Web development</td>
                                        <td>UI Team</td>
                                        <td><span class="Status-red"></span>in progress</td>
                                    </tr>
                                    <tr>
                                        <td> Ushop app</td>
                                        <td>Mobile Team</td>
                                        <td><span class="Status-blue"></span>pending</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customers">
                  
            </div>
    </section>
    <section id="news">
    <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-1" value="nmaxwell">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="Nelle Maxwell">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control" value="Company Ltd.">
                                </div>
                            </div>
                        </div>
                </section>
                <footer id="Footer-myguy">
                    <div class="container-footer">
                      <div class="sec-abtus">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et accusamus, dolorum iusto nam atque voluptates, non odit asperiores ullam, ipsam perferendis veritatis inventore delectus. Quidem aut error optio natus dolor.</p> 
                      </div>
                      <ul class="sc1">
                      <a href="#"><img src="img/insta.png"></a>
                      <a href="#"><img src="img/fb.png"></a>
                      <a href="#"><img src="img/icons8-twitter-circled-50.png"></a>
                      <a href="#"><img src="img/fb.png"></a>
                      </ul>
                    </div>
                    <div class="sec-quicklinks">
                      <h2>Quick Links</h2>
                      <ul class="footer-nav">
                        <li class="hoodie"><a href="#">About</a></li>
                        <li class="hoodie"><a href="#">About</a></li>
                        <li class="hoodie"><a href="#">About</a></li>
                        <li class="hoodie"><a href="#">About</a></li>
                        
                      </ul>
                       </div>
                       <div class="sec-contact">
                        <h2>Contact Info</h2>
                        <ul class="info">
                          <li>
                            <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            <p>647 Linda Street<br>Phoenixville, PA 19460,<br>USA</p>
                          </li>
                          <li>
                            <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                            
                            <p><a href="tel:12345678">+1 234 567 8900</a>
                            <a href="tel:12345678900">+1 234 567 8900</a></p>
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
                    <p>copyrightt @ 2022 AgriInsecta. All rights Reserved</p>
                  </div>
    </div>
    </body>
    <script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "not.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>
<script src="Javascript/Researchers.js"></script>
</html>