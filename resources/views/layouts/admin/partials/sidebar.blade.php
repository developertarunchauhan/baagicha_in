<div class="offcanvas offcanvas-start sidebar-nav bg-primary shadow" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="small fw-bold text-uppercase px-3 text-light">
                        Admin
                    </div>
                </li>
                <li>
                    <a href="{{route('home')}}" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-speedometer2"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <div class="small fw-bold text-uppercase px-3 text-light">
                        Manager
                    </div>
                </li>
                <li>
                    <a class="nav-link sidebar-link px-3 text-light" data-bs-toggle="collapse" href="#accesscontrol" role="button" aria-expanded="false" aria-controls="accesscontrol">
                        <span class="me-2 fs-4"><i class="bi bi-sliders"></i></span>
                        <span>Access Manager</span>
                        <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
                    </a>
                    <div class="collapse" id="accesscontrol">
                        <div class="bg-primary">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="{{route('role.index')}}" class="nav-link px-3 text-light">
                                        <span class="me-2">
                                            <i class="bi bi-person-fill-exclamation"></i>
                                        </span>
                                        <span>Roles</span>
                                    </a>
                                    <a href="{{route('user.index')}}" class="nav-link px-3 text-light">
                                        <span class="me-2">
                                            <i class="bi bi-people"></i>
                                        </span>
                                        <span>Users</span>
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="nav-link sidebar-link text-light px-3" data-bs-toggle="collapse" href="#postmanager" role="button" aria-expanded="false" aria-controls="postmanager">
                        <span class="me-2 fs-3"><i class="bi bi-blockquote-left"></i></span>
                        <span>Blog Manager</span>
                        <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
                    </a>
                    <div class="collapse" id="postmanager">
                        <div class="bg-primary text-light">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="{{route('category.index')}}" class="nav-link px-3  text-light">
                                        <span class="me-2">
                                            <i class="bi bi-list"></i>
                                        </span>
                                        <span>Categories</span>
                                    </a>
                                    <a href="{{route('blog.index')}}" class="nav-link px-3  text-light">
                                        <span class="me-2">
                                            <i class="bi bi-body-text"></i>
                                        </span>
                                        <span>Blogs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>