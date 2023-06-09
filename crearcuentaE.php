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
                <img src="https://cdn-icons-png.flaticon.com/512/4832/4832900.png" />
              </div>
              <form class="login-form" method="POST" action="procesar_registroE.php">
                <input type="text" name="nit" placeholder="NIT" required />
                <input type="text" name="razon_social" placeholder="Razón Social" required />
                <input type="text" name="representante" placeholder="Representante" required />
                <input type="number" name="telefono" placeholder="Teléfono" required />
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
                <select name="sede" id="sede" class="custom-select" required>
                  <option value="">Selecciona una Sede</option>
                  <option value="1">Bogotá</option>
                  <option value="2">Medellín</option>
                  <option value="3">Cali</option>
                  <option value="4">Barranquilla</option>
                  <option value="5">Cartagena</option>
                  <option value="6">Pereira</option>
                  <option value="7">Manizales</option>
                  <option value="8">Santa Marta</option>
                  <option value="9">Cúcuta</option>
                  <option value="10">Villavicencio</option>
                  <option value="11">Armenia</option>
                  <option value="12">Pasto</option>
                  <option value="13">Ibagué</option>
                  <option value="14">Neiva</option>
                  <option value="15">Tunja</option>
                  <option value="16">Bucaramanga</option>
                  <option value="17">Valledupar</option>
                  <option value="18">Popayán</option>
                  <option value="19">Quibdó</option>
                  <option value="20">Riohacha</option>
                </select>
                <input type="text" name="usuario" placeholder="Usuario" required />
                <input type="password" name="contrasena" placeholder="Contraseña" required />
                <input type="email" name="email" placeholder="Email" required />
                <button type="submit" class="button1">Crear</button>
                <p class="message">Registrado? <a href="index.php">Inicia Sesión</a></p>
              </form>
            </div>
          </div>
    </body>
</html>
