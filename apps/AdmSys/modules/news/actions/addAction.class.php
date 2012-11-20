<?php
class addAction extends sfAction{

  public function execute($request){
    $this->form = new NewsForm();
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('news'));
      if($this->form->isValid()){
        $post = $request->getParameter('news');
        $news = new News();
        $news->setTitle($post['title']);
        $news->setPostDate(date('Y-m-d m:i',strtotime($post['post_date'])));
        $news->setContent($post['content']);
        $news->save();
        
        return $this->redirect('/AdmSys.php/news');
      }
    }
  }
  
}