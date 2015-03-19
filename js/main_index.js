$(function(){		
					
	/*	$(document).on({
			 ajaxStart: function() { $("body").addClass("loading");    },
			 ajaxStop: function() { $("body").removeClass("loading"); }    
		});		
			*/
		
		// Tooltips tipsy({gravity: 'n'}); // nw | n | ne | w | e | sw | s | se |  $.fn.tipsy.autoNS 
		$('#txt_search').tipsy({gravity: 'e'});
		
		$(".tooltips").tipsy({html: true ,gravity: 's' });
		
/******************************************/		
		// Accordio
		$("#accordion").accordion({ header: "h3" });
/******************************************/		
	// Datepicker
		$('#datepicker').datepicker({
		showWeek: true,
		showButtonPanel: true				
		});
		
		
		// Check menu Auth
		var ck = $('#chkMenuAuth').val();
		if(ck == 0){
			
			var msg = "<div id='dialog-alert' title='Warning..' style='padding: 0 .7em;color:red;text-align:center'><br><p><h2><img src='images/iconError.gif' align='absmiddle'><strong > Authorize not allow!!</strong></h2></p><p><br><a href='index.php' id='dialog_link' class='ui-state-default ui-corner-all'><span class='ui-icon ui-icon-circle-close'></span> OK </a></p></div>";
			
			$("body").append(msg);
			
			$("#divPage").html("");
			
			// Dialog		
				$("#dialog-alert").dialog({
					autoOpen: false,
					height: 180,
					width: 350,
					modal: true,
			        close: function(event, ui) { location.href = 'index.php' }
					});
			
			
			$('#dialog-alert').dialog('open');
				return false;		
		
		}
		
		
		
		
// For Update stat from download file
			
			$('.downloads').click(function(){
					var docs_id = $(this).attr('id');
					$.get('downloads.php?docs_id='+docs_id , function(data){
						//$('#aaa').html(data);
					});
			});
							
});
/******************************************/		





/******************************************/		
// Ajax loading image
function ajaxLoading(){
		// Show loading image
				$('#ajax_loading').ajaxStart(function() {
				$(this).show();
				}).ajaxStop(function() {
				$(this).hide();
				});
		}
		

		

		