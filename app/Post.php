<?php
namespace App;

class Post extends Model {
    public static $tableName = 'posts';
    /**
     * @var integer $id
     */
    public $id;
    /**
     * @var string $body
     */
    public $body;
    /**
     * @var string $title
     */
    public $title;

}