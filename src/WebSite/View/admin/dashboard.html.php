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
                <li><a href="<?php echo $router->generateUrl('dashboard')?>" class="nav-link nav-link-active">Synthèse</a></li>
                <li><a href="<?php echo $router->generateUrl('sessions')?>" class="nav-link">Sessions</a></li>
                <li><a href="<?php echo $router->generateUrl('clients')?>" class="nav-link">Clients</a></li>
                <li><a href="<?php echo $router->generateUrl('trottinettes')?>" class="nav-link">Trottinettes</a></li>
                <li><a href="<?php echo $router->generateUrl('bornes')?>" class="nav-link">Bornes</a></li>
                <li><a href="<?php echo $router->generateUrl('maintenances')?>" class="nav-link">Maintenances</a></li>
            </ul>    
        </nav>
        <footer>
            <a href="?p=user_logout">Déconnexion</a>
        </footer>
    </div>

    <div class="top">
        <h1 class="title">Synthèse</h1>
        <form name="research-form" class="research-form">
            <input name="s" type="text" class="search-bar" id="search-bar" placeholder="Recherche" autocomplete="off">
        </form>
    </div>
    
    <div class="search-results">
    </div>

    <div class="content">
        <div class="dashboard-block">
            <div class="dashboard-subblock" style="background-color: #67D4E8;">
                <span class="dashboard-num"><?php echo $response['customers']['count']; ?></span>
                <span class="dashboard-name">Nombre de clients</span>
            </div>
        </div>
        <div class="dashboard-block">
            <div class="dashboard-subblock" style="margin-left: 0; background-color: #F6BF2E;">
                <span class="dashboard-num"><?php echo $response['sessions']['count']; ?></span>
                <span class="dashboard-name">Sessions en cours</span>
            </div>
        </div>
        <div class="dashboard-block">
            <div class="dashboard-subblock" style="background-color: #8BD28C;">
                <span class="dashboard-num"><?php echo $response['bornes']['count']; ?></span>
                <span class="dashboard-name">Bornes en services</span>
            </div>
        </div>
        <div class="dashboard-block">
            <div class="dashboard-subblock" style="margin-left: 0; background-color: #F8895B;">
                <span class="dashboard-num"><?php echo $response['maintenance']['count']; ?></span>
                <span class="dashboard-name">Maintenances en cours</span>
            </div>
            
        </div>

    </div>

</div>

<?php require_once __DIR__.'/footerAdmin.html.php';