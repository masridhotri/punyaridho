<div class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.homapage')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            {{-- <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class=" "></i>
                <a href="{{ route('admin.buku') }}">
                    <span class="menu-title">buku dan jurnal</span></a>
                <i class="menu-arrow"></i>
            </a> --}}
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Statistik</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.buku') }}">buku</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.jurnal') }}">jurnal</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user') }}">user</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">buku dan jurnal</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.cek') }}">buku</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('admin.jurnal') }}">jurnal</a></li> --}}
                </ul>
            </div>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.pinjaman') }}">pinjaman</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('admin.jurnal') }}">jurnal</a></li> --}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">transaksi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.anyar') }}">kasir</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('admin.jurnal') }}">jurnal</a></li> --}}
                </ul>
            </div>
            {{-- <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.pinjaman') }}">pinjaman</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('admin.jurnal') }}">jurnal</a></li>
                </ul>
            </div>  --}}
        </li>
    </ul>   

</div>
