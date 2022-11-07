( function( mw, $, d, undefined ){
    $( d ).on( 'click', '.mws-tree-expander', function( e ) {
        e.preventDefault();
		e.stopPropagation();

        controlls = $( this ).attr( 'aria-controlls' );

        if ( $( this ).attr( 'aria-expanded' ) === 'true' ) {
            $( '#'+controlls ).removeClass( 'show' );
            $( this ).attr( 'aria-expanded', 'false' );
        } else if ( $( this ).attr( 'aria-expanded' ) === 'false' ) {
            $( '#'+controlls ).addClass( 'show' );
            $( this ).attr( 'aria-expanded', 'true' );
        }
    } )

} )( mediaWiki, jQuery, document );