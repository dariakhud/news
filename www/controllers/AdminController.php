<?php

class AdminController {
    
    public function actionInsert() {
        
        if (!empty($_POST)) {

            $data = [];

            if (!empty($_POST['title'])) {
                $data['title'] = $_POST['title'];
            }

            if (!empty($_POST['date'])) {
                $data['date'] = $_POST['date'];
            }
            if (!empty($_POST['text'])) {
                $data['text'] = $_POST['text'];
            }

            if (isset($data['title']) && isset($data['date']) &&    isset($data['text'])) {
                $news = new News;
                $news->data['title'] = $data['title'];
                $news->data['date'] = $data['date'];
                $news->data['text'] = $data['text'];
                $news->insert();
                header('Location: /index.php');
            }

        }
    
    }
    
}