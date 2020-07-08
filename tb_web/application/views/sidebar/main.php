<body class="c-app" onload="startTime()">
    <!-- Sidebar -->
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed" id="sidebar">
        <div class="c-sidebar-brand">
            <span class="font-weight-bold">StudyManage</span>
        </div>
        <ul class="c-sidebar-nav ps ps--active-y ">
            <li class="c-sidebar-nav-item">
                <a href="<?php echo site_url('dashboard');?>" class="<?php echo $this->uri->segment(1) == "dashboard" ? 'c-sidebar-nav-link c-active' : 'c-sidebar-nav-link'?>">
                    <i class="c-sidebar-nav-icon fa fa-house-user"></i>
                    <span class="font-weight-bold font-lg">Halaman Utama</span>
                </a>
            </li>
            <li class="c-sidebar-nav-item ">
                <a href="<?php echo site_url('pelajaran');?>" class="<?php echo $this->uri->segment(1) == "pelajaran" ? 'c-sidebar-nav-link c-active' : 'c-sidebar-nav-link'?>">
                    <i class="c-sidebar-nav-icon fa fa-book"></i>
                    <span class="font-weight-bold font-lg">Pelajaran</span>
                </a>
            </li>
            <li class="c-sidebar-nav-item ">
				<a href="<?php echo site_url('jadwal');?>" class="<?php echo $this->uri->segment(1) == "jadwal" ? 'c-sidebar-nav-link c-active' : 'c-sidebar-nav-link'?>">
                    <i class="c-sidebar-nav-icon fa fa-calendar-alt"></i>
                    <span class="font-weight-bold font-lg">Jadwal</span>
                </a>
            </li>
            <li class="c-sidebar-nav-item ">
                <a href="<?php echo site_url('tugas');?>" class="<?php echo $this->uri->segment(1) == "tugas" ? 'c-sidebar-nav-link c-active' : 'c-sidebar-nav-link'?>">
                    <i class="c-sidebar-nav-icon fas fa-tasks"></i>
                    <span class="font-weight-bold font-lg">Tugas</span>
                </a>
            </li>
        </ul>
    </div>