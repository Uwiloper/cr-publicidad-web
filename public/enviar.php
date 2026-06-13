<?php
// 1. Importar variables secretas (Este archivo no se sube a GitHub gracias al .gitignore)
require_once 'config.php';

// 2. Validar que la petición venga del formulario (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // --- A. VALIDACIÓN DE RECAPTCHA ---
    if (!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
        http_response_code(400);
        echo "Por favor, completa el reCAPTCHA.";
        exit;
    }

    $recaptcha_response = $_POST['g-recaptcha-response'];
    
    // Consultamos a los servidores de Google si el token es válido
    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$RECAPTCHA_SECRET.'&response='.$recaptcha_response);
    $response_data = json_decode($verify_response);

    if (!$response_data->success) {
        http_response_code(400);
        echo "Error en la validación del reCAPTCHA. Inténtalo de nuevo.";
        exit;
    }

    // --- B. RECOLECCIÓN Y LIMPIEZA DE DATOS (Seguridad) ---
    // strip_tags elimina cualquier intento de inyección de código HTML/JS
    $nombre = strip_tags(trim($_POST["nombre"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telefono = strip_tags(trim($_POST["telefono"]));
    $empresa = strip_tags(trim($_POST["empresa"]));
    $servicio = strip_tags(trim($_POST["servicio"]));
    $mensaje = strip_tags(trim($_POST["mensaje"]));

    // --- C. VALIDACIÓN DEL SERVIDOR ---
    if (empty($nombre) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Por favor, completa todos los campos correctamente.";
        exit;
    }

    // --- D. CONSTRUCCIÓN DEL CORREO ---
    $asunto = "Nueva Cotización Web - " . $nombre;
    
    $cuerpo = "Has recibido una nueva solicitud de cotización desde la página web:\n\n";
    $cuerpo .= "---------------------------------------------------\n";
    $cuerpo .= "DATOS DEL CONTACTO\n";
    $cuerpo .= "---------------------------------------------------\n";
    $cuerpo .= "Nombre: $nombre\n";
    $cuerpo .= "Correo: $email\n";
    $cuerpo .= "Teléfono: " . ($telefono ? $telefono : "No especificado") . "\n";
    $cuerpo .= "Empresa: " . ($empresa ? $empresa : "No especificada") . "\n";
    $cuerpo .= "Servicio de interés: " . ($servicio ? $servicio : "No especificado") . "\n\n";
    $cuerpo .= "---------------------------------------------------\n";
    $cuerpo .= "MENSAJE / REQUERIMIENTO\n";
    $cuerpo .= "---------------------------------------------------\n";
    $cuerpo .= "$mensaje\n\n";
    $cuerpo .= "---------------------------------------------------\n";
    $cuerpo .= "Este mensaje fue enviado desde el formulario de contacto de tu sitio web.";

    // Cabeceras profesionales del correo
    $headers = "From: Web CR Publicidad <no-reply@" . $_SERVER['HTTP_HOST'] . ">\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // --- E. ENVÍO DEL CORREO (Motor de DonWeb) ---
    if (mail($CORREO_DESTINO, $asunto, $cuerpo, $headers)) {
        http_response_code(200);
        echo "Mensaje enviado con éxito.";
    } else {
        http_response_code(500);
        echo "Error del servidor al enviar el correo.";
    }

} else {
    // Si intentan entrar a midominio.com/enviar.php por la URL, los bloqueamos
    http_response_code(403);
    echo "Acceso denegado.";
}
?>