<!DOCTYPE html>
<head>
    <title> Datos Personales </title>
    <link rel="stylesheet" href="stylesUser.css">
</head>

<body>
   

<form name="Formulario" method="POST" action='datos'>
    @csrf<!--TOken-->
    <div>
        
        <p> Nombre :  <input type="text" name="nombre" size="30" placeholder="Nombre" value={{old('nombre')}}> </p>

        @error('nombre')
        <small>{{$message}} </small>  
        @enderror
        <br>

        <p> Apellido Paterno :  <input type="text" name="apellidoP" size="40" placeholder="Apellido Paterno" value={{old('apellidoP')}}> </p>

        @error('apellidoP')
        <small>{{$message}} </small>  
        @enderror
        <br>

        
        <p> Apellido Materno :  <input type="text" name="apellidoM" size="30" placeholder="Apellido Materno" value={{old('apellidoM')}}> </p>

        @error('apellidoM')
        <small>{{$message}} </small>  
        @enderror
        <br>

        <p> Edad :  <input type="text" name="edad" value={{old('edad')}} > </p>

        @error('edad')
        <small>{{$message}} </small>  
        @enderror

        <br>
        <br>
        <input type="submit" name="Enviar">
        <input type="reset" value="Borrar">
    </div>    
        
   
</form>
</body>

