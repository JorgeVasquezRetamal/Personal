$("#country_id").change(function () {
        $.ajax({
            url: "{{ url('country_id') }}",
            type: 'get',
            dataType: 'json',
            data: {"dep": $("#country_id").val()},
            success: function (rta) {
                $('#param_name_courses_id').empty();
                $('#param_name_courses_id').append("<option value='' disabled selected style='display:none;'>Seleccione un munipio</option>");
                $.each(rta, function (index, value) {
                    $('#param_name_courses_id').append("<option value='" + index + "'>" + value + "</option>");
                });
            }
        });
    });