<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center space-x-2">
                <img src="{{ asset('assets/backend/logo/logo.svg') }}" class="h-10 w-10" alt="Logo" />
                <h1 class="text-xl font-bold">CMS-Madhesh</h1>
            </a>
            <div class="close-btn xl:hidden block cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x text-lg"></i>
            </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">UI COMPONENTS</span>
                </li>

                {{-- <li class="sidebar-item">
                    <a class="sidebar-link flex justify-between items-center cursor-pointer" aria-expanded="false"
                        onclick="toggleDropdown('enterprisesDropdown')">
                        <span class="flex items-center">
                            <i class="ti ti-building"></i>
                            <span class="hide-menu ml-2">Enterprises</span>
                        </span>
                        <i class="ti ti-chevron-down"></i>
                    </a>

                    <!-- Enterprise Dropdown -->
                    <ul id="enterprisesDropdown" class="ml-6 mt-2 space-y-2 hidden">

                     <li>
                            <a class="sidebar-link" href="{{ route('admin.enterprise.index') }}">
                                <i class="ti ti-building"></i> <span>Enterprise</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.enterprisePerson.index') }}">
                                <i class="ti ti-user"></i> <span>Enterprise Person</span>
                            </a>
                        </li>

                    </ul>
                </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-login"></i>
                        </span>
                        <span class="hide-menu">Login</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Register</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">EXTRA</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-mood-happy"></i>
                        </span>
                        <span class="hide-menu">Icons</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Sample Page</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<script>
    function toggleDropdown(id) {
        var element = document.getElementById(id);
        element.classList.toggle('hidden');
    }
</script>
