@extends('layouts.dashboard_layout')

@section('PAGE_TITLE') Doctor Dashboard @endsection

@section('dashboard_content')
<div class="row mt-4">
    <div class="col-md-4 mb-4">
        @include('layouts.dashboard_side_card')
    </div>

    <div class="col-md-8 mb-4">
        <div class="row">
            <x-dashboard-cards.tiles name="Apointments" icon="calendar-days" count="74"/>
            <x-dashboard-cards.tiles name="Revenue" icon="dollar-circle" count="$399"/>
            <x-dashboard-cards.tiles name="Today's Earning" icon="usd" count="$100"/>
            <x-dashboard-cards.tiles name="Today's Appointments" icon="calendar-check" count="12"/>
            <x-dashboard-cards.tiles name="Tomorrow Appointments" icon="calendar-day" count="0"/>
            <x-dashboard-cards.tiles name="Upcoming Appointments" icon="calendar-lines" count="23"/>
        </div>

        <div class="row mb-4">
            <div class="col-md-12 col-12">
                <div class="card border-0 shadow-sm p-2">
                    <strong class="card-title">Monthly Appointments</strong>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('dashboard_script')
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');

    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: '',
                data: [23, 12, 70, 34, 23, 0, 69, 23, 12, 70, 34, 23, 100],
                fill: false,
                borderColor: "#6c63ff",
                tension: 0.1,
            }]
        },
    });
    </script>
@endsection