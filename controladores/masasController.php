<?php

require_once 'modelos/Masa.php';

function getAllMasas()
{
    $masa = new Masa();
    return $masa->getAll();
}

function getMasa()
{
    $masa = new Masa();
    return $masa->getBy("id_masa", $_POST['id_masa']);
}

function updateMasa()
{
    $descripcion = $_POST['descripcion'];
    $nombre = $_POST['nombre'];
    $tamano = $_POST['tamano'];
    $precio = $_POST['precio'];
    $img = "";

    $name = $_FILES["avatar"]["name"];
    $tmp_name = $_FILES['avatar']['tmp_name'];
    $dir = "vistas/img/ingredientes/";

    // Si existe un nombre pasado por '$_FILES' y no esta vacio y no pesa mas de 500KB realizará las acciones de dentro.
    if ($tmp_name != $_POST['avatar2']) {
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
                        $img = $nombreImagen . $ext;

                    // Cambia los permisos de la imagen para que se pueda manipular.
                    chmod($dir . $nombreImagen . $ext, 0777);
                    break;

                default:
                    $img = $_POST['avatar2'];
                    break;
            }

        } else {
            $img = $_POST['avatar2'];
        }
    }

    if (empty($nombre)) $nombre = $_POST['nombre2'];
    if (empty($descripcion)) $descripcion = $_POST['descripcion2'];
    if (empty($tamano)) $tamano = $_POST['tamano2'];
    if (empty($precio)) $precio = $_POST['precio2'];

    $masa = new Masa();
    $masa->setIdMasas($_POST['id_masa']);
    $masa->setImg($img);
    $masa->setDescripcion($descripcion);
    $masa->setNombre($nombre);
    $masa->setPrecio($precio);
    $masa->setTamano($tamano);

    return $masa->updateThis();
}

function deleteMasa()
{
    $masa = new Masa();
    return $masa->deleteBy("id_masa", $_POST['id_masa']);
}

function insertMasa()
{
    $descripcion = $_POST['descripcion'];
    $nombre = $_POST['nombre'];
    $tamano = $_POST['tamano'];
    $precio = $_POST['precio'];
    $img = "";

    $name = $_FILES["avatar"]["name"];
    $tmp_name = $_FILES['avatar']['tmp_name'];
    $dir = "vistas/img/masas/";

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
                    $img = $nombreImagen . $ext;

                // Cambia los permisos de la imagen para que se pueda manipular.
                chmod($dir . $nombreImagen . $ext, 0777);
                break;

            default:
                $img = "default.jpg";
                break;
        }

    } else {
        $img = "default.jpg";
    }

    $masa = new Masa();
    $masa->setImg($img);
    $masa->setDescripcion($descripcion);
    $masa->setNombre($nombre);
    $masa->setPrecio($precio);
    $masa->setTamano($tamano);

    return $masa->setMasa();
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