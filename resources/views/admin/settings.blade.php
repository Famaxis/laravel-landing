@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::model($settings, [
                            'route' => ['settings.update', $settings],
                            'method' => 'patch',
                            'enctype' => 'multipart/form-data'
                        ]) !!}

                        {!! Form::token(); !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Site title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'E-mail Address') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group">
                            <p>Section About: description</p>
                            {!! Form::textarea('about', null, ['class' => 'form-control editor','rows' => 3]) !!}
                        </div>

                        <div class="form-group">
                            <p>Section Services: list</p>
                            {!! Form::textarea('services', null, ['class' => 'form-control editor', 'rows' => 3]) !!}
                        </div>

                        <div class="form-group">
                            <p>Color Scheme</p>
                            {!! Form::select('color', ['red' => 'Red', 'black' => 'Black'], null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
