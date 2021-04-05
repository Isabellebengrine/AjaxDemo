$(document).ready(function () {
    $.post({
        url: "post_json.php",
        dataType: "json",
        success: function (data) {
            let contenu = '';

            $.each(data, function (key, val) {
                contenu += '<option value="' + val.reg_id + '">' + val.reg_v_nom + '</option>'
            });

            $("#regions").html(contenu);
        }
    });
    $('#regions').change(function () {
        let elmt = document.getElementById('regions')
        let reg_id = elmt.options[elmt.selectedIndex].value
        $.post({
            url: "dep.php",
            dataType: "json",
            data: {reg_id: reg_id},
            success: function (data) {

                let contenu = '';

                $.each(data, function (key, val) {
                    contenu += '<option value="' + val.dep_id + '">' + val.dep_nom + '</option>'
                });

                $("#departements").html(contenu);
            }
        });
    })
})