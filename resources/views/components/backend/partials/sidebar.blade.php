<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link secondary" aria-current="page" href="{{route('dashboard')}}">
                    <i class="fa-solid fa-house-chimney-window"></i> {{__('Dashboard')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('makeup.index')}}">
                    <i class="fa-solid fa-book"></i> {{__('Makeup Categories')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('makeupSubCategory.index')}}">
                    <i class="fa-solid fa-list"></i> {{__('Makeup Subcategories')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('makeupProduct.index')}}">
                    <i class="fa-solid fa-boxes-stacked"></i> {{__('Makeup Proucts')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('makeupColor.index')}}">
                    <i class="fa-solid fa-fill-drip"></i></i> {{__('Makeup Proucts color')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>