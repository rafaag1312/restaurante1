<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Instalar Bootstrap 5 en Laravel 9 y Vite | Diario del Programador</title>

    @vite(['resources/js/app.js', 'resources/css/menu.css'])
  </head>
  <style>
  
  body {
    /* Establecer imagen de fondo */
    background-image: url("{{ asset('images/fondoreser.jpg') }}");
    /* Asegurar que la imagen de fondo ocupe el 100% de la pantalla */
    background-size: cover;

}
  
  
 </style>
  <body>
      <header>
         <img src="{{ asset('/images/bg.png')}}" alt="" class="bg">
        <nav >
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo"></img>
                <li><a href="/">INICIO</a></li>
                <li><a href="/menu">MENU</a></li>
                <li><a href="/contacto">CONTACTO</a></li>
                <li><a href="#">RESERVA</a></li>
           </nav>
           <div class="main-continer">

                
                                    <img src="{{ asset('images/dish1.png') }}" alt=""></img>
                                    <img src="{{ asset('images/dish2.png') }}" alt=""></img>
                                    <img src="{{ asset('images/dish3.png') }}" alt=""></img>
                                    <img src="{{ asset('images/dish4.png') }}" alt=""></img>
                                    <img src="{{ asset('images/dish5.png') }}" alt=""></img>
                                  
               </div>
                
       </header>

  </body>
</html>