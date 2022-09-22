<div class="bg-white shadow-sm rounded-start rounded-end">
    <div class="card rounded-start rounded-end">
        <img src="{{ asset('assets/img/sidebar_bg.png') }}" class="card-img" alt="background image">
        <div class="card-img-overlay">
            <h5 class="card-title" style="color: #556ee6 !important">Welcome Back !</h5>
            <p class="card-text" style="color: #556ee6 !important">@yield('PAGE_TITLE')</p>
        </div>
    </div>
    <div class="card border-0 p-2">
        <div class="row d-flex align-items-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset('assets/img/profile.svg') }}" alt="Profile image" height="50">
                <h5 class="card-title mt-2">{{ auth()->user()->name }}</h5>
                <p class="card-text">{{ auth()->user()->roles[0]->name }}</p>
            </div>
            <div class="col-md-8">
                {{-- condition for change dynamicly components --}}
                @hasrole('admin')
                    <x-dashboard-cards.admin-side-card />
                @endhasrole

                @hasrole('doctor')
                    <x-dashboard-cards.doctor-side-card />
                @endhasrole

                @hasrole('patient')
                    <x-dashboard-cards.patient-side-card />
                @endhasrole
            </div>
        </div>
    </div>
</div>
