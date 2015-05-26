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
                <li><a href="<?php echo $router->generateUrl('sessions')?>" class="nav-link nav-link-active">Sessions</a></li>
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
        <h1 class="title">Sessions</h1>
        <form name="research-form" class="research-form">
            <input name="s" type="text" class="search-bar" id="search-bar" placeholder="Recherche" autocomplete="off" >
        </form>
    </div>

    <div class="search-results">
    </div>

    <div class="content">

        <div id="CustomersTab">
            <div class="tab-menu">
                <span class="tab-link tab-link-left tab-link-active link-left">En Cours</span>
                <span class="tab-link tab-link-middle link-middle">Archives</span>
                <span class="tab-link tab-link-right link-right">Alertes</span>
                <div class="clear"></div>
            </div>
            <div class="tab-content">
                <div class="tab-wrap">
                    <div class="tab" id="tab-left">
                        
                        <div class="content-table">
                            <table style="width:100%" class="table">
                                <tr>
                                    <th>Prénom Nom</th>
                                    <th>Trottinettes</th>
                                    <th>Borne départ</th>
                                    <th>Heure départ</th>
                                    <th>Edition</th>
                                </tr>

                            <?php 
                            // var_dump($response['sessions']);
                                foreach ($response['sessions'] as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['prenom'].' '.$value['nom']; ?></td>
                                    <td><?php echo $value['numero']; ?></td>
                                    <td><?php echo $value['localisation_name']; ?></td>
                                    <td><?php echo $value['date_debut']; ?></td>
                                    <td><span onclick="modeEdition(this);" editionmode="users" editionid="<?php echo $value['id'];?>" class="edition">EDITION</span> (fictif)</td>
                                </tr>
                            <?php
                                }
                            ?>
                 
                            </table>
                        </div>
                         
                    </div>
                    <div class="tab" id="tab-middle">
                        <div style="width: 65%; margin: auto; text-align: center; font-family: Roboto; font-size: 14px;">
                            Pas de résultats
                        </div>
                    </div>
                    <div class="tab" id="tab-right">
                        <div style="width: 65%; margin: auto; text-align: center; font-family: Roboto; font-size: 14px;">
                            Pas de résultats
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        
    </div>

</div>

<?php require_once __DIR__.'/footerAdmin.html.php';