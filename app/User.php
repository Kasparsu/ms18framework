<?php


namespace App;


class User extends Model
{
    public static $tableName = 'users';
    public $id;
    public $email;
    public $password;
    public $name;
}