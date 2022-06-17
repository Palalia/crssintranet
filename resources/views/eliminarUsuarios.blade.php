<!DOCTYPE html>
<head>
    <title> Baja de registros de datos personales </title>
    <link rel="stylesheet" href="stylesUser.css">
</head>

<body>
    <div style="color:blue;" name="consulta">
  
        <h2>Baja de Usuarios </h2>

         <form name="Edicion" action="borrar" method="post">
             @csrf<!--TOken-->  
             @method('DELETE')<!--enmascarar el metodo-->
            <p> Inserte el ID a consultar :  <input type="text" name="id" size="2" > </p>
            <!--form action=cambios -->
            <input type="submit" value="CONSULTA">
        </form>       
    </div>
</div>    
    
</body>
</html>

      


           