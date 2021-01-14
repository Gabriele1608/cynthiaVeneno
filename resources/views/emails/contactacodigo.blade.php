<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1 class="semi-bold text-lg">Consulta de clientes de Cynthia Veneno</h1> 

   <ul class="list-none">
        <li>
           Nombre: {{$detallesEmail['nameCodigo']}}
        </li>
        <li>
            Email: {{$detallesEmail['emailCodigo']}}
        </li>
        <p>
            Mensaje: {{$detallesEmail['mensajeCodigo']}}
        </p>
   </ul>

</body>
</html>