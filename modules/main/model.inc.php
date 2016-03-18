<?php
class Main_Model extends Model
{
    public static function GetTovar()
    {
        return self::GetAllRecords('tovar');
    }
}