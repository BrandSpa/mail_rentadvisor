<?php 


class Companies 
{   
    private $dbh;

    function __construct(){
        $this->dbh = new PDO('mysql:host=localhost;dbname=rentadvisor_loyalty', 'root', '');
    }

    function get(){
        $sth = $this->dbh->prepare("select * from companies");
        $sth->execute();
        return $sth->fetchAll();
    }
    
}
