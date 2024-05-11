<?php
//AUTHENTICATE USER
session_start();
if (!$_SESSION['is_login']) {
    $_SESSION['status'] = "You have to login first !!";
    $_SESSION['name'] = $name;
    header('location:login.php');
}

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">


            Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="layout.php" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) { ?>
                    <li class="nav-item">
                        <a href="manage_users.php" class="nav-link">
                            &nbsp;
                            <i class="fa fa-user"></i>
                            &nbsp;
                            <p>
                                Manage Users
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Applicants
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="manage_company.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Company
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="manage_category.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Category
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="manage_vacancy.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Vacancy
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Employee
                        </p>
                    </a>

                </li>
                <?php
                if ($_SESSION['role'] == 1) { ?>

                    <li class="nav-header">Super Admin</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Charts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/charts/chartjs.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ChartJS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/flot.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Flot</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/inline.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inline</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/uplot.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>uPlot</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php  } ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.sidebar -->
</aside>