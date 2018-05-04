<?php

class NewsController {
    
    public function actionAll() {
        
        $NewsList = News::getAll();
        $view = new View();
        
        //$view->assign('NewsList', $NewsList);
        $view->NewsList = $NewsList;
        
        $view->display('news/all.php');
        
    }
    
    public function actionOne() {
        
        $id = $_GET['id'];
        $news = News::getOne($id);
        $view = new View();
        
        //$view->assign('News', $news);
        $view->News = $news;
        
        $view->display('news/one.php');
        
    }
    
}