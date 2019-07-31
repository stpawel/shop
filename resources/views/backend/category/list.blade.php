@extends('backend.template')

@section('content')

@include('backend.category.menuleft')

<main>
    <h2>Kategorie</h2>
    
    <table>
        <thead>
            <tr>
                <th class="nameTable">Kategoria</th>
                <th colspan="2" class="nameTable">Akcja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td><a href="{{ URL::to('category/edit/' . $category->id ) }}">Edycja</a></td>
                <td><a href="{{ URL::to('category/delete/' . $category->id ) }}">Usuń</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

@endsection('content')

