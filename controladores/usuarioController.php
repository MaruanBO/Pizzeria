<?php

// Importa los ficheros que necesita.
require_once 'modelos/Usuario.php';

// Variables comúnes de false y true.
$ALL_FALSE = 0;
$TRUE = 1;

/** ERRORES CON REGISTROS */
// Campo de 'Login' vacio.
$field_login = false;
// Campo de 'Password' vacio.
$field_pass = false;
// Campo de 'Password 2' vacio.
$field_pass2 = false;
// campo de 'Nombre' vacio.
$field_name = false;
// Campo de 'Email' vacio.
$field_email = false;
// Campo de 'Firma' vacio.
$field_firma = false;
// Campo de 'Condiciones' no checked
$field_condiciones = false;
// Los dos campos vacios.
$field_all = false;
// Ya existe el 'Login'
$isset_reg_user = false;

/** ERRORES CON LOGIN */
// El usuario no existe.
$isset_log_user = false;
// La contraseña es erronea.
$pass_error = false;
// Captcha no válido.
$captcha_error = false;

/** ERRORES CON UPDATE */
// La contraseña antigua introducida no coincide con la antigua en la BD.
$old_error = false;
// La nueva contraseña no cumple los requisitos.
$new_error = false;
// Las contraseñas no coinciden.
$renew_error = false;
// El email no cumple los requisitos.
$email_error = false;
// La imagen no cumple los requisitos.
$avatar_error = false;
// Todos los campos vacios.
$all_empty = false;
// Se han actualizado los datos.
$success_update = false;
// Error al actualizar.
$error_update = false;

if (!isset($_COOKIE['access_error'])) setcookie("access_error", 0, 0);

// DEVUELVE TODOS LOS DATOS DE TODOS LOS USUARIOS
function getAll()
{
    $usuario = new Usuario();
    return $usuario->getAll();
}

function deleteUser()
{
    $usuario = new Usuario();
    $usuario->deleteBy("login", $_POST['login']);
}

function getUser(){
    $usuario = new Usuario();
    return $usuario->getBy("login", $_POST['login']);
}

// REALIZA LAS COMPROBACIONES TANTO DEL REGISTRO COMO DEL LOGIN.
function login()
{
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (checkInputEmpty($login, $pass)) {
        if ($result = issetLogin($login)) {
            if (loginActions($pass, $result)) {
                $_SESSION['usuario_logueado'] = true;
                $GLOBALS['log_user'] = true;
                unset($_COOKIE['access_error']);
                setcookie("access_error", null, -1);
            } else {
                setcookie("access_error", $_COOKIE['access_error'] + 1, 0);
                generateCaptcha();
                $GLOBALS['log_user'] = false;
            }

        } else {
            setcookie("access_error", $_COOKIE['access_error'] + 1, 0);
            generateCaptcha();
            $GLOBALS['log_user'] = false;
        }
    }
}

