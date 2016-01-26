(function($){

// primary mobile menu functions

    $(document).ready(function(){

		/**
		* If the theme you're using is especially terrible,
		* you might need this little fella
		* to inject the button.
		* The goal here is NOT to use this at all.
		*
		* $( ".div-name" ).after( "<div class='mobile-nav-trigger toggle-push-left'>Menu</div>" );
		*/

		/**
		* Primary mobile menu listeners,
		* as well as mobile sub-menu.
		* @author ramiabraham
		*/

		$( ".mobile-nav-trigger" ).on( "click", function() {
			$(document.body).toggleClass('pml-open');
		});

		$( '.push-menu-left .sub-menu' ).before( '<div class="sub-menu-toggle" aria-pressed="false">&#9776;</div>' );

		$( '.sub-menu-toggle' ).on( 'click', function() {

			$( this ).attr( 'aria-pressed', function( index, value ) {
				return 'false' === value ? 'true' : 'false';
			});

			$( this ).toggleClass( 'activated' );
			$( this ).next( '.sub-menu' ).toggle( 'fast' );

		});


    });

/*
* This lovely little library
* removes the 300ms tap delay
* on mobile devices.
*
* This won't do anything on non-touch devices
*/

if ( Touche !== null && typeof handleClicks !== 'undefined' ) {

Touche(document.querySelector( '.mobile-nav-trigger' )).on( 'click', handleClicks );

}

/**
* The primary mobile nav
*/
	var body = document.body,
		mask = $("<div class='mobile-nav-mask'></div>"),
		togglePushLeft = $( ".toggle-push-left" ),
		pushMenuLeft = $( ".push-menu-left" ),
		activeNav
	;

	// push menu left
	$( ".toggle-push-left" ).on( "click", function(){
		$( "body" ).addClass( "pml-open" );
		document.body.appendChild(mask);
		activeNav = "pml-open";
	} );

	// hide active menu if mask is clicked
	mask.on( "click", function(){
		$( "body" ).removeClass( "pml-open" );
		activeNav = "";
		document.body.removeChild(mask);
	} );

	// hide active menu if close menu button is clicked
	[].slice.call(document.querySelectorAll(".close-menu")).forEach(function(el,i){
		el.on( "click", function(){
			$( "body" ).removeClass( "pml-open" );
			activeNav = "";
			document.body.removeChild(mask);
		} );
	});

})(jQuery);
