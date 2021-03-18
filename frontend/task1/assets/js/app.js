$("#year").keyup(function(event){
    if(event.keyCode === 13){
        leapYear.check();
    }
});

const leapYear = {

    ajaxMethod: 'POST',

    showMessage: function (message, isError = false) {

        if ($('.response-message').length) {
            $('.response-message').text(message);
        } else {
            $('.form-body').after('Response:&nbsp; <span class="response-message">' + message + '</span>');
        }

        if (isError) {
            $('.response-message').addClass('error');
        } else {
            $('.response-message').removeClass('error');
        }
    },

    check: function () {

        const year = $('#year');
        const formData = new FormData();
        formData.append('year', year.val());

        $.ajax({
            url: '/backend/task1/check',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (json) {

                var obj = jQuery.parseJSON(json);

                switch (obj.result) {
                    case 1001:
                        leapYear.showMessage('Input error', true);
                        break;

                    case 1002:
                        leapYear.showMessage('The entered year is a leap year');
                        break;

                    case 1003:
                        leapYear.showMessage('The entered year is not a leap year');
                        break;
                }

            }
        });
    }
};