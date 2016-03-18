<?php
  class Template 
  {
     protected $Params;
     public function __construct()
     {
         $this->Params = array();
     } 
     public function SetParam($name, $value)
     {
        $this->Params[$name] = $value; 
     }
     public function SetParams($assocArray)
     {
       if (is_array($assocArray))
       foreach($assocArray as $key => $val)
            $this->SetParam($key, $val);  
     }
     public function GetParam($name)
     {
         return $this->Params[$name];
     }
     public function Fetch($fileName)
     {
         extract($this->Params);
         ob_start();
         include($fileName);
         $str = ob_get_contents();
         ob_end_clean();
         return $str;
     }
     public function Display($fileName)
     {
         echo $this->Fetch($fileName);
     }
  }
?>