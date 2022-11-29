<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



</head>

<body>


    <div class="row">
        <form class="col s12" action="{{ route('reset') }}" method="post">

            @csrf

            <input type="hidden" name="token" value="{{ $token}}">
            <div class="row">
            <div class="input-field col s6">
                    <i class="material-icons prefix">markunread</i>
                    <input id="email" type="email" class="validate" name="email">
                    <label for="email">Email</label>
                </div>
                
                <div class="input-field col s6">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">password</label>
                </div>
        
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input id="confirmation" type="password" class="validate" name="password_confirmation">
                    <label for="confirmation">confirmation</label>
                </div>
                
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="action">cambiar contarseña
                <i class="material-icons right">send</i>
            </button>

            @if ($errors->any())
              <ul>
                @foreach ($errors->all() as $error )
                 <li>{{ $error }}</li>
                @endforeach

              </ul>
            @endif
        </form>
    </div>









    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>