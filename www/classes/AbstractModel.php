<?php

abstract class AbstractModel implements IModel {
    
    static protected $table; // указывает, в какой таблице лежат данные модели (инкапсуляция сведения о базе данных)
 
    protected static $table;
    protected static $class;
    
    public static function getTable() {
        return static::$table;
    }
    
    public static function getAll() {
        $db = new Database();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->queryAll($sql, static::$class);
    }
    
    public static function getOne($id) {
        $db = new Database();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=' . $id;
        return $db->queryOne($sql, static::$class);
    }
    
    public static function insert($data) {

        $db = new Database();
        $sql = 'INSERT INTO ' . static::$table . ' (title, date, text) 
            VALUES (' . $data['title'] . ', ' . date('Y-m-d', strtotime($data['date'])) . ', ' . $data['text'] . ')';
        //echo $sql;die;
        return $db->insert($sql);

    }
    
    
}