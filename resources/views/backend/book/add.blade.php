@extends('backend.template')

@section('content')

@include('backend.book.menuleft')

<main>
    <h2>Dodawanie książki</h2>
    
    <form action="{{ action('BookBackendController@create')}}" method="POST" ENCTYPE="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <label for="category">Kategoria:</label>
        <select id="category" name="category">
            @foreach ($categories as $category)
            <option value="{{ $category->id  }}">{{ $category->name }}</option>>    
            @endforeach
        </select></br></br>
        
        @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }} </br></span>
        @endif
        <label for="title">Tytuł</label></br>
        <input type="text" id="title" name="title" class="title" value="{{ old('title') }}"/></br></br>
        
        <label for="author">Autor</label></br>
        <input type="text" id="author" name="author" class="author" value="{{ old('author') }}"/></br></br>
        
        @if ($errors->has('price'))
                <span class="error">{{ $errors->first('price') }} </br></span>
        @endif
        <label for="price">Cena</label></br>
        <input type="number" id="price" name="price" min="0" value="{{ old('price') }}"/></br></br>
        
        <input type="file" name="file"/><br/><br/>
        
        
        @if ($errors->has('description'))
                <span class="error">{{ $errors->first('description') }} </br></span>
        @endif
        <label for="description">Opis</label></br>
        <textarea id="description" name="description">{{ old('description') }}</textarea></br>
        
        <input type="submit" value="Dodaj"/>
        
        <script>
            CKEDITOR.replace( 'description' );
        </script>
    </form>

</main>

@endsection('content')

