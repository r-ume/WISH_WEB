@extends('app')

@section('content')

    {!! Form::open(['url' => '/myprofile/upload', 'method' => 'post', 'files' => true]) !!}

    {{--成功時のメッセージ--}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    {{-- エラーメッセージ --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        @if ($user->image)
            <p>
                <img src="{{ asset($user->image) }}" />
            </p>
        @endif

        {!! Form::label('fileName', '画像アップロード', ['class' => 'control-label']) !!}
        {!! Form::file('fileName') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('アップロード', ['class' => 'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}

@endsection