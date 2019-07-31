@extends('backend.template')

@section('content')

@include('backend.book.menuleft')

<main>
    <h2>Edycja książki</h2>
    
    <form action="{{ action('BookBackendController@update')}}" method="POST" ENCTYPE="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <input type="hidden" name="id" value="{{ $book->id }}" />
        
        <label for="category">Kategoria:</label>
        <select id="category" name="category">
            @foreach ($categories as $category)
                @if($category->id==$book->category_id)
                    <option value="{{ $category->id }}" selected="selected">{{ $category->name }} </option>
                @else 
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif  
            @endforeach
        </select></br></br>
        
        @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }} </br></span>
        @endif
        <label for="title">Tytuł</label></br>
        <input type="text" id="title" name="title" class="title" value="{{ $book->title }}"/></br></br>
        
        <label for="author">Autor</label></br>
        <input type="text" id="author" name="author" class="author" value="{{ $book->author }}"/></br></br>
        
        @if ($errors->has('price'))
                <span class="error">{{ $errors->first('price') }} </br></span>
        @endif
        <label for="price">Cena</label></br>
        <input type="number" id="price" name="price" min="0" value="{{ $book->price }}"/></br></br>
        
        @if($isPhoto==1)
            <div class="photo">
                <figure>
                        <a href="{{ URL::to('photos/max/'.$photo->src) }}"><img src="{{ URL::to('photos/min/'.$photo->src) }}" width="65" height="85"></a>
                        <figcaption><a href="{{ URL::to('book/delete/'.$book->id.'/delfile/'.$photo->id)}}">Usuń</a></figcaption>
                </figure> 
            </div>
            </br>
        @else
            <input type="file" name="file"/><br/><br/>
        @endif
        
        
        @if ($errors->has('description'))
                <span class="error">{{ $errors->first('description') }} </br></span>
        @endif
        <label for="description">Opis</label></br>
        <textarea id="description" name="description">{{ $book->description }}</textarea></br>
        
        <input type="submit" value="Zapisz"/>
        
        <script>
            CKEDITOR.replace( 'description' );
        </script>
    </form>

</main>

@endsection('content')

