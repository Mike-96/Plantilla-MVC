<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-success">
      <img src="plantilla/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Plantilla MVC</b></span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="plantilla/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['SESSION_NAME'] ?></php></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">NAVIGATION MENU</li>
          <li class="nav-item menu-open">
            <a href="./index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" id="btnWhatsapp" class="nav-link">
              <i class="nav-icon fab fa-whatsapp"></i>
              <p>
                Whatsapp
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- user -->
              <li class="nav-item text-sm">
                <a href="#" id="btnViewUser" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    User List
                  </p>
                </a>
              </li>
              <!-- /user -->
              <!-- roles user -->
              <li class="nav-item text-sm">
                <a href="#" id="btnRolUser" class="nav-link">
                  <i class="nav-icon fas fa-user-tag"></i>
                  <p>
                  User Group
                  </p>
                </a>
              </li>
              <!-- /roles user -->
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" id="btnStaff" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Staff
              </p>
            </a>
          </li>

          <li class="nav-header">EXAMPLES</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>