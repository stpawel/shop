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
    <h2>Książki</h2>
        @foreach ($books as $book)
            <figure id="photos">
                <a href="{{ URL::to('ksiazki/'.$book->href).'/'.$book->id}}"><img src="{{ URL::to('photos/max/'.$book->src) }}" width="145" height="218"></a>
                <figcaption><div id="title"><a href="{{ URL::to('ksiazki/'.$book->href.'/'.$book->id) }}">{{$book->title }}</a></div> <div id="price">{{$book->price}} zł</div></figcaption>
            </figure>
        @endforeach
        
        
</main>

@endsection('content')



