    <div class="c-wrapper">
        <header class="c-header c-header-light c-header-fixed">
        <!-- Header content here -->
            <!-- Sidebar Toggler -->
            <button class="c-header-toggler c-class-toggler mfs-3" id="sidebarToggler">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Breadcrumbs -->
            <ul class="c-header-nav">
                <ol class="breadcrumb border-0 m-0 px-0 px-md-3 ">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active"><?php echo $judul?></li>   
                </ol>
            </ul>
            <!-- Datetime -->
            <ul class="c-header-nav mfs-auto mr-2">
                <span id="datetime"></span>
            </ul>

            <!-- Profile -->
            <ul class="c-header-nav mr-4">
                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" id="dropdownMenu2" aria-expanded="false">
                        <div class="c-avatar">
                            <img class="c-avatar-img" src="<?php echo base_url();?>assets/img/<?php echo $this->session->userdata('foto');?>" alt="">
                        </div>
                        <div class="ml-2">
                            <span class="font-weight-bold"><?php echo $this->session->userdata('nama');?></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                            <a class="dropdown-item" href="<?php echo site_url('profile');?>">Profile</a>
							<a class="dropdown-item" href="<?php echo site_url('dashboard/ubahPassword');?>">Ganti Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('logout');?>">Logout</a>
                    </div>
                    
                </li>
            </ul>
        </header>