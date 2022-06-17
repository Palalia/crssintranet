
@extends('layouts.app')

@section('content')
<section class="section"> 
  <div class="section-header">
    <h3 class="page__heading">REGISTRO DE PROSPECTOS</h3>
  </div> 
  @if ($errors->any())
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
      <strong>¡REVISE LOS CAMPOS!</strong>
      @foreach ($errors->all() as $error )
        <span class="badge badge-danger">{{$error}}</span>
       @endforeach
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  {!! Form::open(array('route'=>'prospectos.store', 'method'=>'POST','enctype'=>'multipart/form-data')) !!}
   <label> Selecciona un Cliente:</label>
   {!! Form::select('cliente', $clientes,[], array('class'=>'form-control','placeholder'=>'Seleccione un cliente...','id'=>'cliente','onchange'=>"ClienteSelected();",'required' => 'required')) !!}
    <!--<select class="form-control" id="cbx_cliente" name="cbx_cliente" required>-->
   <label for="cbx_sucursal"> Selecciona el Campus:</label>
   <!--<select class="form-control" id="cbx_campus" name="cbx_campus" required></select>-->
   <select name="campus" id='campus' class="form-control" required>
   <option disabled selected>Seleccione cliente... </option> 
     <option value="-">- 
   </select>
   <!--<select class="form-control" id="cbx_campus" name="cbx_campus"></select>-->
   <label for="Nombre">Estado</label>
   {!! Form::select('estado', $estados,null, array('class'=>'form-control','placeholder' => 'Seleccione un estado...')) !!}
   <!--<input class="form-control" type="text" id="estado" name="estado" aria-label="Default" aria-describedby="inputGroup-sizing-default">-->
   <label for="Nombre">Nombre (s)</label>
   <input class="form-control" type="text" id="nombre" name="nombre" aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="ApellidoP">Apellido Paterno </label>
   <input class="form-control" type="text" id="appaterno" name="appaterno" aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="ApellidoM">Apellido Materno </label>
   <input class="form-control" type="text" id="apmaterno" name="apmaterno" aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="fechaNac">Fecha de Nacimiento:</label>
   <input class="form-control" type="date" id="fechanacimiento" name="fechanacimiento" onBlur="comprobarEdad()">
   <label for="edad">Edad:</label>
   <input class="form-control" type="text" id="edad" name="edad">
   <label for="CURP">CURP:</label>
   <input class="form-control" type="text" id="CURPPG" name="curp" onBlur="comprobarCurp()" required>
   <label for="Nacionalidad">Nacionalidad:</label>
   <input class="form-control" type="text" id="nacionalidad" name="nacionalidad" onBlur="comprobarCurp()" required>
   <label>Comentarios status de prospecto</label>
   <input class="form-control" type="text" name="comentarios" >
   <label>Direccion</label>
   <input class="form-control" type="text" placeholder="Calle #numero" name="direccion" >
   <label>Municipio</label>
   <input class="form-control" type="text" name="municipio" >
   <label>Colonia</label>
   <input class="form-control" type="text" name="colonia" >
   <label>Telefono</label>
   <input class="form-control" type="text" name="telefono" >
   <span id="estadocurp"></span>
   <label for="Nombre">SUELDO</label>
   <input class="form-control" type="text" name="sueldo" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="" required>
   <label for="Nombre" placeholder="Seleccione typo de sueldo..." required>TIPO SUELDO</label>
   <select class="form-control" name="tipo_salario" >
   <option disabled selected>Selecciona una opción</option>
    <option value='0'>Diario</option>
    <option value='1'>Semanal</option>
    <option value='2'>Quinsenal</option>
    <option value='3'>Mensual  </option>
   </select>
   <label for="foto">Foto:</label>
   <input class="form-control" type="file" id="imagen" name="imagen">
   <br>
   <label for="horaInicio">Hora inicio de turno:</label>
   <input type="time" id="myTime"  name="hora_inicio_turno">
   <label for="horaFin">Hora fin de turno:</label>
   <input type="time" id="myTime"  name="hora_fin_turno">

   <label class="form-control" for="puesto">PUESTO:</label>
   {!! Form::select('puesto', $puestos,null,array('class'=>'form-control','placeholder' => 'Seleccione un puesto...','required' => 'required')) !!}
   <!--<input class="form-control" type="text" id="puesto" name="puesto">-->
   <label for="cuip">CUIP:</label>
   <input class="form-control" type="text" id="cuip" name="cuip">
   <button id="btn_enviar" type="submit" class="btn btn-primary btn-lg d-block mx-auto" style="background-color:green;" name="btn_enviar">REGISTRAR GUARDIA</button>
   {!! Form::close() !!}
 <script>
   function myFunction() {///24 horas en tyme
	        var x = document.getElementById("myTime").value;
	        document.getElementById("demo").innerHTML = x;
    }
    function ClienteSelected(){
      /* Para obtener el valor */
      var cod = document.getElementById("cliente").value;
      if(cod==""){
        document.getElementById("campus").innerHTML="<option disabled selected>Seleccione cliente... </option>";
        //var select=document.getElementById("campus");
      }else{
        var arreglo;
        const Http= new XMLHttpRequest();
        Http.open('get',`../api/getCampus/${cod}`);
        // Http.setRequestHeader('Authorization', 'Bearer ' +'{{ csrf_token() }}');
        Http.send();    	
        Http.onreadystatechange  =function(){
         if (this.readyState == 4 && this.status == 200) {
          document.getElementById("campus").innerHTML="";
          var resul=(Http.responseText);
          var aux=resul.replace(/[^a-z+0-9+,]/ig,"");
          arreglo=aux.split(",");
          var select=document.getElementById("campus");
          arreglo.forEach(function(item){
            var opt = document.createElement('option');
            opt.value = item;
            opt.innerHTML = item;
            select.appendChild(opt);
            }
          ); 
         }
        }
      }
    }
 //comprobar Edad - fecha de nacimiento
 function comprobarEdad() {
	//$("#loaderIcon").show();
	jQuery.ajax({
	url: "calcularEdad.php",
	data:'fecha='+$("#fechanacimiento").val(),
	type: "POST",
	success:function(data){
		//$("#edad").html(data);
		$("#edad").val(data);
		//$("#loaderIcon").hide();
		//console.log(data);
	},
	error:function (){}
	});
 } 

 //limitar caracteres
 var input=  document.getElementById('CURP');
 input.addEventListener('input',function(){
  if (this.value.length > 18) 
     this.value = this.value.slice(0,18); 
 })

 var input=  document.getElementById('numsegurosocial');
 input.addEventListener('input',function(){
  if (this.value.length > 11) 
     this.value = this.value.slice(0,11); 
 })

 </script>
 <script src="js/Procpectoscalculos.js"></script>
 <script src="js/cargarmodal.js"></script>

 <div class="modal" tabindex="-1" id="informacion">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: green;">
        <h5 class="modal-title" style="font-size:30px; color:white;  text-align: center;" >AGREGAR PROSPECTOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerra1();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div> En este apartado podrás agregar tus prospectos para el proceso de contratación. </div></BR>
        <strong><div> Verifica que todos los campos sean correctos, ya que no podr&aacute;s MODIFICAR ningún dato sin la AUTORIZACI&Oacute;N  de tu SUPERVISOR.</div></strong>
      </BR><strong><div> NOTA: TODOS LOS CAMPOS DEBER&Aacute;N SER LLENADOS EN MAYUSC&Uacute;LAS</div></strong>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <button type="button" id="guardar" class="btn btn-primary d-block mx-auto" style="background-color:green;" onclick="cerra1();">ACEPTAR</button>
      </div>
    </div>
  </div>
 </div>

</div>
</section>
@endsection