@extends('layouts.dashboard_layout')

@section('PAGE_TITLE')
    Doctors
@endsection

@section('dashboard_content')
    <div class="row mt-4">
        <div class="col-md-12 mb-4">
            <x-card cardTitle="All Doctors">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>e-Mail</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($doctors))
                                <?php $sr = 1; ?>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $sr++ }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>
                                            <a href="{{ route('doctor.edit', $doctor->id) }}"
                                                class="btn btn-sm btn-outline-info" title="Edit Doctor"> <i
                                                    class="fa fa-edit"></i> </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                title="Delete doctor" data-bs-toggle="modal"
                                                data-bs-target="#delete_doctor_{{ $doctor->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            @if ($doctor->profile_status < 2)
                                                <a href="{{ route('add_availability_view', $doctor->id) }}"
                                                    onclick="redirect({{ $doctor->id }})"
                                                    class="btn btn-sm btn-outline-warning" title="Add Availability">
                                                    <i class="fa fa-plus"></i> Add Availability </a>
                                            @endif
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete_doctor_{{ $doctor->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="delete_doctor_{{ $doctor->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete_doctor_{{ $doctor->id }}Label">
                                                        Confirmation Delete doctor</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to delete your <strong>{{ $doctor->name }}</strong>?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('doctor.destroy', $doctor->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-outline-danger"
                                                            title="Delete doctor">Confirm
                                                            Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>
    </div>
@endsection

@section('dashboard_script')
    <script>
        function redirect(id) {
            sessionStorage.setItem('user', id)
        }
    </script>
@endsection
