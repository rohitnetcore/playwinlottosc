var UIJQueryUI = function () {

    
    var handleDatePickers = function () {
        $('#datetime').datetimepicker({  
          showSecond: true,
          timeFormat: 'hh:mm:ss',
          stepHour: 2,
          stepMinute: 10,
          stepSecond: 10
        });  
        
        $('#basic_example_2').timepicker();
        
        /*code added by Anand -start*/
        $('#callback_datetime input').datetimepicker({
            dateFormat: 'dd-mm-yy',
            timeFormat: 'HH:mm:ss'
        });
        $("#callback_datetime .add-on").click(function(){
	    	$("#callback_datetime input").datetimepicker("show");
	});
        $('#msg_datetime input').datetimepicker({
            dateFormat: 'dd/mm/yy'
        });
        $("#msg_datetime .add-on").click(function(){
	    	$("#msg_datetime input").datetimepicker("show");
	});
        
        $('#actual_datetime input').datetimepicker({
            dateFormat: 'dd-mm-yy'
        });
        $("#actual_datetime .add-on").click(function(){
	    	$("#actual_datetime input").datetimepicker("show");
	});
        
        $('#customer_dob input').datepicker({
            yearRange: "-80:+0",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#customer_dob .add-on").click(function(){
	    	$("#customer_dob input").datepicker("show");
	});
        
        $('#customer_spouse_dob input').datepicker({
            yearRange: "-80:+0",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#customer_spouse_dob .add-on").click(function(){
	    	$("#customer_spouse_dob input").datepicker("show");
	});
        
        $('#customer_child1_dob input').datepicker({
            yearRange: "-80:+0",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#customer_child1_dob .add-on").click(function(){
	    	$("#customer_child1_dob input").datepicker("show");
	});
        
        $('#customer_child2_dob input').datepicker({
            yearRange: "-80:+0",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#customer_child2_dob .add-on").click(function(){
	    	$("#customer_child2_dob input").datepicker("show");
	});
        
        
        $('#expected_date input').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#expected_date .add-on").click(function(){
	    	$("#expected_date input").datepicker("show");
	});
        
        $('#tentative_date input').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#tentative_date .add-on").click(function(){
	    	$("#tentative_date input").datepicker("show");
	});
        
        $('#new_tentative_date input').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#new_tentative_date .add-on").click(function(){
	    	$("#new_tentative_date input").datepicker("show");
	});
        
        $('#insurace_policy_date input').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            onSelect: function(dateStr) {
                var d = $.datepicker.parseDate('dd-mm-yy', dateStr);
                var years = $("#duration").val();
                d.setFullYear(d.getFullYear() + +years);
                d.setDate(d.getDate() - 1);
                $('#insurace_expiry_date input').datepicker('setDate', d);
            }
        });
        $("#insurace_policy_date .add-on").click(function(){
	    	$("#insurace_policy_date input").datepicker("show");
	});
        
        $('#insurace_expiry_date input').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#insurace_expiry_date .add-on").click(function(){
	    	$("#insurace_expiry_date input").datepicker("show");
	});
        /*code added by Anand -end*/
        
        $("#ui_date_picker").datepicker();

        $("#ui_date_picker_with_button_bar").datepicker({
          showButtonPanel: true
        });

        $("#ui_date_picker_inline").datepicker();

        $("#ui_date_picker_change_year_month" ).datepicker({
	      changeMonth: true,
	      changeYear: true
	    });

	    $("#ui_date_picker_multiple").datepicker({
	    	numberOfMonths: 2,
      		showButtonPanel: true
	    });
            /*code added by Anand on 07 Jan 2014 -start*/
	    $( "#ui_date_picker_range_from input" ).datetimepicker({
	      changeMonth: true,
               //showOn: "both",
              changeYear: true,
              dateFormat: 'dd-mm-yy',
              timeFormat: 'HH:mm:ss',
	      //numberOfMonths: 2,
	      onClose: function( selectedDate ) {
	        $( "#ui_date_picker_range_to input" ).datepicker( "option", "minDate", selectedDate );
	      }
	    });
            $("#ui_date_picker_range_from .add-on").click(function(){
	    	$("#ui_date_picker_range_from input").datepicker("show");
	    });
            
	    $( "#ui_date_picker_range_to input" ).datetimepicker({
	      changeMonth: true,
              changeYear: true,
              dateFormat: 'dd-mm-yy',
              timeFormat: 'HH:mm:ss',
	      //numberOfMonths: 2,
	      onClose: function( selectedDate ) {
	        $( "#ui_date_picker_range_from input" ).datepicker( "option", "maxDate", selectedDate );
	      }
	    });
            $("#ui_date_picker_range_to .add-on").click(function(){
	    	$("#ui_date_picker_range_to input").datepicker("show");
	    });
            
            
            $( "#ui_date_picker_range_from1 input" ).datepicker({
	      changeMonth: true,
              changeYear: true,
              dateFormat: 'dd-mm-yy',
	      //numberOfMonths: 2,
	      onClose: function( selectedDate ) {
	        $( "#ui_date_picker_range_to1 input" ).datepicker( "option", "minDate", selectedDate );
	      }
	    });
            $("#ui_date_picker_range_from1 .add-on").click(function(){
	    	$("#ui_date_picker_range_from1 input").datepicker("show");
	    });
            
	    $( "#ui_date_picker_range_to1 input" ).datepicker({
	      changeMonth: true,
              changeYear: true,
              dateFormat: 'dd-mm-yy',
              //numberOfMonths: 2,
	      onClose: function( selectedDate ) {
	        $( "#ui_date_picker_range_from1 input" ).datepicker( "option", "maxDate", selectedDate );
	      }
	    });
            $("#ui_date_picker_range_to1 .add-on").click(function(){
	    	$("#ui_date_picker_range_to1 input").datepicker("show");
	    });
            
            /*code added by Anand on 07 Jan 2014 -end*/
            
	    $("#ui_date_picker_week_year" ).datepicker({
	      showWeek: true,
	      firstDay: 1
	    });

	    $("#ui_date_picker_trigger input").datepicker();
	    $("#ui_date_picker_trigger .add-on").click(function(){
	    	$("#ui_date_picker_trigger input").datepicker("show");
	    });
    }

    var handleDialogs = function () {

    	// basic dialog1
    	$( "#dialog_basic1" ).dialog({
		      autoOpen: false,
		      dialogClass: 'ui-dialog-yellow',
		      show: {
		        effect: "blind",
		        duration: 500
		      },
		      hide: {
		        effect: "explode",
		        duration: 500
		      }
	    });
	 
	    $( "#basic_opener1").click(function() {
	      $( "#dialog_basic1" ).dialog( "open" );	
	      $('.ui-dialog button').blur();// avoid button autofocus     
	    });

	    // basic dialog2
    	$( "#dialog_basic2" ).dialog({
		      autoOpen: false,
		      dialogClass: 'ui-dialog-purple',
		      show: {
		        effect: "blind",
		        duration: 500
		      },
		      hide: {
		        effect: "explode",
		        duration: 500
		      }
	    });
	 
	    $( "#basic_opener2").click(function() {
	      $( "#dialog_basic2" ).dialog( "open" );	
	      $('.ui-dialog button').blur();// avoid button autofocus     
	    });

	    // basic dialog3
    	$( "#dialog_basic3" ).dialog({
		      autoOpen: false,
		      dialogClass: 'ui-dialog-grey',
		      show: {
		        effect: "blind",
		        duration: 500
		      },
		      hide: {
		        effect: "explode",
		        duration: 500
		      }
	    });
	 
	    $( "#basic_opener3").click(function() {
	      $( "#dialog_basic3" ).dialog( "open" );	
	      $('.ui-dialog button').blur();// avoid button autofocus     
	    });

	    // basic dialog4
    	$( "#dialog_basic4" ).dialog({
		      autoOpen: false,
		      dialogClass: 'ui-dialog-red',
		      show: {
		        effect: "blind",
		        duration: 500
		      },
		      hide: {
		        effect: "explode",
		        duration: 500
		      }
	    });
	 
	    $( "#basic_opener4").click(function() {
	      $( "#dialog_basic4" ).dialog( "open" );	
	      $('.ui-dialog button').blur();// avoid button autofocus     
	    });

	    // info dialog
	    $("#dialog_info").dialog({
	      dialogClass: 'ui-dialog-blue',
	      autoOpen: false,
	      resizable: false,
	      height: 250,
	      modal: true,
	      buttons: [
	      	{
	      		"text" : "OK",
	      		'class' : 'btn green',
	      		click: function() {
        			$(this).dialog( "close" );
      			}
	      	}
	      ]
	    });

	    $( "#info_opener").click(function() {
	      $( "#dialog_info" ).dialog( "open" );
	       $('.ui-dialog button').blur();// avoid button autofocus
	    });

	    //confirm dialog
	    $("#dialog_confirm" ).dialog({
	      dialogClass: 'ui-dialog-green',
	      autoOpen: false,
	      resizable: false,
	      height: 210,
	      modal: true,
	      buttons: [
	      	{
	      		'class' : 'btn red',	
	      		"text" : "Delete",
	      		click: function() {
        			$(this).dialog( "close" );
      			}
	      	},
	      	{
	      		'class' : 'btn',
	      		"text" : "Cancel",
	      		click: function() {
        			$(this).dialog( "close" );
      			}
	      	}
	      ]
	    });

	    $( "#confirm_opener").click(function() {
	      $( "#dialog_confirm" ).dialog( "open" );
	       $('.ui-dialog button').blur();// avoid button autofocus
	    });

    }
    
    /*code added for checkbox and radio -start*/
    var handleUniform = function () {
        if (!jQuery().uniform) {
            return;
        }
        if (test = $("input[type=checkbox]:not(.toggle), input[type=radio]:not(.toggle)")) {
            test.uniform();
        }
    }
    /*code added for checkbox and radio -end*/

    return {
        //main function to initiate the module
        init: function () {
            handleDatePickers();
            handleDialogs();
            handleUniform();
        }

    };

}();