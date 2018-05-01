$(document).ready(function () {
    let allDay = $('#all_day');
    let selectDay = $('#select_day');
    let customDay = $('#select-custom-day');

    if (selectDay.is(':checked')) {
        customDay.show();
    } else {
        customDay.hide();
    }
    allDay.change(function () {
        if ($(this).is(':checked')) {
            customDay.hide();
        }
    });
    selectDay.change(function () {
        if ($(this).is(':checked')) {
            customDay.show();
        }
    });

    $(function () {
        let start_hour = $("#start_hour");
        let end_hour = $("#end_hour");

        start_hour.change(function () {
            let max = parseInt(start_hour.attr('max'));
            let min = parseInt(start_hour.attr('min'));
            if (start_hour.val() > max) {
                start_hour.val(max);
            }
            else if (start_hour.val() < min) {
                start_hour.val(min);
            }

        });
        end_hour.change(function () {
            let max = parseInt(end_hour.attr('max'));
            let min = parseInt(end_hour.attr('min'));
            if (end_hour.val() > max) {
                end_hour.val(max);
            }
            else if (end_hour.val() < min) {
                end_hour.val(min);
            }
        });
        start_hour.click(function (e) {
            if(e.value !== undefined){
                end_hour.attr('min', parseInt(start_hour.val()) + 1);
            }
        });
        end_hour.click(function () {
            if(e.value !== undefined){
                start_hour.attr('max', end_hour.val() - 1);
            }
        });
    });
});