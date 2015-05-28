<div class="editTop">
        <h2 class="editionTitle" iditem="<?php echo $response['user']['id']; ?>">Edition - <?php echo $response['user']['prenom'].' '.$response['user']['nom']; ?></h2>
        <a href="#" class="editClose">Fermer</a>
        <div class="clear"></div>
</div>

<p class="dateInscription" id="usersDateInscription"></p>
<form class="formUsers" name="formUsers">
    <input type="text" name="prenom" class="formDouble" placeholder="Prénom" id="usersPrenom" value="<?php echo $response['user']['prenom'];?>">
    <input type="text" name="nom" class="formDouble" placeholder="Nom" id="usersNom" value="<?php echo $response['user']['nom'];?>">
    <div class="clear"></div>
    <input type="email" name="email" class="formSimple" placeholder="Email" id="usersEmail" value="<?php echo $response['user']['email'];?>">
    <input type="text" name="adresse" class="formSimple formAdress" placeholder="Adresse" id="usersAdresse" value="<?php echo $response['user']['adresse'];?>">
    <input type="number" name="code_postal" class="formCodePostal" min="0" max="99999" placeholder="Code Postal" id="usersCodePostal" value="<?php echo $response['user']['code_postal'];?>">
    <input type="text" name="ville" class="formVille" placeholder="Ville" id="usersVille" value="<?php echo $response['user']['ville'];?>">
    <input type="button" class="buttonForm" value="Mettre à jour" style="margin-right: 20px;" id="updateUser">
    <input type="button" class="buttonForm" value="Générer mot de passe">
</form>
<p id="resultsUsers" style="margin: 20px;"></p>

<h3 class="editionMiniTitle">Dernières sessions</h3>