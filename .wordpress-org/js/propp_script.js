(function($){
	"use strict";
	var app = {
		elMsg: $('#propp-message'),
		elList: $('#propp-list'),
		show: function(){
			$(this.elMsg).show();
		},
		hide: function(){
			$(this.elMsg).hide();
		},
		empty: function(){
			$(this.elMsg).html('');

			return this.hide();
		},
		setMessage: function(text){
			$(this.elMsg).html(text);

			return this.show();
		},
		append: function(phone,status){
			var compiled = _.template( propp.ul_tpl );
			$(this.elList).append( compiled( {data:{phone:phone, status: propp[status] } } ) );
		},
		request: function(phone){
			if(!$('body').hasClass('propp-loading')){
				var self = this;

				$('body').addClass('propp-loading');

				$.ajax({
					url: propp['AJAX_URL'],
					type: 'POST',
					cache: false,
					crossDomain: true,
					data: {
						'action'     : 'bppy-verify-phone',
						'prop-nonce' : propp.nonce,
						'number'     : phone
                    },
					dataType: 'json',
					success: function (data) {
						$('body').removeClass('propp-loading');
						self.append( phone, data.status );
					},
					error: function(){
						$('body').removeClass('propp-loading');
						self.setMessage(propp[801]);
					}
				});
			}
		}
	};

	$(document).ready(function(){
		$('#propp-button-validate').on('click',function(){
			if($('#propp-phone').val().length){
				app.hide();
				app.request( $('#propp-phone').val() );
			} else {
				app.setMessage(propp[800]);
			}

			return false;
		});
	});
}(jQuery));