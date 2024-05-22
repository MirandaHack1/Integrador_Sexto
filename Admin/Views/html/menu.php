
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <!-- <a href="./index.html" class="text-nowrap logo-img"> -->
      <img src="../Public/assets/images/logos/favicon.png" width="150" alt="30">
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Aplicacion web </span>
        </li>
        <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
              <a class="sidebar-link" href="http://localhost/integrador_sexto/Cliente/views/index.php?page=home/home"  aria-expanded="false">
                <span>
                  <i class="ti ti-world"></i>
                </span>
                <span class="hide-menu">Comercio Electronico</span>
              </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">FUNCIONALIDAD</span>
        </li>
        
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE USUARIOS
            /*****************************************************************************************************************************************************************************/ -->
            <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
                <a class="sidebar-link" href="Usuarios/usuarios.php" target="base" aria-expanded="false">
                    <span>
                        <i class="ti ti-user"></i>
                    </span>
                    <span class="hide-menu">Usuarios</span>
                </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE CATEGORIA
            /*****************************************************************************************************************************************************************************/ -->
        
            <li class="sidebar-item">
              <?php
              $Rol = $_SESSION['Rol'];
              if ($Rol == 'Administrador') {
              ?>
             <a class="sidebar-link" href="categoria/categoria.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-tag"></i>
                </span>
                <span class="hide-menu">Categoria</span>
              </a>
              <?php
              } elseif($Rol == 'Empleado') {
              ?>
              <a class="sidebar-link" href="categoria/categoria.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-tag"></i>
                </span>
                <span class="hide-menu">Categoria</span>
              </a>
              <?php
              } // Cierre de la llave para la condición
              ?>
          </li>
        
            
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE Productos
            /*****************************************************************************************************************************************************************************/ -->
            <li class="sidebar-item">
              <?php
              $Rol = $_SESSION['Rol'];
              if ($Rol == 'Administrador') {
              ?>
             <a class="sidebar-link" href="productos2/productos2.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-package"></i>
                </span>
                <span class="hide-menu">Productos</span>
              </a>
              <?php
              } elseif($Rol == 'Empleado') {
              ?>
               <a class="sidebar-link" href="productos2/productos2.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-package"></i>
                </span>
                <span class="hide-menu">Productos</span>
              </a>
              <?php
              } // Cierre de la llave para la condición
              ?>
          </li>
          <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
               <a class="sidebar-link" href="descuentos/descuentos.php" target="base" aria-expanded="false">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-bar-graph" viewBox="0 0 16 16">
  <path d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5z"/>
  <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
</svg>
                  </span>
                  <span class="hide-menu">Descuentos</span>
                </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE ORDER
            /*****************************************************************************************************************************************************************************/ -->
            <li class="sidebar-item">
              <?php
              $Rol = $_SESSION['Rol'];
              if ($Rol == 'Administrador') {
              ?>
              <a class="sidebar-link" href="orden/orden.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Orden</span>
              </a>
              <?php
              } elseif($Rol == 'Empleado') {
              ?>
               <a class="sidebar-link" href="orden/orden.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Orden</span>
              </a>
              <?php
              } // Cierre de la llave para la condición
              ?>
          </li>
        

        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE ORDER
         /*****************************************************************************************************************************************************************************/ -->
         <li class="sidebar-item">
              <?php
              $Rol = $_SESSION['Rol'];
              if ($Rol == 'Administrador') {
              ?>
              <a class="sidebar-link" href="palabras_chat/palabras.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-pencil"></i>
                </span>
                <span class="hide-menu">Palabras</span>
              </a>
              <?php
              } elseif($Rol == 'Empleado') {
              ?>
                <a class="sidebar-link" href="palabras_chat/palabras.php" target="base" aria-expanded="false">
                  <span>
                    <i class="ti ti-pencil"></i>
                  </span>
                  <span class="hide-menu">Palabras</span>
                </a>
              <?php
              } // Cierre de la llave para la condición
              ?>
          </li>


        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE PERSONALIZACION
            /*****************************************************************************************************************************************************************************/ -->
      
        <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
               <a class="sidebar-link" href="pagos/pagos.php" target="base" aria-expanded="false">
                  <span>
                    <i class="ti ti-file"></i>
                  </span>
                  <span class="hide-menu">Pagos</span>
                </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>
            <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
               <a class="sidebar-link" href="iva/iva.php" target="base" aria-expanded="false">
                  <span>
                  <i class="ti ti-receipt"></i>
                  </span>
                  <span class="hide-menu">IVA</span>
                </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>
            

             <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
               <a class="sidebar-link" href="reportes/reportes.php" target="base" aria-expanded="false">
                  <span>
                  <i class="ti ti-list"></i>
                  </span>
                  <span class="hide-menu">Reportes</span>
                </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>

            <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
               <a class="sidebar-link" href="publicidad/publicidad.php" target="base" aria-expanded="false">
                  <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686"/>
</svg>
                  </span>
                  <span class="hide-menu">Publicidad</span>
                </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>
           
            

            

        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE DIRECION PAGINA WEB
            /*****************************************************************************************************************************************************************************/ -->
        
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        FIN MENU DE ACCESSO Y REGISTRAR
            /*****************************************************************************************************************************************************************************/ -->
      </ul>

    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>