@extends('layouts.default')

@section('content')
    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="col-8 mx-auto">
                @if (session('message'))
                    <div class="alert alert-success mb-5">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="align-center">Url shortener</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'url_store']) !!}
                            <div class="form-group">
                                {!! Form::label('url', 'Put your long link there') !!}
                                {!! Form::text('url', '', ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                            <div class="form-group form-check">
                                {!! Form::checkbox('expired', true, false, ['class' => 'form-check-input']) !!}
                                {!! Form::label('expired', 'Expired link', ['class' => 'form-check-label']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('expiration_delay', 'Expiration time in minutes') !!}
                                {!! Form::number('expiration_delay', '60', ['class' => 'form-control', 'min' => 60, 'step' => '1']) !!}
                            </div>
                            {!! Form::submit('Get short', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                    @if ($errors->any())
                        <div class="card-footer">
                            <div class="alert alert-danger pb-0 mb-0">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
