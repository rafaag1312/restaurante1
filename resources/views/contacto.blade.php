<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>menu</title>
    
           <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    @vite(['resources/js/app.js', 'resources/css/contacto.css'])
   
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
           <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-7">
          <div class="form h-100 contact-wrap p-5">
            <h3 class="text-center">Formulario de Contacto</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Tu nombre">
                </div>
                <br>
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Email:</label>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Tu email">
                </div>
                <br>
              </div>
              <div class="row mb-5">
                <div class="col-md-12 form-group mb-3">
                  <label for="message" class="col-form-label">Mensaje:</label>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="Escribe un mensaje"></textarea>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-5 form-group text-center">
                  <input type="submit" value="Enviar Mensaje" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>

            <div id="form-message-warning mt-4"></div> 
            <div id="form-message-success">
              Your message was sent, thank you!
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
  <img src="{{ asset('images/dish3.png') }}" alt="" class="dish3"></img>           
                                  
               </div>

                
       </header>

  </body>
</html>