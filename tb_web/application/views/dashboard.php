<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Dashboard</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/style/custom-style/css/style-custom.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/style/bootstrap4/css/bootstrap.min.css">
    <script src="/style/bootstrap4/js/jquery-3.5.1.min.js"></script>
    <script src="/style/bootstrap4/js/bootstrap.min.js"></script>
    <!-- Core UI -->
    <link rel="stylesheet" href="/style/coreui3/css/coreui.min.css">
    <script src="/style/coreui3/js/popper.min.js"></script>
    <script src="/style/coreui3/js/coreui.min.js"></script>
    <script src="/style/coreui3/js/coreui.bundle.js"></script>
    <script src="/style/coreui3/js/coreui.bundle.min.js"></script>
    <script src="/style/coreui3/pro/js/coreui.bundle.min.js"></script>
    
    <!-- Fontawesome -->
    <link rel="stylesheet" href="/style/fontawesome5/css/all.min.css">
    <script src="/style/fontawesome5/js/all.min.js"></script>

    
</head>
<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand">
            <i class="fas fa-user"></i>
        </div>
        <ul class="c-sidebar-nav ps ps--active-y ">
            <li class="c-sidebar-nav-item ">
                <a href="#" class="c-sidebar-nav-link c-active ">
                    <i class="c-sidebar-nav-icon fa fa-house-user"></i>
                    <span class="font-weight-bold font-lg">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="c-wrapper">
        <header class="c-header">
        <!-- Header content here -->
            <!-- Sidebar Toggler -->
            <button class="c-header-toggler" id="sidebarToggler">
                <i class="fas fa-bars"></i>
            </button>
        </header>
        <div class="c-body">
        <main class="c-main">
            <!-- Main content here -->
        </main>
        </div>
        <footer class="c-footer">
        <!-- Footer content here -->
        </footer>
    </div>

    <script>
        // toggle sidebar
        $(document).ready(function(){  
          $("#sidebarToggler").click(function(e) {
              e.preventDefault();
              $("#sidebar").toggleClass("c-sidebar-lg-show");
          });
        });
      </script>
</body>
</html>