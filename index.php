<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

include_once('ManagerMessages.php');
include_once('Messages.php');


$messages = new Messages;
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$manager = new ManagerMessages($bdd);
    
$manager->add($messages);
$messages = $manager->getList('');


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
          <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
           <style type="text/css">
                [class*="col"] { margin-bottom: 20px; }
                     
        </style>
        <title>Mini-chat</title>
    </head>
    <body>
        <div class="container-fluid">
            <header class="row">

                        <h3 class="col-lg-offset-4 col-lg-6">BIENVENUE SUR LE MINICHAT</h3>
            </header>

            <section class="row">

                <div class="col-lg-12">
                   <?php  
                     
                                foreach ($messages as $message)
                            {
                                         echo '<p> [ Le ' . $message->getDateMessage('') . ']  <strong>' .    $message->getPseudo('') . '</strong> : ' . $message->getMessage('') . '</p>';
                                       
                            }
                    ?>

                </div>

            </section>

            <div class="row" >

                 <form class="col-lg-12" action="index.php" method="post">

                            <div class="form-group">

                                <div class="col-lg-4"><input class="form-control" placeholder="Pseudo" type="text" name="pseudo" id="pseudo" value="<?php echo $_COOKIE['pseudo']; ?>" /> </div>

                                 <div class="col-lg-4"><input class="form-control" placeholder="Message" type="text" name="message" id="message" /></div>

                                 <div class="col-lg-4"><input type="submit" value="Envoyer" class="btn btn-success" class="valider" /></div>
                            </div>
                </form>

            </div>
                
        </div>


            <footer class="row">
            <a class="col-lg-offset-5 col-lg-3" href="index.php"><button type="button" class="btn btn-success" >Rafraichir</button></a>
                </footer>
    </div>
    </body>
</html>