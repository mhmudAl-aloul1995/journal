function loadIssues(volume) {

	 if ($("#dvIss_"+volume).html().trim() == "") {
		$.ajax({
			url: "request/article.ajax",
			type: "post",
			data: {
				"task"  : "loadIssues",
				"volume" : volume
			},
		    success: function (data) {
		    	$("#dvIss_"+volume).html(data);
		    },
		});
	 }
}

$(document).ready(function(){

     $(".collapse.show").each(function(){
     	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
     });

     $(".collapse").on('show.bs.collapse', function(){
     	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
     }).on('hide.bs.collapse', function(){
     	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
     });
     
 	$(".pdf_link").click(function (e) {
		$(".pdf_link").css("pointer-events", "none");
		window.setTimeout(function(){
			$(".pdf_link").css("pointer-events", "all");
		}, 5000);
	});

     jQuery("input[name='article_code']").on("click", function() {

         if(! jQuery(this).prop( "checked")) {
             return;
         }
         
         var savedRecords = '0,' + jQuery(this).val();
         savedRecords = savedRecords.substr(1);  

         jQuery.get( "request/article.ajax", {
             'task'   : 'saveRecords',
             'records': savedRecords
         })
         .done(function(response) {
             _toastr(response,"top-right","info",false);
         });

     });

     jQuery('a.more-abstract').click(function(event){

         event.preventDefault();

         jQuery(this).removeClass('more-abstract');
         jQuery(this).parents('.abstact').children('.more').css('display','block');
         jQuery(this).parents('.abstact').children('.more').css('text-align','justify');
         jQuery(this).parents('.abstact').children('.less').css('display','none');
     });

     var _el = jQuery(".lightbox");

     if(_el.length > 0) {

         if(typeof(jQuery.magnificPopup) == "undefined") {
             return false;
         }

         jQuery.extend(true, jQuery.magnificPopup.defaults, {
             tClose:         'Close',
             tLoading:       'Loading...',

             gallery: {
                 tPrev:      'Previous',
                 tNext:      'Next',
                 tCounter:   '%curr% / %total%'
             },

             image:  {
                 tError:     'Image not loaded!'
             },

             ajax:   {
                 tError:     'Content not loaded!'
             }
         });

         _el.each(function() {

             var _t          = jQuery(this),
                 options     = _t.attr('data-plugin-options'),
                 config      = {},
                 defaults    = {
                     type:               'image',
                     fixedContentPos:    false,
                     fixedBgPos:         false,
                     mainClass:          'mfp-no-margins mfp-with-zoom',
                     closeOnContentClick: true,
                     closeOnBgClick:     true,
                     image: {
                         verticalFit:    true
                     },

                     zoom: {
                         enabled:        false,
                         duration:       300
                     },

                     gallery: {
                         enabled: false,
                         navigateByImgClick: true,
                         preload:            [0,1],
                         arrowMarkup:        '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
                         tPrev:              'Previous',
                         tNext:              'Next',
                         tCounter:           '<span class="mfp-counter">%curr% / %total%</span>'
                     },
                 };

             if(_t.data("plugin-options")) {
                 config = jQuery.extend({}, defaults, options, _t.data("plugin-options"));
             }

             jQuery(this).magnificPopup(config);

         });
     }
     
});

function cnt(str){
	var y = str;
	var r = 0;
	a= y.replace(/\s/g,' ');
	a = a.split(' ');
	for (z=0; z<a.length; z++) {
		if (a[z].length > 0) {
			r++;
		}
	}
	return r;
}

function saveComment() {
	
	if($('#sender_name').val().trim() == ""){

		$('#lbl_name_e').css("display", "inline");
		$('#sender_name').focus();
		$('#sender_name').select();
		return;
	}
	else{
		$('#lbl_name_e').css("display", "none");
	}

	var emailFilter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if($('#sender_email').val().trim()==""
				|| !(emailFilter.test($('#sender_email').val().trim()))){

		$('#lbl_email_e').css("display", "inline");
		$('#sender_email').select();
		$('#sender_email').focus();
		return;
	}
	else{
		$('#lbl_email_e').css("display", "none");
	}

	if($('#sender_aff') != null) {

		if( $('#sender_aff').val().trim() == ""){

			$('#lbl_aff_e').css("display", "inline");
			$('#sender_aff').focus();
			$('#sender_aff').select();
			return;
		}
		else{
			$('#lbl_aff_e').css("display", "none");
		}
	}

	if($('#sender_note').val().trim() == '' || cnt($('#sender_note').val().trim()) < 10 ){

		$('#lbl_sn_e').css("display", "inline");
		$('#sender_note').focus();
		return;
	}
	else{
		$('#lbl_sn_e').css("display", "none");
	}

 	$.ajax({
		url: "./request/article.ajax",
		type: "post",
		data: {
			"task"         : "saveComment",
			"article_code" : $('#article_code').val(),
			"sender_name"  : $('#sender_name').val(),
			"sender_aff"   : ($('#sender_aff').length > 0 ? $('#sender_aff').val() : ""),
			"sender_email" : $('#sender_email').val(),
			"sender_note"  : $('#sender_note').val(),
			"sCode"        : $('#sCode').val()
		},
		beforeSend: function (data) {
			showProgress(1, juLang.juSaving);
		},
	    success: function (response) {
	    	showProgress(2, "");
    		_toastr(response,"top-right","info",false);
    		$("#comment-rsp").css("display", "");
    		$("#comment-rsp").html(response);
	    	if (response.indexOf(juLang.juError) == -1) {
		    	$("#comment-form-div").html("");
	    	}
	    },
	});
	
}

function act(action) {

  	switch (action) {
  		case "email":

  			$("#actn_modal").find('.modal-body').load("ju.email?"+document.location,function(){
  		        $('#actn_modal').modal({show:true});
  		    });
  		    $("#actn_modal").find('.modal-header').hide();
  			break;
		default:
			if ($('#cite-'+action).length > 0) {
		        $('#cite-'+action).modal({show:true});
			}
		break;
  	}

}

function page_size() {
	document.location = $('#file').val()+'&max_rows='+$('#max_rows').val();
 }

function showAnnotSvc(id) {

	$("#actn_modal").find('.modal-body').load("./?_action=get_annot&id="+id,function(){
		$('#actn_modal').modal({show:true});
	});
	$("#actn_modal").find('.modal-header').hide();
}

function sleepFor( sleepDuration ){
    var now = new Date().getTime();
    while(new Date().getTime() < now + sleepDuration){  }
}


