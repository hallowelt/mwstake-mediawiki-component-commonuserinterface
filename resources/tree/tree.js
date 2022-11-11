( function( mw, $, d, undefined ){
    $( d ).on( 'click', '.mws-tree-expander', function( e ) {
        e.preventDefault();
		e.stopPropagation();

        controlls = $( this ).attr( 'aria-controlls' );

        if ( $( this ).attr( 'aria-expanded' ) === 'true' ) {
            $( '#'+controlls ).removeClass( 'show' );
            $( this ).attr( 'aria-expanded', 'false' );
            $( this ).removeClass( 'expanded' );
            $( this ).addClass( 'collapsed' );
        } else if ( $( this ).attr( 'aria-expanded' ) === 'false' ) {
            $( '#'+controlls ).addClass( 'show' );
            $( this ).attr( 'aria-expanded', 'true' );
            $( this ).removeClass( 'collapsed' );
            $( this ).addClass( 'expanded' );
        }
    } )

} )( mediaWiki, jQuery, document );