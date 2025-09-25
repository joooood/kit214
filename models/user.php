<?php
class User
{
    private $id;
    private $email;
    private $password;
    private $descriptor;

    public function __construct($id, $email, $password, $descriptor)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->descriptor = $descriptor;
    }
}
?>