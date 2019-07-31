@extends('backend.template')

@section('content')

@include('backend.category.menuleft')

<main>
    <h2>Dodawanie kategorii</h2>
    
    
    <form action="{{ action('CategoryBackendController@create')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }} </br></span>
        @endif
        <label for="name">Nazwa</label></br>
        <input type="text" id="name" name="name" value="{{ old('name') }}"/></br></br>
        
        <input type="submit" value="Dodaj"/>
    </form>
</main>

@endsection('content')

