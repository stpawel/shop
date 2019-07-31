@extends('fronted.template')

@section('content')

<main>
    <h2>Hasło</h2>
    <div class="register">
    <form action="{{ action('UserFrontedController@updatepassword')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

       
        
        @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }} </br></span>
        @endif
        <label for="password">Hasło</label></br>
        <input type="password" id="password" name="password"/></br></br>
        
        @if ($errors->has('repeatpassword'))
                <span class="error">{{ $errors->first('repeatpassword') }} </br></span>
        @endif
        <label for="repeatpassword">Powtórz hasło</label></br>
        <input type="password" id="repeatpassword" name="repeatpassword"/></br></br>
        
        
        <input type="submit" value="Zapisz"/>
    </form>
    </div>
    
</main>

@endsection('content')