<?php
	// session_start();
	
	// // Check if user is already logged in
	// if(!isset($_SESSION['loggedIn'])){
	// 	header('Location: ../login.php');
	// 	exit();
	// }
	
	require_once 'C:\xampp\htdocs\IMS\config\database.php';
	require_once 'C:\xampp\htdocs\IMS\config\db.php';
	require_once 'C:\xampp\htdocs\IMS\inc\links.php';
?> 



<body>
  <!-- mmenu -->
    <nav class="nav">   
      <div class="head-title">
        GG TECH INv
      </div>

        <ul class="menu">
        <li>
          <a class="active" href="./index.php">
          <span class="icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
          <span class="title">Dashboard</span>
        </a>
      </li>
        <li>
          <a href="./products/index.php">
          <span class="icon"><i class="fa fa-desktop" aria-hidden="true"></i></span>
          <span class="title">Products</span>
          </a>
        </li>
        <li>
          <a href="./sales/sale.php">
          <span class="icon"><i class="fa fa-money" aria-hidden="true"></i></span>
          <span class="title">Sales</span>
          </a>
        </li>
        <li>
          <a href="./purchase/purchase.php">
          <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>    
          <span class="title"> Purchase</span>
          </a>
        </li>
        <li>
          <a href="./vendor/vendor.php">
          <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>    
          <span class="title">Vendor</span>
          </a>
        </li>
        <br><br><hr style="background-color: rgb(5, 63, 5); height: 10px; width: 96%; font-size: 12px;">
        <li>
          <a href="./categories/category.php">
          <span class="icon"><i class="fa fa-sitemap" aria-hidden="true"></i></span>    
          <span class="title">Categories</span>
          </a>
        </li>
        <li>
          <a href="./Analysis/analysis.php">
          <span class="icon"><i class="fa fa-cogs" aria-hidden="true"></i></span>    
           <span class="title"> Analysis</span>
          </a>
        </li>
        <li>
          <a href="./profit_target/target.php">
          <span class="icon"><i class="fa fa-bullseye" aria-hidden="true"></i></span>    
            <span class="title">Set Profit_Target</span>
          </a>
        </li>
        <li>
          <a href="./report/report.php">
          <span class="icon"><i class="fa fa-flag" aria-hidden="true"></i></span>    
            <span class="title">Report</span>
        </a>
      </li>
        </ul>
    </nav>
    
    <!-- headder -->
   
    <div class="head">
      <div>
        <span class="toggle">
        <i class="fa fa-bars" aria-hidden="true"></i>
        </span>
      </div>

      <div class="access">
        <span class="access-menu">
        <i class="fa fa-bell" aria-hidden="true"></i>
        </span>

        <span class="access-menu">
        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
        </span>

        <span class="access-menu">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        </span>
      </div>
    </div>


<!-- main body -->

  <section class="main-body"> 
    <!-- Analysis review -->  
    <div class="box-container">
        <div class="bbox">
          Available stocks <br>
          <p> 123</p>
        </div>
        <div class="bbox">
          Sold Goods <br>
          <p> 24</p>
        </div>
        <div class="bbox">
          Finished Products <br>
          <p>8</p>
        </div>
        <div class="bbox">
          Purchased Goods <br>
          <p>11</p>
        </div>
        <div class="bbox">
          average <br>
        </div>
        <div class="bbox">
          Total revenue <br>
          <p>54,000cfa</p>
        </div>
        
    </div>
    <br>
    <!-- <div class="bbox">LOCKDOWN</div> -->

    <!-- Graphical representation -->

      <div class="graph">
        <canvas id="myChart" width="800" height="400">
        </canvas>
        <!-- end of graph -->
      </div>
        <br><br>
      <!-- Profit target -->
        <div class="pro-target">


        
      
     
        </div>


    <!-- ending of main body -->
  </section>

  <?php
	require 'C:\xampp\htdocs\IMS\inc\footer.php';
  ?>

  <script src="../vendor/chart.js-4.3.0/package/dist/chart.umd.js"></script>  
  <script src="../assets/js/graph.js"></script> 
  <script src="../assets/js/script.js"></script> 
</body>
</html>