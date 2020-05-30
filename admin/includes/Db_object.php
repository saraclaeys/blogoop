<?php


class Db_object
{

    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The upload file exceeds the upload max_filesize from php.ini",
        UPLOAD_ERR_FORM_SIZE => "The upload file exeeds MAX_FILE_SIZE in php.ini for html form",
        UPLOAD_ERR_NO_FILE => "No file uploaded",
        UPLOAD_ERR_PARTIAL => "The file was partially uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write to disk",
        UPLOAD_ERR_EXTENSION => "A php extension stopped your upload"
    );

    public static function find_all()
    {
        return static::find_this_query("SELECT * FROM " . static::$db_table);
    }

    public static function find_by_id($id)
    {
        $result = static::find_this_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
        /*if (!empty($result)) {
            return array_shift($result);
        } else {
            return false;
        }*/
        return !empty($result) ? array_shift($result) : false;
    }

    public static function find_this_query($sql)
    {
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result)) {
            $the_object_array[] = static::instantie($row);
        }
        return $the_object_array;
    }

    public static function instantie($result)
    {
        $calling_class = get_called_class();
        $the_object = new $calling_class();
        foreach ($result as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    private function has_the_attribute($the_attribute)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create(){
        global $database;
        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . static::$db_table . " (" . implode(",", array_keys($properties)) . ")";
        $sql .= " VALUES ('". implode("','", array_values($properties)) . "')";
        //testing
        // var_dump($sql);

        if ($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }

        $database->query($sql);
    }

    public function update(){
        global $database;
        $properties = $this->clean_properties();
        $properties_assoc = array();

        foreach ($properties as $key => $value){
            $properties_assoc[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_assoc);
        $sql .= "WHERE id = " . $database->escape_string($this->id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function delete(){
        global  $database;
        $sql = "DELETE FROM " . static::$db_table;
        $sql .= " WHERE id= " . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return(mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    protected function  properties(){
//        return get_object_vars($this);
        $properties = array();
        foreach (static::$db_table_fields as $db_field){
            if (property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    protected function clean_properties(){
        global $database;
        $clean_properties = array();
        foreach ($this->properties() as $key => $value){
            $clean_properties[$key] = $database->escape_string(($value));
        }
        return $clean_properties;
    }

    public static function count_all(){
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }

}