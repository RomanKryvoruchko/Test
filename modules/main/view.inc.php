<?php
  class Main_View extends View
  {
      public static function GetMainPage($assocArr = null)
      {
        $tpl = new Template();
          $tpl->SetParams($assocArr);
        return $tpl->Fetch('templates/main/main.tpl');
      }
      public static function GetRenderOk($post)
      {
          $tpl = new Template();
          $tpl->SetParam("post",$post);
          return $tpl->Fetch('templates/main/main-ok.tpl');
      }
  }
?>