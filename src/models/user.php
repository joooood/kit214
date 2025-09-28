<?php
class User
{
    private $id;
    private $username;
    private $password;
    private $favourite_movies;
    private $thesaurus;

    public function __construct($id, $username, $password, $favourite_movies, $thesaurus)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->favourite_movies = $favourite_movies;
        $this->thesaurus = $thesaurus;
    }
}
?>