// Initialize your app
var myApp = new Framework7({
	    template7Pages: true, // enable Template7 rendering for Ajax and Dynamic pages
    precompileTemplates: true //
})

myApp.removeFromCache("services.html");
myApp.removeFromCache("qrcode.html");
myApp.removeFromCache("contact.html");
myApp.removeFromCache("profile.html");

myApp.removeFromCache("about.html");
myApp.removeFromCache("scan.html");
myApp.removeFromCache("viewbill_shop.html");
myApp.removeFromCache("newshopregister.html");
myApp.removeFromCache("client_registration.html");


// Export selectors engine
var $$ = Dom7;

 
 


var calendarDefault = myApp.calendar({
    input: '#calendar-default',
});        


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

//userlogin function

function validation()
{
		 var ischeck=$('#s_id').prop('checked');
		 var ischeck1=$('#c_id').prop('checked');
		 var userVal = $('#useid').val(); 
		 var passVal = $('#passid').val(); 
					  //alert("hii");
					  var abc = chkconnection();
					 // var abc = new chkconnection();
					  	//  alert(abc);
/* $$.post('http://shopnearn.co.in/mobileapp/chk_connection.php',  function (resul)
				 {
				if (resul == 'Ok')
				{
									 
*/
if(abc == 2)
{

if(userVal != '' & passVal != '')
{
 if(ischeck == true)
  {
	 
	  	    var a='shop';
		//alert(a);
			$$.get('http://shopnearn.co.in/mobileapp/auto.php', {username:userVal, pass:passVal,a:a}, function (data) {
			$('div#message').html(data);
 			var dd=data.split("|");
 			
	if(data!="Please Enter Correct Username or Password")
	{ 
		 if(localStorage != undefined)
{
  console.log("Local Storage is supported");

  //add
  localStorage.setItem("Website", dd[1]);

  //update or overwrite
  //localStorage.setItem("Website", "SitePoint.com");

  //remove
  //localStorage.removeItem("Website");

  //remove all
  //localStorage.clear();
}
else
{
  console.log("No support");
}
		mainView.router.load({
			url: 'qrcode.html',
			context: 
		{
			user: dd[1] ,

		}
							})
	}
	else
	{
	  $('#useid').val('');
	  $('#passid').val('');
	//mainView.router.load({
//    url: 'index -2.html',
 //   contextName: 'languages.frontend.0'
	
	//})
	}
	});

	}
 else if(ischeck == false)
	{
		var a='companyshop';
		$$.get('http://shopnearn.co.in/mobileapp/auto.php', {username:userVal, pass:passVal,a:a}, function (data) {
		$('div#message').html(data);
		var dd=data.split("|");
	if(data!="Please Enter Correct Username or Password")
	{ 
		    if(localStorage != undefined)
{
  console.log("Local Storage is supported");

  //add
  localStorage.setItem("Website", dd[1]);

  //update or overwrite
  //localStorage.setItem("Website", "SitePoint.com");

  //remove
  //localStorage.removeItem("Website");

  //remove all
  //localStorage.clear();
}
else
{
  console.log("No support");
}
	//	    localStorage.setItem("shopname", dd[1]);
		    
	mainView.router.load({
    url: 'qrcode.html',
        context: 
    {
      user: dd[1] ,

    }
	})
}
else
	{
	 $('#useid').val('');
	  $('#passid').val('');
	//mainView.router.load({
  //  url: 'index.html',
 //   contextName: 'languages.frontend.0'
	
//	})
		}
		});
	}
}
	else if(userVal == '' & passVal != '')
	{
		var error1="Please type Username";
		$$('div#message').html(error1);
		
		myApp.alert("Please type Username");
		mainView.router.loadPage('index.html');
	}
	
	else if(userVal != '' & passVal == '')
	{
		var error2="Please type Password";
		$$('div#message').html(error2);
		mainView.router.loadPage('index.html');
	}
	else 
	{
		var error3="Please type all Values";
		$('div#message').html(error3);
		mainView.router.loadPage('index.html');
				
	}
/*}
else
	{
				myApp.alert("connection error");

	}
});*/
}
else
{
					myApp.alert("No Internet Connection Found","Alert");

}
}


