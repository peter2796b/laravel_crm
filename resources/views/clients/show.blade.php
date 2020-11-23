@extends('layouts.authenticated_admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <img src="/storage/clients/avatars/<?=$client->avatar?>" class="avatar"/>
            <strong class="ml-2">{{$client->full_name }}</strong>
            <div class="float-right">
                <a class="btn btn-primary btn-sm" href="{{ url('/clients') }}">View Clients</a>
            </div>
        </div>
        <div class="card-body">
            @if(!$client->transactions)
                <div class="text-center">No Transactions yet.</div>
            @else
                <table class="table">
                    <tr>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                    <tbody>
                    @foreach($client->transactions as $transaction)
                        <tr>
                            <td>{{$transaction->display_amount}}</td>
                            <td>{{$transaction->transaction_date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
