<?php

class Messages
{

	private $id;
	private $date_message;
	private $pseudo;
	private $message;


   public function __construct($valeurs = [])
  {
    if (!empty($valeurs)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
    {
      $this->hydrate($valeurs);
    }
  }
  
  
  public function hydrate($donnees)
  {
    foreach ($donnees as $attribut => $valeur)
    {
      $methode = 'set'.ucfirst($attribut);
      
      if (is_callable([$this, $methode]))
      {
        $this->$methode($valeur);
      }
    }

   }
	//récupération id
	public function setId($id)
	{
		

		$id = (int) $id;

			if ($id > 0)
			{

				$this->id = $id;

			}
	}

	public function getId()
	{
		return $this->id;

	}
	//récupération date_message
	public function setDatemessage($date_message)
	{
		
		$this->date_message = $date_message;
		
	}

	public function getDatemessage()
	{
		return $this->$date_message;

	}

	//récupération pseudo
	public function setPseudo($pseudo)
	{
		
		if (is_string($pseudo))
		{
		$this->pseudo = $pseudo;
		}

	}

	public function getPseudo()
	{
		return $this->pseudo;

	}

	//récupérer message
	public function setMessage($message)
	{
		if (is_string($message))
		{
		$this->message = $message;
		}
	}

	public function getMessage()
	{
		return $this->message;

	}
}