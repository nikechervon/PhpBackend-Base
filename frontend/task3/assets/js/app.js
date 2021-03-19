$("#hipsters-count").keyup(function(event){
    if(event.keyCode === 13){
        hipstersAndSmoothies.getResponse();
    }
});

$("#smoothies-count").keyup(function(event){
    if(event.keyCode === 13){
        hipstersAndSmoothies.getResponse();
    }
});

const hipstersAndSmoothies = {

    ajaxMethod: 'POST',

    showError: function (input, inputError, message) {

        if (!inputError.length) {
            input.after('<span class="error">' + message + '</span>');
        }
    },

    getResponse: function () {

        const hipstersCount = $('#hipsters-count');
        const smoothiesCount = $('#smoothies-count');
        const responseMessage = $('.response-message');

        const hipstersCountError = $('#hipsters-count + .error');
        const smoothiesCountError = $('#smoothies-count + .error');

        const formData = new FormData();

        formData.append('hipstersCount', hipstersCount.val());
        formData.append('smoothiesCount', smoothiesCount.val());

        $.ajax({
            url: '/backend/task3/getSmoothiesCountForHipsters',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (json) {

                var obj = jQuery.parseJSON(json);
                responseMessage.text('');

                if (obj.result === 1001) {
                    hipstersAndSmoothies.showError(hipstersCount, hipstersCountError, 'Минимум 1 хипстер');

                } else if (obj.result === 1003) {
                    hipstersAndSmoothies.showError(hipstersCount, hipstersCountError, 'Вы можете вводить только цифры');

                } else {
                    hipstersCountError.remove();
                }

                if (obj.result === 1002) {
                    hipstersAndSmoothies.showError(smoothiesCount, smoothiesCountError, 'Минимум 1 смузи');

                } else if (obj.result === 1004) {
                    hipstersAndSmoothies.showError(smoothiesCount, smoothiesCountError, 'Вы можете вводить только цифры');

                } else {
                    smoothiesCountError.remove();
                }

                if (obj.result === 1005) {
                    responseMessage.text('Каждый хипстер выпьет ' + obj.data + ' смузи')
                }
            }
        });
    }
};