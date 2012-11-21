<?php
class editAction extends sfAction{

  public function execute($request){
    $news_id = $request->getParameter('id');
    $this->news = Doctrine_Core::getTable('News')->find($news_id);
    $this->form = new NewsForm($this->news);
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('news'));
      if($this->form->isValid()){
        $post = $request->getParameter('news');
        $news = Doctrine_Core::getTable('News')->find($news_id);
        $news->setTitle($post['title']);
        $news->setPostDate(date('Y-m-d m:i',strtotime($post['post_date'])));
        $news->setContent($post['content']);
        $news->save();
        $news_id = $news->getId();
        
        $file = $this->request->getFiles();
        $file = $file['news']['photo'];
        if($file['name']){
          $this->uploadPhoto($news_id,$file);
        }
        
        return $this->redirect('/AdmSys.php/news');
      }
    }
  }
  
  private function uploadPhoto($id,$file){
    $full = sfConfig::get('app_news_full');
    $small = sfConfig::get('app_news_small');
    $dir = sfConfig::get('app_news_dir');
    
    //saving & cropping picture
    $image_full = encode('news-'.$id).'.jpg';
    $image_small = encode('news-'.$id).'_thumb.jpg';
    $image_full_path = $dir.$image_full;
    $image_small_path = $dir.$image_small;
    rename($file['tmp_name'],$image_full_path);
    
    //cropping image_full
    $image = new myImageManipulator($image_full_path);
    $image->resample2($full, $full);
    $image->crop(0, 0, $full, $full);
    $image->save($image_full_path);
    
    //cropping image_small
    $image = new myImageManipulator($image_full_path);
    $image->resample2($small, $small);
    $image->crop(0, 0, $small, $small);
    $image->save($image_small_path);
    
    //update
    $class = Doctrine_Core::getTable('News')->find($id);
    $class->setImageFull($image_full);
    $class->setImageSmall($image_small);
    $class->save();
}
  
}