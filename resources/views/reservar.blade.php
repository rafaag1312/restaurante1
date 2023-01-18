<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Instalar Bootstrap 5 en Laravel 9 y Vite | Diario del Programador</title>

    @vite(['resources/js/app.js', 'resources/css/reservar.css'])
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {

                draggable: true,
                firstDay: 1,
                fixedWeekCount: false,
                defaultView: 'month',
                events: "/calendar",
                eventClick: function(info) {
                    let start = info.event.startStr;

                    $.ajax({
                        type: "POST",
                        url: "/horas",

                        data: {
                            _token: "{{csrf_token()}}",
                            fecha: start,
                            type: 'showHours'

                        }

                    }).done(function(data) {

                        var select = document.getElementById("miselect");
                        // Iterar sobre los datos recibidos
                        var div = document.getElementById("botones");
                        div.innerHTML = "";
                        data.forEach(function(hora) {

                          let button = document.createElement("a");
                          button.innerHTML = hora.hora;
                          button.className = ""
                          button.setAttribute("href","/reserva2"+hora.id);
                          div.appendChild(button);
                           

                           

                        });
                    });

                }

            });
            calendar.render();
        });
    </script>
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

           <div id='calendar'></div>
        <div id="botones"> </div>

                                  
               </div>
                
       </header>

  </body>
</html>