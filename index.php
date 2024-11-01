<?php
session_start();

// Inicializa la variable de sesión si no existe
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = null;
}

// Manejo de formularios
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $_SESSION['usuario'] = ['nombre' => $nombre, 'sexo' => $sexo];
}

// Función para mostrar el resultado
function mostrarResultado($usuario) {
    if ($usuario) {
        return "Nombre: " . htmlspecialchars($usuario['nombre']) . "<br>Sexo: " . ($usuario['sexo'] == 'masculino' ? 'Hombre' : 'Mujer');
    }
    return '';
}
?>

<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <main class="presentacion__contenido"> 

        <div class="seccion__titulo__logo">
            
            <div class="presentacion__logo">
                <img class="Logo" src="./assets/Logo.png" alt="Logotipo">
            </div>

            <h1 class="presentacion__titulo">FORMULARIO DE USUARIO</h1>

            <h2 class="presentacion_subtitulo">
            Ingresa tu nombre y sexo
            </h2>
        </div>

        <div class="container">
            <form method="POST">
                <label>Ingresa tu nombre:</label>
                <input type="text" name="nombre" placeholder="Nombre" required>
                
                <label>Selecciona tu sexo:</label>
                <select name="sexo" required>
                    <option value="" disabled selected>Selecciona...</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
                
                <button type="submit">ENVIAR</button>
            </form>

            <div class="resultados">
                <h2>RESULTADO</h2>
                <p><?php echo mostrarResultado($_SESSION['usuario']); ?></p>
            </div>
        </div>

        <footer class="footer">
            <p>Desarrollado por Brenda Paola Navarro Alatorre</p>
        </footer>
    </main>
</body>
</html>
