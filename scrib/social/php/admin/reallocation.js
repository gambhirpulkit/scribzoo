function ajax(url,uqry,div)

{ 

	var xmlhttp = false;

	

	if (window.XMLHttpRequest)

	{

		xmlhttp=new XMLHttpRequest();

	}

	else

	{

        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

	}

	xmlhttp.onreadystatechange=function()

	{

		if (xmlhttp.readyState==4 && xmlhttp.status==200)

		{ //alert(xmlhttp.responseText);

			document.getElementById(div).innerHTML = xmlhttp.responseText;

		}

	}

	

	xmlhttp.open("POST",url,true);

	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

	xmlhttp.send(uqry);

}



function allocate(val1,val2,val3)

{

    //alert(val1);

	//alert(val2);

	//alert(val3);

	var url  = 'ajax.php';

	var uqry = 'mode=insertrequest&visitor='+val1+'&receiver='+val2+'&request='+val3;



	var div  = 'datadiv';

        ajax(url,uqry,div);

     

	

}

function showConversation(val1,val2,val3)

{

    //alert("hello");

	

	var url  = 'ajax.php';

	var uqry = 'mode=fetchconvo&sender='+val1+'&sendername='+val2+'&sendto='+val3;



	var div  = 'convodiv';

        ajax(url,uqry,div);

     

	

}





function clearnoti(val)

{

	      
	//alert(val);

	var url  = 'ajax.php';

	var uqry = 'mode=clearnoti&owner='+val;



	var div  = 'clearnoti1';

        ajax(url,uqry,div);

 

 }

 function toggleDiv(divid){

    	

	    if(document.getElementById(divid).style.display == 'none'){

	      document.getElementById(divid).style.display = 'block';

	    }else{

	      document.getElementById(divid).style.display = 'none';

	    }

  }

  

 function edit_title(post){

	// alert();

	 document.getElementById(post).style.display = 'none';

	 document.getElementById(input_title).style.display = 'block';

 }

function vote_up(val1,val2){

var url  = 'ajax.php';

	var uqry = 'mode=vote_up&testimonial='+val1+'&voter='+val2;



	var div  = 'voteup';

        ajax(url,uqry,div);
	
 }

function unvote(val1,val2)
{

var url  = 'ajax.php';

	var uqry = 'mode=unvote&testimonial='+val1+'&voter='+val2;



	var div  = 'unvote';

        ajax(url,uqry,div);
	
 }

function facebook_ajax(val_testimonial){

var url  = 'facebook_ajax.php';

	var uqry = 'mode=vote_up_noti&testimonial_to_show='+val_testimonial;



	var div  = 'voteup';

        ajax(url,uqry,div);
	
 }

function save_testimonial(val1,val2){

var url  = 'ajax_write.php';

	var uqry = 'mode=save_testimonial&pid='+val1+'&sender='+val2;

	var div  = 'datadivsavetestimonial';

        ajax(url,uqry,div);
	
 }


function send_email(val1,val2){

var val3  = document.getElementById('profile_email_body').value;

var url  = 'ajax_write.php';

	var uqry = 'mode=send_email&receiver_email_id='+val1+'&sender_email_id='+val2+'&profile_email_body='+val3;

	var div  = 'datadivsend_email';

        ajax(url,uqry,div);
	
 }

 function connect_request(val1,val2){


var url  = 'ajax.php';

	var uqry = 'mode=connect_request&accepter='+val1+'&requester='+val2;



	var div  = 'connection';

        ajax(url,uqry,div);
	
 }
 function unconnect_request(val1,val2){

var url  = 'ajax.php';

	var uqry = 'mode=unconnect_request&accepter='+val1+'&requester='+val2;



	var div  = 'unconnection';

        ajax(url,uqry,div);
	
 }

function approve_request(val1, val2){



var url  = 'ajax.php';

	var uqry = 'mode=connect_approve&accepter='+val1+'&requester='+val2;



	var div  = 'approval';

        ajax(url,uqry,div);

}

function follow_request(val1,val2){

var url  = 'ajax.php';

	var uqry = 'mode=follow_request&board='+val1+'&follower='+val2;



	var div  = 'follow';

        ajax(url,uqry,div);
	
 }

function unfollow_request(val1,val2){


var url  = 'ajax.php';

	var uqry = 'mode=unfollow_request&unfollow_board='+val1+'&unfollower='+val2;



	var div  = 'unfollow';

        ajax(url,uqry,div);
	
 }

function viewtestimonial_request(val1, val2,val3){



var url  = 'ajax.php';

	var uqry = 'mode=view_testimonial&test_owner_id='+val1+'&test_requester_id='+val2+'&pid='+val3;



	var div  = 'testimonial_request';

        ajax(url,uqry,div);

}
function approve_viewrequest(val1, val2){


var url  = 'ajax.php';

	var uqry = 'mode=approve_view_req&test_requester_id='+val1+'&pid='+val2;



	var div  = 'approve_view_request';

        ajax(url,uqry,div);

}

