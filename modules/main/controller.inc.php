<?php
  class Main_Controller extends Controller
  {
      public static function IndexAction()
      {
          $resArr = array();
          $resArr['Content'] = Main_View::GetMainPage();
          return $resArr;
      }
      public static function FormAction($route){

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(($_POST['username'] == "") || ($_POST['usergender']== "") || ($_FILES['file']['name']== "")){
                $resArr['Error'] = 'Не все поля заполнены';
            }else if(!preg_match("/[A-ZА-Я][a-zа-я]+ [A-ZА-Я][a-zа-я]/", $_POST['username'])){
                $resArr['Error'] = 'Не корректные имя и фамилия';
            }else if($_POST['usergender'] > 65 || $_POST['usergender'] < 17){
                $resArr['Error'] = 'Возраст не должет быть меньше 17 и больше 65';
            }else{

                //действия

                $res['Content'] = Main_View::GetRenderOk($_POST);
            }

          }
          if ($resArr != '')
          {
              $res['Content'] = Main_View::GetMainPage($resArr);
          }


          return $res;
  }
  }
?>
