<?php
	require_once __DIR__.'/commonsAdmin.html.php';

	if (isset($_SESSION['flashBag'])) {
        echo '<div class="flashbag">';
        foreach ($_SESSION['flashBag'] as $type => $flash) {
            foreach ($flash as $key => $message) {
                echo '<div class="'.$type.'" role="'.$type.'" >'.$message.'</div>';
                // une fois affiché le message doit être supprimé
                unset($_SESSION['flashBag'][$type][$key]);
            }
        }
        echo '</div>';
    }

?>


<div class="main-content">

    <div class="left">
        <header>
            <a href="?p=dashboard">Trotti'Admin</a>
        </header>
        <nav>
            <ul>
                <li><a href="<?php echo $router->generateUrl('dashboard')?>" class="nav-link">Synthèse</a></li>
                <li><a href="<?php echo $router->generateUrl('sessions')?>" class="nav-link">Sessions</a></li>
                <li><a href="<?php echo $router->generateUrl('clients')?>" class="nav-link">Clients</a></li>
                <li><a href="<?php echo $router->generateUrl('trottinettes')?>" class="nav-link">Trottinettes</a></li>
                <li><a href="<?php echo $router->generateUrl('bornes')?>" class="nav-link">Bornes</a></li>
                <li><a href="<?php echo $router->generateUrl('maintenances')?>" class="nav-link nav-link-active">Maintenances</a></li>
            </ul>
        </nav>
        <footer>
            <a href="?p=user_logout">Déconnexion</a>
        </footer>
    </div>

    <div class="top">
        <h1 class="title">Maintenances</h1>
        <form name="research-form" class="research-form">
            <input name="s" type="text" class="search-bar" id="search-bar" placeholder="Recherche" autocomplete="off" >
        </form>
    </div>

    <div class="search-results">
    </div>

    <div class="content">

        <div class="content-table" style="width: 50%; min-width: 550px;">
            <table style="width:100%" class="table">
                <tr>
                    <th>Maintenances</th>
                    <th>Etat</th>
                    <th>Etape</th>
                    <th>Date Entrée</th>
                    <th>Action</th>
                </tr>

            <?php 

                foreach ($response['maintenances'] as $value) {
            ?>
                <tr>
                    <td><?php echo $value['numero']; ?></td>
                    <td><?php echo $value['etat']; ?></td>
                    <td><?php echo $value['etape']; ?></td>
                    <td><?php echo $value['date_entree']; ?></td>
                    <td><span onclick="modeEdition(this);" editionmode="scooters" editionid="<?php echo $value['id'];?>" class="edition">VOIR</span></td>
                </tr>
            <?php
                }
            ?>

            </table>
        </div>
        
    </div>

</div>

<?php require_once __DIR__.'/footerAdmin.html.php';