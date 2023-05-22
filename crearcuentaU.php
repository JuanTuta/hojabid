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
              <h1>Usuario</h1>
            </div>
            <div class="form">
              <div class="thumbnail">
                <img src="https://cdn-icons-png.flaticon.com/512/4832/4832900.png" />
              </div>
              <form class="login-form">
              <input type="text" placeholder="Nombre" />
                <input type="text" placeholder="Direccion" />
                <input type="number" placeholder="Numero" />
                <select name="ubicacion" class="custom-select">
                <option value="">Selecciona una Ubicacion</option>
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
                <input type="number" placeholder="Salario" />
                <input type="file" placeholder="HV" />
                <input type="text" placeholder="link Video" />
                <input type="password" placeholder="Contraseña" />
                <input type="text" placeholder="Email" />
                <button class="button1">Crear</button>
                <p class="message">Registrado? <a href="#">Inicia Sesion</a></p>
              </form>
            </div>
            <video id="video" autoplay loop poster="polina.jpg">
              <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4" />
            </video>
          </div>
    </body>
    
</html>