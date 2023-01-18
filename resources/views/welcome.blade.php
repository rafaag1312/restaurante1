<html lang='en'>

<head>
    <meta charset='utf-8' />
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
    <style>
        #botones {
            position: absolute;
            top: 80%;
            /* 100px debajo del div superior*/
            left: 38%;
        }

        #botones button {
            height: 45px;
            padding-right: 5%;
            margin-bottom: 20px;
            margin-top: 10px;
            text-transform: uppercase;
            background-color: white;
            border-color: black;
            border-style: solid;
            border-radius: 10px;
            width: 200px;
            cursor: pointer;


        }

        #calendar {
            width: auto;
            height: auto;
            float: left;
            margin-bottom: 2%;
            margin-left: 6%;
            background-color: #fff;
            border-radius: 10px;

        }

        @import url(https://fonts.googleapis.com/css?family=Noto+Sans);

        body {

            font-family: 'Noto Sans', sans-serif;
            /* Establecer imagen de fondo */
            background-image: url("{{ asset('images/fondoreser.jpg') }}");
            /* Asegurar que la imagen de fondo ocupe el 100% de la pantalla */
            background-size: cover;

        }

        .contact_form {
            width: 32%;
            height: auto;
            border-radius: 10px;
            padding-top: 30px;
            padding-bottom: 20px;
            background-color: white;
            padding-left: 30px;
            box-shadow: 3px 3px 3px 3px #000;
            float: left;
            margin-left: 35%;
            margin-top: 5%;
            position: relative;
        }

    

        input,
        select {
            background-color: #fbfbfb;
            width: 408px;
            height: 40px;
            border-radius: 5px;
            border-style: solid;
            border-width: 1px;
            border-color: #ab4493;
            margin-top: 10px;
            padding-left: 10px;
            margin-bottom: 20px;
        }

        textarea {
            background-color: #fbfbfb;
            width: 405px;
            height: 150px;
            border-radius: 5px;
            border-style: solid;
            border-width: 1px;
            border-color: #ab4493;
            margin-top: 10px;
            padding-left: 10px;
            margin-bottom: 20px;
            padding-top: 15px;
        }

        label {
            display: block;
            float: center;
        }




        button p {
            color: #fff;
        }

        span {
            color: red;
        }

        .aviso {
            font-size: 13px;
            color: #0e0e0e;
        }

        h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 39px;
            text-align: center;
            padding-bottom: 20px;
            color: slateblue;
        }

        h3 {
            font-size: 16px;
            padding-bottom: 30px;
            color: #0e0e0e;
        }

        p {
            font-size: 14px;
            color: #0e0e0e;
        }
    </style>
</head>

<body>

    <div>
        <div class="contact_form">

            <div id='calendar'></div>

        </div>
        <div id="botones"> </div>

      

        
    </div>
    
</body>

</html>