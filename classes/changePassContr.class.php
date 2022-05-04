<?php
class NewPassContr
{
    private $id;
    private $oldPass;
    private $newPass;
    private $newPassRepeated;
    public function __construct($id, $old, $new, $repeat)
    {
        $this->id = $id;
        $oldPass = $old;
        $newPass = $new;
        $newPassRepeated = $repeat;
    }
    private function emptyInput(){
        if(empty($this->id)) || // TODO create the rest of empty verifications;
    }
}
