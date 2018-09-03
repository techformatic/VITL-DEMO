<html>
<head>
<script src="jquery-3.2.1.min.js"></script>
<style>
#search-data{
padding: 10px;
border: solid 1px #BDC7D8; 
margin-bottom: 20px;	
display: inline;
width: 100%;
	
}
.search-result{
border-bottom:solid 1px #BDC7D8;
padding:10px;
font-family:Times New Roman;
font-size: 20px;color:blue;	
}

</style>
<script>
$(document).ready(function() {
$('#search-data').unbind().keyup(function(e) {
    var value = $(this).val();
    if (value.length>3) {
		//alert(99933);
        searchData(value);
    } else {     
         $('#search-result-container').hide();
    }        
});
});

function searchData(val){
	$('#search-result-container').show();
	$('#search-result-container').html('<div><img src="preloader.gif" width="50px;" height="50px"> <span style="font-size: 20px;">Please Wait...</span></div>');
	$.post('controller.php',{'search-data': val}, function(data){
					
		if(data != "")
			$('#search-result-container').html(data);
        else				
		$('#search-result-container').html("<div class='search-result'>No Result Found...</div>");
	}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
					
	alert(thrownError); //alert with HTTP error
									
	});
}


</script>
</head>
<body>
<div style="width: 700px;margin:40px auto;">

<div id="search-box-container" >
<label > VITL TECHNICAL EXERCISE </label><br><label > Please type first 3 letters of the last name and strike the spacebar on your keypad </label><br><br>
<input  type="text" id="search-data" name="searchData" placeholder="Search By Last Name (word length should be greater than 3) ..." autocomplete="off" />
</div>

<div id="search-result-container" style="border:solid 1px #BDC7D8;display:none; ">
</div>


</div>

</body>

</html>