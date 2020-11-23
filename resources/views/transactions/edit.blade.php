@extends('layouts.authenticated_admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Clients') }}
            <div class="float-right">
                <a class="btn btn-primary btn-sm" href="{{ url('/transactions') }}">View Transactions</a>
            </div>
        </div>

        <div class="card-body">
            <h5>Update Transaction</h5>
            <transaction-form :entity='<?=json_encode($transaction)?>' :client-prop='<?=json_encode($transaction->client)?>' />
        </div>
    </div>
@endsection
