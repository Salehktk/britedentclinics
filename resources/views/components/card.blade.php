<div class="card border-0 shadow">
    @if ($cardTitle != null)
        <div class="card-header bg-secondary">
            <h5 class="card-title text-light">{{ $cardTitle }}</h5>
        </div>
    @endif
    <div class="card-body p-3">
        {!! $slot !!}
    </div>
</div>
