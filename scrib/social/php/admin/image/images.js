<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(function() 
{
// Title tag
$("h4").click(function() 
{
var titleid = $(this).attr("id");
var sid=titleid.split("title"); // Splitting eg: title21 to 21
var id=sid[1];
var parent = $(this).parent();
$(this).hide();
$("#formbox"+id).show();
return false;
});
// Save Button
$(".save").click(function() 
{
var A=$(this).parent().parent();
var X=A.attr('id');
var d=X.split("formbox"); // Splitting  Eg: formbox21 to 21
var id=d[1];
var Z=$("#"+X+" input.content").val();
var dataString = 'id='+ id +'&title='+Z ;
$.ajax({
type: "POST",
url: "imageajax.php",
data: dataString,
cache: false,
success: function(data)
{
A.hide(); 
$("#title"+id).html(Z); 
$("#title"+id).show(); 
}
});
return false;
});
// Cancel Button
$(".cancel").click(function() 
{
var A=$(this).parent().parent();
var X= A.attr("id");
var d=X.split("formbox");
var id=d[1];
$("#title"+id).show();
A.hide();
return false;
});

});
</script>