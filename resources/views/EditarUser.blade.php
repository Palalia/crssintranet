<!DOCTYPE html>
<head>
    <title> consulta de registros de datos personales </title>
    <link rel="stylesheet" href="stylesUser.css">
</head>

<body>
    <div style="color:blue;" name="consulta">
  
        <h2>Modificacion de Usuarios </h2>

         <form name="Edicion" >
             @csrf<!--TOken-->  
            <p> Inserte el ID a consultar :  <input type="text" name="id" size="2" > </p>
            <!--form action=cambios -->
            @error('id')
                    <small>{{$message}} </small>  
                 @enderror
            <br>
            <input type="submit" value="CONSULTA">
        </form>       
    </div>

<div style="color:green;" name="actualizarRegistros">
<!--@if(isset($consul))-->
   <form name="actualizar" method="POST" action="cambios">
       @csrf<!--TOken-->  
      
           
                 <p> ID <input type="text" name=id value={{$consul->id}} size="1" > </p>
                    @error('id')
                       <small>{{$message}} </small>  
                     @enderror
                 <br>

                 <p> Nombre <input type="text" name=nombre value={{$consul->nombre}}  > </p>
                    @error('nombre')
                       <small>{{$message}} </small>  
                    @enderror
                 <br>

                 <p> Apellido Paterno <input type="text" name=apellidoP value={{$consul->ApellidoP}} > </p>
                    @error('apellidoP')
                      <small>{{$message}} </small>  
                    @enderror
                 <br>
                
                 <p> Apellido Materno <input type="text" name=apellidoM value={{$consul->ApellidoM}} > </p>
                    @error('apellidoM')
                      <small>{{$message}} </small>  
                    @enderror
                 <br>
                 
                 <p> edad <input type="text" name=edad value={{$consul->edad}} > </p>
                    @error('edad')
                      <small>{{$message}} </small>  
                    @enderror
                 <br>
                 <br>
           
        <input type="submit" value="actualizar datos">
        @endif
   </form>
</div>    
    
</body>
</html>

      


           
             





 