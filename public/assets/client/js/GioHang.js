$(document).ready(function () {
    $(".qty").inputFilter(function (value) {
        return /^\d*$/.test(value);
    });
});
