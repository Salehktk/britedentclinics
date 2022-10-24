@if (isset($doctor_services) && count($doctor_services) > 0)
    <div class="row mb-2 mx-auto">
        <div class="col-12">
            @foreach ($doctor_services as $doctor_service)
                <dl>
                    <dt>{{ $doctor_service->Services->name }}</dt>
                    <dd>Black hot drink</dd>
                </dl>
            @endforeach
        </div>
    </div>
@endif
