<?php
class MFilms extends MY_Model{

     function __construct() {
        parent::__construct();
        $this->TABLE = 'films';
    }        
    
    function update(){
        $files = get_dir_file_info('./resources/', TRUE);      
        
        $numberOfNewFiles = 0;
        foreach( $files as $file ){
           $filePath = $file['relative_path'].$file['name'];
           
           if( !is_file($filePath) ) continue;
           
           $fileinfo = pathinfo($filePath);
           
           if( $fileinfo['extension'] !== 'mp4') continue;
           
           if( !$this->has('file',$file['name']) ){
               $this->add(array('file'=>$file['name']));
               $numberOfNewFiles++;
           }
        }
        
        return $numberOfNewFiles;
    }
}

