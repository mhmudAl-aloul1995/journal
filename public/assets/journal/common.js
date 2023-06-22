function sitchLang(pr){
	document.location = (pr != null ? pr : "")+"swithLang?lang="+$("#juLang").val();
}
function emailEd(manu,refe) {

    $("#modal_dlg").removeClass("modal-lg");
	$("#manu_prv").find('.modal-body').load("./journal/email.ed?manu="+manu+"&refe="+refe,function(){
        $('#manu_prv').modal({keyboard: true, show:true});
        $("#manu_prv").find('.modal-title').html($("#p_title").val());
    });

    $("#manu_prv").find("#print_icn").hide();
}

function printDiv(id) {

	var obj = "dvContent";
	if(id != null) {
		obj = id;
	}
	if(document.getElementById(obj) == null) {
		return;
	}
	var divToPrint = document.getElementById(obj);

	var headTag = "\n<head>";
	if (document.getElementsByTagName != null) {
		var headTags = document.getElementsByTagName("head");
		if (headTags.length > 0) {
			headTag += headTags[0].innerHTML;
		}
	}
	headTag += "</head>\n";
	var dvWidth = document.getElementById(obj).offsetWidth;
	x = screen.width / 2 - (parseInt(dvWidth) / 2);
	y = screen.height / 2 - 250;
	features = "scrollbars=yes,menubar=1,width="+dvWidth+",top="+y+",left="+x;

	var newWin = window.open("", "", features);
	
	newWin.document.open();
	newWin.document.write("<html>"+headTag+'<body>'+divToPrint.innerHTML+"</body></html>");
	newWin.document.onreadystatechange = function(){
		if(this.readyState === 'complete'){
			this.onreadystatechange=function(){};
			newWin.focus();
			if (!newWin.document.execCommand('print', false, null)) {
				newWin.print();
			}
			newWin.close();
		}
	}
	newWin.document.close();
}

function printElement(elem) {
	$("#manu_prv").print();
}

function shDv(id) {
	$("#"+id).slideToggle();
}

function dowall() {
	if($("#fcodes") == null) {
		return;
	}
	document.location="jufile?__file=" + $("#fcodes").val();
}

function showProgress(prSt,txt) {

	if(prSt == 1) {
		$("body").loadingModal({
		    text: txt , "animation": "wanderingCubes" });
		}
	else {
		$("body").loadingModal("destroy");
	}
}

function checkSortable() {

	if($(".sor_tbd").length > 0) {
		$(".sor_tbd").sortable();

		$(".edt_c").mouseover(function(){
		    $(".sor_tbd").sortable("disable");
		});
	    $(".edt_c").mouseleave(function(){
	        $(".sor_tbd").sortable("enable");
        });
	}
}

function multCollapseAction() {

	$('a[class="no_acrdn"]').on("click",function(){
		var objectID=$(this).attr("href");
		if($(objectID).hasClass("in")){
			$(objectID).collapse("hide");
		}
		else {
			$(objectID).collapse("show");
		}
    });
}

function refreshCaptcha() {

 	$("#imCaptcha").attr("src", "lib/captcha/captcha.php?" + Math.random()+($("#lgn").length > 0 ? "&lgn=1" : ""));
 	$("#sCode").focus();
 	$("#sCode").val("");
}

// CREATE PDF FILE FROM
function makePdf(rv,fname){
	var html=$("#"+rv).html();
	//Create an hidden form
	var form = $('<form>', {'method': 'POST','target':'_blank', 'action': "request/pdf.ajax"}).hide();
	//Add params
	var params = {"task"  : "makePdf", "html" : html, "pdfname" : fname  };
	$.each(params, function (k, v) {
		form.append($('<input>', {'type': 'hidden', 'name': k, 'value': v}));
	});
	//Make it part of the document and submit
	$('body').append(form);
	form.submit();
	//Clean up
	form.remove();

}
// CREATE PDF FILE FROM


