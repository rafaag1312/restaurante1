<html lang='en'>

<head>
    <meta charset='utf-8' />
   
    <style>
            #calendar {
    width: auto;
    height:auto;
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
        float:right;
        margin-right: 30%;
        margin-top:5%;
    }
    
    input,select {
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
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 39px;
        text-align: center;
        padding-bottom: 20px;
        color:slateblue;
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
<div class="contact_form">

<div class="formulario">
    <form id="form-alta-usuario" action="/invireser">
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="nombre" name="name">
            <br>
            <span id="error-nombre"></span>
        </div>
        <div>
            <label for="apellidos">Apellidos::</label>
            <input type="text" id="dni" name="apellidos">
            <br>
            <span id="error-dni"></span>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            <br>
            <span id="error-email"></span>
        </div>
        <div>
            <label for="telefono">Telefono:</label>
            <input type="number" id="tel" name="tel">
            <br>
            <span id="error-edad"></span>
        </div>
        <div>
            <label for="tarjeta">Tarjeta:</label>
            <input type="text" id="tarjeta" name="tarjeta">
            <br>
            <span id="error-edad"></span>
        </div>
        
        <div>
                <label for="menu">Menu:</label>
                <select>
                @isset($menu)
                    @foreach ($menu as $m)
                        <option value="{{$m->nombre}}">{{$m->nombre}}, {{$m->precio}}€</option>
                    @endforeach
                @endisset
                </select>
        </div>
        <div>
                <label for="comensales">Comensales:</label><br>
                <input type="number" id="1" name="comensales" value="">
               
        </div>
        <div>
            <input type="submit" value="RESERVAR" >
        </div>  
        <input type="hidden" name="id" value="{{ $id }}">
    </form>
 
                
        



</div>
</div>
    
   
</body>

</html>