function validate()
{
		 var ischeck =$('#q_id').prop('checked');
		 var ischeck1=$('#cust_id').prop('checked');
		 var ischeck2=$('#m_id').prop('checked');
		//alert(ischeck);
	//	alert(ischeck1);
	//	alert(ischeck2);
		 var userVal = $('#id').val(); 
		 var user = $('#user').val(); 
		// var passVal = $('#passid').val(); 
	//	 alert(userVal);
		 //alert(passVal);

if(userVal != '' )
{
 if(ischeck == true)
  {
	   if (chkconnection() == "notok")
 { 
	     $$.get('http://shopnearn.co.in/mobileapp/auto1.php', {username:userVal,user:user}, function (data) {
  $('div#message').html(data);
  var dd=data.split("|");
 //myApp.alert(data);

 if(data!='Please enter correct details!!!')
{ 


mainView.router.load({
    url: 'home.html',
    context: 
   {
      name: dd[0] ,
      id: dd[1],
      idd: dd[2],
      rewpt: dd[3],
      user:user
    }
})

}
else
{
	mainView.router.load({
    url: 'index.html',
    contextName: 'languages.frontend.0'
	
	})
}
});
}
else
{
	myApp.alert("Please Check Network Connection");
}
  }
 else if(ischeck1 == true)
	{
	// myApp.alert("1");
	    //console.log('link clicked'); 
	     $$.get('http://shopnearn.co.in/mobileapp/auto1.php', {username:userVal,user:user}, function (data) {
  $('div#message').html(data);
  var dd=data.split("|");
 // myApp.alert(data);
 
 if(data!='Please enter correct details!!!')
{ 


mainView.router.load({
    url: 'home.html',
    context: 
    {
      name: dd[0] ,
      id: dd[1],
     idd: dd[2],
     rewpt: dd[3],
     user:user
    }
})

}
else
{
	mainView.router.load({
    url: 'index.html',
    contextName: 'languages.frontend.0'
	
	})
}
});
 
	}
	 else if(ischeck2 == true)
	{
	// myApp.alert("1");
	    //console.log('link clicked'); 
	     $$.get('http://shopnearn.co.in/mobileapp/auto1.php', {username:userVal,user:user}, function (data) {
  $('div#message').html(data);
  var dd=data.split("|");
 
 // myApp.alert(dd[2]);
 if(data!='Please enter correct details!!!')
{ 


mainView.router.load({
    url: 'home.html',
    context: 
    {
      name: dd[0] ,
      id: dd[1],
       idd: dd[2],
             rewpt: dd[3],
                   user:user
    }
})

}
else
{
	mainView.router.load({
    url: 'index.html',
    contextName: 'languages.frontend.0'
	
	})
}
});
 
	}
}
	else if(userVal == '' )
	{
		
		var error1="Please type ID";
		$$('div#message').html(error1);
		
			  myApp.alert("Please type Username");
		mainView.router.loadPage('index.html');
	}
	

	else 
	{
		var error2="Please type all Values";
		$('div#message').html(error3);
				mainView.router.loadPage('index.html');
				
	}

}

function rew()
{
	 //var ischeck =$('#q_id').prop('checked');
	var isChecked = $('#chk_id').prop('checked');
	
	var totamt = $('#totamt').val();   
    var rewpt = $('#rewpt').val();  
   // var rewpt = "100";
    var clnid = $('#customername').val();
	//alert(clnid);
	
	var netamt=0;

	
	if (isChecked == true)
	{
myApp.modalPassword('Enter Your Password?', 'Password', 
      function (value) {
        //myApp.alert('Your name is "' + value + '". You clicked Ok button','SBIT');
        
          $$.get('http://shopnearn.co.in/mobileapp/chkpass.php', {clientid:clnid,pass:value}, function (data) {
		if (data == "1")
		{
			if(rewpt=='' && totamt =='' )
				{
					 netamt=0;
				}
				else if(rewpt=='' && totamt != '' )
				{
					 netamt=totamt;
				}
				else if(parseInt(rewpt) > parseInt(totamt))
				{
					myApp.alert('Your Reward Points are more than Purchase Cost','Alert');
					netamt=totamt;
				}					
				else
				{
    			netamt=parseInt(totamt)- parseInt(rewpt);
				//  $$('input#netamt').val(totamt);
				}
					$$('input#netamt').val(netamt);
		}
		else
		{
			myApp.alert("Wrong Password","Alert");
			rew();
		}
}); 
      },
      function (value) {
        //myApp.alert('Your name is "' + value + '". You clicked Cancel button','SBIT');
       // $('#chk_id').prop()=false;
	$('#chk_id').prop('checked')=false;
      }
    );	
			//	  myApp.alert("i m in reward function");
						 				//  myApp.alert(netamt);
			//	  $('#rewpt').val()=netamt;
			
	}
					  $$('input#netamt').val(totamt);

	
	}
	
	
      
	
	