function addBoard(val1){


var url  = 'ajax.php';

	var uqry = 'mode=addBoard&testimonial_id='+val1;



	var div  = 'testimonial_added';

        ajax(url,uqry,div);

}


function share(val1,val2){
//alert();
var url  = 'ajax.php';

	var uqry = 'mode=share&testimonial='+val1+'&sharer='+val2;



	var div  = 'voteup';

        ajax(url,uqry,div);
	
 }
function load_more(val1){

var url  = 'ajax_secondary.php';

alert(val1);

	var uqry = 'mode=load_more&previous_rows='+val1;



	var div  = 'load_more';

        ajax(url,uqry,div);
	
 }
 
function load_more_people(val1,val2){


var url  = 'ajax_secondary_people.php';

	var uqry = 'mode=load_more_people&previous_rows_people='+val1+'&keyword='+val2;



	var div  = 'load_more_people';

        ajax(url,uqry,div);
	
 }

function load_more_peopleymk(val1){


var url  = 'ajax_secondary_people.php';

	var uqry = 'mode=load_more_peopleymk&previous_rows_people='+val1



	var div  = 'load_more_peopleymk';

        ajax(url,uqry,div);
	
 }

function load_more_profile(val1,val2){

var url  = 'ajax_secondary.php';

	var uqry = 'mode=load_more_profile&previous_rows='+val1+'&stalk_id='+val2;



	var div  = 'load_more_profile';

        ajax(url,uqry,div);
	
 } 
function comment_insert(val1, val2){

var val3  = document.getElementById('comment_button').value;


var url  = 'ajax_secondary.php';

	var uqry = 'mode=comment_insert&testimonial_id='+val1+'&requester_id='+val2+'&comment_text='+val3;



	var div  = 'add_comment';

        ajax(url,uqry,div);
	
 }

function store_title(val1,val3)

{


var val2  = document.getElementById('input_title').value;
    //alert(val1);

	//alert(val2);

	//alert(val3);

	var url  = 'ajax_write.php';

	var uqry = 'mode=inserttitle&s_email='+val1+'&title='+val2+'&s_name='+val3;

 	document.getElementById('disabled_next').style.display = 'none';


	var div  = 'datadivtitle';

        ajax(url,uqry,div);

 }

function store_receiver(val1)

{


var val2  = document.getElementById('input_receiver').value;
   	var url  = 'ajax_write.php';

	var uqry = 'mode=insertreceiver&s_email='+val1+'&receiver='+val2;



	var div  = 'datadivereceiver';

        ajax(url,uqry,div);

 }

function send_header_info(val2)

{


var val1  = document.getElementById('title_edit').value;


   	var url  = 'ajax_write.php';

	var uqry = 'mode=edit_header&header_title='+val1+'&header_pid='+val2;



	var div  = 'datadiveditedheader';

        ajax(url,uqry,div);

 }

function send_header_info_old_testimonial(val2)

{


var val1  = document.getElementById('header_title').value;


   	var url  = 'ajax_write.php';

	var uqry = 'mode=edit_old_header&header_title='+val1+'&header_pid='+val2;



	var div  = 'datadiveditedoldheader';

        ajax(url,uqry,div);

 }

function send_body_info(val2)

{


var val1  = document.getElementById('blockquote_text').value;


   	var url  = 'ajax_write.php';

	var uqry = 'mode=edit_body&body_info='+val1+'&body_pid='+val2;



	var div  = 'datadiveditedbody';

        ajax(url,uqry,div);

 }

function discard_testimonial(val1)

{


   	var url  = 'ajax_write.php';

	var uqry = 'mode=discard_testimonial&discard_pid='+val1;



	var div  = 'datadivdiscardbody';

        ajax(url,uqry,div);

 }

function send_edit_name(val1)

{
       var val2  = document.getElementById('firstname').value;
     
       var val3  = document.getElementById('lastname').value;

   	var url  = 'ajax_write.php';

	var uqry = 'mode=edit_name&name_editor_email='+val1+'&firstname='+val2+'&lastname='+val3;


	var div  = 'datadiveditname';

        ajax(url,uqry,div);

 }

function send_edit_aboutme(val1)

{
       var val2  = document.getElementById('edit_aboutme').value;
    
   	var url  = 'ajax_write.php';

	var uqry = 'mode=edit_aboutme&aboutme_editor_email='+val1+'&aboutme='+val2;


	var div  = 'datadiveditaboutme';

        ajax(url,uqry,div);

 }
function sendHide(val1,val2)

{


  var url  = 'ajax_write.php';

	var uqry = 'mode=hide&pid='+val1+'&hide='+val2;


	var div  = 'datadiveditaboutme';

        ajax(url,uqry,div);
       
   	
 }
function sendAnonymous(val1,val2)

{


  var url  = 'ajax_write.php';

	var uqry = 'mode=anonymous&pid='+val1+'&anonymous='+val2;


	var div  = 'datadiveditaboutme';

        ajax(url,uqry,div);
       
   	
 }

function delete_testimonial(val1)

