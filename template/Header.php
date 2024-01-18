<?php
    session_start();
?>

<div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../College_project/Dashboard.php" class="nav-link">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fa fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">

            <a href="index3.html" class="brand-link">
                <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text brand-name">ObooK</span>
            </a>

            <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"
                style="">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>
                <div class="os-padding">
                    <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">

                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                            <div class="info" style="color:white;">
                            <?php
                                echo $_SESSION['company_name'];
                            ?>
                            </div>
                        </div>
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false" style="line-height: 5vh; font-size: 17px;">

                                <li class="nav-item">
                                    <a href="../../College_project/Dashboard.php" class="nav-link">
                                        <i class="nav-icon fa fa-tachometer" aria-hidden="true"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../College_project/AddOrders.php" class="nav-link">
                                        <i class="nav-icon fa fa-th"></i>
                                        <p>
                                            Add Orders
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../College_project/ViewOrders.php" class="nav-link">
                                        <i class="nav-icon fa fa-copy"></i>
                                        <p>
                                            View Orders
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../College_project/Settings.php" class="nav-link">
                                        <i class="nav-icon fa fa-table"></i>
                                        <p>
                                            Settings
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>

        </aside>

        <aside class="control-sidebar"
            style="display: none; top: 56.8px; height: fit-content; transition:none; background-color:white; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">

            <div class="p-3 control-sidebar-content os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition"
                style="height: 593.2px;">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>
                <div class="os-content-glue" style="margin: -16px; width: 0px; height: 0px;"></div>
                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible">
                        <div class="os-content" style="padding: 16px; height: 100%; width: 100%;">
                            <h5 class="colors"><?php
                                echo $_SESSION['username'];
                            ?></h5>
                            <hr class="mb-2" style="background-color: black;">
                            <!-- <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Dark Mode</span></div> -->
                            <a href="../../College_project/Settings.php"><h6 class="colors">Edit Profile</h6></a>
                            <a href="../../College_project/Login.php" onclick='return logout()'><h6 class="colors">Sign Out</h6></a>
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>
        </aside>

        <div id="sidebar-overlay"></div>
    </div>

    <script>
        function logout(){
            
        }
    </script>