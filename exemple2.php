<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Ajax démo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Lier 2 selects avec Ajax: </h1>
            <p>L'utilisateur choisit d'abord sa région puis son dépt:</p>

            <form action="" class="row">
                <div class="form-group col-sm-6">
                    <label for="regions">Régions</label>
                    <select class="form-control" id="regions" name="reg">

                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="departements">Départements</label>
                    <select class="form-control" id="departements" name="dep">

                    </select>
                </div>
            </form>

            <p>En envoyant les données en json:</p>

            <form action="" class="row">
                <div class="form-group col-sm-6">
                    <label for="regions">Régions</label>
                    <select class="form-control" id="regions2" name="reg">

                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="departements">Départements</label>
                    <select class="form-control" id="departements2" name="dep">

                    </select>
                </div>
            </form>
        </div>

        <!--  Attention : Jquery sans slim sinon Ajax ne fonctionne pas -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
    </html>

    <script>

        $(document).ready(function() {

            $("#regions").load("listeoptions1.php");

            $("#regions").change(function() {
                reg_id = $("#regions").val();
                $("#departements").load("listeoptions2.php?id_region="+ reg_id);
            });

            //avec json :

            $.post({
                url: "test/post_json.php",
                dataType: "json",
                success: function (data) {
                    let contenu = '';

                    $.each(data, function (key, val) {
                        contenu += '<option value="' + val.reg_id + '">' + val.reg_v_nom + '</option>'
                    });

                    $("#regions2").html(contenu);
                }
            });
            $('#regions2').change(function () {
                let elmt = document.getElementById('regions2')
                let reg_id = elmt.options[elmt.selectedIndex].value
                $.post({
                    url: "test/dep.php",
                    dataType: "json",
                    data: {reg_id: reg_id},
                    success: function (data) {

                        let contenu = '';

                        $.each(data, function (key, val) {
                            contenu += '<option value="' + val.dep_id + '">' + val.dep_nom + '</option>'
                        });

                        $("#departements2").html(contenu);
                    }
                });
            })

        });

    </script>