function loadModal(lbl, url) {
	
	if(!url.startsWith("data/") && !url.startsWith("./data/") && !url.startsWith("../data/")) {
		return;
	}
	$("#actn_modal").find('.modal-header').show();
    $('#actn_modal').find('.modal-body').html('<img src="'+url+'" style="max-width:100%"/>');
    $('#actn_modal').modal({keyboard: true, show:true});
    $("#actn_modal").find('.modal-title').html(lbl);
    $('#actn_modal').find('.modal-body').css("text-align", "center");
}

// CRM
// CRM

function SetMyService(product_no){

	if(product_no == '')
	return;

	$.ajax({
		type: "post",
		url : "request/ticket.ajax",
		data: {
			'task' : 'SetMyService',
			'product_no':product_no
		},
		beforeSend: function (data) {
			showProgress(1, juLang.juSaving);
		},
		success: function (response) {
			showProgress(2, juLang.juSaved);
			$("#btn_order_"+product_no).css("display", "none");
    		$("#btn_orderd_"+product_no).css("display", "block");
			
		}
	});
	
	
}

function __CloseTicket(){

	if (confirm(juLang.Crm_Message_Warning)) {
		var ticketid = $('#ticketid').val();
            if(ticketid == '')
                return;

				$.ajax({
					type: "post",
					url : "request/ticket.ajax",
					data: {
						'task' : 'CloseTicket',
						'ticketid':ticketid
					},
					beforeSend: function (data) {
						showProgress(1, juLang.juSaving);
					},
					success: function (response) {
						showProgress(2, juLang.juSaved);
						$("#message-to-send").prop('disabled', true);
						$("#btn_close").css('display', "none");
						$("#btn_closed").css('display', "block");
						
					}
				});

		}else{
			
		}
	}
