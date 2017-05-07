<?php 
$conexion=mysqli_connect("localhost","root","","ejemplo");
$dato=$_GET["dato"];

//trim me va a borrar los espacios vacios al principio y al final de la oracion esto lo hago para depurar la cadena xq luego la usare para separar la cadena y guardarla en variables, no le des mucha bola esto en laravel habria que hacerlo para evitar errores de busqueda pero despues vemos ;)
$cadena_formateada = trim($dato);
echo "<div align='center'>";
echo "La cadena original es esta: '".$dato."' y la formateada es esta otra: '".$cadena_formateada."'";
echo "<br>";//LA VIEJA CONFIABLE xD!!
echo "<br>";

//explode nos permite separar una cadena de caracteres dependiendo de unpunto de contro que nos va a permitir separar la cadena en este caso puse que cuando el caracter este vacio
//explode funciona cantidad de caracteres infinitos yo aca solo use para 4
//estoy seguro que en laravel esta funcion anda!! pero no lo he probado
$datodes = explode(" ", $dato);

//le tengo que asignar algun valor xq si no existe agunas de estas variables me va a tirar error asi que les deje un valor nulo
$caracter0="";
$caracter1="";
$caracter2="";
$caracter3="";

//aca comprueba que exixtan los valores extraidos del explode,explode autoamticamente crea diferentes variables para la cantidad de caracteres que que separe, yo aca compruebo de que no este vacia si esta vacia saldra un mensaje sino el valor de la variable se cargara en otra variable para poder hacer la busqueda
if (empty($datodes[0])) {
	echo "no se se definico nada en la primera variable";
	echo "<br>";
}
else{
$caracter0=$datodes[0];
}

if (empty($datodes[1])) {
	echo "no se se definico nada en la segunda variable";
	echo "<br>";
}
else{
$caracter1=$datodes[1];
}

if (empty($datodes[2])) {
	echo "no se se definico nada en la tercera variable";
	echo "<br>";
}
else{
$caracter2=$datodes[2];
}

if (empty($datodes[3])) {
	echo "no se se definico nada en la cuarta variable";
	echo "<br>";
}
else{
 $caracter3=$datodes[3];;
}

echo "<br>";
  

 //aca se encuentran las condiciones, decimos si la variable caracter3 esta vacia compruebo con la caracter2 luego con el caracter 1 y asi sustantivamente jaja
 //esta condicional pasa a "else" cuando la variable tenga algun valor y segun la cantidad de variables va a realizar busquedas de tipos diferentes 
 if (empty($caracter3)) {
 	if (empty($caracter2)) {
 		if (empty($caracter1)) {
 			if (empty($caracter0)) {
 				echo "no se ingreso ningun valor";
 }
 else{
 	$query="SELECT * FROM personas WHERE cod LIKE '%".$caracter0."%' OR nombre LIKE '%".$caracter0."%' OR deuda LIKE '%".$caracter0."%' OR sexo LIKE '%".$caracter0."%'";
 	echo("LEO SOLO UNA CADENA");
 }
 }
 else{
 	$query="SELECT * FROM personas WHERE cod LIKE '%".$caracter0."%' OR nombre LIKE '%".$caracter0."%' OR deuda LIKE '%".$caracter0."%' OR sexo LIKE '%".$caracter0."%' AND cod LIKE '%".$caracter1."%' OR nombre LIKE '%".$caracter1."%' OR deuda LIKE '%".$caracter1."%' OR sexo LIKE '%".$caracter1."%' ";
 	echo "LEO DOS CADENAS";
 }
 }
 else{
 	$query="SELECT * FROM personas WHERE cod LIKE '%".$caracter0."%' OR nombre LIKE '%".$caracter0."%' OR deuda LIKE '%".$caracter0."%' OR sexo LIKE '%".$caracter0."%' AND cod LIKE '%".$caracter1."%' OR nombre LIKE '%".$caracter1."%' OR deuda LIKE '%".$caracter1."%' OR sexo LIKE '%".$caracter1."%' AND cod LIKE '%".$caracter2."%' OR nombre LIKE '%".$caracter2."%' OR deuda LIKE '%".$caracter2."%' OR sexo LIKE '%".$caracter3."%'";
 	echo "LEO TRES CADENAS";
 }
 }
 else{
 	$query="SELECT * FROM personas WHERE cod LIKE '%".$caracter0."%' OR nombre LIKE '%".$caracter0."%' OR deuda LIKE '%".$caracter0."%' OR sexo LIKE '%".$caracter0."%' AND cod LIKE '%".$caracter1."%' OR nombre LIKE '%".$caracter1."%' OR deuda LIKE '%".$caracter1."%' OR sexo LIKE '%".$caracter1."%' AND cod LIKE '%".$caracter2."%' OR nombre LIKE '%".$caracter2."%' OR deuda LIKE '%".$caracter2."%' OR sexo LIKE '%".$caracter2."%' AND cod LIKE '%".$caracter3."%' OR nombre LIKE '%".$caracter3."%' OR deuda LIKE '%".$caracter3."%' OR sexo LIKE '%".$caracter3."%'";
 	echo "LEO CUATRO CADENAS";
 }


