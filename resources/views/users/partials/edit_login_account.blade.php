<div class="card">
    <div class="card-header"><h3 class="card-title">{{ __('app.login_account') }}</h3></div>
    <div class="card-body">
        {!! FormField::email('email', ['label' => __('auth.email'), 'placeholder' => __('app.example').' nama@mail.com']) !!}
        {!! FormField::password('password', ['label' => __('auth.password'), 'placeholder' => '******', 'value' => '']) !!}
    </div>
</div>