function __sendTicket(){

            var message = $('#message-to-send').val();
            var ticketid = $('#ticketid').val();
            if(message.trim() == '')
                return;

				$.ajax({
					type: "post",
					url : "request/ticket.ajax",
					data: {
						'task' : 'update_ticket_comment',
						'message': message,
						'ticketid':ticketid
					},
					beforeSend: function (data) {
						showProgress(1, juLang.juSaving);
					},
					success: function (response) {
						var res=JSON.parse(response);
						var username=res['username'];
						var date=res['date'];
						var iiiiid=Math.floor(Math.random() * 99999) + 1;
						
						$('#list_chat').prepend('<li id="'+iiiiid+'" class="mar-btm text-right" ><div class="media-right"><i class="fa fa-user-circle img-circle img-sm" aria-hidden="true"></i></div><div class="media-body pad-hor"><div class="speech"><a href="#" class="media-heading">'+username+'</a><p>'+message+'</p><p class="speech-time"><i class="fa fa-clock-o fa-fw"></i>'+date+'</p></div></div></li>');
						$("#message-to-send").val('');
						// $('html, body').animate({
						// 	scrollTop: parseInt($('#'+iiiiid+'').offset().top)
						// }, 2000);
						showProgress(2, juLang.juSaved);
					

				}
				});

		}
		
		function ___update_ticket_commentJS(response,message){
			
			var today = new Date();
			var dd = String(today.getDate()).padStart(2, '0');
			var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
			var yyyy = today.getFullYear();

			date = mm + '/' + dd + '/' + yyyy;

			this.tinysoap.createClient($("#crm_url").val(), function(err, client) {
				client.___update_ticket_commentJS({data:response}, function(err, result) {
					console.log(result);
				var username=$("#Cname").val();
				var iiiiid=Math.floor(Math.random() * 99999) + 1;
				$('#list_chat').prepend('<li id="'+iiiiid+'" class="mar-btm text-right" ><div class="media-right"><i class="fa fa-user-circle img-circle img-sm" aria-hidden="true"></i></div><div class="media-body pad-hor"><div class="speech"><a href="#" class="media-heading">'+username+'</a><p>'+message+'</p><p class="speech-time"><i class="fa fa-clock-o fa-fw"></i>'+date+'</p></div></div></li>');
				$("#message-to-send").val('');
				showProgress(2, juLang.juSaved);
				});
			});
		}

		// ticket
		function NewTicket() {
		document.getElementById('ShowChatBox').style.display = "block";
		$("#ShowChatBox").css("display","block");
		document.getElementById("ShowChatBox").classList.remove("chatbox--tray");
		document.getElementById("ShowChatBox").classList.add("chatbox--empty");

		document.getElementById('ShowCallMe').style.display = "none";
		$("#ShowCallMe").css("display","none");
		document.getElementById("ShowCallMe").classList.add("chatbox--tray");
		document.getElementById("ShowCallMe").classList.remove("chatbox--empty");

		}

		// ticket
		function NewCallMe() {
		document.getElementById('ShowCallMe').style.display = "block";
		$("#ShowCallMe").css("display","block");
		document.getElementById("ShowCallMe").classList.remove("chatbox--tray");
		document.getElementById("ShowCallMe").classList.add("chatbox--empty");

		document.getElementById('ShowChatBox').style.display = "none";
		$("#ShowChatBox").css("display","none");
		document.getElementById("ShowChatBox").classList.add("chatbox--tray");
		document.getElementById("ShowChatBox").classList.remove("chatbox--empty");


		}

		// create_Ticket
		function create_Ticket() {
			var title_Ticket = document.getElementById('title_Ticket').value;
			var priority_Ticket = document.getElementById('priority_Ticket').value;
			var severity_Ticket = document.getElementById('severity_Ticket').value;
			var description_Ticket = document.getElementById('description_Ticket').value;
			var category_Ticket = document.getElementById('category_Ticket').value;
			var category_Ticket = document.getElementById('category_Ticket').value;

			if($("#NoInternet").val()!=""){
				this.tinysoap.createClient($("#crm_url").val(), function(err, client) {
				$.ajax({
					type: "post",
					url : "request/ticket.ajax",
					data: {
						'task' : 'create_Ticketjs',
						'title': title_Ticket,
						'priority': priority_Ticket,
						'severity':severity_Ticket,
						'category':category_Ticket,
						'description':description_Ticket
					},
					beforeSend: function (data) {
						showProgress(1, juLang.juSaving);
					},
					success: function (response) {
						
						
						client.create_Ticketjs({data:response}, function(err, result) {
							showProgress(2, juLang.juSaved);
							location.reload();
						// window.location.href = 'editor?_action=ticket&ticketid='+ticketid;
						// console.log(result);
						});
					}
				});
			
			}); // tinysoap

				return;
			}else{
				$.ajax({
					type: "post",
					url : "request/ticket.ajax",
					data: {
						'task' : 'create_Ticket',
						'title': title_Ticket,
						'priority': priority_Ticket,
						'severity':severity_Ticket,
						'category':category_Ticket,
						'description':description_Ticket
					},
					beforeSend: function (data) {
						showProgress(1, juLang.juSaving);
					},
					success: function (ticketid) {
						// alert(ticketid);
						console.log(ticketid);
						showProgress(2, juLang.juSaved);
						window.location.href = 'editor?_action=ticket&ticketid='+ticketid;
					}
				});
			}
			
			

		}
		// create_Ticket
		
		// create_Call
		function create_call() {
			var title_Ticket = document.getElementById('title_message').value;
			var priority_Ticket = document.getElementById('priority_Ticket').value;
			var severity_Ticket = document.getElementById('severity_Ticket').value;
			var description_Ticket = document.getElementById('description_Ticket').value;
			var category_Ticket = document.getElementById('category_Ticket').value;
			var category_Ticket = document.getElementById('category_Ticket').value;
			var mobile = document.getElementById('mobile').value;
			$.ajax({
				type: "post",
				url : "request/ticket.ajax",
				data: {
					'task' : 'create_Call',
					'title': title_Ticket,
					'priority': priority_Ticket,
					'severity':severity_Ticket,
					'category':category_Ticket,
					'description':description_Ticket,
					'mobile' : mobile,
				},
				beforeSend: function (data) {
					showProgress(1, juLang.juSaving);
				},
				success: function (ticketid) {
					showProgress(2, juLang.juSaved);
					window.location.href = 'editor?_action=support';
				}
			});

		}
		// create_Ticket

		(function($) {
			$(document).ready(function() {
				var $chatbox = $('.chatbox'),
					$chatboxTitle = $('.chatbox__title'),
					$chatboxTitleClose = $('.chatbox__title__close'),
					$chatboxCredentials = $('.chatbox__credentials');
				$chatboxTitle.on('click', function() {
					$chatbox.toggleClass('chatbox--tray');
				});
				$chatboxTitleClose.on('click', function(e) {
					e.stopPropagation();
					// $chatbox.addClass('chatbox--closed');
					// $chatbox.addClass('chatbox_close');
					document.getElementById('ShowChatBox').style.display = "none";
				});
				$chatbox.on('transitionend', function() {
					if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
				});
				$chatboxCredentials.on('submit', function(e) {
					e.preventDefault();
					$chatbox.removeClass('chatbox--empty');
				});


				// survy
			
				// survy
				



			});
		})(jQuery);
		// ticket

	
		

		$("document").ready(function(){

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function(){

                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                }
                else {
                    $(this).removeClass('hover');
                }
                });

            }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover');
                });
                });
          



            /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        

	var ticket_num=$(this).data('ticknum');
	stars=null;
    var stars = $(this).parent().children('li.star');


    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
		var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);

		var msg = "";
		if (ratingValue > 0) {
					msg = "Thanks! You rated this " + ratingValue + " stars.";
	

						$.ajax({
							type: "post",
							url : "request/ticket.ajax",
							data: {
								'task' : 'survy',
								'ticketid': ticket_num,
								'stars': onStar,
							},
						});

		}

    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    // responseMessage(msg);

	});
});

