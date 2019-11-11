<?php


namespace App;


class Model
{
    public static $tableName;

    public static function all(){
        return DI::$DB->getAll(static::getClassFields(), static::$tableName, static::class);
    }
    public static function find($id){
        return DI::$DB->find(static::getClassFields(), static::$tableName, static::class, $id);
    }

    public function insert(){
        DI::$DB->insert(static::getClassFields(), static::$tableName, $this->getClassFieldsValues());
    }
    public function delete(){
        DI::$DB->delete(static::$tableName, $this->id);
    }

    public function update(){
        DI::$DB->update(static::$tableName, $this->id, $this->getClassFieldsValues());
    }

    public static function getClassFields(){
        $vars = get_class_vars(static::class);
        $fields = array_keys($vars);
        foreach ($fields as $key=>$field){
            if($field == 'tableName' || $field == 'id'){
                unset($fields[$key]);
            }
        }
        return $fields;
    }
    public function getClassFieldsValues(){
        $vars = get_object_vars($this);
        foreach ($vars as $key=>$field){
            if($key == 'id'){
                unset($vars[$key]);
            }
        }
        return $vars;
    }
}