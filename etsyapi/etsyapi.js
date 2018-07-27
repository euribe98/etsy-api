/**
*   Get Active Listings
*/
function getlistings(shopname, params, limit, imagesz) {
	$(document).ready(function(){
			
		$.ajax({
		    url: "etsyapi.php",
		    type: "GET",
		    data: { "functionname": "getlistings", "shopname": shopname, "params": params, "limit": limit, "imagesz": imagesz}, 
		    success: function(results) {
		    	
		    	result =  JSON.parse(results);
		    	//console.log(result);
		    	
		    	$.each(result.results, function(i, item) {	
		   			shortTitle = jQuery.trim(item.title).substring(0,25).split(" ").slice(0, -1).join(" ") + "...";
	   				srcImage = item.MainImage.url_170x135; 
	   				hrefdest = item.url;
	   				
		   			if (imagesz=="small") {
		   				srcImage =  item.MainImage.url_75x75;
		   				shortTitle = jQuery.trim(item.title).substring(0,10).split(" ").slice(0, -1).join(" ") + "...";
		   			}

		   				   									
		  			$("<div class=image>").appendTo("#etsy-images")
	  				.append($("<a href='" + hrefdest + "'></a>").append("<img src='" + srcImage + "'>"))  				
	  				.append($("<div class=desc>").text(shortTitle))
	  				.append($("<div class=price>").text("$" + item.price));		  				
		   		});
		    },
		    error: function(request, textStatus, error) {
		    	console.log("error : " + request.responseText);
		    }
		});

	});
}
