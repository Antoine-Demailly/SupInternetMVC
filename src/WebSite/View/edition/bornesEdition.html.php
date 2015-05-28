<div class="editTop">
        <h2 class="editionTitle"><?php echo $response['bornes']['localisation_name']; ?></h2>
        <a href="#" class="editClose">Fermer</a>
        <div class="clear"></div>
</div>

<form class="formUsers">
    <input type="button" class="buttonForm buttonFormRed" value="Verrouillage de la borne">
</form>

<h3 class="editionMiniTitle">Actuellement sur la borne (<?php echo count($response['scooters']);?>/10)</h3>

<div id="listScootersInBornes">
	<?php foreach ($response['scooters'] as $value): ?>
		<p style="margin: 20px;"><?php echo $value['numero'];?> - <span onclick="modeEdition(this);" editionmode="scooters" editionid="<?php echo $value['id'];?>" class="edition">VOIR</span></p>
	<?php endforeach ?>
</div>

<h3 class="editionMiniTitle">Localisation</h3>

<div id="map-canvas"></div>
<script type="text/javascript">
	initialize(<?php echo $response['bornes']['latitude']; ?>,<?php echo $response['bornes']['longitude']; ?>);
</script>