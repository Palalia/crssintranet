@extends('layouts.app')
@section('content')
<div>
<br>
<br>
<div class="section-header">
    <h3 class="page__heading">Entrevista</h3>
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
<form id="regiration_form">
<!------------------------------paso 1----------------------------------------------------------------->
  <fieldset> 
    <div class="input-group ">
        <label for="estatura" class="input-group-text">Estatura</label>
        <input type="number" class="form-control input-number" name="estatura" min="100" max="215" placeholder="(cm)" > 
        <label class="input-group-text">Peso</label>
        <input type="number" class="form-control input-number"name="peso" min="100" max="215" placeholder="(kg)">
    </div>
    <br>
    <div class="form-control">
        <label>Hora inicio de turno:</label>
        <input type="time" id="myTime"name="hora_inicio_turno">
        <label>Hora fin de turno:</label>
        <input type="time" id="myTime"  name="hora_fin_turno">
    </div>
    <br>
    <div class="input-group">
      <label class="input-group-text">Gastos mensuales</label>
      <!--<label class="input-group-text">$</label>-->
      <input type="number" name="gastos"class="form-control input-number" placeholder="$">
    </div>
      <table class="table mt-2">
        <thead>
            <th></th>
            <th>NO</th>
            <th>SI</th>
        </thead>
        <tbody>
            <tr>
                <td><label>Casa propia:</label></td>
                <td><input type="radio" name="casa_propia" value="0" > No</td>
                <td><input type="radio" name="casa_propia" value="1"> Si</td>
            </tr>
            <tr>
                <td><label>Credito infonavit:</label></td>
                <td><input type="radio" name="credito_infonavit" value="0" > No</td>
                <td><input type="radio" name="credito_infonavit" value="1"> Si</td>
            </tr>
        </tbody>  
      </table>
      <div class="input-group">
      <label class="input-group-text">Grado maximo de estudios</label>
      <input type="text" name="estudios" class="form-control input-text" >
    </div>
      <input type="button"  class="next btn btn-info" value="SIGUIENTE" />
</fieldset>
<!---------------------------------------fin paso 1 -------------------------------------------------------------------->
<!---------------------------------------fin paso 2 -------------------------------------------------------------------->
<fieldset>
    <div class="form-group"> 
      <label class="input-group-text">Experiencia:</label>
      <textarea placeholder="descripcion ..." class="form-control input-text" rows="3" name="experiencia" style="height:100%;"></textarea>
    </div>
    <div class="form-group">
       <label class="input-group-text">Motivos:</label>
       <textarea class="form-control input-text" name="motivos" style="height:100%;" rows="3" placeholder="descripcion ..."></textarea>
    </div>
    <div class=" form-control">
      <label >Tiempo de traslado: &nbsp;</label>
      <select class="form-control-sm" name="hora">
      <option disabled selected>Horas</option>
      @for ($i = 0; $i <23; $i++)
        <option value="{{$i}}">{{$i}}</option>
        <br>
      @endfor
      </select>
      <select class="form-control-sm" name="minutos">
      <option disabled selected>min</option>
      @for ($i = 0; $i <60; $i++)
        <option value="{{$i}}">{{$i}}</option>
        <br>
      @endfor
      </select>
    </div>
    <br>
    <div class="form-control">
      <label for="sintomas" >Antecedentes penales:</label>
      <input type="radio"  name="antecedentes" value="0" > No
      <input type="radio" name="antecedentes" value="1" > si 
    </div>  
    <br>
    <input type="button" name="previous" class="previous btn btn-info" value="ANTERIOR" />
    <input type="button" name="next" class="next btn btn-info" value="SIGUIENTE" />
