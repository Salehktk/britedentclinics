<a class="nav-link {{ (request()->route()->getName() == 'dashboard' || request()->route()->getName() == 'patient_dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('patient_dashboard') }}"> <i class="fad fa-dashboard"></i> Dashboard</a>
<a class="nav-link" aria-current="page" href="{{ route('dashboard') }}"> <i class="fad fa-calendar-plus"></i> Appointments</a>
<a class="nav-link" aria-current="page" href="{{ route('dashboard') }}"> <i class="fad fa-user-doctor"></i> Doctors</a>
<a class="nav-link" aria-current="page" href="{{ route('dashboard') }}"> <i class="fad fa-calendar-note"></i> Prescription</a>
<a class="nav-link" aria-current="page" href="{{ route('dashboard') }}"> <i class="fad fa-file-invoice-dollar"></i> Invoices</a>
<a class="nav-link" aria-current="page" href="{{ route('dashboard') }}"> <i class="fad fa-layer-plus"></i> Appointment List</a>