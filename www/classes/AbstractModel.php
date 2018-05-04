<?php

abstract class AbstractModel implements IModel {
    
    protected static $table; // указывает, в какой таблице лежат данные модели (инкапсуляция сведения о базе данных)
 
    public $data = [];
    
    public function __set($key, $val) {
        $this->data[$key] = $val;
    }
    
    public function __get($key) {
        return $this->data[$key];
    }
    
    public function __isset($key) {
        return isset($this->data[$key]);
    }
    
    public static function getAll() {
        
        $class = get_called_class(); // получим имя класса, который будет использовать этот код
        $db = new Database();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql);
        
    }
    
    public static function getOne($id) {
        
        $class = get_called_class();
        $db = new Database();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        return $db->query($sql, [':id' => $id])[0];
        
    }
    
    public static function getOneByColumn($column, $value) {
        
        $class = get_called_class();
        $db = new Database();
        $db->setClassName($class);
        
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
        $res = $db->query($sql, [':value' => $value]);
        if (!empty($res)) {
            return $res[0];    
        }
        return false;
        
    }
    
    protected function insert() {

        $db = new Database();
        $cols = array_keys($this->data); //список всех ключей массива
        
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }
        
        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') 
            VALUES (' . implode(', ', array_keys($data)) . ')';
            
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();

    }
    
    protected function update() {
        
        $cols = [];
        $data = [];
        foreach ($this->data as $key => $val) {
            $data[':' . $key] = $val;
            if ('id' == $key) {
                continue;
            }
            $cols[] = $key . '=:' . $key;
        }
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';
        $db->execute($sql, $data);
        
    }
    
    public function save() {
        
        if (!isset($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
    
    public function delete() {
        
        $db = new Database();
        $sql = 'DELETE FROM' . static::table . ' WHERE id=:id';
        $db->execute($sql, [':id' => $this->id]);
        
    }
    
}