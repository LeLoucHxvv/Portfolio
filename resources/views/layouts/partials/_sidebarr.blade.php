<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-categors"> </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('about.index') }}">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Personal Information</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('skill.index') }}">
                <i class="menu-icon mdi mdi-lightbulb"></i>
                <span class="menu-title">Skills</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('social-media.index') }}">
                <i class="menu-icon mdi mdi-account-group"></i>
                <span class="menu-title">Social Media</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('interest.index') }}">
                <i class="menu-icon mdi mdi-newspaper"></i>
                <span class="menu-title">Interest</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-brain"></i>
                <span class="menu-title">Expertise</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('education.index') }}">Educations</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('experience.index') }}">Experience</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('portfolio.index') }}">
                <i class="menu-icon mdi mdi-folder-multiple"></i>
                <span class="menu-title">Portfolio</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cv.index') }}">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">CV Resume</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{route ('menu.contact.index')}}">
                <i class="menu-icon mdi mdi-message"></i>
                <span class="menu-title">Message</span>
            </a>
        </li> --}}
    </ul>
</nav>
