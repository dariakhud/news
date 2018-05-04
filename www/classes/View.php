<?php

class View implements Iterator{
    
    protected $data = [];
    
    /*public function assign($name, $value){
    
        $this->data[$name] = $value;
        
    }*/
    
    public function render($template) {
        
        // хотим заменить $this->data['NewsList'] на $NewsList, чтобы в использовать в шаблоне
        foreach ($this->data as $key => $val) {
            $$key = $val; // $$ - переменная с именем, которое содержится в переменной
        }
        
        ob_start();
            
        include __DIR__ . '/../views/' . $template;
        
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
        
    }
    
    public function display($template) {
        
        echo $this->render($template);    
        
    }
    
    public function __set($key, $val) {
        
        $this->data[$key] = $val;    
        
    }
    
    public function __get($key) {
        
        return $this->data[$key];    
        
    }
    
    public function current() {
    }
    
    public function next() {
    }
    
    public function key() {
    }
    
    public function rewind() {
    }
    
    public function valid() {
    }
    
}