<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url('home/beranda');?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Menu</li><!-- /.menu-title -->
                    <?php echo $this->base_model->primaryMenu(); ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="<?php echo base_url();?>assets/images/logokemhan.png" style="max-width: 45px;" alt="Logo">Pranata Kemhan</a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url('assets/images/'.$this->session->picture);?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url('user/setting'); ?>"><i class="fa fa- user"></i>My Profile</a>
                            <a class="nav-link" href="<?php echo base_url();?>login/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>