<?php


class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function instantie($result){
        $the_object = new self();
        $the_object->id = $result['id'];
        $the_object->username = $result['username'];
        $the_object->password = $result['password'];
        $the_object->first_name = $result['first_name'];
        $the_object->last_name = $result['last_name'];
        return $the_object;
    }

    public static function  find_this_query($sql){
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result)){
            $the_object_array[] = self::instantie($row);
        }
        return $the_object_array;
    }

    public static function  find_all_users(){
        return self::find_this_query("SELECT * FROM user");
    }

    public static function find_user_by_id($user_id){
        $result = self::find_this_query("SELECT * FROM user WHERE id = $user_id");
        if (!empty($result)){
            return array_shift($result);
        } else {
            return false;
        }

    }

}