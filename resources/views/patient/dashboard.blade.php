@extends('layouts.dashboard_layout')

@section('PAGE_TITLE') Patient Dashboard @endsection

@section('dashboard_content')
<div class="row mt-4">
    <div class="col-md-4 mb-4">
        @include('layouts.dashboard_side_card')
    </div>

    <div class="col-md-8 mb-4">
        <div class="row">
            <x-dashboard-cards.tiles name="Appointments" icon="calendar-days" count="74"/>
        </div>

        <div class="row mb-4">
            <div class="col-md-12 col-12">
                <div class="card border-0 shadow-sm p-2">
                    <strong class="card-title">Latest Appointments</strong>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Doctor Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Inaam ul haq</td>
                                    <td>09/09/2022</td>
                                    <td>08:00 PM</td>
                                    <td> <span class="bg-danger text-white p-1">Cancel</span> </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Inaam ul haq</td>
                                    <td>09/09/2022</td>
                                    <td>08:00 PM</td>
                                    <td> <span class="bg-warning text-white p-1">Pending</span> </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Inaam ul haq</td>
                                    <td>09/09/2022</td>
                                    <td>08:00 PM</td>
                                    <td> <span class="bg-success text-white p-1">Accepted</span> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('dashboard_script')

@endsection