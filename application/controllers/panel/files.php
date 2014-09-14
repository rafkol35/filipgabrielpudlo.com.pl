<?php
class Files extends MY_Controller {

    public static $photoPath = './resources/images/photo/';
    
    function __construct() {
        parent::__construct();
    }

    function index() {
        //$this->load->model('MFoty','MFoty',TRUE);

        $data['title'] = 'Pliki';
        $data['mi'] = 'files';
        $data['styles'] = array('default.css');
        $data['jscripts'] = array('swfupload/swfupload.js','handlers.js');
        $data['innerJSs'] = array('panel/files.php');

        $this->load->view('panel/header',$data);
        $this->load->view('panel/files/index');
        $this->load->view('panel/footer');
    }

    function upload($categoryID) {
        
        $fileName = $_FILES["Filedata"]["name"];
        //$file_name = $fileName;
        $fileName = substr($fileName, 0, strlen($fileName)-4);


        $MAX_FILENAME_LENGTH = 260;
        $valid_chars_regex = '.A-Z0-9_!@#$%^&()+={}\[\]\',~`-';
        //$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
	$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", $fileName);
	if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
		HandleError("Invalid file name");
		exit(0);
	}

        //$fn = substr($fileName, 0, strlen($fileName)-4);

        if( is_file(self::$photoPath.'normal/'.$file_name) ){
            echo $file_name;
            return;
        }

        if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
		exit(0);
	}

	//move_uploaded_file($_FILES["Filedata"]["tmp_name"], "./files/images/gallery/" . $fn);
        move_uploaded_file($_FILES["Filedata"]["tmp_name"], self::$photoPath."normal/" . $file_name);

        
        ////////////////////////////////////////
        //MINIATURA DO PANELU
        ////////////////////////////////////////
        // Get the image and create a thumbnail
	$img = imagecreatefromjpeg(self::$photoPath.'normal/'.$file_name);
	if (!$img){exit(0);}

	$width = imageSX($img);
	$height = imageSY($img);

	if (!$width || !$height){exit(0);}

	// Build the thumbnail
	$target_width = 40;
	$target_height = 40;
	$target_ratio = $target_width / $target_height;

	$img_ratio = $width / $height;

	if ($target_ratio > $img_ratio) {
		$new_height = $target_height;
		$new_width = $img_ratio * $target_height;
	} else {
		$new_height = $target_width / $img_ratio;
		$new_width = $target_width;
	}

	if ($new_height > $target_height) {
		$new_height = $target_height;
	}
	if ($new_width > $target_width) {
		$new_height = $target_width;
	}

	$new_img = ImageCreateTrueColor(40, 40);
	if (!@imagefilledrectangle($new_img, 0, 0, $target_width-1, $target_height-1, 0)) {	// Fill the image black
		exit(0);
	}

	if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height)) {
		exit(0);
	}

	imagejpeg($new_img,self::$photoPath.'mini/'.$file_name,100);

/*
        ////////////////////////////////////////
        //MINIATURA NA STRONE
        ////////////////////////////////////////
        // Get the image and create a thumbnail
	$img = imagecreatefromjpeg('./files/images/works/'.$file_name);
	if (!$img){exit(0);}

	$width = imageSX($img);
	$height = imageSY($img);

	if (!$width || !$height){exit(0);}

	// Build the thumbnail
	$target_width = 100;
	$target_height = 100;
	$target_ratio = $target_width / $target_height;

	$img_ratio = $width / $height;

	if ($target_ratio > $img_ratio) {
		$new_height = $target_height;
		$new_width = $img_ratio * $target_height;
	} else {
		$new_height = $target_width / $img_ratio;
		$new_width = $target_width;
	}

	if ($new_height > $target_height) {
		$new_height = $target_height;
	}
	if ($new_width > $target_width) {
		$new_height = $target_width;
	}

	$new_img = ImageCreateTrueColor(100, 100);
        $background = imagecolorallocate($new_img, 204, 204, 204);
	if (!@imagefilledrectangle($new_img, 0, 0, $target_width-1, $target_height-1, $background)) {
		exit(0);
	}

	if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height)) {
		exit(0);
	}
	imagejpeg($new_img,'./files/images/minis/'.$file_name,100);
*/
        /////////////////////////////////////////////////////////////////////////////////////////
        $this->load->model('MFiles','MFiles',TRUE);
        $this->MFiles->add($file_name,$categoryID);
        
    }

    function del(){
        $this->load->model('MFiles','MFiles',TRUE);
        $this->load->model('MPhotos','MPhotos',TRUE);

        $delFile = $this->MFiles->get($_POST['id']);

        //echo $_POST['id'];
        //return ;

        //$this->MPhotos->resetAll($delFile->id);

        if ( $_POST['delPhotos'] ){
            $this->load->model('MPhotos','MPhotos',TRUE);
            $this->MPhotos->delAll($delFile->id);
        }else{
            $this->load->model('MPhotos','MPhotos',TRUE);
            $this->MPhotos->resetAll($delFile->id);
        }

        if ( is_file(self::$photoPath.'normal/'.$delFile->file) ){
            unlink(self::$photoPath.'normal/'.$delFile->file);
        }
        if ( is_file(self::$photoPath.'mini/'.$delFile->file) ){
            unlink(self::$photoPath.'mini/'.$delFile->file);
        }
        //if ( is_file('./files/images/minis/'.$delFile->file) ){
          //  unlink('./files/images/minis/'.$delFile->file);
        //}

        $this->MFiles->del($delFile->id);
    }

    function setSortType($type,$order){
        $this->load->model('MSettings','MSettings',TRUE);
        $this->MSettings->set('sort_type',$type);
        $this->MSettings->set('sort_order',$order);
    }

    function toHtml($searchStr=''){
        $this->load->model('MFiles','MFiles',TRUE);
        $this->load->model('MSettings','MSettings',TRUE);

//        $this->load->model('MCategories','MCategories',TRUE);
//        $cts = $this->MCategories->getShowedFilesID();

//        if ( !count($cts) )
//        {
//            echo 'Nie wybrana żadna z kategorii';
//            return;
//        }

//        $data['files'] = $this->MFiles->getAllWithCts($cts,$this->MSettings->get('sort_type'),$this->MSettings->get('sort_order'));
        $data['files'] = $this->MFiles->getAllWithStr($_POST['ss'],$this->MSettings->get('sort_type'),$this->MSettings->get('sort_order'));

        //$ff = $this->MFiles->getEmptyFileID();
        
        if ( count($data['files']) )
        {
            $this->load->view('panel/files/ajax/printFiles', $data);
        }
        else echo 'Nie ma plików spełniających warunki wyszukiwania';
    }
    
    function getGfxList(){
        header('Content-type: text/javascript; charset: UTF-8');
        echo "var tinyMCEImageList = new Array(\n";
        $dir = new DirectoryIterator('./files/images/works/');
        //$dirsize = count($dir);
        //echo $dirsiz;
        $ft = 1;
        foreach ($dir as $fileinfo)
        {
            if (!$fileinfo->isDot() && $fileinfo->isFile()) {
                if ( !$ft ) echo ",\n";
                echo '["' . $fileinfo->getFilename() . '","'.base_url().'files/images/works/'.$fileinfo->getFilename() . '"]';
                $ft = 0;
            }
        }
        echo ');';
    }
}

?>
