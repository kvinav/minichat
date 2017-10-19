<?php

class ManagerMessages
{

  private $bdd; // Instance de PDO.


  public function __construct($bdd)
  {
    $this->setBdd($bdd);
  }



  public function add(Messages $messages)
  {
    $req = $this->bdd->prepare('INSERT INTO minichat (pseudo, message, date_message) VALUES(:pseudo, :message, NOW())');

    $req->bindValue(':pseudo', $messages->getPseudo(''), PDO::PARAM_INT);
    $req->bindValue(':message', $messages->getMessage(''), PDO::PARAM_INT);
    $req->execute();
  }


  public function get($id)
  {
    $req = $this->bdd->query('SELECT pseudo, message, date_message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
    $donnees = $req->fetch(PDO::FETCH_ASSOC);

    //Execution requète
    $req->execute();
  }

  public function getList()
  {
     $messages = [];

    $req = $this->bdd->query('SELECT pseudo, message, date_message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

    while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
    {
      $messages[] = new Messages($donnees);
    }

    return $messages;
  }

 
  public function setBdd(PDO $bdd)
  {
    $this->bdd = $bdd;
  }
}