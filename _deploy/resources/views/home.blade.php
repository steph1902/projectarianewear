@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h6>My Order</h6></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            <a href="{{url('logout-user')}}">

                            {{ __('Logout') }}
                          </a>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <table class="table">
                                <th>Order-ID</th>
                                <th>Total Purchased</th>
                                <th>Status</th>
                                @foreach($billing_details as $billing)
                                @if($billing->status == 'success')
                                <tr class="table-success">
                                @elseif($billing->status == 'failed')
                                    <tr class="table-danger">
                                @elseif($billing->status == 'pending')
                                    <tr class="table-warning">
                                @elseif($billing->status == 'expired')
                                    <tr class="table-info">
                                @else
                                <tr class="">
                                @endif
                                    <td>{{$billing->order_id}}</td>
                                    <td>IDR {{number_format($billing->total_price,2)}}</td>
                                    <td>{{$billing->status}}</td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
