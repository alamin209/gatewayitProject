var $j = jQuery.noConflict();

$j(document).ready(function(){ 

	$j(".productPriceWrapRight a").click(function() {


		var text_error = "";

		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		
		var productX 		= $j("#productImageWrapID_" + productIDVal).offset().left;
		var productY 		= $j("#productImageWrapID_" + productIDVal).offset().top;
		
		var window_width = $j(window).width();

		var mobile = "";

		if(window_width<955){

		var mobile="Mobile";

		}

		if( $j("#productID_" + productIDVal).length > 0){
			var basketX 		= $j("#productID_" + productIDVal).offset().left;
			var basketY 		= $j("#productID_" + productIDVal).offset().top;

			
		} else {
			var basketX 		= $j("#basketTitleWrap"+mobile).offset().left;
			var basketY 		= $j("#basketTitleWrap"+mobile).offset().top;
		}
		
		var gotoX 			= basketX - productX;
		var gotoY 			= basketY - productY;
		
		var newImageWidth 	= $j("#productImageWrapID_" + productIDVal).width() / 3;
		var newImageHeight	= $j("#productImageWrapID_" + productIDVal).height() / 3;
		
		var quantity=document.getElementById("quan").value;

		var dataString = 'add='+ productIDVal + '&quan=' + quantity; 

		var post_data = $j("prod"+productIDVal).serialize();

		var fileTransfer = document.getElementById("fileinput");

		var allowProcess = 1;
	
		var uploads = document.getElementsByClassName("filename");
		var upload_id = document.getElementById("upload_id");

		if(upload_id!=null){


		var file_uploads_block = 0;

		var upload_string = null;

		var upload_id = document.getElementById("upload_id");


			var i;
	
			for (i = 0; i < uploads.length; i++) {

				var uploads_exist = 1;
		
				if(upload_string){
				var upload_string = upload_string + "|" + uploads[i].innerHTML;
				}else{
				var upload_string = uploads[i].innerHTML;
				}

			}



		if(upload_string==null){
		var allowProcess = 0;
		var text_error = text_error+"Please attach an image<br/>";
		}

		if(upload_string!==null){
		if(upload_string.includes("Uploading")){
		var allowProcess = 0;
		var text_error = text_error+"Please attach an valid image file<br/>";
		}
		}

		var textboxes = document.getElementsByClassName("textbox");

		var text_string = null;

		var i;
	

		for (i = 0; i < textboxes.length; i++) {
	
			var options_exist = 1;

			if(textboxes[i].value){

				if(text_string){
				var text_string = text_string + "|" + textboxes[i].value;
				}else{
				var text_string = textboxes[i].value;
				}

			document.getElementById(textboxes[i].id).style.background="white";


			}else{

			var text_empty  = 1;

			document.getElementById(textboxes[i].id).style.background="pink";
			
			}
		}


		if(text_empty==1 && options_exist==1){
		var allowProcess = 0;
		var requiredInfo = 1;
		var text_error = text_error+"Please provide required information<br/>";
		}

		var dataString=dataString+"&"+upload_id.name+"="+upload_string;

		}


		var textboxes = document.getElementsByClassName("textbox");

		var text_string = null;

		var i;
	

		var textboxes_exist = 0;
		var text_empty = 0;

		for (i = 0; i < textboxes.length; i++) {
	
			var textboxes_exist = 1;

			if(textboxes[i].value){

				if(text_string){
				var text_string = text_string + "|" + textboxes[i].value;
				}else{
				var text_string = textboxes[i].value;
				}

			document.getElementById(textboxes[i].id).style.background="white";

			}else{

			var text_empty  = 1;

			document.getElementById(textboxes[i].id).style.background="pink";

			}

		}

		if(text_empty==1 && textboxes_exist==1){
		var allowProcess = 0;
		if(requiredInfo==0){
		var text_error = text_error+"Please provide required information<br/>";
		}
		}

		if(allowProcess==0){
		document.getElementById("fileUploadError").innerHTML=text_error;
		document.getElementById("fileUploadError").style.display="inline-block";
		}

		if(allowProcess==1){
		document.getElementById("fileUploadError").style.display="none";
		}		

		

		var i=1;

		for(i=1;i<=15;i++){

		selectMenu=document.getElementById("option"+i);

		if(selectMenu!=null){

		var index = document.getElementById("option"+i).selectedIndex;

		var value=document.getElementById("option"+i).options[index].value;

		var dataString=dataString+"&"+document.getElementById("option"+i).name+"="+value;

		}

		}


		var i=1;

		for(i=1;i<=15;i++){

		textMenu=document.getElementById("text_option"+i);

		if(textMenu!=null){

		var value=document.getElementById("text_option"+i).value;

		var dataString=dataString+"&"+document.getElementById("text_option"+i).name+"="+value;

		}

		}


		var i=0;

		var e = document.getElementById("list_"+i);

		while (e != null) { 

		var multiplesTrue=1;

		var eq = document.getElementById("list_quan"+i);

		if(eq.value>0){

		var id = document.getElementById("list_id"+i).value;

		var dataString=dataString+"&"+"list_id["+id+"]="+eq.value;

		eq.selectedIndex=0;

		var allowAdd=1;

		var currency = document.getElementById("blank_price").value;

		document.getElementById("total_price").innerHTML="<b>"+currency+"</b>";

		var base_price = document.getElementById("base_price_text").innerHTML;

		document.getElementById("total_package").innerHTML="<b>"+base_price+"</b>";

		document.getElementById("list_product_button").style.display="inline";
		document.getElementById("list_add_button").style.display="none";



		}

		i++;



		var e = document.getElementById("list_"+i);

		}

		if(allowProcess==1){

		$j("#productImageWrapID_" + productIDVal + " img")
		.clone()
		.prependTo("#productImageWrapID_" + productIDVal)
		.css({'position' : 'absolute'})
		.animate({opacity: 0.4}, 100 )
		.animate({opacity: 0.1, marginLeft: gotoX, marginTop: gotoY, width: newImageWidth, height: newImageHeight}, 1200, function() {
																																																																										  			$j(this).remove();
	
		if(options_exist==1){

			for (i = 0; i < textboxes.length; i++) {
		
			document.getElementById(textboxes[i].id).value="";
	
			}

		}

		if(uploads_exist==1){
		$('#file_upload').uploadifive('clearQueue');
		}

			$j("#notificationsLoader").html('<img src="https://www.upoharbd.com/inc/images/loader.gif">');
		
			$j.ajax({  
				type: "POST",  
				url: "https://www.upoharbd.com/inc/functions.php",  
				data: dataString,  
				success: function(theResponse) {
					
					if( $j("#productID_" + productIDVal).length > 0){
						$j("#productID_" + productIDVal).animate({ opacity: 0 }, 500);
						$j("#productID_" + productIDVal).before(theResponse).remove();
						$j("#productID_" + productIDVal).animate({ opacity: 0 }, 500);
						$j("#productID_" + productIDVal).animate({ opacity: 1 }, 500);
						$j("#notificationsLoader").empty();
						
					} else {

						document.getElementById("basketTitleWrapMobile").className = "occbasket_mobile";

						$j("#basketTitleWrap").html(theResponse);

						$j("#notificationsLoader").empty();			
					}

					var elements = document.getElementsByTagName("input");
					for (var ii=0; ii < elements.length; ii++) {
					  if (elements[ii].type == "text") {
					    elements[ii].value = "";
					  }
					}

					
				}  



			});  
		
		});

		}
		
	});
	
	
	
	$j("#basketItemsWrap li img").live("click", function(event) { 
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];	

		$j("#notificationsLoader").html('<img src="https://www.upoharbd.com/inc/images/loader.gif">');
	
		$j.ajax({  
			type: "POST",  
			url: "https://www.upoharbd.com/inc/functions.php",  
			data: { productID: productIDVal, action: "deleteFromBasket"},  
			success: function(theResponse) {
				
				$j("#productID_" + productIDVal).hide("slow",  function() {$j(this).remove();});
				$j("#notificationsLoader").empty();
			
			} 
 
		});  
		
	});

});