function submit()
{		 			// myApp.alert("hii");
	var  memberId= $('#customername').val(); 
		 var billno = $('#billno').val(); 
		 var bill = $('#bill').val(); 
		 var totamt = $('#totamt').val(); 
		 var netamt = $('#netamt').val(); 
		 		 var reward_pt = $('#rewpt').val();
		 var t1 = $('#t1').val(); 
		 	var isCheck = $('#chk_id').prop('checked');

		 var abc1 = chkconnection();
	if (abc1 == 2)
	{
		    if(totamt != '' & netamt != '' & billno != '')
			{ 
	 $$.post('http://shopnearn.co.in/mobileapp/insertdetail.php', {memberId:memberId,billno:billno,bill:bill,totamt:totamt,netamt:netamt,t1:t1,reward_pt:reward_pt,isCheck:isCheck}, function (data) 
		{
		 //  var dd=data.split("|");

  //$('div#message').html(data);
 		 			 myApp.alert(data,"Bill");
					mainView.router.loadPage('qrcode.html');

 
		});

			}
		
		else
			{
			var error1="Please Enter Details Properly";
		$$('div#message').html(error1);
		
			  myApp.alert("Please Enter Details Properly");
		mainView.router.loadPage('index.html');
			}
	
	}
	else
	{
							myApp.alert("No Internet Connection Found","Alert");

	}
}



function contact()
{
	var  name= $('#name').val(); 
		 var address = $('#address').val(); 
		 var enquiry = $('#enquiry').val(); 
	
	var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	      if(reg.test(address)==false)
                {
               myApp.alert("Please Enter Valid Email Address");
              // $('#address').val()=='';    
//$('#address').val()='';
			$('#address').val('');
               return false;             
                }      
                
                 if(address==""||name==""||enquiry=="")
                 {
               myApp.alert("Please Enter All Details Properly...!!!");
            $('#name').val('')=""; 
            $('#address').val('') ="";         
            $('#enquiry').val('') =""; 
                 }
	else
                 {
                 	
             $$.get('http://shopnearn.co.in/mobileapp/email.php', {name:name,address:address,enquiry:enquiry}, function (data) {
			 $('div#message').html(data);  	
                		 			 myApp.alert(data);  	
                 	});   
                 	}
	
	
	}
	
	function checkpass()
	{
			var  username= $('#username').val(); 
		  $$.get('', {username:username}, function (data) {
  $('div#message').html(data);  	
                		 			 myApp.alert(data);  	
                 	})   
		
$('#pass').val(data);
	var oldpass=$('#pass').val(); 
 var oldpass1=$('#old_password').val(); 
	var message =$('#oldpassword').val();
	var goodColor = "#66cc66";
 var badColor = "#ff6666";	
		
 if(oldpass == oldpass1.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        
      //  oldpass1.style.backgroundColor = goodColor;
      //  message.style.color = goodColor;
      //  message.innerHTML = "Passwords Match!";
        $('#sub').disabled=false;

    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
      //  oldpass1.style.backgroundColor = badColor;
      //  message.style.color = badColor;
      //  message.innerHTML = "Passwords Do Not Match!";
      //          document.getElementById('old_password').value="";
            $('#sub').disabled=true;
    }
		
		
		
		}
	
function getprofile()
{
	 // myApp.alert("hii");  	  	
	 $$.get('http://shopnearn.co.in/mobileapp/NEWREG.php',  function (data) {
 //$$.get('NEWREG.php',  function (data) {
  $('div#message').html(data);
   	// myApp.alert(data);  	  	
   var dd=data.split("|");
   

mainView.router.load({
    url: 'profile.html',
     context: 
   {
      totalreg: dd[0] ,
      total1reg: dd[1],
      Entryreg: dd[2],
     totalamount12: dd[3],
     totalamount: dd[4],
     last_datepur: dd[5],
     totalqua: dd[6],
     total1qua: dd[7],
     reg_time122qua: dd[8]
    }
})
})
}

