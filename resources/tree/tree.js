( function( mw, $, d, undefined ){
    $( d ).on( 'click', '.mws-tree-expander', function( e ) {
        stopPropagation( e );

        controlls = $( this ).attr( 'aria-controlls' );
        toggleTreeItem( this, controlls );
        
    } );

    $( d ).on( 'keydown', '.mws-tree li', function ( e ) {
        let $list = $( this ).parent( 'ul' );
        let nodes = $list.children();
        let index = nodes.index( this );

        //up
        if ( e.keyCode === 38 ) {
            stopPropagation( e );

            if ( index > 0 ) {
                let $listItem = $( nodes[index - 1] );
                let $focusableElementContainer = $listItem.find( '> div' ).first();
                let focusableElement = $focusableElementContainer.children().first();
                focusableElement.focus();
            }
            else {
                $parentTreeItem = $list.parents( 'li' ).first().find( '> div' ).first();
                if ( $parentTreeItem ) {
                    let $focusableElement = $parentTreeItem.children().first();
                    $focusableElement.focus();
                }
            }
        }

        // down
        if ( e.keyCode === 40 ) {
            stopPropagation( e );

            if ( $( this ).hasClass( 'expanded' ) ) {
                $childList = $( this ).find( '> div > ul' ).first();
                let $listItem = $childList.children().first();
                let $focusableElementContainer = $listItem.find( '> div' ).first();
                let focusableElement = $focusableElementContainer.children().first();
                focusableElement.focus();
            }
            else if ( index < ( nodes.length - 1 ) ) {
                let $listItem = $( nodes[index + 1] );
                let $focusableElementContainer = $listItem.find( '> div' ).first();
                let focusableElement = $focusableElementContainer.children().first();
                focusableElement.focus();
            }
            else {
                let $parentItem = $( this ).parents( 'li' ).first();
                let $parentList = $parentItem.parent( 'ul' );
                let parentNodes = $parentList.children();
                let parentIndex = parentNodes.index( $parentItem );
                if ( parentIndex < parentNodes.length ) {
                    let $listItem = $( parentNodes[parentIndex + 1] );
                    let $focusableElementContainer = $listItem.find( '> div' ).first();
                    let focusableElement = $focusableElementContainer.children().first();
                    focusableElement.focus();
                }
            }
        }

        //left
        if ( e.keyCode === 37 ) {
            stopPropagation( e );
            // does not work for some reason
            if ( this.previousElementSibling ) {
                this.previousElementSibling.focus();
            }
        }

        // right
        if ( e.keyCode === 39 ) {
            stopPropagation( e );       
            if ( this.nextElementSibling ) {
                this.nextElementSibling.focus();
            }
        }
    } );

    $( d ).on( 'keydown', '.mws-tree-expander', function ( e ) {
        controlls = $( this ).attr( 'aria-controlls' );

        if ( e.keyCode === 13 ) {
            stopPropagation( e );
            toggleTreeItem( this, controlls );
        }

        //left
        if ( e.keyCode === 37 ) {
            stopPropagation( e );
            if ( isExpanded( this ) ) {
                collapseTreeItem( this, controlls );
            }
            else if ( this.previousElementSibling ) {
                this.previousElementSibling.focus();
            }
        }

        // right
        if ( e.keyCode === 39 ) {
            stopPropagation( e );       
            if ( !isExpanded( this ) ) {

                expandTreeItem( this, controlls );
            }
            else if ( this.nextElementSibling ) {
                this.nextElementSibling.focus();
            }
        }
    } );
    

    function toggleTreeItem( element, controlls ) {
        if ( $( element ).attr( 'aria-expanded' ) === 'true' ) {
            collapseTreeItem( element, controlls );
        } else if ( $( element ).attr( 'aria-expanded' ) === 'false' ) {
            expandTreeItem( element, controlls);
        }
    }

    function collapseTreeItem( element, controlls ) {
        $( '#'+controlls ).removeClass( 'show' );
        $( element ).attr( 'aria-expanded', 'false' );
        $( element ).removeClass( 'expanded' );
        $( element ).addClass( 'collapsed' );
        $( element ).parents( 'li' ).first().removeClass( 'expanded' );
    }

    function expandTreeItem( element, controlls ) {
        $( '#'+controlls ).addClass( 'show' );
        $( element ).attr( 'aria-expanded', 'true' );
        $( element ).removeClass( 'collapsed' );
        $( element ).addClass( 'expanded' );
        $( element ).parents( 'li' ).first().addClass( 'expanded' );
    }

    function isExpanded( element ) {
        if ( $( element ).attr( 'aria-expanded' ) === 'true' ) {
            return true;
        }

        return false;
    }

    function stopPropagation( element ) {
        element.preventDefault();
		element.stopPropagation();
    }

} )( mediaWiki, jQuery, document );