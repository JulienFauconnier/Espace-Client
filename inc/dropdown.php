<script type="text/javascript">
$(function() {
    var c_type = $("#choix_type").val();
    var c_cat = $("#choix_cat").val();
    var c_qt = $("#choix_qt").val();
    var tmp1;
    var tmp2;

    $('#choix_type').change(function() {
        c_type = $(this).val();
        if (c_type != 'none') {
            var $sel1 = $('#choix_cat');
            
            for (var i = 0; i < 5; i++) {
                $sel1.append('<option id="' + i + '">' + i+1 + '</option>');
            }

            /*
            $.getJSON('<?php echo getCategories(); ?>', function(data) {
                $sel1.html('');
                $.each(key, function(key, value) {
                    $sel1.append('<option id="' + value->word + '">' + value->word + '</option>');
                })
            });
*/
        }
    });

    $('#choix_cat').change(function() {
        c_cat = $(this).val();
        if (c_cat != 'none' && c_type != 'none') {
            var $sel2 = $('#choix_select');

            $.getJSON('<?php echo getCatalogue(c_type, c_cat); ?>', function(data) {
                $sel2.html('');
                $.each(key, function(key, value) {
                    $sel2.append('<option id="' + value.id + '">' + value.name + '</option>');
                })
            });
        }
    });

    $('#choix_qt').change(function() {
        c_qt = $(this).val();
    });

});
</script>