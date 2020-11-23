@extends('layouts.authenticated_admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Transactions') }}
            <div class="float-right">
                <a class="btn btn-primary btn-sm" href="{{ url('/transactions') }}">View Transactions</a>
            </div>
        </div>

        <div class="card-body">
            <h5>Create Transaction</h5>
            <transaction-form />
        </div>
    </div>
@endsection
