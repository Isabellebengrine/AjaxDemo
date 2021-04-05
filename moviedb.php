<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Moviedb</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Don't worry Be API !!!</h1>
                    <p>Consulter une API: exemple de TheMoviedb</p>

                    <form action="#" method="GET">
                        <label for="movie">Recherche :</label>
                        <input type="text" name="movie" id="movie">
                        <input type="submit" name="submit" id="submit" value="Chercher">
                    </form>  

                    <div id="result">

                    </div> 
                </div>
            </div>
            
        </div>

        <!--  Attention : Jquery sans slim sinon Ajax ne fonctionne pas -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
    </html>

    <script>


        $(document).ready(function() {

            $('#submit').click(function () {

                //je récup valeur de input de recherche :
                let movie = $("#movie").val();

                //pour récupérer les données qui sont au format json: fonction getJSON :
                $.getJSON("http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=" + movie, function (data) {
                    //je parcours la propriété results qui est un tableau d'objets représentant les films trouvés :
                    $.each(data.results, function(key, val) {
                        $('#result').html('<p> Titre: ' + val.title + '</p>');
                        $('#result').append('<p> Overview: ' + val.overview+ '</p>');
                        $('#result').append('<p> Release date: ' + val.release_date+ '</p>');
                    });
                    
                });
            });

        });