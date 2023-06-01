
var Script = function () {
    $("#dob").datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        pickerPosition: "bottom-left"
    });

    $("#check_all").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});

}();