<?php

namespace LegadoDigital\App;

use LegadoDigital\App\Dao\UsuarioRutaDAO;

class UsuarioRuta
{
    public static function findPath($user_id)
    {
        $userDAO = new UsuarioRutaDAO();

        $user_path = $userDAO->findPath($user_id);

        return $user_path;
    }

    public static function insertPath($user_id, $user_path)
    {
        $userDAO = new UsuarioRutaDAO();

        return $userDAO->insertPath($user_id, $user_path);
    }

    public static function updatePath($user_id, $user_path)
    {
        $userDAO = new UsuarioRutaDAO();

        return $userDAO->updatePath($user_id, $user_path);
    }

    public static function recorreArchivosCarpeta($ruta)
    {
        $archivos = array();

        if (!is_dir($ruta)) {
            return $archivos;
        }

        $archivos = glob($ruta . '*');

        usort($archivos, function ($archivoA, $archivoB) {
            $aIsDir = is_dir($archivoA);
            $bIsDir = is_dir($archivoB);
            if ($aIsDir === $bIsDir)
                return strnatcasecmp($archivoA, $archivoB);
            elseif ($aIsDir && !$bIsDir)
                return -1;
            elseif (!$aIsDir && $bIsDir)
                return 1;
        });

        return $archivos;
    }

    public static function buscarArchivo($archivoBuscado, $user_id)
    {
        $carpetaPrincipal = '../../archivos/' . $user_id . '/';

        $archivos = glob($carpetaPrincipal . '*');
        $encontrado = '';

        for ($i = 0; $i < count($archivos) && $encontrado === ''; $i++) {
            $dir = is_dir($archivos[$i]) ? $archivos[$i] . '/' . $archivoBuscado : $archivos[$i];
            $encontrado = file_exists($dir) && strpos($dir, $archivoBuscado) !== false ? $dir : '';
        }

        return $encontrado;
    }

    private static function filterFolder($archivos)
    {
        return array_filter($archivos, function($value) {
            $queso = ($value !== "..") && ($value !== '.');

            if ($queso) {
                return $value;
            }
       });
    }

    public static function eliminaDirectorio($targetDir)
    {
        if (is_dir($targetDir)) {
            $files = glob($targetDir . '/*');

            if (count($files) > 0) {
                foreach($files as $file) {
                    self::eliminaDirectorio($file);
                }
            }

            rmdir($targetDir);
        } elseif (is_file($targetDir)) {
            unlink($targetDir);
        }
    }

    public static function tamFile($ruta)
    {
       $MBbyte = number_format(filesize($ruta) / 1048576, 2);

        if ($MBbyte < 0.1) {
            $MBbyte = 0.1;
        }

        return  $MBbyte;
    }

    public static function almacenamiento($ruta)
    {
        $valuesize = self::getFolderSize($ruta);
        return self::formatBytes($valuesize);
    }

    private static function getFolderSize($ruta)
    {
        $dirs = scandir($ruta);
        $dirs = self::filterFolder($dirs);
        $sizeArchivador = 0;
        $count = 0;
        foreach( $dirs as $dir ){
            if (is_dir($ruta.$dir)) {
                $sizeArchivador  = $sizeArchivador + self::getFolderSize($ruta.$dir."/");
            } else if(is_file($ruta.$dir)) {
                $sizeArchivador += filesize($ruta.$dir);
                $count = $count + 1;
            }
        }

        return $sizeArchivador;
    }

    private static function formatBytes($bytes)
    {
        $units = array('B','KB','MB','GB');
        $bytes = max($bytes,0);
        $value = $bytes ? log($bytes) : 0;
        $pow = floor($value/log(1024));
        $pow = min($pow,count($units)-1);
        return $bytes . " " . $units[$pow];
    }

}
