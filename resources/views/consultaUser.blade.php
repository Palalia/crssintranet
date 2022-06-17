<!DOCTYPE html>
<head>
    <title> consulta de registros de datos personales </title>
    <link rel="stylesheet" href="stylesUser.css">
</head>
<br>
<br>
 
<form name="consulta" method="post" action="consulta">
    @csrf
<body>
    <p> Inserte el ID a consultar :  <input type="text" name="id" size="2" > </p>
    <br>
    <br>
    <br>
    
   <input type="submit" name="btn_consul" value="Enviar">
   

  <div class="table table-responsive">
   
    <table class="table  table sm  table bordered">
         <thead>
        <tr>
            <th>id</th>
            <th> Nombre </th>
          
         </thead>
         <tbody>
             @foreach ($consul as $item)
             <tr>
                 <td>{{$item->id}}</td>
                 <td>{{$item->nombre}}</td>
            @endforeach
                 

                 </tr>
         </tbody>                

        </table>       
    </form>


  </div>