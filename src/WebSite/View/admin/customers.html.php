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
                <li><a href="<?php echo $router->generateUrl('clients')?>" class="nav-link nav-link-active">Clients</a></li>
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
        <h1 class="title">Clients</h1>
        <form name="research-form" class="research-form">
            <input name="s" type="text" class="search-bar" id="search-bar" placeholder="Recherche" autocomplete="off" >
        </form>
    </div>

    <div class="search-results">
    </div>

    <div class="content">

        <div id="CustomersTab">
            <div class="tab-menu">
                <span class="tab-link tab-link-left tab-link-active link-left">Actif</span>
                <span class="tab-link tab-link-middle link-middle">Inactif</span>
                <span class="tab-link tab-link-right link-right">Inscriptions</span>
                <div class="clear"></div>
            </div>
            <div class="tab-content">
                <div class="tab-wrap">
                    <div class="tab" id="tab-left">
                        
                        <div class="content-table">
                            <table style="width:100%" class="table">
                                <tr>
                                    <th>Prénom Nom</th>
                                    <th>Email</th>
                                    <th>Date d'Inscription</th>
                                    <th>Abonnement</th>
                                    <th>Edition</th>
                                </tr>

                            <?php 
                                foreach ($response['active'] as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['prenom'].' '.$value['nom']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['date_inscription']; ?></td>
                                    <td>En cours</tc>
                                    <td><span onclick="modeEdition(this);" editionmode="users" editionid="<?php echo $value['id'];?>" class="edition">EDITION</span></td>
                                </tr>
                            <?php
                                }
                            ?>
                 
                            </table>
                        </div>
                         
                    </div>
                    <div class="tab" id="tab-middle">
                        <div class="content-table">
                            <table style="width:100%" class="table">
                                <tr>
                                    <th>Prénom Nom</th>
                                    <th>Email</th>
                                    <th>Date d'Inscription</th>
                                    <th>Abonnement</th>
                                    <th>Edition</th>
                                </tr>

                            <?php 
                                foreach ($response['inactive'] as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['prenom'].' '.$value['nom']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['date_inscription']; ?></td>
                                    <td>En cours</tc>
                                    <td><span onclick="modeEdition(this);" editionmode="users" editionid="<?php echo $value['id'];?>" class="edition">EDITION</span></td>
                                </tr>
                            <?php
                                }
                            ?>

                            </table>
                        </div>
                    </div>
                    <div class="tab" id="tab-right">
                        <div class="content-table">
                            <table style="width:100%" class="table">
                                <tr>
                                    <th>Prénom Nom</th>
                                    <th>Email</th>
                                    <th>Date d'Inscription</th>
                                    <th>Abonnement</th>
                                    <th>Edition</th>
                                </tr>

                            <?php 
                                foreach ($response['subscription'] as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['prenom'].' '.$value['nom']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['date_inscription']; ?></td>
                                    <td>En cours</tc>
                                    <td><span onclick="modeEdition(this);" editionmode="users" editionid="<?php echo $value['id'];?>" class="edition">EDITION</span></td>
                                </tr>
                            <?php
                                }
                            ?>

                            </table>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        
    </div>

</div>

<?php require_once __DIR__.'/footerAdmin.html.php';