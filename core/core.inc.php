<?php
  class Core
  {
      public static $DB;
      protected static $IndexTPL;
      public static function Init()
      {
         session_start();
         self::$IndexTPL = new Template();
         self::$IndexTPL->SetParams($GLOBALS['SiteParams']);
         self::$DB = new PDO("mysql:host=".MYSQL_SERVER.";dbname=".MYSQL_DATABASE, MYSQL_USER, MYSQL_PASS);
         self::$DB->exec('SET NAMES utf8');
      }
      public static function Run()
      {
          $route = $_GET['route'];
          $routeParts = explode('/', $route);
          $methodName = "IndexAction";
          $keys = array_keys($routeParts);
          for ($i = 0; $i < count($keys); $i++) {
            $tmp = $routeParts[$keys[$i]];
            unset($routeParts[$keys[$i]]);
            $routeParts[$i] = $tmp;
          }
          if (strlen(trim($routeParts[0])) == 0)
                $className = "Main_Controller";
          else
                $className = ucfirst($routeParts[0])."_Controller";
         /* if (!isset($routeParts[1])) {
            die(var_dump(array('route_parts:' => $routeParts)));
          }  */
          $methodNameCandidate = trim($routeParts[1]);
          if (!empty($methodNameCandidate))
            $methodName = ucfirst($methodNameCandidate)."Action";
          array_shift($routeParts);
          array_shift($routeParts);
          if (class_exists($className))
          {
            $obj = new $className();
            if (method_exists($obj, $methodName))
            {
                $res = $obj->$methodName($routeParts);
				$classNameParts = explode("_",$className);
        $filePathJS = 'js/'.strtolower($classNameParts[0]).".js";
				if (is_file($filePathJS))
					self::$IndexTPL->SetParam('ModuleScript', $filePathJS);
                self::$IndexTPL->SetParams($res);
            }
            else
                self::Error(404);
          } else
            self::Error(404);

      }
      public static function Error($code)
      {
         $tpl = new Template();
         if ($code == 404)
            self::$IndexTPL->SetParam('Content', $tpl->Fetch('templates/main/error404.tpl'));
      }
      public static function Done()
      {
          self::$IndexTPL->Display('templates/index.tpl');
      }
  }
  class Model {
        public static function Delete($tableName, $indexFieldName, $indexFieldValue)
        {
            $sth = Core::$DB->prepare("DELETE FROM {$tableName} WHERE {$indexFieldName} = :id");
            $sth->bindValue('id', $indexFieldValue);
            $sth->execute();
        }
        public static function Update($assocArray, $tableName, $indexFieldName, $indexFieldValue)
        {
            $setArray = array();
            foreach($assocArray as $key => $value)
                $setArray [] = "$key = '{$value}'";
            $setString = implode(',', $setArray);
            $sth = Core::$DB->prepare("UPDATE {$tableName} SET {$setString} WHERE {$indexFieldName} = :id");
            $sth->bindValue('id', $indexFieldValue);
            $sth->execute();
        }
        public static function GetAllRecords($table)
        {
           $sth = Core::$DB->prepare("SELECT * FROM {$table}");
           $sth->execute();
           $rows = array();
           while($row = $sth->fetch())
            $rows []= $row;
           return $rows;
        }
            public static function GetAllRecordsTwo($table1, $table2)
        {
           $sth = Core::$DB->prepare("SELECT * FROM {$table1} a, {$table2} b WHERE a.user_id = b.user_id and b.user_con_id = 0");
           $sth->execute();
           $rows = array();
           while($row = $sth->fetch())
            $rows []= $row;
           return $rows;
        }

        public static function GetAllRecordsById($table, $fieldName, $value)
        {
           $sth = Core::$DB->prepare("SELECT * FROM {$table} WHERE {$fieldName} =:val");
           $sth->bindParam('val',$value);
           $sth->execute();
           $rows = array();
           while($row = $sth->fetch())
            $rows []= $row;
           return $rows;
        }

        public static function GetRecordById($table, $fieldName, $value)
        {
           $sth = Core::$DB->prepare("SELECT * FROM {$table} WHERE {$fieldName} = :val");
           $sth->bindParam('val', $value);
           $sth->execute();
           return $sth->fetch();
        }
        public static function Insert($assocArray, $tableName, $indexFieldName)
        {
            $fieldsArray = array_keys($assocArray);
            $valuesArray = array_values($assocArray);
            $fields = implode(",", $fieldsArray);
            $values = "'".implode("','", $valuesArray)."'";
            $sth = Core::$DB->prepare("INSERT INTO {$tableName} ({$fields}) VALUES ($values)");
            $sth->execute();
            return Core::$DB->lastInsertId();
        }

  }
  class Controller {

  }
  class View {

  }
?>