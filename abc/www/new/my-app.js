// Initialize your app
var myApp = new Framework7({
	    template7Pages: true, // enable Template7 rendering for Ajax and Dynamic pages
    precompileTemplates: true //
})

myApp.removeFromCache("services.html");

myApp.removeFromCache("about.html");
myApp.removeFromCache("scan.html");

// Export selectors engine
var $$ = Dom7;

// Add views
var leftView = myApp.addView('.view-left', {
    // Because we use fixed-through navbar we can enable dynamic navbar
    dynamicNavbar: true
});
var mainView = myApp.addView('.view-main', {
    // Because we use fixed-through navbar we can enable dynamic navbar
    dynamicNavbar: true
	//mainView.hideNavbar();
	
});


  /*    (function(){
		   $("#callAjax2").ready(function() {
			   alert("hii");
        $.ajax({
          type: "POST",
          url: 'AjaxCallTest.php',
          data: ({Imgname:"13"}),
          success: function(data) {
            alert(data);
          }
        });
        });
      });*/
   

 
$$('form.ajax-submit').on('submitted', function (e) {
	var inputVal = $$('#myInput').val();
  var xhr = e.detail.xhr; // actual XHR object
 
  var data = e.detail.data; // Ajax response from action file
  // do something with response data
  alert(data);
});



function validation()
{
		 var ischeck=$('#s_id').prop('checked');
		 var ischeck1=$('#c_id').prop('checked');
		//alert(ischeck);
		//alert(ischeck1);
		 var userVal = $('#useid').val(); 
		 var passVal = $('#passid').val(); 
		 //alert(userVal);
		 //alert(passVal);
		
if(userVal != '' & passVal != '')
{
 if(ischeck == true)
  {
	  // myApp.alert("1");
	    //console.log('link clicked'); 
	    $$.get('auto.php', {username:userVal, pass:passVal}, function (data) {
  $('div#message').html(data);
  var dd=data.split("|");
 
 
 if(data!='Please enter correct username and password!!!')
{ 


mainView.router.load({
    url: 'home.html',
    context: {
      name: dd[0] ,
      id: dd[2]
    }
})

}
else
{
	mainView.router.load({
    url: 'index -2.html',
    contextName: 'languages.frontend.0'
	
	})
}
});

  }
 else if(ischeck == false)
	{
	  //myApp.alert("2");
	    	$$.get('auto.php', {username:userVal, pass:passVal}, function (data1) {
			$('div#message').html(data1);
			//mainView.router.load({template:'contact'});
	
 });
 
	}
}
	else if(userVal == '' & passVal != '')
	{
		
		var error1="Please type Username";
		$$('div#message').html(error1);
		
			  myApp.alert("Please type Username");
		mainView.router.loadPage('index -2.html');
	}
	
	else if(userVal != '' & passVal == '')
	{
		var error2="Please type Password";
		$$('div#message').html(error2);
		
				mainView.router.loadPage('index -2.html');
	}
	else 
	{
		var error3="Please type all Values";
		$('div#message').html(error3);
				mainView.router.loadPage('index -2.html');
				
	}
}

myApp.onPageInit('about', function (page) {
  // Do something here for "about" page
  
})
myApp.onPageInit('faq', function (page) {
  // Do something here for "about" page
  
})
 
// Option 2. Using one 'pageInit' event handler for all pages:
$$(document).on('pageInit', function (e) {
  // Get page data from event data
  var page = e.detail.page;
  
  if (page.name === 'about') {
    // Following code will be executed for page with data-page attribute equal to "about"
    myApp.alert('Here comes About page');
  }
})
// mainView.router.loadContent($('#myPage').html()); 



