@extends('backend.template')
@section('content')

@include('backend.order.menuleft')

<main>
    <h2>Zamówienia</h2>


    <table>
            <thead>
                <tr>
                    <th class="nameTable">Tytuł</th>
                    <th class="nameTable">Cena</th>
                    <th class="nameTable">Ilość</th>
                    <th class="nameTable">Suma</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                    <td>{{ $book->title }}</td>
                    <td> {{ $book->price }} zł</td>
                    <td>{{ $book->amount }}</td>
                    <td>{{ $book->sum }} zł</td>
                    </tr>

                @endforeach
            </tbody>
        </table>

</main>

@endsection('content')



