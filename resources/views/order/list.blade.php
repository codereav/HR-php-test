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
                        <th scope="row"><a href="#">{{ $order->id }}</a></th>
                        <td>{{ $order->partner->name }}</td>
                        <td>{{ $order->orderSum }} руб</td>
                        <td>
                            <table class="table table-striped table-condensed">
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->pivot->quantity }}шт</td>
                                        <td>({{ $product->pivot->price }} руб)</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
@endsection