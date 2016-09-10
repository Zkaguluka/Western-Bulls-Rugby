$(function(){
	
	var subscriptionForm, feedbackForm;				
	subscriptionForm = $('#homepageSubscriptionForm');
	feedbackForm = $('#feedbackForm');

	//hijacking php form processing
	subscriptionForm.submit(function(event) {

		var userName, email;
		userName = $('#homepageUserName').val();
		email = $('#homepageUserEmail').val();

		if($.trim(userName) == ''){
			$('#homepageUserName').css({
				'background-color': 'lightgrey',
				'border': 'solid 1px red'
			});
			$('<p>Your name is required to subscribe.</p>').insertBefore('#formParagraph');
		}

		if($.trim(email) == ''){
			$('#homepageUserEmail').css({
				'background-color': 'lightgrey',
				'border': 'solid 1px red'
			});
			$('<p>Your email is required to subscribe.</p>').insertBefore('#formParagraph');
		}

		if(!validateEmail(email)  ) {
			$('#homepageUserEmail').css({
				'background-color': 'lightgrey',
				'border': 'solid 1px red'
			});
			$('<p>Please enter a valid email address.</p>').insertBefore('#formParagraph');
		}

		if ($.trim(userName) != '' && $.trim(email) != '' && validateEmail(email)) {
			$.post('connect.php', {name: "userName", email: "email"}, function(data) {
				$('<p>Your subscription process was succesful.</p>').insertBefore('#formParagraph');
			});
			
		}
		
		event.preventDefault();
	});

	feedbackForm.submit(function(event) {

		var feedbackName, feedbackEmail, feedbackSubject, feedbackMessage;
		feedbackName = $('#feedbackFormUserName').val();
		feedbackEmail = $('#feedbackFormEmail').val();
		feedbackSubject = $('#feedbackFormSubject').val();
		feedbackMessage = $('#feedbackFormMessage').val();
		
		//basic validation
		if ($.trim('feedbackName') == '') {
			$('#feedbackFormUserName').css({
				'background-color': 'lightgrey',
				'border': 'solid 1 px red'
			});
			$('<p>Your name is required to post this message.</p>' ).insertAfter('#nameDiv');

		}
		if ($.trim('feedbackEmail') == '') {
			$('#feedbackFormEmail').css({
				'background-color': 'lightgrey',
				'border': 'solid 1 px red'
			});
			$('<p>Your email is required to post this message.</p>' ).insertAfter('#emaildiv');

		}
		if (!validateEmail(feedbackEmail) ) {
			$('#feedbackFormEmail').css({
				'background-color': 'lightgrey',
				'border': 'solid 1 px red'
			});
			$('<p>Please enter a valid email address.</p>' ).insertAfter('#emaildiv');
		}
		if ($.trim('feedbackSubject') == '') {
			$('#feedbackFormSubject').css({
				'background-color': 'lightgrey',
				'border': 'solid 1 px red'
			});
			$('<p>A subject is required to post this message.</p>' ).insertAfter('#subjectDiv');

		}
		if ($.trim('feedbackMessage') == '') {
			$('#feedbackFormMessage').css({
				'background-color': 'lightgrey',
				'border': 'solid 1 px red'
			});
			$('<p>Please write a message to send this post.</p>' ).insertAfter('#messageDiv');

		}


		if ($.trim('feedbackName') != '' && $.trim('feedbackEmail') != '' && $.trim('feedbackSubject') != '' && $.trim('feedbackMessage') != '' && validateEmail(feedbackEmail)) {
			$.post('connect2.php', {name: "feedbackFormUserName", email: "feedbackFormEmail", subject: "feedbackFormSubject", message: "feedbackFormMessage"}, function(data) {
			$('<p>Your message has been sent.</p>').insertBefore('#formParagraph');

			});
		}


	});


	function validateEmail(email){
		var expression = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		return expression.test(email);
	}
	
}    	
);
