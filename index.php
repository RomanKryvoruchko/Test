<?php
    //error_reporting(E_NONE);
    include('config/database.inc.php');
    include('config/config.inc.php');
    include("core/core.inc.php");
    include("core/template.inc.php");
    function __autoload($className)
    {
       $fileName = "core/".strtolower($className).".inc.php";  
       $classNameParts = explode("_",$className);
           $fileNameModule = "modules/".strtolower($classNameParts[0])."/".strtolower($classNameParts[1]).".inc.php";  
       if (is_file($fileName))
          require($fileName);
       else
          if (is_file($fileNameModule))
            require($fileNameModule);
    }
    Core::Init();
    Core::Run();
    Core::Done();
?>