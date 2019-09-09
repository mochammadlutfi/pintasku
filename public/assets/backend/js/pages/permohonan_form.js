$(document).ready(function () {

    $("#field-ktp").change(function (event) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            var filename = $("#field-ktp").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                // debugger;
                $('.label-ktp').text(filename);
            }
            reader.readAsDataURL(this.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    });

    $("#field-ipk").change(function (event) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            var filename = $("#field-ipk").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                // debugger;
                $('.label-ipk').text(filename);
            }
            reader.readAsDataURL(this.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    });

    $("#field-serah_terima").change(function (event) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            var filename = $("#field-serah_terima").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                // debugger;
                $('.label-serah_terima').text(filename);
            }
            reader.readAsDataURL(this.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    });

    $("#field-pemeriksaan").change(function (event) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            var filename = $("#field-pemeriksaan").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                // debugger;
                $('.label-pemeriksaan').text(filename);
            }
            reader.readAsDataURL(this.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    });

    $("#field-ket_hilang").change(function (event) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            var filename = $("#field-ket_hilang").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                // debugger;
                $('.label-ket_hilang').text(filename);
            }
            reader.readAsDataURL(this.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    });

    $("#field-block").prop('disabled', true);
    $("#field-kios").prop('disabled', true);

    $('#field-pasar').change(function () {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: laroute.route('permohonan.get_block'),
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function (result) {
                    $("#field-block").prop('disabled', false);
                    $('#field-block').html(result);
                }
            })
        }else{
            $("#field-block").prop('disabled', true);
            $('#field-block').html('<option value="">Pilih Los/Block</option>');
            $("#field-kios").prop('disabled', true);
            $('#field-kios').html('<option value="">Pilih Kios/Ruang</option>');
        }
    });

    $('#field-block').change(function () {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: laroute.route('permohonan.get_kios'),
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function (result) {
                    $("#field-kios").prop('disabled', false);
                    $('#field-kios').html(result);
                }
            })
        }else{
            $("#field-kios").prop('disabled', true);
            $('#field-kios').html('<option value="">Pilih Kios/Ruang</option>');
        }
    });

    $("#form-permohonan").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-permohonan')[0]);
        $.ajax({
            url : laroute.route('permohonan.tambah'),
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                swal({
                    title: "Tunggu Sebentar...",
                    text: " ",
                    icon: "https://media.giphy.com/media/f6DNfyvoATGW8ohK1t/giphy.gif",
                    buttons: false,
                    allowOutsideClick: false
                });
            },
            success: function (response){
                    $('.is-invalid').removeClass('is-invalid');
                    if (response.fail == false) {
                        swal({
                            title: "Success",
                            text: "Data Berhasil Di Simpan",
                            timer: 3000,
                            buttons: false,
                            icon: 'success'
                        });
                        window.setTimeout(function(){
                            window.location = response.url;
                    } ,1500);
                }else{
                    swal.close();
                    for (control in response.errors) {
                        $('#field-' + control).addClass('is-invalid');
                        $('#error-' + control).html(response.errors[control]);
                        $.notify({
                            // options
                            icon: 'fa fa-times',
                            message: response.errors[control]
                        },{
                            // settings
                            delay: 7000,
                            type: 'danger'
                        });
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSimpan').text('Simpan');
                $('#btnSimpan').attr('disabled',false);
            }
        });
    });
});

var BeFormWizard = function() {
    // Init Wizard defaults
    var initWizardDefaults = function(){
        jQuery.fn.bootstrapWizard.defaults.tabClass         = 'nav nav-tabs';
        jQuery.fn.bootstrapWizard.defaults.nextSelector     = '[data-wizard="next"]';
        jQuery.fn.bootstrapWizard.defaults.previousSelector = '[data-wizard="prev"]';
        jQuery.fn.bootstrapWizard.defaults.firstSelector    = '[data-wizard="first"]';
        jQuery.fn.bootstrapWizard.defaults.lastSelector     = '[data-wizard="lsat"]';
        jQuery.fn.bootstrapWizard.defaults.finishSelector   = '[data-wizard="finish"]';
        jQuery.fn.bootstrapWizard.defaults.backSelector     = '[data-wizard="back"]';
    };

    // Init simple wizard, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
    var initWizardSimple = function(){
        jQuery('.permohonan').bootstrapWizard({
            onTabShow: function(tab, navigation, index) {
                var percent = ((index + 1) / navigation.find('li').length) * 100;

                // Get progress bar
                var progress = navigation.parents('.block').find('[data-wizard="progress"] > .progress-bar');

                // Update progress bar if there is one
                if (progress.length) {
                    progress.css({ width: percent + 1 + '%' });
                }
            }
        });
    };


    return {
        init: function () {
            // Init Wizard Defaults
            initWizardDefaults();

            // Init Form Simple Wizard
            initWizardSimple();
        }
    };
}();

jQuery(function(){ BeFormWizard.init(); });