$resultado=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resultado); $resultado;
 ?>
 <div class="container">
<div class="col-sm-12" style=" height : 400px; overflow : auto;">

<br><h2>Resultado de su busqueda: <?php echo $dato; ?></h2>
             <table class="table table-hover" >
                <thead>
                 <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>deuda</th>
                    <th>sexo</th>
                  </tr>
              </thead>


              <?php
             
              echo "<tr>";
              while ($fila) {
              //str_replace reemplaza el caracter y lo pone en negrita para saber las palabras claves que se buscan y donde estan puse muchas para todas las posibles posibilidades y si, ya probe con un or y no funca!
              $fila[0]=str_replace ( $caracter0, '<b>'.$caracter0.'</b>', $fila[0]); 
              $fila[0]=str_replace ( $caracter1, '<b>'.$caracter1.'</b>', $fila[0]); 
              $fila[0]=str_replace ( $caracter2, '<b>'.$caracter2.'</b>', $fila[0]); 
              $fila[0]=str_replace ( $caracter3, '<b>'.$caracter3.'</b>', $fila[0]); 

              $fila[1]=str_replace ( $caracter0, '<b>'.$caracter0.'</b>', $fila[1]); 
              $fila[1]=str_replace ( $caracter1, '<b>'.$caracter1.'</b>', $fila[1]); 
              $fila[1]=str_replace ( $caracter2, '<b>'.$caracter2.'</b>', $fila[1]); 
              $fila[1]=str_replace ( $caracter3, '<b>'.$caracter3.'</b>', $fila[1]);

              $fila[2]=str_replace ( $caracter0, '<b>'.$caracter0.'</b>', $fila[2]); 
              $fila[2]=str_replace ( $caracter1, '<b>'.$caracter1.'</b>', $fila[2]); 
              $fila[2]=str_replace ( $caracter2, '<b>'.$caracter2.'</b>', $fila[2]); 
              $fila[2]=str_replace ( $caracter3, '<b>'.$caracter3.'</b>', $fila[2]);

              $fila[3]=str_replace ( $caracter0, '<b>'.$caracter0.'</b>', $fila[3]); 
              $fila[3]=str_replace ( $caracter1, '<b>'.$caracter1.'</b>', $fila[3]); 
              $fila[3]=str_replace ( $caracter2, '<b>'.$caracter2.'</b>', $fila[3]); 
              $fila[3]=str_replace ( $caracter3, '<b>'.$caracter3.'</b>', $fila[3]);

              echo "<td>".$fila[0]."</td>";
              echo "<td>".$fila[1]."</td>";
              echo "<td>".$fila[2]."</td>";
              echo "<td>".$fila[3]."</td>";
              echo "</tr>";
              $fila=mysqli_fetch_row($resultado);
              }

              echo "</table>";
              echo "</div>";
              mysqli_close($conexion);
              //eso es todo guashin!!
              ?>
              <button><a href="index.php">Volver</a></button>
</div>
</div>

<?php 
echo "</div>";
 ?>
