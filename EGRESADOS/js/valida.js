function validarnumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validarletras(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[a-zA-Z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function imprimir(){
        
      var objeto = document.getElementById('sit');  //obtenemos el objeto a imprimir
      var ventana = window.open('','_blank');  //abrimos una ventana vacía nueva
      ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
      ventana.document.getElementById('nota').innerHTML = 'INFORMACIÓN EN TRÁMITE DE VALIDACIÓN ACADÉMICA. NO OFICIAL.';
      ventana.document.close();  //cerramos el documento
      ventana.print();  //imprimimos la ventana
      ventana.close();  //cerramos la ventana
        
}
function pagina(c) {
    document.location.href = "perfil.php?pagina="+c;
}

function salir() {
    if (confirm("¿Desea Salir?")) {
          window.location="salir.php";
    }
}

function msj1(){
  alert("Alumno con deuda pendiente no puede acceder a esta seccion");
  window.location="perfil.php?pagina=2";
}

function msj2(){
  alert("Informacion no disponible");
  window.location="perfil.php";
}