@extends('backend.template')

@section('content')

@include('backend.order.menuleft')

<main>
    <h2>Zamówienia</h2>
    
    <table>
        <thead>
            <tr>
                <th class="nameTable">Imię</th>
                <th class="nameTable">Nazwisko</th>
                <th class="nameTable">Ulica</th>
                <th class="nameTable">Nr domu</th>
                <th class="nameTable">Kod pocztowy</th>
                <th class="nameTable">Miasto</th>
                <th class="nameTable">Telefon</th>
                <th class="nameTable">Data</th>
                <th class="nameTable">Faktura</th>
                <th class="nameTable">Do zapłaty</th>
                <th colspan="2" class="nameTable">Akcja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->surname }}</td>
                <td>{{ $order->street }}</td>
                <td>{{ $order->number }}</td>
                <td>{{ $order->postcode }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->date }}</td>
                <td>{{ $order->invoice }}</td>
                <td>{{ $order->total }}</td>
                <td><a href="{{ URL::to('order/detail/' . $order->id ) }}">Szczegóły</a></td>
                <td><a href="{{ URL::to('order/update/' . $order->id ) }}">Wysłane</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

@endsection('content')

