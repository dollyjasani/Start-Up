$(document).ready(function() {
    $('.select2').select2({
    });
});

function id_encrypt(string) {
    var key = 'FbcCY2yCFBwVCUE9R+6kJ4fAL4BJxxjd';
    var iv = 'e16ce913a20dadb8';
    var encrypted = CryptoJS.AES.encrypt(string, CryptoJS.enc.Utf8.parse(key), {
        iv: CryptoJS.enc.Utf8.parse(iv)
    });
    var str = encrypted.toString();
    return window.btoa(str);
}

$(document).on('click', '[data-target="#lightbox"]', function (e) {
    e.preventDefault();
    var href = $(this).attr('href');
    $(".popup-image").attr('src', href);
    $("#lightbox").modal('show');
});

$('.date_select').datepicker().on('changeDate', function(){
    $(this).datepicker('hide');
});