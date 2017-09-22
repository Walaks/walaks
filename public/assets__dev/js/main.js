$(document).ready(function(){

    $('#enviar').click(function() {
        $("#sub").trigger('click');
    });

    $("input[type='checkbox'].select_linha").click(function() {
        var algum = false;
        var _parents = $(this).parents('.table-responsive').find('.select__all').data('id');
        $("input[type='checkbox']").each(function() {
            var checked = $(this).is(':checked');
            if (checked) {
                algum = true;
            }
        });

        if (algum) {
            $("#baixar").removeAttr('hidden');
        }else{
            $("#baixar").attr('hidden', true);
        }
        CheckAllInput(_parents);
    });

    function CheckAllInput(_parents) {
        var input_parent_id = _parents;
        var input_length = $('#linhasCriativas--'+input_parent_id).find('input.select_linha').length;
        var input_length_checked = $('#linhasCriativas--'+input_parent_id).find('input.select_linha:checked').length;
        if (input_length == input_length_checked) { 
            $('input.select__all[data-id="'+input_parent_id+'"]').prop( "checked", true );
        } else { 
            $('input.select__all[data-id="'+input_parent_id+'"]').prop( "checked", false );
        }
    }
    /// 
    $('.select__all').on('click', function() {
        // debugger;
        var id = $(this).data('id');
        var _checked = $(this).is(':checked');
        var _parent = $(this).parents('#linhasCriativas--'+id);
        if (_checked) { 
            $('input',_parent).each( function() {
                    $(this).prop( "checked", true );
                    $("#baixar").removeAttr('hidden');
            })
        } else { 
            $('input',_parent).each( function() {
                    $(this).prop( "checked", false );
                     $("#baixar").attr('hidden', true);
            })
        }

    })
 
 });


// functions show notify
function showNotification(tipo,msg) {
    var type = tipo;
    var msg  = msg; 
    console.log(type);
    $.notify({
        icon: "check",
        message: msg

    },
        {
            type: type,
            timer: 4000
        });
}
