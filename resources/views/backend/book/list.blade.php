@extends('backend.template')

@section('content')

@include('backend.book.menuleft')

<main>
    <h2>Książki</h2>
    
    <table>
        <thead>
            <tr>
                <th class="nameTable">Tytuł</th>
                <th colspan="2" class="nameTable">Akcja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td><a href="{{ URL::to('book/edit/' . $book->id ) }}">Edycja</a></td>
                <td><a href="{{ URL::to('book/delete/' . $book->id ) }}">Usuń</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</main>

@endsection('content')

