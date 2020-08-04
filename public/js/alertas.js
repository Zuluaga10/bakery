function alertaRegistro(){
swal({
  //position: 'top-right',
  type: 'success',
  title: 'Registro exitoso',
  showConfirmButton: false,
  timer: 1500
});

}

function alertaModificacion(){
swal({
  //position: 'top-right',
  type: 'success',
  title: 'Servicio modificado',
  showConfirmButton: false,
  timer: 1500
});

}

function alertaLogin(){

  var correo=$("#correo").val();
  var pass=$("#pass").val();

  if (correo == "admin@gmail.com" && pass =="admin123") {
    console.log("Sesion iniciada");
  }else{
    alert("Usuario o Contraseña Incorrecta");
  }

}


function alertaRegistroCliente(){

  var tipo= $("#TDocumentoCliente").val();
  var codigo= $("#cedulaCliente").val();
  var nombre= $("#nombreCliente").val();
  var contacto= $("#contactoCliente").val();
  var direccion= $("#direccionCliente").val();
  

if (tipo.length==0 || codigo.length==0 || nombre.length==0 || contacto.length==0 || direccion.length==0) 
{

}else{
swal({
  //position: 'top-center',
  type: 'success',
  title: 'Cliente registrado.',
  showConfirmButton: false,
  timer: 1500
});
}
}

function alertaRegistroEmpleado(){

  var codigo= $("#TDocuemtoEmpleado").val();
  var cedula= $("#cedulaEmpleado").val();
  var nombre= $("#nombreEmpleado").val();
  var persona= $("#TPersonaEmpleado").val();
  var contacto= $("#contactoEmpleado").val();
  var direccion= $("#direccionEmpelado").val();
  
if (codigo.length==0 || cedula.length==0 || nombre.length==0 || persona.length==0 || contacto.length==0 || direccion.length==0)
 {

 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Empleado registrado.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaRegistroTipoVehiculo(){

  var codigo= $("#codigoTVehiculo").val();
  var nombre= $("#nombreTVehiculo").val();
if (codigo.length==0 || nombre.length==0)
 {

 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Tipo de vehículo registrado.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaRegistroServicio(){

  var codigo= $("#codigoServicio").val();
  var nombre= $("#nombreServicio").val();
  
  
if (codigo.length==0 || nombre.length==0 )
 {

 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Registro exitoso.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaRegistroProducto(){

  var codigo= $("#codigoProducto").val();
  var nombre= $("#nombreProducto").val();
  var precio= $("#precioProducto").val();
  var medida= $("#medidaProdcto").val();
  
if (codigo.length==0 || nombre.length==0 || precio.length==0 || medida.length==0 )
 {

 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Producto registrado.',
  showConfirmButton: false,
  timer: 1500

})
}

}
function alertaRegistroCliente(){

  var cedula= $("#cedula").val();
  var nombre= $("#nombre").val();
  var apellidos= $("#apellidos").val();
  var edad= $("#edad").val();
  var sexo= $("#sexo").val();
  var direccion= $("#direccion").val();
  var telefono= $("#telefono").val();
  var correo= $("#correo").val();
  var fechaini= $("#fechaini").val();
  var fechafin= $("#fechafin").val();

  
if (cedula.length==0 || nombre.length==0 || apellidos.length==0 || edad.length==0 ||
 sexo.length==0 || direccion.length==0 || telefono.length==0 || correo.length==0 ||
 fechaini.length==0 || fechafin.length==0)
 {

 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Cliente Registrado.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaRegistroUnidadMedida(){

  var codigo= $("#codigoUMedida").val();
  var nombre= $("#nombreUMedida").val();
  var abreviatura= $("#abreviaturaUMedida").val();
  
if (codigo.length==0 || nombre.length==0 || abreviatura.length==0 )
 {

 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Unidad de medida registrada.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaModificarVehiculo(){

  var codigo= $("#codigo").val();
  var nombre= $("#nombre").val();
  var descri= $("#textArea").val();
  
if (codigo.length==0 || nombre.length==0 || descri.length==0)
 {
  
 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Tipo de vehículo Modificado.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaModificarUnidadMedida(){

  var codigo= $("#codigoUMedida").val();
  var nombreUnidad= $("#nombreUMedida").val();
  var abreviatura= $("#abreviaturaUMedida").val();
  
if (codigo.length==0 || nombreUnidad.length==0 || abreviatura.length==0)
 {
  
 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Unidad de medida Modificada.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaModificarCliente(){

  var tDocumento= $("#tipoDocumento").val();
  var documento= $("#documento").val();
  var nombre= $("#nombre").val();
  var contacto= $("#contacto").val();
  var direccion= $("#direccion").val();
  
if (tDocumento.length==0 || documento.length==0 || nombre.length==0 || contacto.length==0 || direccion.length==0 )
 {

 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Cliente Modificado.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaModificarEmpleado(){

  var tDocumento= $("#TDocuemtoEmpleado").val();
  var documento= $("#cedulaEmpleado").val();
  var nombre= $("#nombre").val();
  var tPersonaE= $("#TPersonaEmpleado").val();
  var contacto= $("#nContacto").val();
  var direccion= $("#direccion").val();
  
if (tDocumento.length==0 || documento.length==0 || nombre.length==0 || tPersonaE.length==0 || contacto.length==0 || direccion.length==0)
 {
  
 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Empleado Modificado.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaModificarProducto(){

  var codigo= $("#codigoProducto").val();
  var nombre= $("#nombre").val();
  var pUnitario= $("#pUnitario").val();
  var cantidad= $("#cantidad").val();
  var medida= $("#medidaProdcto").val();
  
if (codigo.length==0 || nombre.length==0 || pUnitario.length==0 || cantidad.length==0 || medida.length==0 )
 {

 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Producto Modificado.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function alertaModificacion(){
swal({
  //position: 'top-right',
  type: 'success',
  title: 'Modificación exitosa',
  showConfirmButton: false,
  timer: 1500
});

}

function alertaModificarServicio(){

  var nombre= $("#nombre").val();
  var desc= $("#textArea").val();
  
if (nombre.length==0 || desc.length==0)
 {
  
 }else{
  swal({
 // position: 'top-right',
  type: 'success',
  title: 'Servicio Modificado.',
  showConfirmButton: false,
  timer: 1500

})
}
}

function DuplicarFechas()
{
  $(document).ready(function () {
        $("#input1").keyup(function () {
            var value = $(this).val();
            $("#input2").val(value);
        });
});

  $(document).ready(function () {
        $("#input3").keyup(function () {
            var value = $(this).val();
            $("#input4").val(value);
        });
});
}