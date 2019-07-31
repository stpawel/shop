@extends('fronted.template')

@section('content')

<main>
    <h2>Zamówienia</h2>


    <table>
            <thead>
                <tr>
                    <th>Nr Zamówienia</th>
                    <th>Data złożenia</th>
                    <th>Wartość</th>
                    <th>Szczegóły</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                    <td>{{ $order->invoice }}</td>
                    <td> {{ $order->date }}</td>
                    <td>{{ $order->total }} zł</td>
                    <td><a href="{{ URL::to('zamowienia/szczegoly/' . $order->id ) }}">Szczegóły</a></td>
                    </tr>

                @endforeach
            </tbody>
        </table>

</main>

@endsection('content')