
        
    //import modal
    $(document).on('click', '.import-modal', function() {
        //alert('import');
        //solicitar la lista de los sources para elegir
            $.ajax({
                type: 'GET',
                url: 'leads/listSources/list',
                success: function(data) {
                    console.log(data);
                    // Guardamos el select de los sources
                    var sourcesList = $("#id_source");
                    // Limpiamos el select
                    sourcesList.find('option').remove();
                    sourcesList.append('<option value="">- Seleccione -</option>');
                    $(data).each(function(i, v){ // indice, valor
                        sourcesList.append('<option value="' + v.id + '">' + v.name + '</option>');
                    })
                }
            });
        //solicitar la lista de los status para elegir
            $.ajax({
                type: 'GET',
                url: 'leads/listStatus/list',
                success: function(data) {
                    //console.log(data);
                    // Guardamos el select de los status
                    var statusList = $("#id_status");
                    // Limpiamos el select
                    statusList.find('option').remove();
                    statusList.append('<option value="">- Seleccione -</option>');
                    $(data).each(function(i, v){ // indice, valor
                        statusList.append('<option value="' + v.id + '">' + v.name + '</option>');
                    })
                }
            });
        $('.modal-title').text('Importar Prospectos');
        $('#importModal').modal('show');
    });

    //$('.modal-footer').on('click', '.import', function() {
    $("#import-form").on('submit', function(e){
        alert('aqui');
        e.preventDefault();
        var ids = $('[name="assigned_to[]"]').serializeArray();
        //console.log(ids);
        //return false;
        $.ajax({
                type: 'POST',
                url: 'leads/import/excel',
                /*data: {
                    '_token': $('input[name=_token]').val(),
                    'file_import': $('#file_import').val(),
                    'id_status': $('#id_status').val(),
                    'id_source': $('#id_source').val(),
                    'ids_users': JSON.stringify(ids),
                    //'array':JSON.stringify($('#assigned_to').val()),
                },*/
                data: new FormData($("#import-form")),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data) {
                    alert("vuelta");
                    console.log(data);
                    $('.errorFileImport').addClass('hidden');
                    $('.errorStatus').addClass('hidden');
                    $('.errorSource').addClass('hidden');
                    $('.errorFlagOwner').addClass('hidden');
                    $('.errorAssigned').addClass('hidden');
                    
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#importModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.file_import) {
                            $('.errorFileImport').removeClass('hidden');
                            $('.errorFileImport').text(data.errors.file_import);
                        }
                        if (data.errors.id_source) {
                            $('.errorSource').removeClass('hidden');
                            $('.errorSource').text(data.errors.id_source);
                        }
                        
                        if (data.errors.id_status) {
                            $('.errorStatus').removeClass('hidden');
                            $('.errorStatus').text(data.errors.id_status);
                        }
                        if (data.errors.flag_owner) {
                            $('.errorFlagOwner').removeClass('hidden');
                            $('.errorFlagOwner').text(data.errors.flag_owner);
                        }
                        if (data.errors.assigned_to) {
                            $('.errorAssigned').removeClass('hidden');
                            $('.errorAssigned').text(data.errors.assigned_to);
                        }                        
                    } else {
                        alert("nada");
                        toastr.success('Successfully Import File!', 'Success Alert', {timeOut: 5000});
                        $('#importModal').modal('hidden');
                    }
                }
        });
    });

     //file type validation
    $("#file_import").change(function() {
        var file = this.files[0];
        //alert(file.name);
        var name = file.name;
        var tipofile = name.substring(name.lastIndexOf("."));
        //alert(tipofile);
        var match= [".xls",".xlsx",".cvs"];
        if(!((tipofile==match[0]) || (tipofile==match[1]) || (tipofile==match[2]))){
            setTimeout(function () {
                            $('#importModal').modal('show');
                            toastr.error('Validation error!', 'Ingrese un archivo con extensión Excel o CVS', {timeOut: 5000});
                        }, 500);
            $("#file_import").val('');
            return false;
        }
    });

    