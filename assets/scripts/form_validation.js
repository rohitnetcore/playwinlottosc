var FormValidation = function () {
    
    var handleValidation1 = function() {
        var add_user = $('#add_user');
        var error1 = $('.alert-error', add_user);
        var success1 = $('.alert-success', add_user);
        
        add_user.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                name: {
                    required: true
                },
                mobile_no: {
                    required: true,
                    digits: true,
                    maxlength: 10
                },
                email: {
                    required: true,
                    email: true
                }
            },
            
            messages: {
                name: {
                    required: 'Please enter first and last name.'
                },
                mobile_no: {
                    required: 'Please enter mobile number.'
                },
                email: {
                    required: 'Please enter email address.'
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
                $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            },

            unhighlight: function (element) {// revert the change done by hightlight
                $(element) 
                .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label) {
                label
                .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                document.add_user.submit();
                error1.hide();
            }
        });
    }
    
        var handleValidation2 = function() {
        var change_password = $('#change_password');
        var error1 = $('.alert-error', change_password);
        var success1 = $('.alert-success', change_password);
        
        change_password.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                old_password: {
                    required: true
                },
                new_password: {
                    required: true,
                    minlength: 4
                },
                confirm_password: {
                    required: true,
                    equalTo: '#new_password'
                }
            },
            
            messages: {
                old_password: {
                    required: 'Please enter old password.'
                },
                new_password: {
                    required: 'Please enter new password.'
                },
                confirm_password: {
                    required: 'Please enter confirm password.'
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
                $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            },

            unhighlight: function (element) {// revert the change done by hightlight
                $(element) 
                .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label) {
                label
                .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            },

            submitHandler: function (form) {
                //success1.show();
                document.change_password.submit();
                error1.hide();
            }
        });
    }
    
    var handleValidation3 = function() {
        var add_staff_user = $('#add_staff_user');
        var error1 = $('.alert-error', add_staff_user);
        var success1 = $('.alert-success', add_staff_user);
        
        add_staff_user.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                staff_name: {
                    required: true
                },
                username: {
                    required: true,
                    alphanumeric: true,
                    minlength: 4,
                    remote: {
                            type: 'POST',
                            url: '../admin/check_username'
                        }
                },
                password: {
                    required: true,
                    minlength: 4
                },
                confirm_password: {
                    required: true,
                    equalTo: '#password'
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                            type: 'POST',
                            url: '../admin/check_email'
                        }
                },
                phone_no: {
                    required: true,
                    digits: true,
                    maxlength: 10
                }
            },
            
            messages: {
                staff_name: {
                    required: 'Please enter first and last name.'
                },
                username: {
                    required: 'Please enter username.',
                    remote: 'Username already in use.'
                },
                password: {
                    required: 'Please enter password.'
                },
                confirm_password: {
                    required: 'Please enter confirm password.'
                },
                email: {
                    required: 'Please enter email address.',
                    remote: 'Email already in use.'
                },
                phone_no: {
                    required: 'Please enter phone number.'
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
                $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            },

            unhighlight: function (element) {// revert the change done by hightlight
                $(element) 
                .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label) {
                label
                .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                document.add_staff_user.submit();
                error1.hide();
            }
        });
    }
    
    var handleValidation4 = function() {
        var edit_site_details = $('#edit_site_details');
        var error1 = $('.alert-error', edit_site_details);
        var success1 = $('.alert-success', edit_site_details);
        
        edit_site_details.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                site_name: {
                    required: true
                },
                site_email: {
                    required: true,
                    email: true
                }
            },
            
            messages: {
                site_name: {
                    required: 'Please enter site name.'
                },
                site_email: {
                    required: 'Please enter site email.'
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
                $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            },

            unhighlight: function (element) {// revert the change done by hightlight
                $(element) 
                .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label) {
                label
                .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                document.edit_site_details.submit();
                error1.hide();
            }
        });
    }
    
    var handleValidation5 = function() {
        var edit_winner = $('#edit_winner');
        var error1 = $('.alert-error', edit_winner);
        var success1 = $('.alert-success', edit_winner);
        
        edit_winner.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                pod: {
                    required: true
                },
                courier_partner_name: {
                    required: true
                },
                address: {
                    required: true
                }
            },
            
            messages: {
                pod: {
                    required: 'Please enter Shipment/Tracking No.'
                },
                courier_partner_name: {
                    required: 'Please enter courier partner name.'
                },
                address: {
                    required: 'Please enter address.'
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
                $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            },

            unhighlight: function (element) {// revert the change done by hightlight
                $(element) 
                .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label) {
                label
                .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                document.edit_winner.submit();
                error1.hide();
            }
        });
    }
    
    var handleValidation6 = function() {
        var add_vehicle = $('#add_vehicle');
        var error1 = $('.alert-error', add_vehicle);
        var success1 = $('.alert-success', add_vehicle);
        
        add_vehicle.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                vehicle_name: {
                    required: true
                },
                taxi_plate: {
                    required: true
                },
                manufacturing_year: {
                    required: true
                },
                vehicle_color: {
                    required: true
                },
                vehicle_city: {
                    required: true
                },
                insurance_company: {
                  required: true  
                },
                policy_number: {
                    required: true
                },
                insurance_phone: {
                    digits: true
                },
                taxi_type: {
                    required: true
                }
            },
            
            messages: {
                vehicle_name: {
                    required: 'Please enter vehicle name.'
                },
                taxi_plate: {
                    required: 'Please enter taxi plate.'
                },
                manufacturing_year: {
                    required: 'Please select manufacturing year.'
                },
                vehicle_color: {
                    required: 'Please enter vehicle color.'
                },
                vehicle_city: {
                    required: 'Please enter vehicle city.'
                },
                insurance_company: {
                    required: 'Please enter insurance company.'
                },
                policy_number: {
                    required: 'Please enter policy number.'
                },
                taxi_type: {
                    required: 'Please select taxi type.'
                }
                
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
                $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            },

            unhighlight: function (element) {// revert the change done by hightlight
                $(element) 
                .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label) {
                label
                .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                document.add_vehicle.submit();
                error1.hide();
            }
        });
    }
    
    var handleValidation7 = function() {
        var add_driver = $('#add_driver');
        var error1 = $('.alert-error', add_driver);
        var success1 = $('.alert-success', add_driver);
        
        add_driver.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                vehicle_id: {
                  required: true  
                },
                fname: {
                    required: true
                },
                lname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                            type: 'POST',
                            url: '../admin/check_driver_email'
                        }
                },
                mobile_number: {
                    required: true,
                    digits: true
                },
                gender: {
                    required: true
                },
                dob: {
                  required: true  
                },
                driver_photo: {
                    extension: 'jpg|jpeg|png|gif'
                },
                country: {
                    required: true
                },
                city: {
                    required: true
                },
                'services[]': {
                    required: true
                },
                group_manager: {
                  required: true  
                },
                group_phone: {
                    required: true,
                    digits: true
                },
                group_address: {
                    required: true
                },
                status: {
                    required: true
                }
            },
            
            messages: {
                vehicle_id: {
                    required: 'Please select vehicle.'
                },
                fname: {
                    required: 'Please enter first name.'
                },
                lname: {
                    required: 'Please enter last name.'
                },
                email: {
                    required: 'Please enter email.',
                    remote: 'Email already in use.'
                },
                mobile_number: {
                    required: 'Please enter mobile number.'
                },
                gender: {
                    required: 'Please select gender.'
                },
                dob: {
                  required: 'Please select birth date.'  
                },
                country: {
                    required: 'Please enter country.'
                },
                city: {
                    required: 'Please enter city.'
                },
                'services[]': {
                    required: 'Please select services.'
                },
                group_manager: {
                  required: 'Please enter group manager.'  
                },
                group_phone: {
                    required: 'Please enter group phone.'
                },
                group_address: {
                    required: 'Please enter group address.'
                },
                status: {
                    required: 'Please select status.'
                }    
            },
            
            errorPlacement: function(error, element) {
                if (element.attr("name") == "vehicle_id") {
                    error.appendTo("#vehicle_id_error");
                } else if(element.attr("name") == "services[]") {
                    error.appendTo("#services_error");
                } else if(element.attr("name") == "gender") {
                    error.appendTo("#gender_error");
                } else {
                    error.insertAfter(element);
                }
            },
            
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
                $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            },

            unhighlight: function (element) {// revert the change done by hightlight
                $(element) 
                .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label) {
                label
                .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                document.add_driver.submit();
                error1.hide();
            }
        });
    }
    
    return {
        //main function to initiate the module
        init: function () {
            
            handleValidation1();
            handleValidation2();
            handleValidation3();
            handleValidation4();
            handleValidation5();
            handleValidation6();
            handleValidation7();
            
        }
    };    
}();
