<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('dashboard.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('semester.index')}}">
                        <i class="bi bi-circle"></i><span>Semester</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('programstudi.index')}}">
                        <i class="bi bi-circle"></i><span>Program Studi</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('pejabat.index')}}">
                        <i class="bi bi-circle"></i><span>Pejabat Stikes</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('surat.index')}}">
                <i class="bi bi-envelope"></i>
                <span>Surat Aktif Kuliah</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('user.index')}}">
                <i class="bi bi-person"></i>
                <span>User</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('setting.index')}}">
                <i class="bi bi-gear"></i>
                <span>Setting</span>
            </a>
        </li>
    </ul>

</aside>