@extends('layouts.authenticated_admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Transactions') }}
            <div class="float-right">
                <a class="btn btn-primary btn-sm" href="{{ url('/transactions/create') }}">New Transaction</a>
            </div>
        </div>
        <div class="card-body">
            <transaction-index :transactions='<?= json_encode($transactions) ?>'/>
        </div>
        <div class="card-footer text-center">
            {{$transactions->links()}}
        </div>
    </div>

@endsection
