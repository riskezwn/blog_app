<?php


if (isset($_POST)) {
    require_once('includes/connect.php');
    require_once('includes/helpers.php');
    // Recoger y sanear los datos del formulario
    // Para evitar ataques de inyección SQL utilizaremos la función de mysqli_real_escape_string($conexion, $dato)

    $name = !empty($_POST['name']) ? mysqli_real_escape_string($con, sanitize($_POST['name'])) : false;
    $subname = !empty($_POST['subname']) ? mysqli_real_escape_string($con, sanitize($_POST['subname'])) : false;
    /* $email = !empty($_POST['email']) ? mysqli_real_escape_string($con, sanitize($_POST['email'])) : false;
    $pass = !empty($_POST['pass']) ? sanitize($_POST['pass']) : false; */

    /// Validar los datos ///
    $errors = [];
    // Campo nombre
    if (!is_string($name) || !preg_match('/^[A-Za-zÀ-ÿ ]+$/', $name)) {
        $errors['name'] = 'El nombre no es válido';
    }
    // Campo apellido
    if (!is_string($subname) || !preg_match('/^[A-Za-zÀ-ÿ ]+$/', $subname)) {
        $errors['subname'] = 'Los apellidos no son válidos';
    }
   /*  // Campo correo
    if (!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'El email no es válido';
    }
    // Campo contraseña
    if (!$pass || strlen($pass) < 8) {
        $errors['pass'] = 'La contraseña debe tener al menos 8 caracteres';
    } */

    /// Comprobar si hay errores ///
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
    } else {
        $user_id = $_SESSION['userdata']['id'];
        // Actualizar usuario en la base de datos
        $sql = "UPDATE users
                SET name = '$name',
                    subname = '$subname'
                WHERE id = $user_id;";
        $stmt = mysqli_query($con, $sql);

        if ($stmt) {
            $_SESSION['modifyuser'] = 'Los datos se han modificado correctamente';
            $_SESSION['userdata']['name'] = $name;
            $_SESSION['userdata']['subname'] = $subname;
            
        } else {
            $_SESSION['errors']['modifyuser'] = 'Error al modificar los datos del usuario';
        }
    }
}
// Redirigir a index
header('Location: profile.php');
