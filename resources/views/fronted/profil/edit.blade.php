@extends('fronted.template')

@section('content')

<main>
    <h2>Edycja Konta</h2>
    <div class="register">
    <form action="{{ action('UserFrontedController@update')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <label for="email">E-mail</label></br>
        <input type="text" id="email" name="email"  disabled="disabled" value="{{ $user->email }}"/></br></br>
                
        @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }} </br></span>
        @endif
        <label for="name">Imię</label></br>
        <input type="text" id="name" name="name" value="{{ $user->name }}"/></br></br>
        
        @if ($errors->has('surname'))
                <span class="error">{{ $errors->first('surname') }} </br></span>
        @endif
        <label for="surname">Nawisko</label></br>
        <input type="text" id="surname" name="surname" value="{{ $user->surname }}"/></br></br>
        
        @if ($errors->has('street'))
                <span class="error">{{ $errors->first('street') }} </br></span>
        @endif
        <label for="street">Ulica</label></br>
        <input type="text" id="street" name="street" value="{{ $user->street }}"/></br></br>
        
        @if ($errors->has('number'))
                <span class="error">{{ $errors->first('number') }} </br></span>
        @endif
        <label for="number">Numer domu</label></br>
        <input type="text" id="number" name="number" value="{{ $user->number }}"/></br></br>
        
        @if ($errors->has('postcode'))
                <span class="error">{{ $errors->first('postcode') }} </br></span>
        @endif
        <label for="postcode">Kod pocztowy</label></br>
        <input type="text" id="postcode" name="postcode" value="{{ $user->postcode }}"/></br></br>
        
        @if ($errors->has('city'))
                <span class="error">{{ $errors->first('city') }} </br></span>
        @endif
        <label for="city">Miasto</label></br>
        <input type="text" id="city" name="city" value="{{ $user->city }}"/></br></br>
        
        @if ($errors->has('phone'))
                <span class="error">{{ $errors->first('phone') }} </br></span>
        @endif
        <label for="phone">Telefon</label></br>
        <input type="text" id="phone" name="phone" value="{{ $user->phone}}"/></br></br>
        
        
        <input type="submit" value="Zapisz"/>
    </form>
    </div>
    
</main>

@endsection('content')

