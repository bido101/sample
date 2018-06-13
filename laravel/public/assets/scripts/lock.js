var Lock = function () {
    return {
        //main function to initiate the module
        init: function () {
        	var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host; //+ "/" + getUrl.pathname.split('/')[1];
            $.backstretch([
		        baseUrl+"/assets/img/bg/1.jpg",
		        baseUrl+"/assets/img/bg/2.jpg",
		        baseUrl+"/assets/img/bg/3.jpg",
		        baseUrl+"/assets/img/bg/4.jpg",
		        baseUrl+"/assets/img/bg/5.jpg",
		        baseUrl+"/assets/img/bg/6.jpg",
		        baseUrl+"/assets/img/bg/7.jpg",
		        baseUrl+"/assets/img/bg/8.jpg",
		        baseUrl+"/assets/img/bg/9.jpg",
		        baseUrl+"/assets/img/bg/10.jpg",
		        baseUrl+"/assets/img/bg/11.jpg",
		        baseUrl+"/assets/img/bg/12.jpg"
		        ], {
		          		fade: 1000,
		          		duration: 8000
		    		});
        }

    };

}();