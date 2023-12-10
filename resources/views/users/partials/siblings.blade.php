<div class="card mt-2">
    <div class="card-header">
        <h3 class="card-title">{{ trans('user.siblings') }}</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                @foreach ($user->siblings() as $sibling)
                    <tr>
                        <td>
                            {{ $sibling->profileLink() }} ({{ $sibling->gender }})
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
