// Construir el algoritmo para un programa que ingrese tres
// notas de un alumno, si el promedio es menor o igual a 3.9
// mostrar un mensaje "Estudie“, de lo contrario un mensaje que
// diga "becado"

let exercise1 = document.querySelector("#exercise1");
let myHeaders = new Headers({"Content-Type": "application/json"});
let config = {
    headers: myHeaders, 
};
exercise1.addEventListener("submit", async(e)=>{
    e.preventDefault();
    config.method = "POST";
    let data = Object.fromEntries(new FormData(e.target));
    config.body = JSON.stringify(data);
    console.log(data);
    let res = await (await fetch("model/Exercise1.php", config)).text();
    document.querySelector("#answer1").innerHTML = res;
});

// Dado un número indicar si es par o impar y si es mayor de 10.

let exercise2 = document.querySelector("#exercise2");

exercise2.addEventListener("submit", async(e)=>{
    e.preventDefault();
    config.method = "POST";
    let data = Object.fromEntries(new FormData(e.target));
    config.body = JSON.stringify(data);
    console.log(data);
    try {
        let res = await (await fetch("model/Exercise2.php", config)).text();
        document.querySelector("#answer2").innerHTML = res;
    } catch (error) {
        console.log("Este es el error: "+error);
    }

});

// Construir el algoritmo para determinar el voltaje de un circuito a partir de la resistencia y la intensidad de corriente.

let exercise3 = document.querySelector("#exercise3");

exercise3.addEventListener("submit", async(e)=>{
    e.preventDefault();
    config.method = "POST";
    let data = Object.fromEntries(new FormData(e.target));
    config.body = JSON.stringify(data);
    console.log(data);
    try {
        let res = await (await fetch("model/Exercise3.php", config)).text();
        document.querySelector("#answer3").innerHTML = res;
    } catch (error) {
        console.log("Este es el error: "+error);
    }

});

// Construir el algoritmo que solicite el nombre y edad de 3 personas y determine el nombre de la persona con mayor edad.
let exercise4 = document.querySelector("#exercise4");
let contadorPersonas = 0;

exercise4.addEventListener("submit", async (e) => {
  e.preventDefault();
  config.method = "POST";
  let data = Object.fromEntries(new FormData(e.target));
  config.body = JSON.stringify(data);
  console.log(data);
  try {
    let res = await (await fetch("model/Exercise4.php", config)).text();
    document.querySelector("#answer4").innerHTML = res;
    contadorPersonas++;

    if (contadorPersonas === 3) {
        //Desahibilitamos el botón de enviar
      document.querySelector("#btnEnviar").disabled = true;
    } else {
      e.target.reset();
    }
  } catch (error) {
    console.log("Este es el error: " + error);
  }
});

/* 5. Construir el algoritmo que lea por teclado dos números,
si el primero es mayor al segundo informar su suma y
diferencia, en caso contrario, informar el producto y la
división del primero respecto al segundo. */

let exercise5 = document.querySelector("#exercise5");

exercise5.addEventListener("submit", async (e) => {
  e.preventDefault();
  config.method = "POST";
  let data = Object.fromEntries(new FormData(e.target));
  config.body = JSON.stringify(data);
  console.log(data);
  try {
    let res = await (await fetch("model/Exercise5.php", config)).text();
    document.querySelector("#answer5").innerHTML = res;
  } catch (error) {
    console.log("Este es el error: " + error);
  }
});
