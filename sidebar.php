<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <!-- End Dashboard Nav -->
    <?php
    if ($_SESSION['login_role'] != "User") {
    ?>
      <li class="nav-item">
        <a class="nav-link collapsed " href="index.php">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>
    <?php
    }
    ?>
 <li class="nav-item">
        <a class="nav-link collapsed " href="employees.php">
          <i class="bi bi-person"></i>
          <span>Employees</span>
        </a>
      </li>
  </ul>

</aside><!-- End Sidebar-->