<!-- Nav header -->
<div class="nav-header">
    <div class="brand-logo">
        <a href="index.html">
            <b class="logo-abbr"><img src="{{ asset('assets/images/PENA.png') }}" alt=""></b>
            <span class="brand-title">
                <h2 class="text-white">Absensi</h2>
            </span>
        </a>
    </div>
</div>
<!-- Nav header end -->

<!-- Header start -->
<div class="header">
        <style>
            /* Tambahkan ini ke dalam tag <style> atau file CSS Anda */
            .nav-header {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.185); /* Menambahkan bayangan di bagian bawah navbar */
            }
        
            .header {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.164); /* Menambahkan bayangan di bagian bawah navbar */
            }
        </style>
    <div class="header-content clearfix">
        
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>

        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{ asset('assets/images/user/1.png') }}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Header end -->