// function responseMessage(msg) {
//   $('.success-box').fadeIn(200);
//   $('.success-box div.text-message').html("<span>" + msg + "</span>");
// }

	
// CRM

/******** Manager Todo ********/
$("document").ready(function(){

	function urlParam(name){
		var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (results==null) {
		   return null;
		}
		return decodeURI(results[1]) || 0;
	}
	var hl = urlParam('hl');
	if(hl && $("[data-highlight='"+hl+"']").length){
		$("[data-highlight='"+hl+"']").css('background-color','rgb(255, 249, 202)');
		$("[data-highlight='"+hl+"']").get(0).scrollIntoView();
	}

});

//google authenticator
function gauthenticator(st){

	if (st == 1){
		$.ajax({
			type: "post",
			url : "request/gauthenticator.ajax",
			data: {
				'task' : 'addAndGetQrCode'
			},
			beforeSend: function (data) {
				showProgress(1, juLang.juSaving);
			},
			success: function (qrCodeUrl) {
				if(qrCodeUrl=='already'){
					alert("Already Actived!");
				}else{
					$("#qrCodeUrl").attr('src' , qrCodeUrl);
					document.getElementById('qrCodeUrl')
						.addEventListener("load", function loaded(){
							//any code you may need
							showProgress(2, juLang.juSaved);
							$("#dv_code_user").css("display", "block");
						});
				}
			}
		});
	}else if(st==0){
		$.ajax({
			type: "post",
			url : "request/gauthenticator.ajax",
			data: {
				'task' : 'DisableGauthenticator'
			},
			beforeSend: function (data) {
				showProgress(1, juLang.juSaving);
			},
			success: function (result) {
				showProgress(2, juLang.juSaved);
				if(result==true){
					alert("Deactivation was successful.");
					location.reload();
				}else{
					alert('Deactivation encountered an error');
				}
			}
		});
	}
}

function addAndVerify(){

	if($("#code_user").val().trim().length <= 5){
		alert('error');
	}else{
		$.ajax({
			type: "post",
			url : "request/gauthenticator.ajax",
			data: {
				'task' : 'addAndVerify',
				'code_user':$("#code_user").val(),
			},
			beforeSend: function (data) {
				showProgress(1, juLang.juSaving);
			},
			success: function (result) {
				showProgress(2, juLang.juSaved);
				if(result=='success'){
					alert('Activation SuccessFully');
					location.reload();
				}else{
					alert('Activation encountered an error');
				}
			}
		});
	}
}
