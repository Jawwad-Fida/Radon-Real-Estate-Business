(function ($) {

    "use strict";

    var $document = $(document),
        $window = $(window),
        forms = {
            contactForm: $('#contactform'),
            appointmentForm: $('#appointment-form')
        };

    $document.ready(function () {

        // appointment form
        if (forms.appointmentForm.length) {
            var $appointmentForm = forms.appointmentForm;
            $appointmentForm.validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    message: {
                        required: true,
                        minlength: 20
                    },
                    email: {
                        required: true,
                        email: true
                    }

                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        minlength: "Your name must consist of at least 2 characters"
                    },
                    message: {
                        required: "Please enter message",
                        minlength: "Your message must consist of at least 20 characters"
                    },
                    email: {
                        required: "Please enter your email"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "form/process-appointment.php",
                        success: function () {
                            $('#successAppointment').fadeIn();
                            $('#appointment-form').each(function () {
                                this.reset();
                            });
                        },
                        error: function () {
                            $('#appointment-form').fadeTo("slow", 0, function () {
                                $('#errorAppointment').fadeIn();
                            });
                        }
                    });
                }
            });
        }

        // contact page form
        if (forms.contactForm.length) {
            var $contactform = forms.contactForm;
            $contactform.validate({
                rules: {
                    firstname: {
                        required: true,
                        minlength: 2
                    },
                    lastname: {
                        required: true,
                        minlength: 2
                    },
                    message: {
                        required: true,
                        minlength: 20
                    },
                    email: {
                        required: true,
                        email: true
                    }

                },
                messages: {
                    firstname: {
                        required: "Please enter your first name",
                        minlength: "Your name must consist of at least 2 characters"
                    },
                    lastname: {
                        required: "Please enter your last name",
                        minlength: "Your name must consist of at least 2 characters"
                    },
                    message: {
                        required: "Please enter message",
                        minlength: "Your message must consist of at least 20 characters"
                    },
                    email: {
                        required: "Please enter your email"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "form/process-contact.php",
                        success: function () {
                            $('#success').fadeIn();
                            $('#contactform').each(function () {
                                this.reset();
                            });
                        },
                        error: function () {
                            $('#contactform').fadeTo("slow", 0, function () {
                                $('#error').fadeIn();
                            });
                        }
                    });
                }
            });
        }

    });

})(jQuery);
