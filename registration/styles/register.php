
<?php $siteurl=site_url();	?>

<script type="text/javascript">
   
   var next_click=true;
   $(document).ready(function(){
   
		$('#signup_form').submit(function(){
		
			if ( $('#news_suscribe').is(":checked") &&  !$('#text_4').val() == " "  && !$('#text_3').val() == " " )
				{				
					jQuery.ajax({
						type: 'POST',
						async: false,
						url: ajaxurl,
						data: {	"action":"newsletter_suscribers",								
								"mailid":	$('#email_1').val()
								},
						cache: false,
						success: function(data){
						 // console.log(data);
						 response_mail = data;
						
						 //alert(data);
						}
					});
				}
		});

				  
		  
	// Smart Wizard     	
	$('#wizard').smartWizard({transitionEffect:'',onLeaveStep:leaveAStepCallback,onFinish:onFinishCallback,enableFinishButton:true});
	//$('#wizard').smartWizard();
	
		  function leaveAStepCallback(obj){
			var step_num= obj.attr('rel');		
				//var line_no_left = $('.actionBar a:nth-child(2)').attr('class');
				//str = $('#left-table').find('tr.highlight td:nth-child(1)').attr('id');
				//var line_no_left = $('.actionBar').find('a:nth-child(1)').attr('class');
				//alert(line_no_left);
				if(next_click)
				return validateSteps(step_num);
		 
			return true;
		  }
      
		  function onFinishCallback(){
		   if(validateAllSteps()){
			$('form').submit();
		   }
		  }
		  
	
		  if ($('.piereg_login_wrapper > p').hasClass("piereg_login_error")) { 
			   jQuery('#signup_form').hide();
				jQuery('#light').addClass("signin_popup");	   
			   jQuery('#login_wrap').show();
			}
  
  
			$("#signup_form").validate({
			
					errorPlacement: function(error, element) {
					error.insertAfter(element.closest('.fieldset'));
				 
				},			
				errorElement : 'p'				
			
			});
	});
	   
 
    function validateAllSteps(){
       var isStepValid = true;
       
       if(validateStep1() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:false});
       }
       
      /*  if(validateStep3() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:false});
       } */
	   
	   
	   if(validateStep2() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:2,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:2,iserror:false});
       }
       
       if(!isStepValid){
          $('#wizard').smartWizard('showMessage','Please correct the errors in the steps and continue');
       }
              
       return isStepValid;
    } 	
		
	    function validateSteps(step){
	
		  var isStepValid = true;
      // validate step 1
      if(step == 1){
        if(validateStep1() == false ){
          isStepValid = false; 
         // $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }
      
      // validate step2
	   
      if(step == 2){
        if(validateStep2() == false ){
          isStepValid = false; 
         // $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      
	  }
	
	  
	    // validate step3
     /*  if(step == 3){
        if(validateStep3() == false ){
          isStepValid = false; 
          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      } */
      
      return isStepValid;
    }
	
		function validateStep1(){
		
		var isValid = true; 
		var response_mail=0;
      //validate email  email
      var email = $('#email_1').val();
       if(email && email.length > 0){	   
	  
         if(!isValidEmailAddress(email)){
           isValid = false;
           $('#msg_email').html('Email is invalid').show();           
         }else {
		 var email_check=false;
          jQuery('#message_container').html( '<div class="lwa-loading" ></div>' );
		   jQuery.ajax({
	        type: 'POST',
			async: false,
	        url: ajaxurl,
	        data: {	"action":"subscribe_email",								
					"mail":	email
					},
	    	cache: false,
	        success: function(data){
	         // console.log(data);
			 response_mail = data;
			 jQuery('#message_container').hide();
			 //alert(data);
	        }
	    });
		
		//alert("Wait For Seconds we are");
           if( response_mail == 1){
           isValid = false;
		   $('#signup_form').hide()
		  
		   $( "#login_wrap" ).before( "<p class='error_msg'><span class='lwa-status lwa-status-invalid'><strong>ERROR</strong>: Email Already exists. </span></p>" );
		    jQuery('#light').addClass("signin_popup");
		    jQuery('#login_wrap').show();
			var str = $( "#email_1" ).val();
			$( ".lwa-username-input input" ).val( str );
           $('#msg_email').html('Email Already exists').show(); 
		   $('.error_msg').delay(5000).fadeOut('slow');
		  
			}else{
			$('#msg_email').html('').hide();
			}
         }
		 
       }else{
         isValid = false;
         $('#msg_email').html('Please enter email').show();
       }
	   $("#username").val($('#email_1').val());
      return isValid;
	  }
	 
  function validateStep2(){     
       // validate password
	   var isValid = true;
       var pw = $('#password_2').val();
	   
	   
	  
	   
       if(!pw && pw.length <= 0){
         isValid = false;
         $('#msg_password').html('Please fill password').show();         
       }else{
         $('#msg_password').html('').hide();
       }
       
       // validate confirm password
       var cpw = $('#confirm_password_password_2').val();
       if(!cpw && cpw.length <= 0){
         isValid = false;
         $('#msg_cpassword').html('Please fill confirm password').show();         
       }else{
         $('#msg_cpassword').html('').hide();
       }  
       
       // validate password match
       if(pw && pw.length > 0 && cpw && cpw.length > 0){
         if(pw != cpw){
           isValid = false;
           $('#msg_cpassword').html('Password mismatch').show();            
         }else{
           $('#msg_cpassword').html('').hide();
         }
       }
	   
	    if(pw.length <= 5) {
         isValid = false;
         $('#msg_password').html('Password must be minimum 6 digits').show();         
       }else{
         $('#msg_password').html('').hide();
       }
	  return isValid; 
	}
	   
	

	
	   
    
  /*   function validateStep3(){
      var isValid = true; 
       // Validate Username
       var un = $('#username').val();
       if(!un && un.length <= 0){
         isValid = false;
         $('#msg_username').html('Please fill username').show();
       }else{
         $('#msg_username').html('').hide();
       }
       return isValid;
    }
     */
    // Email Validation
    function isValidEmailAddress(emailAddress) {
      var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
      return pattern.test(emailAddress);
    } 
		
		
</script>

<div id="content">
		<div class="padder">
							
			<div class="page" id="register-page">				
				<form  name="signup_form" id="signup_form" class="standard-form" method="post" enctype="multipart/form-data">
					<div id="wizard" class="swMain">
						<ul>
							<li><a href="#step-1">
							<span class="stepNumber"></span>
							<span class="stepDesc">
							  E-Mail<br>							               
							 </span>
						</a></li>
							<li><a href="#step-2">
							<span class="stepNumber"></span>
							<span class="stepDesc">
							  Password<br>
							   </span>
						</a></li>
							<li><a href="#step-3">
							<span class="stepNumber"></span>
							<span class="stepDesc">
							   Your Name<br>
							   </span>
						 </a></li>				
						
						</ul>
						
						<div id="wrapper">
						   <div id="pie_register">	
							<span id="logo">				
							<img alt="logo" src="<?php bloginfo('template_url'); ?>/img/miren_logo.jpg" />				
							</span>
							
							<div id="step-1"> 				
								<div id="reg_wrap">
								<span> Sign up today and enjoy a welcome offer of</span>
								<h1>10% off</h1>
								<h2>Your first order</h2>
								<span>Start shopping today</span>
								<div><a id="why_we_ask" target="_blank" href="<?php echo home_url(); ?>/privacy-policy">Why We Ask?</a></div>
								<div class="pieregformWrapper pieregWrapper">							
								
								<div id="pie_register_reg_form">
								<ul>
									<li class="fields pageFields_1 " style="display: none;">
										<div class="fieldset"><label for="username" class="">First Name</label><input type="text" data-errormessage-value-missing="" value="" placeholder="" class="input_fields validate[required] required" name="username" id="username">
										</div>
									</li>
									<li class="fields pageFields_1 ">
										<div class="fieldset"><label for="email_1" class="">E-mail</label><input type="text" value="" placeholder="" data-errormessage-custom-error="" class="input_fields  validate[required,custom[email]]" name="e_mail" id="email_1"><span id="msg_email"></span>
										</div>
									</li>
								</ul>	
									</div>
									</div> 
								
								 <span>Already Registered ? Login Here </span><a id="login_div" style="cursor:pointer" >Login</a>
								 <div id="message_container"></div>
								 </div>
								
							</div><!-- step 1 -->
							

							<div id="step-2"><!-- step 2 -->
								<span> Sign up today and enjoy a welcome offer of</span>
								<h1>10% off</h1>
								<h2>Your first order</h2>
								<span>Start shopping today</span>
								<ul>
									<li class="fields pageFields_1 ">
										<div class="fieldset"><label for="password_2" class="">Password</label><input type="password" data-errormessage-range-overflow="" data-errormessage-range-underflow="" data-errormessage-value-missing="" placeholder="" class="input_fields  validate[minSize[8],required] valid" name="password" id="password_2"><span id="msg_password"></span></div>
									</li>
									
									<li class="fields pageFields_1 ">
										<div class="fieldset"><label>Confirm Password</label><input type="password" placeholder="" class="input_fields validate[required,equals[password_2]]" data-errormessage-range-overflow="" data-errormessage-range-underflow="" data-errormessage-value-missing="" id="confirm_password_password_2"><span id="msg_cpassword"></span>
										</div>
									</li>					
								</ul>
							</div><!-- step 2 -->			
							

							<div id="step-3"><!-- step 3 -->
								<span>Sign up today and enjoy a welcome offer of</span>
								<h1>10% off</h1>
								<h2>Your first order</h2>
								<span>Start shopping today </span>
								<ul>
									<li class="fields pageFields_1 ">
										<div class="fieldset"><label for="text_4" class="">First name</label><input type="text" value="" placeholder="" class="input_fields  required" name="text_4" id="text_4">
										</div>
									</li>
									<li class="fields pageFields_1 "><div class="fieldset"><label for="text_3" class="">Last Name</label><input type="text" value="" placeholder="" class="input_fields  required" name="text_3" id="text_3"></div>
									</li>
									
									<li class="fields pageFields_1 ">
										<div class="fieldset piereg_submit_button"><input type="submit" value="Submit" name="pie_submit"><span class="subscribe">
										<!--<input type="checkbox" tabindex="99" class="input" id="awr_opt_in" name="awr_opt_in">-->
										<input type="checkbox" value="Yes" name="mc4wp-subscribe" id="news_suscribe">Subscribe to our newsletter to receive great offers and news about our products!</span>
										</div>
									</li>					
								</ul>
								
							</div><!-- step 3 -->	
						</div>
						</div><!-- End Wrapper --> 
					</div><!-- End SmartWizard Content -->  
					
				</form>
				
				<div id="login_wrap">
					<?php login_with_ajax(); ?>
					<a class="back_link" style="cursor:pointer">Back</a>
				</div>
			</div><!--register page -->
		</div><!-- .padder -->
</div><!-- #content -->

