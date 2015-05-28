<div class="editTop">
        <h2 class="editionTitle">Edition - <?php echo $response['scooters']['numero']; ?></h2>
        <a href="#" class="editClose">Fermer</a>
        <div class="clear"></div>
</div>

<p class="dateInscription" id="usersDateInscription"></p>
<form class="formUsers">
    <input type="button" class="buttonForm" value="Mettre en réparation" style="margin-right: 20px;">
    <input type="button" class="buttonForm buttonFormRed" value="Mise Hors Service">
</form>
<h3 class="editionMiniTitle">Emplacement actuel</h3>
<div id="map-canvas"></div>
<script type="text/javascript">
	initialize(<?php echo $response['bornes']['latitude']; ?>,<?php echo $response['bornes']['longitude']; ?>);
</script>