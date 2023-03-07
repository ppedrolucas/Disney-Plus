function calcularIMC(){
/*VERIFICAR O ID DO FORMULARIO DE IMC*/

var formulario = document.getElementById("formulario");
/*DETECTAR VARIAVEIS DE CAPTURA DE DADOS DO FORMULARIO*/
var kg = formulario.kg.value;
var alt = formulario.alt.value;
var imc = kg/(alt*alt);

formulario.imc.value = imc.toFixed(2);

if(imc<=18.5){
    alert("Meus parabéns, você é magro :)")
}else if((imc>18.5)&&(imc<=29.9)){
    alert("Meus parabéns, você está saudável :P");
}else{
    alert("Seu rolha poço do carai")
}
}