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

    private function has_the_attribute($the_attribute){
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
        if (!empty($result)) {
            return array_shift($result);
        } else {
            return false;
        }

    }

}