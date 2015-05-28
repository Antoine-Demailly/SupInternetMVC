var nbResults;
var currentResults;

$(function() {

    // On affiche les flashbags pendant 4 secondes
    var flashbag = $('.flashbag');
    flashbag.addClass('flashbag-open').delay(4000).queue(function() {
        $(this).removeClass('flashbag-open');
        $(this).dequeue();
    });

    // On initialise le plugins des onglets
    $('#CustomersTab').tabJs();

    $("body").on("click",".editClose", function() {
        $('#search-bar').focus();
        $('.editionMode').removeClass('editionMode-open');
        $('.main-content').removeClass('mode-absolute');
        $('.fog').fadeOut(400);
    });

    $("body").on("click","#updateUser", function() {
        updateUser();
    });


    $('#search-bar').keyup(function(e) {
        
        if(e.keyCode == 40) {
            // Flèche Bas
            searchNavigate('down');
        } else if (e.keyCode == 38) {
            // Flèche Haut
            searchNavigate('up');
        } else if (e.keyCode == 13) {
            // Entrée
            $('.selected-result').trigger('click');
        } else {
            var results = $('.search-results');
            results.html('');
            mysearch();
        }

    });


    $('form[name="research-form"]').submit(function(e) {
        e.preventDefault();
        // Neutralise le formulaire de recherche
        return false;
    });


});



// 
// Module de recherche
// 

function mysearch() {
    var bar = $('#search-bar');
    bar.focus();
    var val = bar.val();
    var len = val.length;

    if (len > 0) {
        $('.search-results').addClass('show-results');
        $('.search-bar').addClass('search-bar-open');

        var form = $('form[name="research-form"]');
        var results = $('.search-results');
        
        $.ajax({
            url : 'index.php?p=recherche',
            type : 'GET',
            data : form.serialize(),
            dataType : 'json',
            success : function(response) {
                
                var mode;

                if (response.length == 0) {
                    results.html('<p>Pas de résultats</p>');
                }

                for (var e in response) {
                    if (response[e].nom_champ == 'email' || response[e].nom_champ == 'utilisateur') {
                        var mode = 'users'; 
                    } else if (response[e].nom_champ == 'bornes'){
                        var mode = 'bornes';
                    } else if (response[e].nom_champ == 'trottinette') {
                        var mode = 'scooters';
                    }

                    var id = response[e].id_item
                    nbResults = e;
                    results.append('<p onclick="modeEdition(this);" tabindex="'+1+'" editionmode="'+mode+'" editionid="'+id+'"><span class="results-type">'+response[e].nom_champ+'</span> '+response[e].mot_cle+'</p>');
                }
                currentResults = 1;
                $('.search-results p:nth-child('+1+')').addClass('selected-result');
            },
            error : function(d) {
                if (typeof(d.responseJSON) !== 'undefined' && typeof(d.responseJSON.errors) !== 'undefined') {
                    $('.search-results').html('<p>'+d.responseJSON.errors+'</p>');
                }
            }

        });

    } else {
        $('.search-results').removeClass('show-results');
        $('.search-bar').removeClass('search-bar-open');
    }
}

    // 
    // Fonction propre au module de recherche
    //

    function searchNavigate(action) {

        var min = 1;
        var max = nbResults;

        if (action == 'down') {
            var testCurrent = currentResults;
            if (testCurrent++ > max) {
                currentResults = min;
            } else {
                currentResults++;
            }
        }
        if (action == 'up') {
            var testCurrent = currentResults;
            if (testCurrent-- == min) {
                var currentMax = max;
                currentMax++;
                currentResults = currentMax;
            } else {
                currentResults--;
            }
        }

        $('.search-results p').removeClass('selected-result');
        $('.search-results p:nth-child('+currentResults.toString()+')').addClass('selected-result');

    }



// 
// Module Edition
//

function modeEdition(elem) {
    
    var mode = $(elem).attr("editionmode");
    var id = $(elem).attr("editionid");

    var sent = {table: mode, id_item: id};

    // Première étape: On ouvre le panneau d'édition
    $('.fog').fadeIn(400);
    $('.main-content').addClass('mode-absolute');
    $('.editionMode').addClass('editionMode-open');

    // Deuxième étape: Récupération vue et injection contenu
    if (mode == 'users') {
        getCustomersEdition(sent,id);
    } else if (mode =='scooters') {
        getScootersEdition(id);
    } else if (mode == 'bornes') {
        getBornesEdition(id);
    }

}


    // 
    // Fonction propre au module Edition
    // 

    function getCustomersEdition(sent,id) {

            $.ajax({
                url : 'index.php?p=getuser',
                type : 'GET',
                data : sent,
                dataType : 'html',
                success : function(response) {
                    $('.editionMode').html(response);
                },
                error : function(d) {
                    $('.editionMode').html('Edition - Utilisateur inconnu');
                }

            });


    }

    function getScootersEdition(id_item) {

        var sent = {id: id_item}
        
            $.ajax({
                url : 'index.php?p=getscooters',
                type : 'GET',
                data : sent,
                dataType : 'html',
                success : function(response) {
                    $('.editionMode').html(response);
                },
                error : function(d) {
                    $('.editionMode').html('Edition - Trottinettes inexistante');
                }
            });

            $('body').scrollTop(0);

    }

    function getBornesEdition(id_item) {
            

            var sent = {id: id_item};
            
            $.ajax({
                    url : 'index.php?p=scootersinbornes',
                    type : 'GET',
                    data : sent,
                    dataType : 'html',
                    success : function(response) {
                        $('.editionMode').html(response);
                    },
                    error : function(d) {
                        $('.editionMode').html('Une erreur s\'est produite');
                    }
            });        

    }

// Fin module Edition


// Mise à jour utilisateur
function updateUser() {
    var sent = {
        id: $('.editionTitle').attr("iditem"),
        prenom: $('#usersPrenom').val(),
        nom: $('#usersNom').val(),
        email: $('#usersEmail').val(),
        adresse: $('#usersAdresse').val(),
        ville: $('#usersVille').val(),
        code_postal: $('#usersCodePostal').val()
    }

    $.ajax({
        url : 'index.php?p=updateuser',
        type : 'POST',
        data : sent,
        dataType : 'json',
        success : function(response) {
            $('#resultsUsers').html('<span style="color: green;">'+response+'</span>');
        },
        error : function(d) {
            $('#resultsUsers').html('<span style="color: red;">'+d.responseJSON+'</span>');
        }

    });
}


// Google Maps
var map;
function initialize(latitude,longitude) {
    latitude = parseFloat(latitude);
    longitude = parseFloat(longitude);
  // Create a simple map.
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 17,
    center: {lat: latitude, lng: longitude}
  });

  // Load a GeoJSON from the same server as our demo.
  map.data.loadGeoJson('map/map.geojson');
}