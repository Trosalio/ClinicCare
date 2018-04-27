$(document).ready(function () {
    let clientInput = $('#client');
    let doctorRadioInput = $('#doctor');
    let clientInfo = $('#client-info');
    let doctorInfo = $('#doctor-info');

    if (clientInput.is(':checked')) {
        clientInfo.show();
    }
    if (doctorRadioInput.is(':checked')) {
        clientInfo.show();
        doctorInfo.show();
    }
    clientInput.change(function () {
        if ($(this).is(':checked')) {
            clientInfo.show();
            doctorInfo.hide();
            $('#medical_license_no').val('');
        }
    });
    doctorRadioInput.change(function () {
        if ($(this).is(':checked')) {
            clientInfo.show();
            doctorInfo.show();
        }
    });
});