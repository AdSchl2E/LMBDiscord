<?php 
session_start();                                                            //On lance une session
if (isset($_SESSION['pseudo'])){                                            //On vérifie si la personne connecté à cette page à été authentifié
$pseudo = $_SESSION['pseudo'];                                                  //Si c'est le cas, on le laisse accéder à la page
}else{
    header('location: index.php');                                        //Sinon, on le renvoie à la page de connexion
    exit();
}
?>
<!-- Début du document HTML -->
<!DOCTYPE html>

<html>

    <head>
        <!-- Début de la balise head -->
        <meta charset="UTF-8">
        <title>LMBDiscord</title>
        <link href="style-test.css" rel="stylesheet" media="all" type="text/css">
        <link rel="icon" type="image/png" href="LMB Discord.png" />
        <script src="script_minichat.js"></script>
        <!-- Fin de la balise head-->
    </head>

    <body>
        <!--Début de la balise body-->
        <div id="Utilisateur">
        <!-- Menu où l'on verra les différents utilisateurs -->
            <div class="Entete_Utilisateur">
                Utilisateurs : 
            </div>
                <?php
                    try{                                                                    //Récupération de la base de donnée
                        $bdd = new PDO('mysql:host=localhost;dbname=id12643444_lmbchat', 'id12643444_lmbchat', 'ericopter67');
                    }catch (Exception $e){
                        die('Erreur : ' . $e->getMessage());
                    }
                    $reponse = $bdd->query('SELECT pseudo FROM membres ORDER BY ID ASC');   //Récupération des pseudos de tous les utilisateurs
                    while ($donnees = $reponse->fetch())                                    //Tant qu'il y a des pseudos à récupérer
                    {
                ?>
                    <?php $pseudo_utilisateurs=htmlspecialchars($donnees['pseudo'])?>      
                    <p class="Utilisateur_Select">
                        <?php 
                           echo'<img  class="UtilisateurImg" src="Image_Utilisateur\\'.strtoupper($pseudo_utilisateurs[0]).'.jpg">';    /*On affiche les images de profil qui correspondent à la première lettre du pseudo*/
                        ?>                                                                                                 
                        <a class="lien">
                            <?php 
                                echo htmlspecialchars($donnees['pseudo']) ;                     //On affiche les pseudos 1 par 1 
                            ?>
                        </a>
                    </p>
                <?php
                    }
                    $reponse->closeCursor();
                ?>
        <!-- Fin du menu des utilisateurs -->
        </div>
        
        <div id="Chat">
        <!-- Début du bloc de Chat -->            
                <?php

                    $reponse = $bdd->query('SELECT pseudo,message FROM minichat ORDER BY ID ASC');  //Récupération des pseudos et de leurs messages associés
                    while ($donnees = $reponse->fetch())                                            //Tant qu'il y a des pseudos et des messages à récupérer
                        {
                ?>      
                        <div id="BlockMessage">                                                     
                            <span style="color:orange;">
                                <?php 
                                    echo htmlspecialchars($donnees['pseudo']) ;                       //On affiche les pseudos 1 par 1 
                                ?>                           
                            </span>  :  
                                <?php 
                                    echo htmlspecialchars($donnees['message']) ;                      //Et leurs messages associés 1 par 1 
                                ?> 
                            <br/>
                        </div>
                <?php
                        }
                        $reponse->closeCursor();
                ?>           
        <!-- Fin du bloc de Chat -->
        </div>

        <div id="Param-Utilisateur">
        <!-- Début du bloc on l'on verra des informations sur notre comptes -->
            <div class="Nom_Utilisateur border">
            <!-- Pseudo + image de profil (correspondant à la première lettre de votre pseudo) -->
                <div>
                <!-- Image de profil -->
                    <?php echo'<img  class="ImgProfil" src="Image_Utilisateur\\'.strtoupper($pseudo[0]).'.jpg">';?>
                </div>
                <div style="color:#EAEAEA;padding-bottom: 5px;">
                <!-- Pseudo -->
                    <?php if (isset($pseudo)){echo $pseudo;}else{echo '...';}?>
                </div>
            </div>
            <div>
            <!-- Bouton redirigeant vers une page de déconnexion -->
                <input class="Deconnect" type="submit" value="Se déconecter" onclick="window.location = 'Deconnect.php'">
            </div>
        <!-- Fin du bloc d'informations sur notre compte --> 
        </div>

        <div id="Zone_Texte">
        <!-- Début du bloc dans lequel on entrera notre message à envoyer -->
            <form action="minichat_post.php" method="post">
            <!-- Formulaire recevant le message à envoyer -->
                <input id="Message" class="Message" type="text" name="message" style="border-radius:5px;"placeholder="Message" onclick="pressEnter();" required/>
 
                <input type="submit" value="Envoyer" class="Envoyer_Message" style="border-radius:5px;"/>
 
            </form>
        <!-- Fin du bloc message -->
        </div>
    <!-- Fin de la balise body -->
    </body>
</html>
<!-- Fin du document html -->