</fieldset>
<!---------------------------------------fin paso 2 -------------------------------------------------------------------->
<!---------------------------------------paso 3 -------------------------------------------------------------------->
<fieldset>
    <div id="sintomas"class="form-control">
        <label for="sintomas">Sintomas covid:</label>
        <input type="radio" id="nosintomas" name="casa_propia" value="0"  onclick="nosintomasfuncion();"> No
        <input type="radio" name="casa_propia" onclick="sisintomas();"value="1" > si 
    </div>
    <div id="divsintomas">
        </div>
    
    <div class=" input-group mb-3 input-group-prepend">
      <label class="input-group-text" for="Vacuna">Vacuna:</label>
      <select class="custom-select" for="refuersos"name="vacuna" >
        <option disabled selected>Seleccione numero de dosis recibidas...</option>
        <option value="0" class="dropdown-item">0</option>
        <option value="0">1</option>
        <option value="0">2</option>
        <option value="0">3</option>
        <option value="0">4</option> 
      </select>
    </div>   
    <div id="prueba_covid"class="input-group ">
        <label class="input-group-text">Prueba covid:</label>
        <input class="input-group-text" type="radio" name="prueba_covid" value="0" Onclick="ocultarprueba();"/><label class="input-group-text">No</label>
        <input class="input-group-text" type="radio" name="prueba_covid" value="1" Onclick="sipruebacovid();"/><label class="input-group-text">Si</label>
    </div>
    <div id="enfermedad"class="form-control">
      <label >Enfermedad:</label>
      <input type="radio" id="noenfermedad"name="enfermedad" value="0" Onclick="ocultarenfermedades();"> No
      <input type="radio" id=""name="enfermedad" Onclick="clickradiobuttonsi();"  value="1" > si&nbsp;&nbsp;
    </div>  
      <div id="divenfermedad">
      </div>
    <div id="discapacidad" class="form-control">
      <label>Discapacidad:</label>
      <input type="radio" id="nodiscapacidad"name="discapacidad" value="0" Onclick="ocultardiscapacidades();"> No
      <input type="radio" name="discapacidad" Onclick="sidiscapacidad();"  value="1" > si
    </div>
    <div id="divdiscapacidad">
    </div>
    <div id="pruebaantidoping" class="input-group ">
    <label class="input-group-text">Prueba antidoping:</label>
        <input class="input-group-text" type="radio" name="prueba_antidoping" value="0" Onclick="nopruebaantidoping();"/><label class="input-group-text">No</label>
        <input class="input-group-text" type="radio" name="prueba_antidoping" value="1" Onclick="sipruebaantidoping();"/><label class="input-group-text">Si</label>
    </div>
    <div class="input-group ">
      <label class="input-group-text">Disposicion a realizarse antidoping:</label>
      <input class="input-group-text" type="radio" name="disposicion_antidoping" value="0" /><label class="input-group-text">No</label>
      <input class="input-group-text" type="radio" name="disposicion_antidoping" value="1" /><label class="input-group-text">Si</label>
    </div>
    <input type="button" name="previous" class="previous btn btn-info" value="ANTERIOR" />
    <input type="submit" name="submit" class="submit btn btn-success" value="ENVIAR" />
