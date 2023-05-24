<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Proyecto</title>
        <link rel="stylesheet" href="css/log_in.css">
    </head>
    <body>
        <div id="container">
            <div class="info">
              <h1>Empresa</h1>
            </div>
            <div class="form">
              <div class="thumbnail">
                <img src="imgs/vacante.png" />
              </div>
              <form class="login-form" method="POST" action="creavaca.php">
                <input type="date" name="fini" placeholder="Fecha de inicio" required />
                <input type="date" name="fin" placeholder="Fecha de fin" required />
                <input type="text" name="cargo" placeholder="Cargo" required />
                <input type="text" name="salario" placeholder="Salario" required />
                <input type="text" name="pregrado" placeholder="Pregrado Sí o No" required />
                <input type="text" name="descrip" placeholder="Descripción" required />
                <input type="text" name="reangoe" placeholder="Rango Edad" required />
                <select name="ubicacion" class="custom-select" required>
                  <option value="">Selecciona una Ubicación</option>
                  <option value="1">BOGOTA, COLOMBIA</option>
                  <option value="2">MEDELLIN, COLOMBIA</option>
                  <option value="3">CALI, COLOMBIA</option>
                  <option value="4">BARRANQUILLA, COLOMBIA</option>
                  <option value="5">CARACAS, VENEZUELA</option>
                  <option value="6">BUENOS AIRES, ARGENTINA</option>
                  <option value="7">SANTIAGO, CHILE</option>
                  <option value="8">QUITO, ECUADOR</option>
                  <option value="9">LIMA, PERU</option>
                  <option value="10">LA PAZ, BOLIVIA</option>
                  <option value="11">ASUNCION, PARAGUAY</option>
                  <option value="12">MONTEVIDEO, URUGUAY</option>
                  <option value="13">MEXICO DF, MEXICO</option>
                  <option value="14">SAN JOSE, COSTA RICA</option>
                  <option value="15">SANTO DOMINGO, REP. DOMINICANA</option>
                  <option value="16">PANAMA, PANAMA</option>
                  <option value="17">GUATEMALA, GUATEMALA</option>
                  <option value="18">SAN SALVADOR, EL SALVADOR</option>
                  <option value="19">TEGUCIGALPA, HONDURAS</option>
                  <option value="20">MANAGUA, NICARAGUA</option>
                </select>
                <button type="submit" class="button1">Crear Vacante</button>
                <p class="message">Error? <a href="index.php">Devuelvase</a></p>
              </form>
            </div>
          </div>
    </body>
</html>