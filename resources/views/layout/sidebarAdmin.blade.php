<div class="nk-sidebar"> 
    <style>
        .nk-sidebar {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.164); /* Menambahkan bayangan pada sidebar */
        }
    </style>
              
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="" href="{{ route('home') }}" aria-expanded="false">
                    <i class="icon-speedometer"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('status') }}" aria-expanded="false">
                    <i class="icon-user"></i><span class="nav-text">Data Absensi</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('kegiatan') }}" aria-expanded="false">
                    <i class="icon-note"></i><span class="nav-text">Daftar Kegiatan</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('manajemen') }}" aria-expanded="false">
                    <i class="icon-check"></i><span class="nav-text">Manajemen User</span>
                </a>
            </li>
        </ul>
    </div>
</div>