<?php


class User
{
    public static function  find_all_users(){
        global $database;
        $result = $database->query("SELECT * FROM user");
        return $result;
    }

    public static function find_user_by_id($user_id){
        global $database;
        $result = $database->query("SELECT * FROM user WHERE id = $user_id");
        $user_found = mysqli_fetch_array($result);
        return $user_found;
    }

}