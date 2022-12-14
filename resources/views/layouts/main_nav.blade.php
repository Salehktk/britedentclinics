<nav class="navbar navbar-expand-lg fixed-top navbar-dark" aria-label="Main navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="fad fa-bell"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('assets/img/profile.svg') }}" alt="Profile image" height="24">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Setting</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#logout_modal">Logout</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="fa fa-gear"></i> </a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="logout_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="logout_modal_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logout_modal_Label">Confirmation Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger">Are you sure to logout?</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger" title="Logout"> Logout </a>
            </div>
        </div>
    </div>
</div>