</fieldset>
<!---------------------------------------fin paso 3 -------------------------------------------------------------------->
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
 var coutnenfermedad=0;
 var arregloenfermedades=[];
    function clickradiobuttonsi(){
        if(arregloenfermedades.length==0){///comparar si el arreglo esta vacio
            var buttonmas = document.createElement('button');
            buttonmas.onclick =addenfermedad;
            buttonmas.id ='buttonmas';
            buttonmas.className="btn-sm btn-info fa fa-plus-circle fa-lg";
            document.getElementById("enfermedad").append(buttonmas);
            addenfermedad();
        }
    }
    function addenfermedad(){                    
        var div = document.createElement("div"); //aqui se guarda el typetext y los botones '+'y'-'
        div.id='div'+coutnenfermedad;            
        div.className='input-group  col-sm-6';             
        var buttonmenos= document.createElement('button');
        buttonmenos.addEventListener('click',quitarEnfermedad);
        buttonmenos.className="btn-info btn-sm fa fa-minus-circle fa-lg ";
        var id="buttonmenos"+coutnenfermedad;
        buttonmenos.id=id;   
        var input = document.createElement("input");
        input.type = "text"; 
        input.className="col-sm-6 input-text";
        input.name='enfermedad'.coutnenfermedad;
        input.placeholder="Ingrese enfermedad...";
        input.id="input"+coutnenfermedad;
        div.append(input);   
        div.append(buttonmenos); 
        document.getElementById("divenfermedad").append(div);
        document.getElementById("input"+coutnenfermedad).focus();  
        arregloenfermedades.push(div);
        coutnenfermedad++;
        
        return false;         
    }
    function ocultarenfermedades(){
       while(arregloenfermedades.length>0){
          arregloenfermedades.pop().outerHTML='';
        }
        document.getElementById('buttonmas').outerHTML='';
        coutnenfermedad=0;

    }
    function quitarEnfermedad(evento){
        try{
        var regex=/\d+/g;
        var id=regex.exec(evento.target.id);
        document.getElementById("div"+id).outerHTML ='';
        var i= arregloenfermedades.indexOf("div"+id);
        arregloenfermedades.splice(i);
        if(arregloenfermedades.length==0){
            document.getElementById('buttonmas').outerHTML='';
            document.getElementById('noenfermedad').click();
        
      }return false;
        }catch(error){
            alert(error);
        }
    }
    /////////////////////////////////////////////////////////////
    
