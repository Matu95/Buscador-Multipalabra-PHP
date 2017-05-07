<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>

			<?php
              $conexion=mysqli_connect("localhost","root","","ejemplo");
              //asigno un variable para insertar info. a la base de datos
              $query="SELECT `cod`,`nombre`,`deuda`,`sexo` FROM `personas` WHERE 1";
              $resultado=mysqli_query($conexion,$query);
              $fila=mysqli_fetch_row($resultado); $resultado;//codigo lee los datos fila por fila
              //creo una tabla para mostrar la tabla
              ?>
              <br>
              <br>
  <div align="center">
  <h1>Realice su Busqueda.!</h1>
		<form action="proceso.php" method="GET">
			<input type="text" name="dato">
			<button type="submit">enviar</button>
		</form>

		<table class="table table-hover rwd_auto" ><br>
                <thead>
                 <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>deuda</th>
                    <th>sexo</th>
                  </tr>
              </thead>



              <?php
              //sive para mostrar todas los datos de la tabla
              echo "<tr>";
              while ($fila) {
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
              ?>

</div>
	</body>
</html>