define(['js!libs/jquery','js!jsonp', 'js!game'], function () {

	jQuery( document ).ready(function( $ ) {

		$(document).on("click", ".rest-link", function() {

			var url = $(this).attr("href");
			var method = $(this).data("method");

			var data = {};

			data._token = $(this).data("token");
			data.callback = $(this).data("callback");


	        $.ajax({
	            type: method,
	            url: url, //resource
	            data: data,
			    complete: function(response){        

			    }
	        });
		
			return false;
		});

		$(document).on("click", ".ajax-modal", function() {
			var modal = $("#modalbox");
			var url = $(this).attr("href");

			if(modal.length == 0) {
				$("body").append('<div id="modalbox" class="modal fade"><div class="modal-dialog"><div class="modal-content"></div></div></div>');
			}

	        $.ajax({
	            type: "get",
	            url: url, //resource
			    complete: function(data){        
					var m = $('#modalbox');

					m.find(".modal-content").html(data.responseText);

					m.modal();
			    }
	        });

	        return false;
			
		});

	});

});