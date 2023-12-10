<div class="pull-right btn-group" role="group">
    @can('edit', $user)
        <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-warning">
            {{ trans('app.edit') }}
        </a>
    @endcan
    <a href="{{ route('users.show', [$user->id]) }}"
        class="btn {{ Request::segment(3) == null ? 'btn btn-secondary active' : 'btn btn-secondary' }}">
        {{ trans('app.show_profile') }} {{ $user->name }}
    </a>
    <a href="{{ route('users.chart', [$user->id]) }}"
        class="btn {{ Request::segment(3) == 'chart' ? 'btn btn-secondary active' : 'btn btn-secondary' }}">
        {{ trans('app.show_family_chart') }}
    </a>
    <a href="{{ route('users.tree', [$user->id]) }}"
        class="btn {{ Request::segment(3) == 'tree' ? 'btn btn-secondary active' : 'btn btn-secondary' }}">
        {{ trans('app.show_family_tree') }}
    </a>
    <a href="{{ route('users.marriages', [$user->id]) }}"
        class="btn {{ Request::segment(3) == 'marriages' ? 'btn btn-secondary active' : 'btn btn-secondary' }}">
        {{ trans('app.show_marriages') }}
    </a>
    @if ($user->yod)
        <a href="{{ route('users.death', [$user->id]) }}"
            class="btn {{ Request::segment(3) == 'death' ? 'btn btn-secondary active' : 'btn btn-secondary' }}">
            {{ trans('user.death') }}
        </a>
    @endif
</div>
