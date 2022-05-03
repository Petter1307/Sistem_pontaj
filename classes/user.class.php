<?php
class User extends Dbh
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $user_type;
    private $id_card;
    private $creation_time;

    public function __construct($id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM user where id=?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            $this->id = 0;
            $this->first_name = null;
            $this->last_name = null;
            $this->email = null;
            $this->user_type = 'student';
            $this->id_card = 0;
            $this->creation_time = null;
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $this->id = 0;
            $this->first_name = null;
            $this->last_name = null;
            $this->email = null;
            $this->user_type = 'student';
            $this->id_card = 0;
            $this->creation_time = null;
            exit();
        }
        $tmp_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->id = $tmp_user[0]['id'];
        $this->first_name = $tmp_user[0]['first_name'];
        $this->last_name = $tmp_user[0]['last_name'];
        $this->email = $tmp_user[0]['email'];
        $this->user_type = $tmp_user[0]['user_type'];
        $this->id_card = $tmp_user[0]['id_card'];
        $this->creation_time = $tmp_user[0]['user_creation_time'];
        $stmt = null;
    }

    public function getUserId()
    {
        return $this->id;
    }
    public function getUserFirst()
    {
        return $this->first_name;
    }
    public function getUserLast()
    {
        return $this->last_name;
    }
    public function getUserEmail()
    {
        return $this->email;
    }
    public function getUserType()
    {
        return $this->user_type;
    }
    public function getUserIdCard()
    {
        return $this->id_card;
    }
    public function getUserCreationTime()
    {
        return $this->creation_time;
    }

}
