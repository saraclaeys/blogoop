<?php


class Photo extends Db_object
{

    protected static $db_table = "photo";
    protected static $db_table_fields = array('title', 'description', 'filename', 'type', 'size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = 'img';
    public $errors = array();
    public $upload_errors_array = array(
      UPLOAD_ERR_OK =>"There is no error",
        UPLOAD_ERR_INI_SIZE =>"The upload file exceeds the upload max_filesize from php.ini",
        UPLOAD_ERR_FORM_SIZE => "The upload file exeeds MAX_FILE_SIZE in php.ini for html form",
        UPLOAD_ERR_NO_FILE => "No file uploaded",
        UPLOAD_ERR_PARTIAL => "The file was partially uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write to disk",
        UPLOAD_ERR_EXTENSION => "A php extension stopped your upload"
    );

    public function set_file($file){
        if(empty($file) || !$file || is_array($file)){
            $this->errors[] = "No file uploaded";
            return false;
        } elseif ($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_path'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }
}