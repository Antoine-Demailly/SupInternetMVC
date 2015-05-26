<p class="dateInscription" id="usersDateInscription"></p>
<form class="formUsers" name="formUsers">
    <input type="text" name="prenom" class="formDouble" placeholder="Prénom" id="usersPrenom">
    <input type="text" name="nom" class="formDouble" placeholder="Nom" id="usersNom">
    <div class="clear"></div>
    <input type="email" name="email" class="formSimple" placeholder="Email" id="usersEmail">
    <input type="text" name="adresse" class="formSimple formAdress" placeholder="Adresse" id="usersAdresse">
    <input type="number" name="code_postal" class="formCodePostal" min="0" max="99999" placeholder="Code Postal" id="usersCodePostal">
    <input type="text" name="ville" class="formVille" placeholder="Ville" id="usersVille">
    <input type="button" class="buttonForm" value="Mettre à jour" style="margin-right: 20px;" id="updateUser">
    <input type="button" class="buttonForm" value="Générer mot de passe">
</form>
<p id="resultsUsers" style="margin: 20px;"></p>

<h3 class="editionMiniTitle">Dernières sessions</h3>