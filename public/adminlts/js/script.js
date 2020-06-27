$(function () {
    // Summernote
    $('.textarea').summernote()
})



$(function () {
    $('#post-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

})

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});


var input_1 = document.getElementById('input-1');
var input_2 = document.getElementById('input-2');
var input_3 = document.getElementById('input-3');
var input_4 = document.getElementById('input-4');
var input_5 = document.getElementById('input-5');

var label_1 = document.getElementById('label-1');
var label_2 = document.getElementById('label-2');
var label_3 = document.getElementById('label-3');
var label_4 = document.getElementById('label-4');
var label_5 = document.getElementById('label-5');

var color_1 = document.getElementById('color-1');
var pintor_1 = document.getElementById('pintor-1');
var pintor_vr = document.getElementById('pintor_vr');

var escena = document.getElementById('escena');


function mostrarMurales() {
    color_1.style.display = 'inline';
    input_1.style.display = 'inline';
    input_2.style.display = 'inline';
    input_3.style.display = 'inline';
    input_4.style.display = 'none';
    input_5.style.display = 'none';

    label_1.style.display = 'inline';
    label_2.style.display = 'inline';
    label_3.style.display = 'inline';
    label_4.style.display = 'none';
    label_5.style.display = 'none';

    document.getElementById('escena').value = '1_Escena';
}

function mostrarMonumentos() {
    color_1.style.display = 'inline';
    input_1.style.display = 'inline';
    input_2.style.display = 'inline';
    input_3.style.display = 'inline';
    input_4.style.display = 'inline';
    input_5.style.display = 'none';

    label_1.style.display = 'inline';
    label_2.style.display = 'inline';
    label_3.style.display = 'inline';
    label_4.style.display = 'inline';
    label_5.style.display = 'none';

    document.getElementById('escena').value = '2_Escena';
}

function mostrarEcoturismo() {
    color_1.style.display = 'inline';
    input_1.style.display = 'inline';
    input_2.style.display = 'inline';
    input_3.style.display = 'inline';
    input_4.style.display = 'inline';
    input_5.style.display = 'inline';

    label_1.style.display = 'inline';
    label_2.style.display = 'inline';
    label_3.style.display = 'inline';
    label_4.style.display = 'inline';
    label_5.style.display = 'inline';

    document.getElementById('escena').value = '3_Escena';
}