function viewbill()
{
    var shop_id = localStorage.getItem('Website');
	var to= $('#to').val();
	var from= $('#from').val();
	var today= $('#today').val();
		alert(shop_id);

	 
	 $$.get('http://shopnearn.co.in/mobileapp/viewbill.php',{name1:shop_id,todate:to,fromdate:from,today:today},  function (data) {
  //$('div#message').html(data);
   	 myApp.alert(data);  	  	
   var dd=data.split("|");
   

mainView.router.load({
    url: 'profile.html',
     context: 
   {
      totalreg: dd[0] ,
      total1reg: dd[1],
      Entryreg: dd[2],
     totalamount12: dd[3],
     totalamount: dd[4],
     last_datepur: dd[5],
     totalqua: dd[6],
     total1qua: dd[7],
     reg_time122qua: dd[8]
    }
})
})
	
	
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




function scanCode() 
{
	//alert('hhh');

	cordova.plugins.barcodeScanner.scan(
      function (result) {
          /*alert("We got a barcode\n" +
                "Result: " + result.text + "\n" +
                "Format: " + result.format + "\n" +
                "Cancelled: " + result.cancelled);*/
		var barcod =result.text;
		//alert(barcod);
		codeconvert(barcod);
		 //$('#id').val(barcod); 

      }, 
      function (error) {
          //alert("Scanning failed: " + error);
	  console.log(error);
      },
      {
          "preferFrontCamera" : true, // iOS and Android
          "showFlipCameraButton" : true, // iOS and Android
          "prompt" : "Place a barcode inside the scan area", // supported on Android only
          "formats" : "QR_CODE,PDF_417", // default: all but PDF_417 and RSS_EXPANDED
          "orientation" : "landscape" // Android only (portrait|landscape), default unset so it rotates with the device
      }
   );
	
}

if(localStorage.getItem("LocalData") == null)
{
    var data = [];
    data = JSON.stringify(data);
    localStorage.setItem("LocalData", data);
}
var codecon;
function codeconvert(codecon)
{
	 $$.post('http://shopnearn.co.in/mobileapp/concode.php', {codecon:codecon}, function (data) {
			// myApp.alert(data);
			 //$('div#message').html(data);  
			 if (data == "1")
					{
						myApp.Alert("Wrong QrCode Please Check","Alert");
					}
				else
					{
					$('#id').val(data); 	
					}  		 			  	
               })
	
}


function scan()
{
    cordova.plugins.barcodeScanner.scan(
        function (result) {
            if(!result.cancelled)
            {
                if(result.format == "QR_CODE")
                {
                    navigator.notification.prompt("Please enter name of data",  function(input){
                        var name = input.input1;
                        var value = result.text;

                        var data = localStorage.getItem("LocalData");
                        console.log(data);
                        data = JSON.parse(data);
                        data[data.length] = [name, value];

                        localStorage.setItem("LocalData", JSON.stringify(data));

                        alert("Done");
                    });
                }
            }
        },
        function (error) {
            alert("Scanning failed: " + error);
        }
   );
}

function encodeData(){
                var data = document.getElementById("data").value;
                if (data != ''){
                    cordova.plugins.barcodeScanner.encode(
                        BarcodeScanner.Encode.TEXT_TYPE, data, 
                        function(success){
                            alert("Encode success: " + success);
                        }, 
                        function(fail){
                            alert("Encoding failed: " + fail);
                        }
                    );
                }
                else{
                    alert("Please enter some data.");
                    return false;
                }
            }

//validation for scanning page
function checkuserid()
{
var isCh = $$('#q_id').prop('checked');
var isCh2 = $$('#cust_id').prop('checked');
var isCh3 = $$('#m_id').prop('checked');
var userid = $('#id').val(); 
var shpoid= $('#shpdiv_id').val();
var shpoid= $('#shp_id').val();
var shpoid4=localStorage.getItem("shopname");
var shpoid2= $$('#shp_id').val();
var shpoid3= $$('#shp_id').text;

var shpid12=document.getElementById("shpdiv_id").text;
//alert(isCh);
var emid='usid';
var mobid='mob';

if(isCh != true && isCh2 != true && isCh3 != true )
{
myApp.alert("Please Select Any Option First","Alert");
}
else if(isCh == true && userid == '')
{
scanCode();
}
else if(isCh == true && userid != '' )
{
SENDNEXTFRM(userid,emid);
}
else if(isCh2 == true && userid != '')
{
SENDNEXTFRM(userid,emid);
}
else if(isCh3 == true && userid != '') 
{
SENDNEXTFRM(userid,mobid);
}
else 
{
myApp.alert("Please Enter Data In Textbox","Alert");	
}


// var userid = $('#id').val(); 
//	if (userid == '')
//	{
//	alert("Please Enter User ID")	
//	}		 

}
var id;
var type;
	function SENDNEXTFRM(id,type)
	{
		var shpid= $$('#shpdiv_id').val();
 		var shpid1=document.getElementById("shpdiv_id").value;
		  //myApp.alert(id);
		                 var shop_id = localStorage.getItem('Website');

if(id != '' && type =='usid')
  { 
	 $$.post('http://shopnearn.co.in/mobileapp/sendtocalc.php', {memberId:id,shopid:shop_id}, function (resul) 
	 {
                     //$('div#message').html(data);
 		 			// myApp.alert(resul);
 		 			    var dd=resul.split("|");
 		 			 if(resul != 1)
 		 			 {
						  mainView.router.load({
					url: 'home.html',
					context: 
					{
						name: dd[0] ,
						id: dd[1],
						user: shop_id,
						idd: dd[2],
						pt: dd[3]
						//rewpt: dd[3],
						//user:user
					}
					})
					}

					 
					 else
					 {
						 						  myApp.alert("WRONG Client ID","Alert");
						 						  $$('#id').value='';

 		 			 
						}
  });

   }
else if(id != '' && type =='mob' )
{
	
	
		 $$.post('http://shopnearn.co.in/mobileapp/mobtodata.php', {mobno:id,shopid:shop_id}, function (resul) 
	 {
                     //$('div#message').html(data);
 		 			 //myApp.alert(resul);
 		 			 //var shname=$$('#shpdiv_id').val();
 		 			//var id = $$('p').data('shp_id'); 
 		 			//myApp.alert(JSON.stringify(shop_id));

 		 			//myApp.alert(JSON.stringify(shname));
 		 			    var dd=resul.split("|");
 		 			 if(resul != 1)
 		 			 {
						  mainView.router.load({
					url: 'home.html',
					context: 
					{
						name: dd[0] ,
						id: dd[1],
						user: shop_id,
						idd: dd[2],
						pt: dd[3]
						//rewpt: dd[3],
						//user:user
					}
					})
					}

					 
					 else
					 {
						 						  myApp.alert("WRONG Client ID");
						 						  $$('#id').value='';

 		 			 
						}
  });
		
 }
 else
 {
	 	var error1="Please Enter Details Properly";
		//$$('div#message').html(error1);
		
			  myApp.alert("Please Enter Details Properly","Alert");
		mainView.router.loadPage('index.html');
	 
	 }
}

function cancel()
{
					mainView.router.loadPage('qrcode.html');

	}
function sentpassword()
	{
	var shopid = $$('#shp_id').val();
	var isshp = $$('#shop_id').prop('checked');
	var iscms = $$('#cms_id').prop('checked');
	
	
	if (shopid == '' )
	{
		myApp.alert("Please Enter Your Shop Id ","Alert");
	}
	else
	{
		if(isshp == true && iscms != true)
		{
			 //$$.post('http://shopnearn.co.in/mobileapp/sendpass.php', {shopid:shopid}, function (resul) 
			$$.post('http://shopnearn.co.in/mobileapp/sendpass.php', {shopid:shopid,shtype:"tieshop"}, function (resul)
					{
                     //$('div#message').html(data);
 		 			 myApp.alert(resul);
 		 			 
					});
					}
					else
					{
						$$.post('sendpass.php', {shopid:shopid,shtype:"ownshop"}, function (resul)
						{
                     //$('div#message').html(data);
 		 			 myApp.alert(resul,"Alert");
 		 			 
					});
						
					}



		
	}
	
	}
	var value;
	function chkconnection()
	{
			var networkState = navigator.connection.type;
 
      var states = {};
      states[Connection.UNKNOWN] = 'Unknown connection';
      states[Connection.ETHERNET] = 'Ethernet connection';
      states[Connection.WIFI] = 'WiFi connection';
      states[Connection.CELL_2G] = 'Cell 2G connection';
      states[Connection.CELL_3G] = 'Cell 3G connection';
      states[Connection.CELL_4G] = 'Cell 4G connection';
      states[Connection.CELL] = 'Cell generic connection';
      states[Connection.NONE] = 'No network connection';
 
      if (states[networkState] == 'No network connection') {
                    /* myApp.alert(
          'No active connection found!',
          oppenSettings,
          'Network ',
         'OK'
          );*/
          return 1;
           
      }
      return 2;
}

function viewallbill()
{
		var frmdate = $$('#frmdate').val();
		var todate = $$('#todate').val();
	   var shop_id = localStorage.getItem('Website');
	
	// $$.get('http://shopnearn.co.in/mobileapp/concode.php', {codecon:codecon}, function (data) {
		 $$.get('http://shopnearn.co.in/mobileapp/view_alltieupbill.php', {from:frmdate,to:todate,name:shop_id}, function (data) {
			 //myApp.alert(data);
			 $('div#myTable').html(data);  
			 /*if (data == "1")
					{
						myApp.Alert("Wrong QrCode Please Check","Alert");
					}
				else
					{
					$('#id').val(data); 	
					}  	*/	 			  	
               });
	
	
	//alert(frmdate);
	//alert(todate);
	
}

function shopregister()
{
	 var abc1 = chkconnection();
	if (abc1 == 2)
	{
		var shopname = $('#shopname').val(); 
		var ownername= $('#ownername').val();
		var addres= $('#addres').val();
		var mobno= $('#mobno').val();
		var panno= $('#panno').val();
		var vatno= $('#vatno').val();
		var pinno= $('#pinno').val();
		var cstno= $('#cstno').val();
		var shpdes= $('#shpdes').val();
		
		if(shopname != '' & ownername != '' & mobno != '')
			{ 
	// $$.post('http://shopnearn.co.in/mobileapp/shopregister.php', {shopname:shopname,ownername:ownername,addres:addres,mobno:mobno,panno:panno,vatno:vatno}, function (data) 
	$$.post('http://shopnearn.co.in/mobileapp/shopregister.php', {shopname:shopname,ownername:ownername,addres:addres,mobno:mobno,panno:panno,vatno:vatno,pinno:pinno,cstno:cstno,shpdes:shpdes}, function (data) 
		{
		 //  var dd=data.split("|");

  //$('div#message').html(data);
 		 			 myApp.alert(data,"Message");
					//mainView.router.loadPage('qrcode.html');

 
		});
		
	}
	else
	{
		myApp.alert("PLEASE FILL SHOP NAME, OWNER NAME AND MOB.NO","Alert");
		
		}
	}
	else
	{
							myApp.alert("No Internet Connection Found","Alert");

	}
}
var id2;
function check_id(id2)
{
	 $$.post('http://shopnearn.co.in/mobileapp/sponser.php', {sponsorId:id2}, function (data) {
			 //myApp.alert(data);
			 //$('div#myTable').html(data);  
			 if (data == 1)
					{
		      					myApp.alert("Sponser Id is NOT available", "Alert");
												$('#sponsorId').val()=" "; 
												//document.getElementById('sponsorId').focus();					
					}
				else
					{

					$('div#message').html(data); 	
					}  		 	  	
               });
	
			
}
	var eid1;

function email_add(eid1)
{
	
	$$.get('http://shopnearn.co.in/mobileapp/email_admin.php', {email:eid1}, function (data) {
			 //myApp.alert(data);
			 //$('div#myTable').html(data);  
			 if (data == 1)
					{
		      					myApp.alert("Email is already exists", "Alert");
												$('#email').val()=" "; 
												//document.getElementById('sponsorId').focus();					
					}
				/*else
					{

					$('#message').html(data); 	
					}  	*/	 	  	
              });
	
	}
var id3;	
	function phonenumber(id3)
{
	
	$$.get('http://shopnearn.co.in/mobileapp/email_admin.php', {mobileNo:id3}, function (data) {
			 //myApp.alert(data);
			 //$('div#myTable').html(data);  
			 if (data == 1)
					{
		      					myApp.alert("Mobile no is already exists", "Alert");
												$('#mobileNo').val()=" "; 
												//document.getElementById('sponsorId').focus();					
					}
				/*else
					{

					$('#message').html(data); 	
					}  	*/	 	  	
              });
	
	
	} 
	
	function msg_send()
{
	 var mobile=$('#mobileNo').val();
	 var cmatch=$('#cmatch').val();

$$.get('http://shopnearn.co.in/mobileapp/msg_send_cof.php', {mobile:mobile,cmatch:cmatch}, function (data) {
			 //myApp.alert(data);
			 //$('div#myTable').html(data);  
			 if (data == 1)
					{
		      					myApp.alert("Message Send", "Alert");
												//$('#mobileNo').val()=""; 
												//document.getElementById('sponsorId').focus();					
					}
				/*else
					{

					$('#message').html(data); 	
					}  	*/	 	  	
               });
	

	}



