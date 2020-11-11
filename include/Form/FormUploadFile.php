<?php

namespace LegadoDigital\App\Form;


use LegadoDigital\App\UsuarioRuta;

class FormUploadFile extends Form
{
    public function __construct()
    {
        parent::__construct('form-uploadFile', array(
            'action' => 'archivo.php',
            'media-form' => 'enctype="multipart/form-data"',
        ));
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        $error['archivo'] = isset($errores['archivo']) ? $errores['archivo'] : '';
        $error['extension'] = isset($errores['extension']) ? $errores['extension'] : '';

        $path = UsuarioRuta::findPath($_SESSION["user_id"]);
        $paths = explode(',', $path);

        $formulario = "<option value=\"raiz\">Raiz</option>";

        foreach ($paths as $res) {
            if ($res != ""){
                $formulario = $formulario . '<option value="' . $res . '">' . $res . '</option>';
            }
        }
        $formulario = $formulario . '<option value="cajafuerte">cajafuerte</option>';

        $html = <<<EOF
        <div class="form-group">
            <b>Enviar un archivo: </b>
        <br>
        <b>Seleccionar Carpeta</b>
            <select name="paths[]">
                ${formulario}
            </select>
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <input type="file" name="userfile" id="userfile" value="prueba" required>
            ${error['archivo']}
            ${error['extension']}
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Enviar">
        </div>

EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $result = array();
        $correct = true;
        $path = $datos['paths'];

        if ($path[0] == "raiz"){
            self::createFolder($rutaCarpetaPrincipal = "archivos/" . $_SESSION["user_id"]);
            $folder = "archivos/" . $_SESSION["user_id"] . "/"; // Carpeta a la que subir los archivos
        } else {
            $folder = "archivos/" . $_SESSION["user_id"] . "/" . $path[0] . '/'; // Carpeta a la que subir los archivos
        }
        // Configuración

        $maxlimit = 5000000; // Máximo límite de tamaño (en bits)
        $allowed_ext = "rar,jpg,doc,txt,zip,docx,pdf,xlsx,png,"; // Extensiones permitidas
        $overwrite = "no"; // Permitir sobreescritura? (yes/no)

        $match = "";
        $filesize = $_FILES['userfile']['size']; // toma el tamaño del archivo
        $filename = strtolower($_FILES['userfile']['name']); // toma el nombre del archivo y lo pasa a minúsculas
        $fileTemp = $_FILES['userfile']['tmp_name']; // ruta temporal del archivo
        //  $fileExtension = strtolower(end($fileNameCmps)); // extension del archivo

        // $newFileName = md5(time() . $filename) . '.' . $fileExtension;


        if (!$filename || $filename == "") { // comprueba si no se ha seleccionado ningún archivo
            $result['archivo'] = '<span class="error">Ningún archivo selecccionado para subir.</span>';
            $correct = false;
        } elseif (file_exists($folder . $filename) && $overwrite == "no") { // comprueba si el archivo existe ya
            $result['archivo'] = '<span class="error">- El archivo <b>' . $filename . '</b> ya existe</span>';
            $correct = false;
        }

        // Comprobar tamaño de archivo
        if ($filesize < 1) { // el archivo está vacío
            $result['archivo'] = '<span class="error">- Archivo vacío.</span>';
            $correct = false;
        } elseif ($filesize > $maxlimit) { // el archivo supera el máximo permitido
            $result['archivo'] = '<span class="error">Este archivo supera el máximo tamaño permitido.</span>';
            $correct = false;
        }

        $file_ext = preg_split("/\./", $filename);
        $allowed_ext = preg_split("/\,/", $allowed_ext);

        foreach ($allowed_ext as $ext) {
            if ($ext == $file_ext[1]) $match = "1"; // Permite el archivo
        }

        // Extensión no permitida
        if (!$match) {
            $result['extension'] = '<span class="error"> Este tipo de archivo no está permitido:' . $filename . ' </span>';
            $correct = false;
        }

        if ($correct) {
            if (move_uploaded_file($fileTemp, $folder . $filename)) {
                $result['archivo'] = '<span>Archivo subido correctamente</span>';
            } else {
                $result['archivo'] = '<span class="error">Error! Puede que el tamaño supere el máximo permitido por el servidor. Inténtelo de nuevo.</span>';
            }
        }

        return $result;
    }

    private static function createFolder($rutaCarpetaPrincipal)
    {
        if (!file_exists($rutaCarpetaPrincipal)) {
            mkdir($rutaCarpetaPrincipal, 755);
            UsuarioRuta::insertPath($_SESSION["user_id"], "");
        }
    }

}
