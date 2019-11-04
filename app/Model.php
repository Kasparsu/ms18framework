<?php


namespace App;


class Model
{
    public static $tableName;

    public static function all(){
        DI::$DB->getAll(static::getClassFields(), static::$tableName, static::class);
    }
    public static function getClassFields(){
        $vars = get_class_vars(static::class);
        $fields = array_keys($vars);
        foreach ($fields as $key=>$field){
            if($field == 'tableName'){
                unset($fields[$key]);
            }
        }
        return $fields;
    }
}