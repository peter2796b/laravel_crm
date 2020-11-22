@extends('layouts.authenticated_admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Clients') }}
            <div class="float-right">
                <a class="btn btn-primary btn-sm" href="{{ url('/clients/create') }}">New Client</a>
            </div>
        </div>
        <div class="card-body">
            <client-index :clients='<?= json_encode($clients) ?>'/>
        </div>
        <div class="card-footer text-center">
            {{$clients->links()}}
        </div>
    </div>

@endsection
