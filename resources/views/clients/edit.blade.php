@extends('layouts.authenticated_admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Clients') }}
            <div class="float-right">
                <a class="btn btn-primary btn-sm" href="{{ url('/clients') }}">View Clients</a>
            </div>
        </div>

        <div class="card-body">
            <h5>Update Client</h5>
            {!! Form::open(['action' => ['ClientsController@update', $client->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('first_name', 'First Name')}}
                {{Form::text('first_name', $client->first_name, ['class' => 'form-control', 'placeholder' => 'John'])}}
                @error('first_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                {{Form::label('last_name', 'Last Name')}}
                {{Form::text('last_name', $client->last_name, ['class' => 'form-control', 'placeholder' => 'Doe'])}}
                @error('last_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::email('email', $client->email, ['class' => 'form-control', 'placeholder' => 'john@doe.com'])}}
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <img style="max-height: 150px;" src="<?php echo asset("storage/clients/avatars/$client->avatar")?>"></img>

                {{Form::label('avatar', 'Avatar')}}
                {{Form::file('avatar')}}
                @error('avatar')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