// CREA EL OBJETO USUARIO Y LO INTRODUCE EN LA BD
function create()
{
    // Introduce los POST dentro de variables
    $login = $_POST['login'];
    $name = $_POST['nombre'];
    $email = $_POST['email'];
    $firma = $_POST['firma'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    // Realiza las comprobaciones de los campos
    if (!checkInputEmpty($login, $pass, $pass2, $email, $name, $firma)) {
        // Comprueba si el 'Login' introducido existe
        if (!issetLogin($login)) {
            // Crea el usuario y le introduce sus parametros
            $user = new Usuario();
            $user->setLogin($login);
            $user->setPass($pass);
            $user->setNombre($name);
            $user->setEmail($email);
            $user->setAvatar("perfil_default.jpg");
            $user->setFirma($firma);
            $user->setTipo("1");

            // Introduce el usuario en la base de datos.
            $setUser = $user->setUser();
            // Si la sentecia anterior se ha realizado con exito pasa la variable a true o false.
            // Para mostrar un mensaje de error o de exito por pantalla.
            if ($setUser) $GLOBALS['reg_user'] = true;
            else $GLOBALS['reg_user'] = false;
        } else {
            $GLOBALS['isset_reg_user'] = true;
        }
    }

}

// MODIFICA EL USUARIO Y LO CAMBIA EN LA BD
function update()
{
    $name = $_FILES["avatar"]["name"];
    $tmp_name = $_FILES['avatar']['tmp_name'];
    $dir = "vistas/img/";

    // Si existe un nombre pasado por '$_FILES' y no esta vacio y no pesa mas de 500KB realizará las acciones de dentro.
    if (isset ($name) && !empty($name) && ceil(filesize($tmp_name) / 1024) <= 500) {
        $partes_ruta = pathinfo($name); // Obtiene información del archivo o imagen.
        $ext = "." . $partes_ruta['extension']; // Obtiene la extensión del archivo que se ha subido.

        // Comprueba los formatos del archivo subido, para comprobar que sean imagenes.
        switch ($ext) {
            case ".jpg":
            case ".png":
            case ".gif":
                $nombreImagen = generateNames(70); // Genera un nombre con caracteres aleatorios para hacer única la imagen.

                // Mueve el archivo indicado al lugar indicado move_uploaded_file(origen_cliente, destino_servidor)
                if (move_uploaded_file($tmp_name, $dir . $nombreImagen . $ext))
                    $avatar = $nombreImagen . $ext;

                // Cambia los permisos de la imagen para que se pueda manipular.
                chmod($dir . $nombreImagen . $ext, 0777);
                break;

            default:
                $GLOBALS['avatar_error'] = false;
                $avatar = $_SESSION['user']['avatar'];
                break;
        }

    } else {
        $avatar = $_SESSION['user']['avatar'];
    }

    // En caso de que la imagen sea muy grande muestra el mensaje de error siguiente.
    if (isset ($name) && !empty($name) && ceil(filesize($tmp_name) / 1024) > 500) {
        $GLOBALS['avatar_error'] = false;
    }

    // Comprueban que los Input`s que contienen los datos (nombre, email, firma, etc.) no esten vacios;
    // en caso de estar vacios los llena con los datos antiguos guardados en la session. Y si no lo estan
    // introduce los datos en la variable privada correspondiente.
    if (!empty($_POST['nombre'])) $nombre = $_POST['nombre'];
    else $nombre = $_SESSION['user']['nombre'];

    if (!empty($_POST['email'])) $email = $_POST['email'];
    else $email = $_SESSION['user']['email'];

    if (!empty($_POST['firma'])) $firma = $_POST['firma'];
    else $firma = $_SESSION['user']['firma'];

    if (!empty($_POST['old'])) $old = $_POST['old'];
    else $old = $_SESSION['user']['pass'];

    $new = $_POST['new'];
    $renew = $_POST['renew'];

    // Comprueba que los campos del formulario no esten todos vacios.
    if (empty($old) && empty($new) && empty($renew) && empty($avatar) && empty($nombre) && empty($email) && empty($firma)) {
        $GLOBALS['all_empty'] = true;
    } else {
        if (sendUpdate($_SESSION['user']['login'], $old, $new, $renew, $nombre, $email, $avatar, $firma)) {
            if ($_SESSION['user']['avatar'] != $avatar && $_SESSION['user']['avatar'] != "perfil_default.jpg")
                @unlink("img/" . $_SESSION['user']['avatar']); // Elimina la antigua imagen para no llenar el servidor de imagenes, por lo tanto solo hay una imagen por usuario.
            $_SESSION['user']['avatar'] = $avatar;
            $_SESSION['user']['nombre'] = $nombre;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['firma'] = $firma;
            $_SESSION['user']['pass'] = $new;

            $GLOBALS['success_update'] = true;

        } else {
            $GLOBALS['error_update'] = true;
        }
    }

}

function updateAdmin()
{
    $name = $_FILES["avatar"]["name"];
    $tmp_name = $_FILES['avatar']['tmp_name'];
    $dir = "vistas/img/";

    // Si existe un nombre pasado por '$_FILES' y no esta vacio y no pesa mas de 500KB realizará las acciones de dentro.
    if (isset ($name) && !empty($name) && ceil(filesize($tmp_name) / 1024) <= 500) {
        $partes_ruta = pathinfo($name); // Obtiene información del archivo o imagen.
        $ext = "." . $partes_ruta['extension']; // Obtiene la extensión del archivo que se ha subido.

        // Comprueba los formatos del archivo subido, para comprobar que sean imagenes.
        switch ($ext) {
            case ".jpg":
            case ".png":
            case ".gif":
                $nombreImagen = generateNames(70); // Genera un nombre con caracteres aleatorios para hacer única la imagen.

                // Mueve el archivo indicado al lugar indicado move_uploaded_file(origen_cliente, destino_servidor)
                if (move_uploaded_file($tmp_name, $dir . $nombreImagen . $ext))
                    $avatar = $nombreImagen . $ext;

                // Cambia los permisos de la imagen para que se pueda manipular.
                chmod($dir . $nombreImagen . $ext, 0777);
                break;

            default:
                $GLOBALS['avatar_error'] = false;
                $avatar = $_POST['avatar2'];
                break;
        }

    } else {
        $avatar = $_POST['avatar2'];
    }

    // En caso de que la imagen sea muy grande muestra el mensaje de error siguiente.
    if (isset ($name) && !empty($name) && ceil(filesize($tmp_name) / 1024) > 500)
        $GLOBALS['avatar_error'] = false;

    // Comprueban que los Input`s que contienen los datos (nombre, email, firma, etc.) no esten vacios;
    // en caso de estar vacios los llena con los datos antiguos guardados en la session. Y si no lo estan
    // introduce los datos en la variable privada correspondiente.
    if (!empty($_POST['nombre'])) $nombre = $_POST['nombre'];
    else $nombre = $_POST['nombre2'];

    if (!empty($_POST['email'])) $email = $_POST['email'];
    else $email = $_POST['email2'];

    if (!empty($_POST['firma'])) $firma = $_POST['firma'];
    else $firma = $_POST['firma2'];

    if (!empty($_POST['old'])) $old = $_POST['old'];
    else $old = $_POST['pass'];

    $tipo = $_POST['tipo'];
    $new = "";
    $renew = "";

    // Comprueba que los campos del formulario no esten todos vacios.
    if (empty($old) && empty($tipo) && empty($avatar) && empty($nombre) && empty($email) && empty($firma)) {
        $GLOBALS['all_empty'] = true;
    } else {
        if (sendUpdate($_POST['login'], $old, $new, $renew, $nombre, $email, $avatar, $firma, $tipo)) {
            if ($_POST['avatar2'] != $avatar && $_POST['avatar2'] != "perfil_default.jpg")
                // Elimina la antigua imagen para no llenar el servidor de imagenes, por lo tanto solo hay una imagen por usuario.
                @unlink("vistas/img/" . $_POST['avatar2']);

            $GLOBALS['success_update'] = true;

        } else {
            $GLOBALS['error_update'] = true;
        }
    }

}

// COMPRUEBA QUE LOS CAMPOS NO ESTEN VACIOS.
function checkInputEmpty($login, &$pass, $pass2 = false, $email = false, $name = false, $firma = false)
{
    $anyFalse = false;

    if (!isset($login) || empty($login)) {
        $GLOBALS['field_login'] = true;
        $anyFalse = true;
    }

    if (!isset($pass) || empty($pass)) {
        $GLOBALS['field_pass'] = true;
        $anyFalse = true;
    }

    if ($pass2 != false && (!isset($pass2) || empty($pass2))) {
        $GLOBALS['field_pass2'] = true;
        $anyFalse = true;
    }

    if ($pass2 != false && (isset($pass) || !empty($pass) && (isset($pass2) || !empty($pass2)))) {
        // Comprueba que la contraseña introducida cumple los requisitos.
        if (preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?=.*[A-Z])(?=.*[a-z]).*$/", $pass)) {
            if ($pass == $pass2) {
                $opciones = ['cost' => 10];
                $pass = password_hash($pass, PASSWORD_BCRYPT, $opciones);
            } else {
                $GLOBALS['field_pass'] = true;
                $anyFalse = true;
            }
        } else {
            $GLOBALS['field_pass'] = true;
            $anyFalse = true;
        }
    }

    if ($name != false && (!isset($name) || empty($name))) {
        $GLOBALS['field_name'] = true;
        $anyFalse = true;
    }

    if ($email != false && (!isset($email) || empty($email))) {
        $GLOBALS['field_email'] = true;
        $anyFalse = true;
    } elseif ($email != false) {
        // Comprueba que el email cumpla los requisitos.
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
            $GLOBALS['field_email'] = true;
            $anyFalse = true;
        }
    }

    if ($firma != false && (!isset($firma) || empty($firma))) {
        $GLOBALS['field_firma'] = true;
        $anyFalse = true;
    }

    if (!isset($_POST['condiciones'])) {
        $GLOBALS['field_condiciones'] = true;
        $anyFalse = true;
    }

    return $anyFalse;
}

