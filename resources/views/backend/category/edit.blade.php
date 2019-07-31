@extends('backend.template')

@section('content')

@include('backend.category.menuleft')

<main>
    <h2>Edycja kategorii</h2>
    
    <form action="{{ action('CategoryBackendController@update')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <input type="hidden" name="id" value="{{ $category->id }}" />

        @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }} </br></span>
        @endif
        <label for="name">Nazwa</label></br>
        <input type="text" id="name" name="name" value="{{ $category->name }}"/></br></br>
  
        <input type="submit" value="Zapisz"/>
    </form>
</main>

@endsection('content')

