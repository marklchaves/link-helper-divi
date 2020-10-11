jQuery( '.et_pb_image_wrap' ).each( function () {
	var parent = jQuery( this ).parent();
	if ( 'undefined' === typeof parent.attr( 'title' ) ) {
		var img = jQuery( this ).find( 'img' );
		var title_or_alt = 'undefined' !== typeof img.attr( 'title' ) ? img.attr( 'title' ) : img.attr( 'alt' );
		if ( 'undefined' !== typeof title_or_alt && '' !== title_or_alt ) {
			parent.attr( 'title', title_or_alt );
		}
	}
} );