@extends('layout')
@section('title')
    <h1>Список заказов</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Название партнера
                    </th>
                    <th>
                        Стоимость заказа
                    </th>
                    <th>
                        Состав заказа
                    </th>
                    <th>
                        Статус заказа
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">
                            <a href="#">{{ $order->id }}</a>
                        </th>
                        <td>
                            {{ $order->partner->name }}
                        </td>
                        <td>
                            {{ $order->products->sum('summa') }}
                        </td>
                        <td>
                            @foreach ($order->products as $product)
                                {{ $product->name }} - {{ $product->quantity }}<br>
                            @endforeach
                        </td>
                        <td>
                            {{ $order->status }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
@endsection