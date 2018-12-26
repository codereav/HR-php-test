@extends('layout')
@section('title')
    <h1>Погода: {{ $weather->getSettlement() }}</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Температура:</th>
                    <th>Ощущается как:</th>
                    <th>Иконка</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><h3>{{ $weather->getFactTemp() }} C</h3></th>
                        <td><h3>{{ $weather->getFactFeelsLike() }} C</h3></td>
                        <td><img width="100" src="{{ $weather->getFactIcon() }}"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection