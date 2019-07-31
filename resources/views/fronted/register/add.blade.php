@extends('fronted.template')

@section('content')

<main>
    <h2>Rejestracja</h2>
    <div class="register">
    <form action="{{ action('UserFrontedController@create')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        @if ($errors->has('email'))
                <span class="error">{{ $errors->first('email') }} </br></span>
        @endif
        <label for="email">E-mail</label></br>
        <input type="text" id="email" name="email" value="{{ old('email') }}"/></br></br>
        
        @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }} </br></span>
        @endif
        <label for="password">Hasło</label></br>
        <input type="password" id="password" name="password"/></br></br>
        
        @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }} </br></span>
        @endif
        <label for="name">Imię</label></br>
        <input type="text" id="name" name="name" value="{{ old('name') }}"/></br></br>
        
        @if ($errors->has('surname'))
                <span class="error">{{ $errors->first('surname') }} </br></span>
        @endif
        <label for="surname">Nawisko</label></br>
        <input type="text" id="surname" name="surname" value="{{ old('surname') }}"/></br></br>
        
        @if ($errors->has('street'))
                <span class="error">{{ $errors->first('street') }} </br></span>
        @endif
        <label for="street">Ulica</label></br>
        <input type="text" id="street" name="street" value="{{ old('street') }}"/></br></br>
        
        @if ($errors->has('number'))
                <span class="error">{{ $errors->first('number') }} </br></span>
        @endif
        <label for="number">Numer domu</label></br>
        <input type="text" id="number" name="number" value="{{ old('number') }}"/></br></br>
        
        @if ($errors->has('postcode'))
                <span class="error">{{ $errors->first('postcode') }} </br></span>
        @endif
        <label for="postcode">Kod pocztowy</label></br>
        <input type="text" id="postcode" name="postcode" value="{{ old('postcode') }}"/></br></br>
        
        @if ($errors->has('city'))
                <span class="error">{{ $errors->first('city') }} </br></span>
        @endif
        <label for="city">Miasto</label></br>
        <input type="text" id="city" name="city" value="{{ old('city') }}"/></br></br>
        
        @if ($errors->has('phone'))
                <span class="error">{{ $errors->first('phone') }} </br></span>
        @endif
        <label for="phone">Telefon</label></br>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}"/></br></br>
        
        
        <input type="submit" value="Rejestruj"/>
    </form>
    </div>
    
</main>

@endsection('content')