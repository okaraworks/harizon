<?php
class Autoloader {
    static public function loader($className) {
        $fileName = '';
        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
        $className = ltrim($className, '\\');
        // echo $className;
        //Parse Namespace
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;

        }
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . $fileName . $className . '.php';
        
        if (file_exists($fileName)){ 
            require $fileName; 
            return true; 
        } echo 'test'.$fileName;
        return false;
    }
}

spl_autoload_register('Autoloader::loader');  //Register Autoloader
?>