@extends('layouts.app')
@section('content')
<h1>{{ $user->name }}'s Purchase Orders</h1>
<hr class="h-1 bg-red-500">
<a href="{{ route('user.show', ['id' => $user->id]) }}">View My Orders</a>
@if($user->purchaseOrders->isEmpty())
    <p>No purchase orders found.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Total Amount</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->purchaseOrders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->order_date->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection

