var jsonp = {};

jsonp.delete_element = function (data) {
	$("[data-id='"+data.id+"']").remove();
};