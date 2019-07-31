@extends('fronted.template')

@section('content')


<aside>
    <nav id="menu_left">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ URL::to('ksiazki/'.$category->href) }}">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>
    </nav>
</aside>

<main id="book">
    @foreach ($books as $book)
        <figure class="photo">
            <img src="{{ URL::to('photos/max/'.$book->src) }}" width="145" height="218">
        </figure>
        <div id="main_book">
            <div class="title">{{$book->title}}</div>
           <div class="author">Autorzy: {{$book->author}}</div>
            <div class="price">{{$book->price}} zł</div> 
            <div>
                <form action="{{ action('BasketFrontedController@add')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    
                    <input type="hidden" name="id" value="{{ $book->id }}" />

                    <label for="amount">Ilość</label></br>
                    <input type="number" id="amount" name="amount" min="1" value="1"/></br></br>

                    <input type="submit" value="Dodaj"/>
                </form>
            </div>
            <div class="clear"></div>
        </div>

        <div class="descripton">
            {!! $book->description!!}
        </div>
    @endforeach
</main>

@endsection('content')





