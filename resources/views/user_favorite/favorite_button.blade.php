@if (Auth::user()->id != $user->id) 
    @if (Auth::user()->is_favorite($user->id))
        {!! Form::open(['route' => ['user.unfavor', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavor', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favor', $user->id]]) !!}
            {!! Form::submit('Favor', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif