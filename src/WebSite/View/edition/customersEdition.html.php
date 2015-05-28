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

<div class="currentAbo">
    
</div>
<h3 class="editionMiniTitle">Dernières sessions</h3>

<script type="text/javascript">
    $('#usersPrenom').change(function(){
        var e = $(this);
        var val = e.val();
        if (val.length < 2) {
            e.removeClass('inputGreen');
            e.addClass('inputRed');
        } else {
            e.removeClass('inputRed');
            e.addClass('inputGreen');
        }
    });
    $('#usersNom').change(function(){
        var e = $(this);
        var val = e.val();
        if (val.length < 2) {
            e.removeClass('inputGreen');
            e.addClass('inputRed');
        } else {
            e.removeClass('inputRed');
            e.addClass('inputGreen');
        }
    });
    $('#usersEmail').change(function(){
        var e = $(this);
        var val = e.val();
        var r = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if (r.test(val)) {
            e.removeClass('inputRed');
            e.addClass('inputGreen');
        } else {
            e.removeClass('inputGreen');
            e.addClass('inputRed');
        }
    });

    $('#usersAdresse').change(function(){
        var e = $(this);
        var val = e.val();
        if (val.length < 10) {
            e.removeClass('inputGreen');
            e.addClass('inputRed');
        } else {
            e.removeClass('inputRed');
            e.addClass('inputGreen');
        }
    });

    $('#usersVille').change(function(){
        var e = $(this);
        var val = e.val();
        if (val.length < 2) {
            e.removeClass('inputGreen');
            e.addClass('inputRed');
        } else {
            e.removeClass('inputRed');
            e.addClass('inputGreen');
        }
    });

    $('#usersCodePostal').change(function(){
        var e = $(this);
        var val = e.val();
        if ($.isNumeric(val)) {
            e.removeClass('inputRed');
            e.addClass('inputGreen');
        } else {
            e.removeClass('inputGreen');
            e.addClass('inputRed');
        }
    });

</script>