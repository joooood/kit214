<?php
class User
{
    private $id;
    private $email;
    private $password;
    private $favourite_movies;
    private $thesaurus;

    public function __construct($id, $email, $password, $favourite_movies, $thesaurus)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->favourite_movies = $favourite_movies;
        $this->thesaurus = $thesaurus;
    }
}
?>