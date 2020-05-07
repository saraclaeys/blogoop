<?php


class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function  find_this_query($sql){
        global $database;
        $result = $database->query($sql);
        return $result;
    }

    public static function  find_all_users(){
        return self::find_this_query("SELECT * FROM user");
    }

    public static function find_user_by_id($user_id){
        $result = self::find_this_query("SELECT * FROM user WHERE id = $user_id");
        $user_found = mysqli_fetch_array($result);
        return $user_found;
    }

}