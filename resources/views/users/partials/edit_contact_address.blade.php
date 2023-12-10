<div class="card">
    <div class="card-header"><h3 class="card-title">{{ __('app.address') }} &amp; {{ __('app.contact') }}</h3></div>
    <div class="card-body">
        {!! FormField::textarea('address', ['label' => __('app.address')]) !!}
        {!! FormField::text('city', ['label' => __('app.city'), 'placeholder' => __('app.example').' Jakarta']) !!}
        {!! FormField::text('phone', ['label' => __('app.phone'), 'placeholder' => __('app.example').' 081234567890']) !!}
    </div>
</div>
