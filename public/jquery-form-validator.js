(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#apm_form").validate({
                rules: {
                    JobNumber: {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    APMTime: {
                        required: true,
                        date: true
                    },
                    Contractor: "required",
                    JobsiteName: "required",
                    FSR: {
                        required: true,
                        maxlength: 4,
                    },
                    NumberOfTests: {
                        required: true,
                        minlength:1,
                    },
                    JobsiteAddress: "required",
                    JobsiteCity: "required",
                    JobsiteState: {
                        required: true,
                        maxlength: 2,
                        minlength: 2
                    },
                    JobsiteZIP: {
                        required: true,
                        minlength: 5,
                        maxlength: 10
                    },
                    ContactDayShift: "required",
                    ContactDayShiftCell: "required",
                    ContactNightshift: "required",
                    ContactNightShiftCell: "required",
                    Dateofnotification: {
                        date: true
                    },
                    SecurityContact: {
                        minlength: 2,
                        maxlength: 23
                    },
                    GEContact: "required",
                    GECell: "required",
                    FSR: {
                        required: true,
                        maxlength: 4
                    }
                },
                               
                messages: {

                },
                
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);