// COMPRUEBA QUE EL LOGIN INTRODUCIDO NO EXISTE EN LA BD.
function issetLogin($login)
{
    $usuario = new Usuario();

    $result = $usuario->getBy("login", $login);
    $resultLength = count($result);

    if ($resultLength == 0) return false;
    elseif ($resultLength == 1) return $result[0];
    else return $result;
}

// ACCIONES QUE SE REALIZARÁN AL HACER EL LOGIN.
function loginActions($pass, $result)
{
    if (password_verify($pass, $result['password'])) {
        if ($_COOKIE['access_error'] > 2 && isset($_POST['captcha']) && $_POST['captcha'] == $_COOKIE['key']) {
            $dateTime = new DateTime();
            $_SESSION['user'] = array();
            $_SESSION['user']['login'] = $result['login'];
            $_SESSION['user']['pass'] = $result['password'];
            $_SESSION['user']['nombre'] = $result['nombre'];
            $_SESSION['user']['email'] = $result['email'];
            $_SESSION['user']['firma'] = $result['firma'];
            $_SESSION['user']['avatar'] = $result['avatar'];
            $_SESSION['user']['tipo'] = $result['tipo'];
            $_SESSION['user']['time'] = $dateTime->format('d-m-Y H:i:s');

        } elseif ($_COOKIE['access_error'] <= 2) {
            $dateTime = new DateTime();
            $_SESSION['user'] = array();
            $_SESSION['user']['login'] = $result['login'];
            $_SESSION['user']['pass'] = $result['password'];
            $_SESSION['user']['nombre'] = $result['nombre'];
            $_SESSION['user']['email'] = $result['email'];
            $_SESSION['user']['firma'] = $result['firma'];
            $_SESSION['user']['avatar'] = $result['avatar'];
            $_SESSION['user']['tipo'] = $result['tipo'];
            $_SESSION['user']['time'] = $dateTime->format('d-m-Y H:i:s');

        } else {
            $GLOBALS['captcha_error'] = true;
            return false;
        }
    } else {
        $GLOBALS['pass_error'] = true;
        return false;
    }

    return true;
}

