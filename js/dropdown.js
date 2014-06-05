$(function() {
    var c_type = $("#choix_type").val();
    var c_cat = $("#choix_cat").val();
    var c_qt = $("#choix_qt").val();
    var tmp1;
    var tmp2;

    /*
    $('#choix_type').change(function() {
        c_type = $(this).val();
        if (c_type != 'none') {
            tmp1 = '<?php echo getCategories(); ?>';
            console.log(tmp1)

            var $sel1 = $('#choix_cat');

            $.getJSON(tmp1, function(data) {
                $sel1.html('');
                $.each(data.tmp1, function(key, value) {
                    $sel1.append('<option id="' + value.word + '">' + value.word + '</option>');
                })
            });
        }
    });
    */

    $('#choix_type').change(function() {
        c_type = $(this).val();
        if (c_type != 'none') {
            var $sel1 = $('#choix_cat');

            $.getJSON("getCategories.php",formContent, function(json){ 
                $sel1.html('');
                $.each(data.tmp1, function(key, value) {
                    $sel1.append('<option id="' + value.word + '">' + value.word + '</option>');
                })
            });
        }
    });

    $('#choix_cat').change(function() {
        c_cat = $(this).val();
        if (c_cat != 'none' && c_type != 'none') {
            tmp2 = '<?php echo getCatalogue(c_type, c_cat); ?>';
            console.log(tmp2)
            var $sel2 = $('#choix_select');

            $.getJSON(tmp2, function(data) {
                $sel2.html('');
                $.each(data.tmp2, function(key, val) {
                    $sel2.append('<option id="' + value.id + '">' + value.name + '</option>');
                })
            });
        }
    });

    $('#choix_qt').change(function() {
        c_qt = $(this).val();
    });

});