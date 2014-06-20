<script>
    $(function () {
        var c_type;
        var c_cat;

        var c_id = $("#choix_id").val();;
        var c_qt = $("#choix_qt").val();;

        var $sel1 = $('#choix_cat');
        var $sel2 = $('#choix_id');

        var doc = [];

        function rezer(opt1, opt2) {
            if (opt1 == 1) {
                c_type = $("#choix_type option:selected").attr("id");
                $sel1.html('');
                $sel1.append('<option id="none">Sélection</option>');
                c_cat = $("#choix_cat option:selected").attr("id");
            }
            if (opt2 == 1) {
                c_cat = $("#choix_cat option:selected").attr("id");
                $sel2.html('');
                $sel2.append('<option id="none">Sélection</option>');
                c_id = $("#choix_id option:selected").attr("id");
            }
            if (c_type == 'none' || c_cat == 'none' || c_id == 'none')
                $("#addb").attr('disabled', 'disabled');
        }

        rezer("1", "1");

        $('#choix_type').change(function () {
            rezer(1, 1);
            if (c_type != 'none') {
                $.post('../inc/getSTList.php', function (response) {
                    var lcat = jQuery.parseJSON(response);
                    $.each(lcat, function () {
                        $sel1.append('<option id="' + this.word + '">' + this.word.substring(0, this.word.length - 2) + '</option>');
                    });
                });
            }
        });

        $('#choix_cat').change(function () {
            rezer(0, 1);
            if (c_type != 'none' && c_cat != 'none') {
                $.post('../inc/getCList.php', {
                    type: c_type,
                    cat: c_cat
                }, function (response) {
                    var lchx = jQuery.parseJSON(response);
                    $.each(lchx, function () {
                        $sel2.append('<option id="' + this.id + '">' + this.name + '</option>');
                    });
                });
            }
        });

        $('#choix_id').change(function () {
            c_id = $("#choix_id option:selected").attr("id");
            if (c_type != 'none' && c_cat != 'none' && c_id != 'none') {
                $("#addb").removeAttr('disabled');
            }
        });

        $('#choix_qt').change(function () {
            c_qt = $(this).val();
        });

        $('#addb').click(function () {
            if (c_type != 'none' && c_cat != 'none' && c_id != 'none') {
                $.post('../inc/getCOne.php', {
                    id: c_id,
                    type: c_type,
                    qt: c_qt
                }, function (response) {
                    var line = jQuery.parseJSON(response);
                    doc.push(line);
                });
            }
            console.log(doc);
        });

        $('#submit').click(function () {
            if (doc != '') {
                $.post('../inc/createEDoc.php', {
                    tab: doc,
                }, function (response) {
                    console.log(response);
                });
            }
            else
                alert("Ajoutez un article !");
        });

        $('#reset').click(function () {
            rezer(1, 1);
        });

    });
</script>