/**
 * @return bool
 *
 * Actualiza los campos relacionados con los datos.
 * Comprueba que el email nueva cumpla con los requisitos establecidos.
 *
 * Actualiza los campos tan solo relacionados con la contraseña y realiza sus respectivas comprobaciones.
 * 1.- Comprueba que los campos del formulario relacionados con la contraseña no esten vacios.
 * 2.- Comprueba que la nueva contraseña cumpla los requisitos que debe tener la contraseña (min 8 car, 1 mayu, 1 min y 1 num).
 * 3.- Comprueba que la contraseña antigua sea igual que la que el usuario ha introducido en el campo de 'Contraseña antigua'.
 * 4.- Comprueba que la nueva contraseña y su repetición sean iguales.
 *
 */
function sendUpdate($login, $old, &$new, $renew, $name, $email, $avatar, $firma, $tipo = false)
{

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
        $GLOBALS['email_error'] = true;
        return false;
    }

    if (!empty($new) && !empty($old) && !empty($renew)) {
        if (preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?=.*[A-Z])(?=.*[a-z]).*$/", $new)) {
            if (password_verify($old, $_SESSION['user']['pass'])) {
                if ($new == $renew) {
                    $opciones = ['cost' => 10];
                    $new = password_hash($new, PASSWORD_BCRYPT, $opciones);

                } else {
                    $GLOBALS['renew_error'] = true;
                    return false;
                }
            } else {
                $GLOBALS['old_error'] = true;
                return false;
            }
        } else {
            $GLOBALS['new_error'] = true;
            return false;
        }
    } else {
        $new = $old;
    }

    $usuario = new Usuario();
    $usuario->setLogin($login);
    $usuario->setPass($new);
    $usuario->setNombre($name);
    $usuario->setEmail($email);
    $usuario->setAvatar($avatar);
    $usuario->setFirma($firma);

    if ($tipo) $usuario->setTipo($tipo);
    else $usuario->setTipo(1);

    $update = $usuario->updateUser();

    if ($update) return true;
    return false;
}

/**
 * @param $long
 * @return string
 *
 * Genera nombres del tamaño pasado por parametros con caracteres al azar.
 */
function generateNames($long)
{
    $date = new DateTime();
    $fecha = $date->format("d-m-Y");
    $hora = $date->format("H-i-s");

    $chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM-_1234567890";
    $chars_long = strlen($chars) - 1;
    $name = "DF" . $fecha . "DT" . $hora . "IN";
    for ($i = 0; $i < $long; $i++)
        $name .= $chars{mt_rand(0, $chars_long)};
    return $name;
}

function generateCaptcha()
{
    $caracteres = "QWERTYUIOPASDFGHJKLMNBVCXZ";
    $max = strlen($caracteres) - 1;

    $cadena = "";
    for ($i = 0; $i < 5; $i++) $cadena .= $caracteres{mt_rand(0, $max)};

    setcookie("key", $cadena, 0);
}