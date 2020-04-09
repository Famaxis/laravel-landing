@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Background Image</div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                {!! Form::open([
                                    'url' => '/admin/image',
                                    'method' => 'post',
                                    'enctype' => 'multipart/form-data'
                                ]) !!}

                {!! Form::token(); !!}

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        {!! Form::label('image', 'Image') !!}
                        {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        {!! Form::submit('Upload Image', ['class' => 'btn btn-info']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            @if($image)
                <div class="row mt-md-n3">
                    <div class="col-md-4 mb-2"></div>
                    <div class="form-group col-md-4 mt-3">
                        <strong>Thumbnail Image:</strong>
                        <br/>
                        <img src="/thumbnails/{{ $image->image }}"/>
                    </div>
                </div>
            @endif

            {!! Form::open([
                                   'route' => 'image.destroy',
                                   'method' => 'delete'
                               ]) !!}
            {!! Form::token(); !!}

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    {!! Form::submit('Clear all', ['class' => 'btn btn-danger']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
