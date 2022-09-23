<div class="nav-scroller bg-white shadow-sm">
    <div class="container">
        <nav class="nav" aria-label="Secondary navigation">
            {{-- condition for change dynamicly components --}}
            @hasrole('admin')
                <x-navbars.admin-sub-nav />
            @endhasrole

            @hasrole('doctor')
                <x-navbars.doctor-sub-nav />
            @endhasrole

            @hasrole('patient')
                <x-navbars.patient-sub-nav />
            @endhasrole
        </nav>
    </div>
</div>
