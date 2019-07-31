@extends('fronted.template')

@section('content')

<main>
    <h2>Koszyk</h2>
    @if ($cart->count() > 0)       
        <table class="basket">
            <thead>
                <tr>
                    <th width="400">Tytuł</th>
                    <th width="100">Ilość</th>
                    <th width="100">Cena</th>
                    <th width="100">Razem</th>
                    <th width="100">Usuń</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr>
                    <td>{{ $item->name }}</td>
                    <td> {{ $item->quantity }}</td>
                    <td>{{ $item->price }} zł</td>
                    <td>{{ $item->price*$item->quantity}} zł</td>
                    <td><a href="{{ URL::to('koszyk/usun/' . $item->id ) }}">Usuń</a></td>
                    </tr>

                @endforeach
                    <tr>
                            <td></td>
                            <td></td>
                            <td>Do zapłaty: </td> 
                            <td>{{ $total }} zł</td> 
                            <td></td> 
                    </tr>
            </tbody>
        </table> 
        @auth
            <form action="{{ action('OrderFrontedController@create')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="submit" value="Zamawiam"/>
            </form>
        @endauth     

    @else
        <div class="message">Brak Książek</div>
    @endif
        
</main>

@endsection('content')

