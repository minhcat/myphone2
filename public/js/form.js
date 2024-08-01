const validateEmail = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

$(function() {
    // validate require
    $('input.input-required').on('blur', function() {
        $form_group = $(this).parent()
        if ($(this).val() === '') {
            $form_group.addClass('has-error')
            $form_group.find('span.help-block.require').removeClass('hidden')
        } else {
            $form_group.removeClass('has-error')
            $form_group.find('span.help-block.require').addClass('hidden')
        }
    })

    $('select.select-required').on('blur', function() {
        $form_group = $(this).parent()
        if ($(this).val() === null) {
            $form_group.addClass('has-error')
            $form_group.find('span.help-block.require').removeClass('hidden')
        } else {
            $form_group.removeClass('has-error')
            $form_group.find('span.help-block.require').addClass('hidden')
        }
    })

    // validate email
    $('input.input-email').on('blur', function() {
        $form_group = $(this).parent()
        if (!validateEmail($(this).val())) {
            $form_group.addClass('has-error')
            $form_group.find('span.help-block.email').removeClass('hidden')
        } else {
            $form_group.removeClass('has-error')
            $form_group.find('span.help-block.email').addClass('hidden')
        }
    })
})