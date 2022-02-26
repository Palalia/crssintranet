
@extends('layouts.app')

@section('content')
<section class="section"> 
  <div class="section-header">
    <h3 class="page__heading">REGISTRO DE PROSPECTOS</h3>
  </div> 
  {!! Form::open(array('route'=>'prospectos.store', 'method'=>'POST')) !!}
   <label for="cbx_estado"> Selecciona un Cliente:</label>
<!--<select class="form-control" id="cbx_cliente" name="cbx_cliente" required>-->
    <select class="form-control" id="cbx_cliente" name="cbx_cliente">
      <option value="0">CLIENTE</option>
   </select>
                 
   <label for="cbx_sucursal"> Selecciona el Campus:</label>
   <!--<select class="form-control" id="cbx_campus" name="cbx_campus" required></select>-->
   <select class="form-control" id="cbx_campus" name="cbx_campus"></select>
   <label for="Nombre">Estado</label>
   <input class="form-control" type="text" id="estado" name="estado" aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="Nombre">Nombre (s)</label>
   <input class="form-control" type="text" id="nombre" name="nombre" aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="ApellidoP">Apellido Paterno </label>
   <input class="form-control" type="text" id="appaterno" name="appaterno" aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="ApellidoM">Apellido Materno </label>
   <input class="form-control" type="text" id="apmaterno" name="apmaterno" aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="fechaNac">Fecha de Nacimiento:</label>
   <input class="form-control" type="date" id="fechanacimiento" name="fechanacimiento" onBlur="comprobarEdad()">
   <label for="fechaNac">Edad:</label>
   <input class="form-control" type="text" id="edad" name="edad">
   <label for="CURP">CURP:</label>
   <!--<input class="form-control" type="text" id="CURPPG" name="CURPPG" onBlur="comprobarCurp()" required>-->
   <input class="form-control" type="text" id="CURPPG" name="CURPPG" onBlur="comprobarCurp()">
   <p><img src="LoaderIcon.gif" id="loaderIcon"  style="display:none" /></p>
   <span id="estadocurp"></span>
   <label for="Nombre">SUELDO MENSUAL</label>
   <!--<input class="form-control" type="text" id="sueldomensual" name="sueldomensual" aria-label="Default" aria-describedby="inputGroup-sizing-default" required value="">-->
   <input class="form-control" type="text" id="sueldomensual" name="sueldomensual" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
   <label for="Nombre">SUELDO QUINCENAL</label>
   <!--   <input class="form-control" type="text" id="sueldoquincenal" name="sueldoquincenal" aria-label="Default" aria-describedby="inputGroup-sizing-default" required value="">--> 
   <input class="form-control" type="text" id="sueldoquincenal" name="sueldoquincenal" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
   <label for="Nombre">SUELDO DIARIO</label>
   <!--   <input class="form-control" type="text" id="sueldodiario" name="sueldodiario" aria-label="Default" aria-describedby="inputGroup-sizing-default" required value="">-->
   <input class="form-control" type="text" id="sueldodiario" name="sueldodiario" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
   <label for="foto">Foto:</label>
   <input class="form-control" type="file" id="imagen" name="imagen">
   <label for="numsegurosocial">NUMERO SEGURO SOCIAL (NSS):</label>
   <input class="form-control" type="text" id="numsegurosocial" name="numsegurosocial">
   <label for="puesto">PUESTO:</label>
   <input class="form-control" type="text" id="puesto" name="puesto">
   <label for="cuip">CUIP:</label>
   <input class="form-control" type="text" id="cuip" name="cuip">
   <label for="vigencia">VIGENCIA:</label>
   <input class="form-control" type="date" id="vigencia" name="vigencia">
   <label for="fechaIngreso">Fecha de Ingreso:</label>
   <input class="form-control" type="date" id="fechaIngreso" name="fechaIngreso">
   <input id="IdUsuario" name="IdUsuarioReg" type="hidden" value="" />
   <button id="btn_enviar" type="submit" class="btn btn-primary btn-lg d-block mx-auto" style="background-color:green;" name="btn_enviar">REGISTRAR GUARDIA</button>
   {!! Form::close() !!}

 <script type="text/javascript">
 function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
 }

 function comprobarCurp() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "ComprobarCurp.php",
	data:'CURPPG='+$("#CURPPG").val(),
	type: "POST",
	success:function(data){
		$("#estadocurp").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
 }


 //comprobar Edad - fecha de nacimiento
 function comprobarEdad() {
	//$("#loaderIcon").show();
	jQuery.ajax({
	url: "calcular.php",
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
@endsection