var contadorDiscapacidad=0;
var arreglodiscapacidad=[];
function sidiscapacidad(){
    if(arreglodiscapacidad.length==0){///comparar si el arreglo esta vacio
        var masdiscapacidad = document.createElement('button');
        masdiscapacidad.onclick =adddiscapacidad;
        masdiscapacidad.id ='masdiscapacidad';
        masdiscapacidad.className="btn-sm btn-info fa fa-plus-circle fa-lg";
        document.getElementById("discapacidad").append(masdiscapacidad);
        adddiscapacidad();
    }
}
function adddiscapacidad(){   
    var div = document.createElement("div");//aqui se guarda el typetext y los botones '+'y'-'
    div.id='divdiscapacidad'+contadorDiscapacidad;
    div.className='input-group-sm  col-sm-6 ';
    var menosdiscapacidad= document.createElement('button');
    menosdiscapacidad.addEventListener('click',quitarDiscapacidad);
    menosdiscapacidad.className="btn-info fa fa-minus-circle fa-lg btn-sm";
    var id="menosdiscapacidad"+contadorDiscapacidad;
    menosdiscapacidad.id=id;   
    var input = document.createElement("input");
    input.type = "text"; 
    input.className=" col-sm-6  input-text";
    input.name='discapacidad'+contadorDiscapacidad;
    input.placeholder="Ingrese discapacidad...";
    input.id="inputdiscapacidad"+contadorDiscapacidad;
    div.append(input);   
    div.append(menosdiscapacidad); 
    document.getElementById("divdiscapacidad").append(div);
    document.getElementById("inputdiscapacidad"+contadorDiscapacidad).focus();
    arreglodiscapacidad.push(div);
    contadorDiscapacidad++;            
    return false;         
}
function ocultardiscapacidades(){
   while(arreglodiscapacidad.length>0){
      arreglodiscapacidad.pop().outerHTML='';
    }
    document.getElementById('masdiscapacidad').outerHTML='';
 contadorDiscapacidad=0;
}
function quitarDiscapacidad(evento){
    try{             
    var regex=/\d+/g;
    var id=regex.exec(evento.target.id);             
    document.getElementById("divdiscapacidad"+id).outerHTML ='';
    var i= arreglodiscapacidad.indexOf("divdiscapacidad"+id);
    arreglodiscapacidad.splice(i);
    if(arreglodiscapacidad.length==0){
        document.getElementById('masdiscapacidad').outerHTML='';
        document.getElementById('nodiscapacidad').click();
        
      }return false;
    }catch(error){
        alert(error);
    }
}
/////////////////////////////////////////////////////////////////////
$(document).ready(function(){
  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  $(".next").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
  });
  $(".previous").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().prev();
    next_step.show();
    current_step.hide();
  });
});
////////////////////////////////////////////////////////////////////////////////////////////////
var prueba=0;
function sipruebacovid(){
  console.log(prueba);
  if(prueba==0){
    var input = document.createElement("input");
    //inputext.id="prueva";
    input.type = "text";
    input.id="fechaprueba"; 
    input.className="form-control input-group input-text";
    input.placeholder="hace que tiempo se la realizo...";
    input.required=true;
    document.getElementById('prueba_covid').append(input);
    document.getElementById("fechaprueba").focus();
    prueba=1;
  }  
}
function ocultarprueba(){
  console.log(prueba);
  if(prueba==1){
    document.getElementById('fechaprueba').outerHTML="";
    prueba=0; 
  }
}
//////////////////////////////////////////////////////////////////////////////////////////////
var sintomas=[];
var contadorsintomas=0;
function sisintomas(){
  if(sintomas.length==0){
    var boton=document.createElement('button');
    boton.onclick=addsintoma;
    boton.id='massintoma';
    boton.className="btn-sm btn-info fa fa-plus-circle fa-lg";
    document.getElementById("sintomas").append(boton);
     addsintoma();
  }
}
function addsintoma(){
  var div=document.createElement("div");
  var botonmenos=document.createElement('button');
  var input=document.createElement("input");
  botonmenos.addEventListener('click',quitarsintoma);
  div.id="divsintomas"+contadorsintomas;
  input.id="inputsintomas"+contadorsintomas;
  botonmenos.id="botonsintoma"+contadorsintomas;
  botonmenos.className="btn-info btn-sm fa fa-minus-circle fa-lg ";
  div.className="input-group col-sm-6";
  input.className="col-sm-6 input-text";
  input.name="sintomas"+contadorsintomas;
  input.placeholder="Ingrese sintomas...";
  div.append(input);
  div.append(botonmenos);

  document.getElementById('divsintomas').append(div);
  document.getElementById("inputsintomas"+contadorsintomas).focus();
  sintomas.push(div);
  contadorsintomas++;
  return false;
}
function quitarsintoma(evento){
  try{
    var regex=/\d+/g;
    var id=regex.exec(evento.target.id);
    var i=sintomas.indexOf("divsintomas"+id);             
    document.getElementById("divsintomas"+id).outerHTML ='';
    sintomas.splice(i);
    if(sintomas.length==0){
      document.getElementById('massintoma').outerHTML='';
      document.getElementById('nosintomas').click();  
    }
    return false;
  }catch(error){
    alert(error);
  }
}
function nosintomasfuncion(){
  while(sintomas.length>0){
          sintomas.pop().outerHTML='';
  }
  document.getElementById('massintoma').outerHTML='';
  contadorsintomas=0;
}
////////////prueba antidoping/////////////////
var pruebaantidoping=0;
function sipruebaantidoping(){
  console.log(prueba);
  if(pruebaantidoping==0){
    var input = document.createElement("input");
    //inputext.id="prueva";
    input.type = "text";
    input.id="fechapruebaantidoping";
    input.name="fechapruebaantidoping"; 
    input.className="form-control input-group input-text";
    input.placeholder="hace que tiempo lo realizo...";
    input.required=true;
    document.getElementById('pruebaantidoping').append(input);
    document.getElementById("fechapruebaantidoping").focus();
    pruebaantidoping=1;
  }  
}
function ocultarpruebaantidoping(){
  if(pruebaantidoping==1){
    document.getElementById('fechaprueba').outerHTML="";
    pruebaantidoping=0; 
  }
}
</script>
</div>

@endsection
