<?php
class User extends Login
{
    private $id;
    private $user_name;
    private $user_type;

    public function __construct($id, $name, $type)
    {
        $this->id = $id;
        $user_name = $name;
        $user_type = $type;
    }

    public function getUserData($id)
    {
        //TODO  Create views that gets all user information needed.
    }

}
