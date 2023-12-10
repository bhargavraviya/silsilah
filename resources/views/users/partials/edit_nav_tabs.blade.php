<!-- Nav tabs -->
<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        {!! link_to_route(
            'users.edit',
            __('user.edit'),
            [$user->id],
            ['class' => request('tab') == null ? 'nav-link active' : 'nav-link'],
        ) !!}
    </li>
    <li class="nav-item">
        {!! link_to_route(
            'users.edit',
            __('app.address') . ' &amp; ' . __('app.contact'),
            [$user->id, 'tab' => 'contact_address'],
            ['class' => request('tab') == 'contact_address' ? 'nav-link active' : 'nav-link'],
        ) !!}
    </li>
    <li class="nav-item">
        {!! link_to_route(
            'users.edit',
            __('app.login_account'),
            [$user->id, 'tab' => 'login_account'],
            ['class' => request('tab') == 'login_account' ? 'nav-link active' : 'nav-link'],
        ) !!}
    </li>
    <li class="nav-item">
        {!! link_to_route(
            'users.edit',
            __('user.death'),
            [$user->id, 'tab' => 'death'],
            ['class' => request('tab') == 'death' ? 'nav-link active' : 'nav-link'],
        ) !!}
    </li>
</ul>
<br>
@can('delete', $user)
    {{ link_to_route('users.edit', __('user.delete'), [$user, 'action' => 'delete'], ['class' => 'btn btn-danger', 'id' => 'del-user-' . $user->id]) }}
@endcan
