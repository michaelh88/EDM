<?php defined('SYSPATH') or die('No direct script access.');

final class Files {

    static function clean_path($path) {
      if (isset($path)) {
        $path = str_replace('\\', '/', $path);
        $path = rtrim($path, '/');
        $path = trim($path);
      }
      return $path;
    }

    static function secured_mkdir($dirPath) {
      if (isset($dirPath)) {

        $dirPath = self::clean_path($dirPath);
        if (!file_exists($dirPath) && !mkdir($dirPath, self::$DefaultDirPerms, true))
          throw new Exception('[secured_mkdir] An error occured while creating the directory' . ' - \'' . $dirPath . '\'');
      }
    }

    static function concat_paths($path1, $path2) {
      if (isset($path1) && isset($path2)) {

        $paths[] = self::clean_path($path1);
        $paths[] = '/';
        $paths[] = trim(self::clean_path($path2), '/');

        return implode($paths);
      }
      else {

        throw new Exception('[concat_path] One of the path passed as an argument is not set!');
      }
    }


    static function recurse_copy($src,$dst) {
      $dir = opendir($src);
      @mkdir($dst);
      while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
          if ( is_dir($src . '/' . $file) ) {
            self::recurse_copy($src . '/' . $file,$dst . '/' . $file);
          }
          else {
            copy($src . '/' . $file,$dst . '/' . $file);
          }
        }
      }
      closedir($dir);
    }

    static function recursive_rmdir($directory, $empty=FALSE) {
      if(substr($directory,-1) == '/') {
        $directory = substr($directory,0,-1);
      }
      if(!file_exists($directory) || !is_dir($directory)) {
        return FALSE;
      }
      elseif(is_readable($directory)) {
        $handle = opendir($directory);
        while (FALSE !== ($item = readdir($handle))) {
          if($item != '.' && $item != '..') {
            $path = $directory.'/'.$item;
            if(is_dir($path)) {
              self::recursive_rmdir($path);
            } else {
              unlink($path);
            }
          }
        }
        closedir($handle);
        if($empty == FALSE) {
          if(!rmdir($directory)) {
            return FALSE;
          }
        }
      }
      return TRUE;
    }

    static function filename_safe($filename) {
      $temp = $filename;

      // Lower case
      $temp = strtolower($temp);

      // Replace spaces with a '_'
      $temp = str_replace(" ", "_", $temp);

      $search = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i');
      $replace = array ('e','a','i','u','o','c');

      $temp = preg_replace($search, $replace, $temp);

      // Loop through string
      $result = '';
      for ($i = 0, $l = strlen($temp); $i < $l; ++$i) {

        if (preg_match('([0-9]|[a-z]|\.|-|_)', $temp[$i])) {

          $result .= $temp[$i];
        }
        else {

          $result .= '_';
        }
      }

      // Return filename
      return $result;
    }

}
