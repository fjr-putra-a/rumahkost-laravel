$(document).ready(function() {
    if (jQuery().daterangepicker) {
        if ($(".datepicker").length) {
            $(".datepicker").daterangepicker({
                locale: { format: "YYYY-MM-DD" },
                singleDatePicker: true
            });
        }
        if ($(".datetimepicker").length) {
            $(".datetimepicker").daterangepicker({
                locale: { format: "YYYY-MM-DD hh:mm" },
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true
            });
        }
        if ($(".daterange").length) {
            $(".daterange").daterangepicker({
                locale: { format: "YYYY-MM-DD" },
                drops: "down",
                opens: "right"
            });
        }
    }
});
