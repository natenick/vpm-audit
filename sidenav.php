<?php
    
    // import your header file
    include_once './layout/header.php';

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "audit";

    $mysqlInstance = new Mysql ($servername, $username, $password, $database);

    
?>
<div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
    <ul class="nav flex-column text-white w-100">
      <a href="#" class="nav-link h3 text-white my-2">
        Responsive </br>SideBar Nav
      </a>
      <li href="#" class="nav-link">
        <i class="bx bxs-dashboard"></i>
        <span class="mx-2">Home</span>
      </li>
      <li href="#" class="nav-link">
        <i class="bx bx-user-check"></i>
        <span class="mx-2">Profile</span>
      </li>
      <li href="#" class="nav-link">
        <i class="bx bx-conversation"></i>
        <span class="mx-2">Contact</span>
      </li>
    </ul>

    <span href="#" class="nav-link h4 w-100 mb-5">
      <a href=""><i class="bx bxl-instagram-alt text-white"></i></a>
      <a href=""><i class="bx bxl-twitter px-2 text-white"></i></a>
      <a href=""><i class="bx bxl-facebook text-white"></i></a>
    </span>
  </div>

  <!-- Main Wrapper -->
  <div class="p-1 my-container active-cont">
    <!-- Top Nav -->
    <nav class="navbar top-navbar navbar-dark bg-dark px-5">
      <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
    </nav>
    <!--End Top Nav -->
    <!-- <h3 class="text-dark p-3">RESPONSIVE SIDEBAR NAV 💻 📱</h3>
    <p class="px-3">Responsive navigation sidebar built using <a class="text-dark" href="https://getbootstrap.com/">Bootstrap 5</a>.</p>
    <p class="px-3"><a href="https://github.com/harshitjain-hj" class="text-dark">Checkout my Github</a></p> -->
  </div> 

<?php
    include_once './layout/footer.php';
       
      
?>