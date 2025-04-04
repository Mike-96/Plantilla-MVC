<?php
require_once 'assets/dictionary.php';
require_once 'config.php';
?>
<aside class="main-sidebar sidebar-dark-success elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link bg-success">
    <img src="plantilla/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b><?php echo $nameCompany['name']; ?></b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php
        // Definir la imagen por defecto
        $defaultImg = URL . 'assets/profile/usuario.png';

        // Verificar si $_SESSION['SESSION_IMG'] está configurado y no está vacía
        if (isset($_SESSION['SESSION_IMG']) && !empty($_SESSION['SESSION_IMG'])) {
          $imageUrl = URL . str_replace('../', '', $_SESSION['SESSION_IMG']);

          // Validar la URL generada
          if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            echo '<img src="' . htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') . '" class="img-circle elevation-2" alt="User Image">';
          } else {
            // Si la URL no es válida, mostrar la imagen por defecto
            echo '<img src="' . htmlspecialchars($defaultImg, ENT_QUOTES, 'UTF-8') . '" class="img-circle elevation-2" alt="Default User Image">';
          }
        } else {
          // Si $_SESSION['SESSION_IMG'] está vacía, usar imagen por defecto
          echo '<img src="' . htmlspecialchars($defaultImg, ENT_QUOTES, 'UTF-8') . '" class="img-circle elevation-2" alt="Default User Image">';
        }
        ?>
      </div>
      <div class="info">
        <!-- user name  -->
        <a href="#" class="d-block" style="font-size: 12px;"><?php echo $_SESSION['SESSION_EMAIL'] ?></php></a>
        <a href="#" class="d-block" style="font-size: 10px;"><?php echo $_SESSION['SESSION_NAME'] ?></php></a>
        <a href="#" class="d-block" style="font-size: 10px;"><?php echo $_SESSION['SESSION_ROL'] ?></php></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header"><?php echo $title['navigationMenu']; ?></li>
        <!--  -->
        <li class="nav-item menu-open">
          <a href="#"  id="btnPOS" class="nav-link active">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              <?php echo $routers['pos']; ?>
            </p>
          </a>
        </li>
        <!--  -->
        <li class="nav-item menu-open">
          <a href="./index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              <?php echo $routers['dashboard']; ?>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" id="btnProductos" class="nav-link">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p>
              <?php echo $routers['products']; ?>
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
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              <?php echo $routers['users']; ?>
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- user -->
            <li class="nav-item text-sm">
              <a href="#" id="btnViewUser" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  <?php echo $routers['listUsers']; ?>
                </p>
              </a>
            </li>
            <!-- /user -->
            <!-- roles user -->
            <li class="nav-item text-sm">
              <a href="#" id="btnRolUser" class="nav-link">
                <i class="nav-icon fas fa-user-tag"></i>
                <p>
                  <?php echo $routers['listRoles']; ?>
                </p>
              </a>
            </li>
            <!-- /roles user -->
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" id="btnStaff" class="nav-link">
            <i class="nav-icon fas fa-id-card-alt"></i>
            <p>
              <?php echo $routers['staff']; ?>
            </p>
          </a>
        </li>

        <!--  -->


        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-cog"></i>
            <p>
              <?php echo $routers['configs']; ?>
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- configuracion de roles -->
            <li class="nav-item text-sm">
              <a href="#" id="btnConfigsRol" class="nav-link">
                <i class="fas fa-code-branch"></i>
                <p>
                  <?php echo $dictionary['configsRol']; ?>
                </p>
              </a>
            </li>
            <!-- /configuracion de roles -->
          </ul>
        </li>

        <!--  -->






      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>