{


  var url  = 'ajax_write.php';

	var uqry = 'mode=delete_testimonial&pid='+val1;


	var div  = 'datadiveditdelete';

        ajax(url,uqry,div);
       
   	
 }


function append(val1)

{

var url  = 'ajax_write.php';

var val2  = document.getElementById('s2id_select2_2').innerHTML;


var uqry = 'mode=append&append_sender='+val1+'&append_receiver='+val2;




	var div  = 'datadivappend';

        ajax(url,uqry,div);


 }

function insert_receiver_string(val1)

{

var url  = 'ajax_write.php';

var val2  = document.getElementById('s2id_select2_2').innerHTML;


var uqry = 'mode=receiver_string&receiver_string_sender='+val1+'&receiver_string='+val2;




	var div  = 'datadivreceiver_string';

        ajax(url,uqry,div);


 }

function return_tagging(val1)

{

var url  = 'ajax_write.php';


var uqry = 'mode=return_tagging&return_tagging_pid='+val1;




	var div  = 'datadivreturntagging';

        ajax(url,uqry,div);


 }

function update_form_data(val1)

{


       var val2  = document.getElementById('firstname_register').value;

  var val3  = document.getElementById('lastname_register').value;

  var val4  = document.getElementById('select2_1').value;

  var val5  = document.getElementById('aboutme_register').value;

  var val6  = document.getElementById('hometown_register').value;
    
   	var url  = 'ajax_enter.php';

	var uqry = 'mode=update_form_data&firstname='+val2+'&lastname='+val3+'&gender='+val4+'&aboutme='+val5+'&hometown='+val6+'&register_email='+val1;


	var div  = 'datadivupdateformdata';

        ajax(url,uqry,div);

 }

function update_form_data_login(val1)

{


       var val2  = document.getElementById('firstname_login').value;

  var val3  = document.getElementById('lastname_login').value;

  var val4  = document.getElementById('username_login').value;
  var val5  = document.getElementById('aboutme_login').value;

  var val6  = document.getElementById('hometown_login').value;
    
   	var url  = 'ajax_enter.php';

	var uqry = 'mode=update_form_data_login&firstname='+val2+'&lastname='+val3+'&username='+val4+'&aboutme='+val5+'&hometown='+val6+'&register_email='+val1;


	var div  = 'datadivupdateformdatalogin';

        ajax(url,uqry,div);

 }

function check_username()
{
 var val1  = document.getElementById('username_login').value;
var url  = 'ajax_enter.php';

	var uqry = 'mode=check_username&username='+val1;


	var div  = 'datadivcheckusername';

        ajax(url,uqry,div);

}
function search_keyword()

{


var val1  = document.getElementById('search_box').value;


   	var url  = 'ajax_write.php';

	var uqry = 'mode=search_keyword&string='+val1;


	var div  = 'datadivsearchkeyword';

        ajax(url,uqry,div);


 }

function search_people()

{


var val1  = document.getElementById('search_people').value;


   	var url  = 'ajax_write.php';

	var uqry = 'mode=search_people&string='+val1;


	var div  = 'datadivsearchpeople';

        ajax(url,uqry,div);


 }

function add_user(val1,val2,val3)

{


     alert(val3);
   	var url  = 'ajax_write.php';

	var uqry = 'mode=add_user&receiver_nav='+val1+'&sender_nav='+val2+'&receiver_mid_nav='+val3;
       
	var div  = 'datadivadduser';

        ajax(url,uqry,div);


 }

function setTestimonialSession(val1)

{

//alert(val1);

   	var url  = 'ajax_write.php';

	var uqry = 'mode=setTestimonialSession&testimonial='+val1;
       
	var div  = 'datadivsetTestimonialSession';

        ajax(url,uqry,div);


 }
function save_video(val1)
{

 var val2  = document.getElementById('youtube_video_id').value;
document.getElementById('before_media_upload').style.display='none';


var url  = 'ajax_write.php';

	var uqry = 'mode=save_video&pid='+val1+'&youtube_video_id='+val2;


	var div  = 'datadivsavevideo';

        ajax(url,uqry,div);

}

function delete_comment(val1)
{



document.getElementById(val1).innerHTML = "<i>comment deleted.</i>";

var url  = 'ajax_delete.php';

	var uqry = 'mode=delete_comment&comment_id='+val1;


	var div  = 'datadivcommentdeleted';

        ajax(url,uqry,div);

}

function report(val1)
{

//alert(val1);

val2 = 'reportabuse'+val1;

document.getElementById(val2).style.color="red";

var url  = 'ajax_report.php';

	var uqry = 'mode=report_comment&comment_id='+val1;


	var div  = 'datadivcommentreported';

        ajax(url,uqry,div);

}

function fetch_testimonial_image(val1)
{

document.getElementById('before_media_upload').style.display='none';

var url  = 'ajax_write.php';

	var uqry = 'mode=fetch_testimonial_image&pid='+val1;


	var div  = 'display_image';

        ajax(url,uqry,div);

}
