<script>
    $(function () {
        var c_type;
        var c_cat;

        var c_id = $("#choix_id").val();;
        var c_qt = $("#choix_qt").val();;

        var $sel1 = $('#choix_cat');
        var $sel2 = $('#choix_id');

        var doc = [];

        function lockb() {
            $('#submit').prop('disabled', true);
            $('#reset').prop('disabled', true);
        }

        function rezer(opt1, opt2) {
            if (opt1 == 1) {
                c_type = $("#choix_type option:selected").attr("id");
                $sel1.html('');
                $sel1.append('<option id="none">Choisir une Catégorie</option>');
                c_cat = $("#choix_cat option:selected").attr("id");
            }
            if (opt2 == 1) {
                c_cat = $("#choix_cat option:selected").attr("id");
                $sel2.html('');
                $sel2.append('<option id="none">Choisir une Prestation</option>');
                c_id = $("#choix_id option:selected").attr("id");
            }
            $('#addb').prop('disabled', true);
        }

        function refresh() {
            $.post('../inc/getRow.php', {
                row: doc,
            }, function(data) {
                $("#result").html(data);
            });
        }

        rezer("1", "1");
        refresh();
        lockb();

        $('#choix_type').change(function () {
            rezer(1, 1);
            if (c_type != 'none') {
                $.post('../inc/getSTList.php', function (response) {
                    var lcat = jQuery.parseJSON(response);
                    $.each(lcat, function () {
                        $sel1.append('<option id="' + this.word + '">'
                            + this.word.substring(0, this.word.length - 2) + '</option>');
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
                        $sel2.append('<option id="' + this.id + '">'
                            + this.tradename + ' - ' + Math.round(this.unitAmount * 100)/100 + ' € HT' + '</option>');
                    });
                });
            }
        });

        $('#choix_id').change(function () {
            c_id = $("#choix_id option:selected").attr("id");
            if (c_id != 'none') {
                $('#addb').prop('disabled', false);
            }
            else
                $('#addb').prop('disabled', true);

        });

        $('#choix_qt').change(function () {
            c_qt = $(this).val();
        });

        $('#addb').click(function () {
            $.post('../inc/getCOne.php', {
                id: c_id,
                type: c_type,
                qt: c_qt
            }, function (response) {
                doc.push(jQuery.parseJSON(response));
                refresh();
                $('#submit').prop('disabled', false);
                $('#reset').prop('disabled', false);
            });
        });

        $('#submit').click(function () {
            if (doc != '') {
                $.post('../inc/createEDoc.php', {
                    row: doc,
                }, function (response) {
                    doc = [];
                    refresh();
                    lockb();
                });
            }
        });

        $('#reset').click(function () {
            doc = [];
            refresh();
            lockb();
        });

    });
</script>