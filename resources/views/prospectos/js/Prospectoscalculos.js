$("#OPCIONES").change(function(){
    var ban=$("#OPCIONES").val();
    var suledo_mensual=$("#sueldomensual").val();
    if(ban==="0"){
       document.querySelector("#quincenal").style.display="block";
       document.querySelector("#semanal").style.display="none";
    }else if(ban==="1"){
        document.querySelector("#quincenal").style.display="none";
       document.querySelector("#semanal").style.display="block";
    }
    
 });
 
 $("#cbx_licencia").change(function(){
     var sino=$("#cbx_licencia").val();
     if(sino === "SI"){
         document.querySelector("#licenci").style.display="block";    
     }else if(sino === "NO"){
         document.querySelector("#licenci").style.display="none";
     }else if(sino === "0"){
         document.querySelector("#licenci").style.display="none";
     }
     
 });
 
 $( "#sueldomensual" ).keyup(function() {
     var opcion=$("#OPCIONES").val();
     
     if(opcion === "0"){
      console.log(opcion);
         calcular();
         calcular1();
     }else if(opcion === "1"){
         calcular1();
         calcular();
     }
 });
 
 function calcular(){
     var suledo_mensual=$("#sueldomensual").val();
     var sueldoQuinsenal=0;
     var sueldoDiario=0;
     if(suledo_mensual !== 0){
         sueldoQuinsenal=suledo_mensual/2;
         sueldoQuinsenal=round(sueldoQuinsenal);
     }
     
     if(sueldoQuinsenal !== 0){
         sueldoDiario=sueldoQuinsenal/15;
         sueldoDiario=round(sueldoDiario);
     }
     $("#sueldodiario").val(sueldoDiario);
     $("#sueldoquincenal").val(sueldoQuinsenal);
 }
 
 
 function calcular1(){
     var suledo_mensual=$("#sueldomensual").val();
     var sueldosemanal=0;
     var sueldoDiario=0;
     if(suledo_mensual !== 0){
         sueldoDiario=suledo_mensual/30;
         
         sueldoDiario =round(sueldoDiario);
         
         sueldosemanal=((suledo_mensual/30)*7);
         
         sueldosemanal=round(sueldosemanal);
         
     }
     $("#sueldodiario").val(sueldoDiario);
     $("#sueldoSemanal").val(sueldosemanal);
     
 }
 
 
 
 /**funcion de redondear**/
 function round(num, decimales = 2) {
     var signo = (num >= 0 ? 1 : -1);
     num = num * signo;
     if (decimales === 0) //con 0 decimales
         return signo * Math.round(num);
     // round(x * 10 ^ decimales)
     num = num.toString().split('e');
     num = Math.round(+(num[0] + 'e' + (num[1] ? (+num[1] + decimales) : decimales)));
     // x * 10 ^ (-decimales)
     num = num.toString().split('e');
     return signo * (num[0] + 'e' + (num[1] ? (+num[1] - decimales) : -decimales));
 }
 
 
 /*envio por ajax*/
  $("#form_envio").submit(function(event){
      event.preventDefault();
      var Archivos = new FormData(document.querySelector("#form_envio"));
      var urlS=$("#form_envio").attr("action");
     
      $.ajax({
                  type:'ajax',
                  method:'post',
                  url:urlS,
                  data:Archivos,
                  dataType:"JSON",
                  cache:false,
                  contentType:false,
                  processData:false,
                  success:function(item){
                      if(item === 1){
                          console.log("hola");
                          limpiar();
                         $('.alert-primary').html("Se ha registrado correctamente").fadeIn().delay(10000).fadeOut('snow');
                         //console.log(Archivos);
                      }else /*if(item === 0)*/{
                          $('.alert-danger').html("Erro al registrar el usuario comunicate con el administrador").fadeIn().delay(10000).fadeOut('snow');
                      }/*else {
                         $('.alert-warning').html("Número excedido de registros, comunicate con el administrador").fadeIn().delay(10000).fadeOut('snow');
                      }*/
                  },
                  error:function(error){
                          console.log("Erro de comunicasion ");
                          //clearInterval(progerso);        
               },
                  timeout:10000
                 
              });//fin del ajax
  });
 
 
 function limpiar(){
     $("#direccion").val("");
     $("#sueldomensual").val("");
     $("#sueldoquincenal").val("");
     $("#sueldoSemanal").val("");
     $("#sueldodiario").val("");
     $("#fechaContratacion").val("");
     $("#Numtarjeta").val("");
     $("#Nombanco").val("");
     $("#expedicion").val("");
     $("#lugar").val("");
 }