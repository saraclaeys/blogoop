<?php


class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function instantie($result)
    {
        $the_object = new self();
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

    public static function find_this_query($sql)
    {
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result)) {
            $the_object_array[] = self::instantie($row);
        }
        return $the_object_array;
    }

    public static function find_all_users()
    {
        return self::find_this_query("SELECT * FROM user");
    }

    public static function find_user_by_id($user_id)
    {
        $result = self::find_this_query("SELECT * FROM user WHERE id = $user_id");
        /*if (!empty($result)) {
            return array_shift($result);
        } else {
            return false;
        }*/
        return !empty($result) ? array_shift($result) : false;
    }

    public static function verify_user($user, $pass){
        global $database;
        $username = $database->escape_string($user);
        $password = $database->escape_string($pass);

        $sql = "SELECT * FROM user WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public function create(){
        global $database;

        $sql = "INSERT INTO user (username, password, first_name, last_name)";
        $sql .= " VALUES ('";
        $sql .= $database->escape_string($this->username) . "', '";
        $sql .= $database->escape_string($this->password) . "', '";
        $sql .= $database->escape_string($this->first_name) . "', '";
        $sql .= $database->escape_string($this->last_name) . "')";

        if ($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }

        $database->query($sql);
    }

    public function  update(){
        global $database;

        $sql = "UPDATE user SET ";
        $sql .= "username= '" . $database->escape_string($this->username) . "', ";
        $sql .= "username= '" . $database->escape_string($this->password) . "', ";
        $sql .= "first_name= '" . $database->escape_string($this->first_name) . "', ";
        $sql .= "last_name= '" . $database->escape_string($this->last_name) . "', ";
        $sql .= "WHERE id = " . $database->escape_string($this->id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
}