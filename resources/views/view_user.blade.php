<!DOCTYPE html>
<head>
    <title> Registros de datos personales </title>
    <link rel="stylesheet" href="stylesUser.css">
</head>
<br>
<br>
 

<body>

  <div class="table table-responsive">
    <table class="table  table sm  table bordered">
         <thead>
        <tr>
            <th>id</th>
            <th> Nombre </th>
          
         </thead>
         <tbody>
             @foreach ($registro as $item)
             <tr>
                 <td>{{$item->id}}</td>
                 <td>{{$item->nombre}}</td>
            @endforeach
                 

                 </tr>
         </tbody>                

        </table>       



  </div>
   