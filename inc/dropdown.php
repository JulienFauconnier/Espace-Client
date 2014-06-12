<script>
$(function() {
    var c_type = $("#choix_type").val();
    var c_cat = $("#choix_cat").val();
    var c_qt = $("#choix_qt").val();
    var tmp1;
    var tmp2;

    $('#choix_type').change(function() {
        c_type = $(this).val();
        var $sel1 = $('#choix_cat');
        $sel1.html('');
        $sel1.append('<option id="none">Sélection</option>');
        if (c_type != 'none') {
            var lcat = jQuery.parseJSON('<?php echo getCategories(); ?>');
            $.each(lcat, function(){
                $sel1.append('<option id="' + this.word + '">' + this.word.substring(0,this.word.length-2) + '</option>');
            });
        }
    });

    $('#choix_cat').change(function() {
        c_cat = $(this).val();
        var $sel2 = $('#choix_select');
        $sel2.html('');
        $sel2.append('<option id="none">Sélection</option>');
        if (c_cat != 'none') {
            var lchx = jQuery.parseJSON('<?php echo getCatalogue("item", "test_v"); ?>');
            $.each(lchx, function(){
                $sel2.append('<option id="' + this.id + '">' + this.name + '</option>');
            });
        }
    });

    /*
    $('#choix_cat').change(function() {
        c_cat = $(this).val();
        var $sel2 = $('#choix_select');
        $sel2.html('');
        $sel2.append('<option id="none">Sélection</option>');
        if (c_cat != 'none') {
            $.ajax
            ({
                type: "POST",
                url: "product.php",
                data: {
                    'c_type'    : c_type
                    'c_cat'     : c_cat
                },
                cache: false,
                success: function(html)
                {
                    $(".choix_select").html(html);
                } 
            });
        }
    });
    */

    $('#choix_qt').change(function() {
        c_qt = $(this).val();
    });
});
</script>