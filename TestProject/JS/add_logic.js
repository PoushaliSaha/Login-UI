$(document).ready(function(){
	
	$("#mob").click(function(){
	    //$("div.info").show();
	});
	
	$('#age').on('input', function (event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	
	$('#mob').on('input', function (event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	
	
    $(".addBtn").click(function(event){
    	
    	event.preventDefault();
    	//alert("ok");
    	
    	var firstname = $("#firstname").val();
    	var lastname = $("#lastname").val();
    	var gender = $("#gender").val();
    	var age = $("#age").val();
    	var dob = $("#datepicker").val();
    	var mob = $("#mob").val();
    	var desc = $("#desc").val();
    	
    	if(desc.trim() == '' || desc.trim() == null){
    		desc = 'No additional information provided!';
    	}
    	
    	var phoneNum = mob.replace(/[^\d]/g, '');
    	
    	var dobPattern =/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
    	
    	if(firstname.trim() && lastname.trim() && (gender && gender!= null) && age && dobPattern.test(dob) && (mob.length==10) && desc)
    	{
    		$(this).attr('disabled', 'disabled');
    		$.ajax({
    			type: 'POST',
    			url: 'action_page.php',
    			data: {
    			      fullname	: firstname.trim() + " " + lastname.trim(),
    			      mob		: mob,
    			      age		: age,
    			      dob		: dob,
    			      gender	: gender,
    			      desc		: desc
    			},
    			error: function() {
    				
    			},
    			//dataType: 'jsonp',
    			success: function(data) {
    				//console.log(data);
    				if(data === 'inserted')
    			    {
    					window.location.href = "showAll.php";
    					$("#addInfoForm").each(function(){
    					    this.reset(); 
    					}); 
    			    }  else{
    			    	alert("Error!! Something went wrong while connecting to the database!!")
    			    }  			        			    
    			}    			   
    		});
    	}
    	if( !firstname || firstname.trim() ==""){
    		alert("Please enter your firstname!!");
    		return false;
    	}
    	else if( !lastname || lastname.trim() ==""){
    		alert("Please enter your lastname!!");
    		return false;
    	}
    	else if( !gender || gender.trim() =="" ||gender == null){
    		alert("Please select your gender!!");
    		return false;
    	}
    	else if( !age || age.trim() ==""){
    		alert("Please enter your age!!");
    		return false;
    	}
    	else if(!dob || dob.trim() == "")
    	{
    		alert("Please select your date of birth !!");
    		return false;
    	}
    	else if(!mob || mob.trim() =="" || (phoneNum.length >0 && phoneNum.length < 10 ) || phoneNum.length > 10) {
       		alert("Please enter 10 digit valid mobile number!!!");
       		return false;
    	}
    	else if (dob == null || dob == "" || !dobPattern.test(dob)) {
    		alert("Invalid date of birth!!! The format should be mm/dd/yyyy!!");
            return false;
        }
        
    	
    	
    	
    });
});