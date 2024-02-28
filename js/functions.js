(function ($) {

    /* Document ready */
    $(document).ready(function () {

        $('.nav-icon').click(function(){
            $(this).toggleClass('open');
            $('.mobile_menu_container').slideToggle(500);
        });

        $('.mobile_header_container li.menu-item-has-children').append('<i class="fas fa-chevron-down"></i>');

        $('.mobile_header_container li.menu-item-has-children i.fa-chevron-down').on('click', function (e) { 
            e.preventDefault();
            $(this).closest('li.menu-item-has-children').find('ul.sub-menu ').slideToggle(500);
            $(this).toggleClass('fa-chevron-up');
        });

		

        /* Talents Posts Slider */
		$('.testimonials_slider').slick({
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 1,
			infinite: true,
			swipe: true,
			swipeToSlide: true,
			touchMove: true,
			arrows: true,
			//adaptiveHeight: true,
			prevArrow: '.test_arrow_left',
			nextArrow: '.test_arrow_right ',
			responsive: [
				{
					breakpoint: 769,
					settings: {
					slidesToShow: 1,
					slidesToScroll: 1
					}
				},
			
			]
		});

        /* 	About_us_slider Slider */
		$('.about_us_slider').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			infinite: true,
			swipe: true,
			swipeToSlide: true,
			touchMove: true,
			arrows: true,
			//adaptiveHeight: true,
			prevArrow: '.ab_arrow_left',
			nextArrow: '.ab_arrow_right',
			responsive: [
				{
					breakpoint: 992,
					settings: {
					slidesToShow: 2,
					slidesToScroll: 1
					}
				},
				{
					breakpoint: 769,
					settings: {
					slidesToShow: 1,
					slidesToScroll: 1
					}
				}
			]
		});

		/* Formidable Form */
		$('.request_qoute_btn ').on('click', function () { 
			$('.request_quote_form_container').show();
			$('body').css('overflow', 'hidden');
		});
		
		$('.request_quote_form_container span.dashicons-no-alt').on('click', function () { 
			$(this).closest('.request_quote_form_container').hide();
			$('body').css('overflow', 'auto');
		});

		/* Form number format */
		
		$('#field_nzb27, #field_hval1, #field_xxmon').pcsFormatNumber({
			decimal_separator: ".",  
			number_separator: ".",  
			to_fixed: 2,              
			currency: "$"
		});


		if($('.frm_forms.with_frm_style .form-field select'.length != '')){
			const slim_select = () => {
				document.querySelectorAll('.frm_forms.with_frm_style .form-field select, select.map_options').forEach(select => {
					const selectInterval = setInterval(() => {
						if( select.offsetWidth > 0 ) {
							new SlimSelect({
								select: select, 
								settings: {
									showSearch: true,
								}
								
							})
							clearInterval(selectInterval);
						}
					}, 0);
				});
			}
			slim_select();
		}
		

		// Documentaries datepicker calendar
		if($('#field_zbk1').length > 0 ) {
			$('#field_zbk1').click(function(e) {
				if ($(this).data('count')) {
					if ($('#ui-datepicker-div').is(':visible')){
						$('#field_zbk1').datepicker('hide');
					} else {
							$('#field_zbk1').datepicker('show');
					}
				} else {
					$(this).data('count', 1);
				}
			});
			$('#field_zbk1').blur(function() {
				$(this).data('count', '')
			});

			$( '#field_zbk1' ).datepicker({ dateFormat: 'mm/dd/yy',  maxDate: 0, showAnim: "slideDown" });
		}

    });

	$(window).load(function() {	

		/* Change format security number and phone number */
		$('#field_social_security_number').mask('999-99-9999');
		$('#field_cr_app_phone_1, #field_cr_app_phone_2, #field_rq_phone').mask('(999) 999-9999');

		$('body:not(.elementor-editor-active)').css({
			'opacity': 1,
			'transition':'0.5s'
		})

	});


})(jQuery);