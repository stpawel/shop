@extends('fronted.template')
@section('content')

<main>
    <h2>Zamówienia</h2>


    <table>
            <thead>
                <tr>
                    <th>Tytuł</th>
                    <th>Cena</th>
                    <th>Ilość</th>
                    <th>Suma</th>
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

