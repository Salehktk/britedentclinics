<li class="nav-item">
    <a class="nav-link {{ request()->route()->getName() == 'dashboard' ||request()->route()->getName() == 'super_dashboard'? 'active': '' }}"
        aria-current="page" href="{{ route('super_dashboard') }}"> <i class="fad fa-dashboard"></i> Dashboard</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fad fa-user-doctor"></i> Doctors
    </a>
    <ul class="dropdown-menu dropdown-menu-light">
        <li><a class="dropdown-item" href="{{ route('doctors') }}">All</a></li>
        <li><a class="dropdown-item" href="{{ route('add_doctor_view') }}">Add</a></li>
        <li><a class="dropdown-item" href="{{ route('fields') }}">Fields</a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fad fa-hospital-user"></i> Patients
    </a>
    <ul class="dropdown-menu dropdown-menu-light">
        <li><a class="dropdown-item" href="#">All</a></li>
        <li><a class="dropdown-item" href="#">Add</a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fad fa-user-circle"></i> Receptionist
    </a>
    <ul class="dropdown-menu dropdown-menu-light">
        <li><a class="dropdown-item" href="#">All</a></li>
        <li><a class="dropdown-item" href="#">Add</a></li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}"> <i class="fad fa-layer-plus"></i>
        Appointment List</a>
</li>
<li class="nav-item">
    <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}"> <i class="fad fa-credit-card-blank"></i>
        Transactions</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Other
    </a>
    <ul class="dropdown-menu dropdown-menu-light">
        <li><a class="dropdown-item" href="{{ route('locations') }}">Locations</a></li>
        <li><a class="dropdown-item" href="{{ route('services') }}">Services</a></li>
    </ul>
</li>
