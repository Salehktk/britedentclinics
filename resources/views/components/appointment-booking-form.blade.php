<x-card cardTitle="Search for doctors">
    <form action="" method="post" id="service_form" novalidate>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <x-location-list showLabel="false" />
            </div>
            <div class="col-md-4">
                <x-specialization-list showLabel="false" />
            </div>
            <div class="col-md-4">
                <x-location-list showLabel="false" />
            </div>
        </div>
    </form>
</x-card>

<div class="mt-4">
    <x-card cardTitle="">
        <div class="row">
            <div class="col-12">
                <h2 class="card-title text-center">Top Doctors</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mt-4">
                <div class="card h-100">
                    <img src="{{ asset('images/doctor/profile-image.jpg') }}" alt="profile image"
                        class="img-thumbnail mx-auto mt-3 border-0" style="width: 50%">
                    <div class="card-body">
                        <h5 class="card-title text-center">Doctor Name</h5>
                        <p class="card-text mt-2"> <strong>Doctor Title Here</strong> </p>
                        <p class="card-text mt-2">Doctor short description here.</p>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <p><i class="fa fa-location-dot"></i> Location</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="fas fa-file"></i> 12 years</p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <p><i class="fa fa-stethoscope"></i> Specialization</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="fa fa-hand-holding-medical"></i> Experience</p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <p><i class="fa fa-dollar"></i> 23$ <small>(per minute)</small></p>
                            </div>
                        </div>
                        <div class="row text-center mt-4">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i>
                                    Book Appointment</a>

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <i class="fa fa-eye"></i> Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </x-card>
</div>
