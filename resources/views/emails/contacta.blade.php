<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1 class="semi-bold text-lg">Consulta de clientes</h1> 

   <ul class="list-none">
        <li>
           Nombre: {{$detallesEmail['name']}}
        </li>
        <li>
            Email: {{$detallesEmail['email']}}
        </li>
        <p>
            Mensaje: {{$detallesEmail['mensaje']}}
        </p>
   </ul>

</body>
</html>