
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$adjuntar = $_FILES['adjuntar'];
// Establecer la conexión con la base de datos
$mysqli = mysqli_connect("localhost", "root", "", "integrador_sexto");

// Verificar la conexión
if (!$mysqli) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Consulta SQL para obtener los correos electrónicos
$query = "SELECT  `Correo` FROM `clientes` ";

// Ejecutar la consulta
$result = mysqli_query($mysqli, $query);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . mysqli_error($mysqli));
}

require '../../views/includes/PHPMailer.php';
require '../../views/includes/SMTP.php';
require '../../views/includes/Exception.php';

// Define namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

// Configuración del servidor SMTP
$mail->isSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = "kevinsan1835@gmail.com";
$mail->Password = "ucyuathzjvismqbz";

// Variable para verificar si se envió al menos un correo exitosamente
$enviadoExitosamente = false;

// Ahora, $correos contiene los correos electrónicos en un array
while ($row = mysqli_fetch_assoc($result)) {
    // Configurar el destinatario
    $mail->ClearAllRecipients(); // Limpiar destinatarios anteriores
    $mail->addAddress($row['Correo']);

    // Configurar el asunto y el cuerpo del mensaje
    $subject = utf8_decode($asunto);
    $mail->Subject = $subject;
    $mail->setFrom("kevinsan1835@gmail.com");
    $mail->isHTML(true);
    $mail->Body = $mensaje;

    // Adjuntar el archivo al correo electrónico
    $mail->addAttachment($adjuntar['tmp_name'], $adjuntar['name']);

    // Enviar el correo electrónico
    if ($mail->send()) {
        
    } else {
        echo "Error al enviar el correo a: " . $row['Correo'] . "<br>";
    }
}

// Cerrar la conexión con la base de datos
mysqli_close($mysqli);


$mail->smtpClose();
?>