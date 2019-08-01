jQuery(document).ready(function ($) {

    /*!
    * Bootstrap 4 multi dropdown navbar ( https://bootstrapthemes.co/demo/resource/bootstrap-4-multi-dropdown-navbar/ )
    * Copyright 2017.
    * Licensed under the GPL license
    */
    $( document ).ready( function () {
        $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
            var $el = $( this );
            var $parent = $( this ).offsetParent( ".dropdown-menu" );
            if ( !$( this ).next().hasClass( 'show' ) ) {
                $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
            }
            var $subMenu = $( this ).next( ".dropdown-menu" );
            $subMenu.toggleClass( 'show' );
            
            $( this ).parent( "li" ).toggleClass( 'show' );

            $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
                $( '.dropdown-menu .show' ).removeClass( "show" );
            } );
            
            if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
                $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
            }

            return false;
        } );
    } );

    /* Brazilian initialisation for the jQuery UI date picker plugin. */
    /* Written by Leonildo Costa Silva (leocsilva@gmail.com). */
    ( function( factory ) {
        if ( typeof define === "function" && define.amd ) {

            // AMD. Register as an anonymous module.
            define( [ "../widgets/datepicker" ], factory );
        } else {

            // Browser globals
            factory( jQuery.datepicker );
        }
    }
    ( function( datepicker ) {

        datepicker.regional[ "pt-BR" ] = {
            closeText: "Fechar",
            prevText: "&#x3C;Anterior",
            nextText: "Próximo&#x3E;",
            currentText: "Hoje",
            monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
            "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
            monthNamesShort: [ "Jan","Fev","Mar","Abr","Mai","Jun",
            "Jul","Ago","Set","Out","Nov","Dez" ],
            dayNames: [
                "Domingo",
                "Segunda-feira",
                "Terça-feira",
                "Quarta-feira",
                "Quinta-feira",
                "Sexta-feira",
                "Sábado"
            ],
            dayNamesShort: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
            dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
            weekHeader: "Sm",
            dateFormat: "dd/mm/yy",
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: "" };
        datepicker.setDefaults( datepicker.regional[ "pt-BR" ] );

        return datepicker.regional[ "pt-BR" ];

    } ) );
    $( function() {
        $( "#datepicker" ).datepicker();
    } );

    // Hide Overlay 
    $( '.overlay' ).click(function(){
        $( '.overlay' ).hide();
    });

    //Zoom nas imagens do site ??
    // console.log( $('.site-content img').parent().addClass("parent"));
    // console.log( $('.site-content img').addClass("child"));
    
    $('.search-button').click(function(event){
        event.preventDefault();
        if($('.search-div').css('display') == 'none'){
            $('.search-div').css('display','block');
        }else{
            $('.search-div').css('display','none');
        }
    }); 

    $('.navbar-toggler').click(function(){
        if($('.search-div').css('display') != 'none'){
            $('.search-div').css('display','none');
        }
    }); 




    jQuery(function($) {
        // Bootstrap menu magic
        $(window).resize(function() {
          if ($(window).width() < 768) {
            $(".dropdown-toggle").attr('data-toggle', 'dropdown');
          } else {
            $(".dropdown-toggle").removeAttr('data-toggle dropdown');
          }
        });
      });

    alturaImg = $('.main-header').height();
    alturaMenu = $('.main-menu').height() + 30;
    $(window).on('scroll', function() {

        if($('#wpadminbar').length){
            if($(window).scrollTop() < alturaImg) {
                $('.main-menu').removeClass('fixed-menu-admin');
                $('.sticky').css('padding-top',"15px");
                return;
            }
        }else{
            if($(window).scrollTop() < alturaImg) {
                $('.main-menu').removeClass('fixed-menu');
                $('.sticky').css('padding-top','15px');
                return;
            }
        }
        if($('#wpadminbar').length){
            $('.main-menu').addClass('fixed-menu-admin');
            $('.sticky').css('padding-top',alturaMenu+"px");
        }else{
            $('.main-menu').addClass('fixed-menu');
            $('.sticky').css('padding-top',alturaMenu+"px");
        }
    
    });
    
    $("a[href='#top']").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    $(window).on('scroll', function() {
        if($(window).scrollTop() < alturaImg + 200) {
            $('#back-to-top').addClass('back-to-top');
            return;
        }else{
            $('#back-to-top').removeClass('back-to-top');
            return;
        }
    });
    

    $(window).on('scroll', function() {
        $(window).scrollTop()   
    });
    
    $(".sticky").stick_in_parent({});

    try{jQuery(window).scroll(function(){
            var scroll=jQuery(window).scrollTop();
            if(scroll>=50){
                jQuery('ul.govsp-dropdown.govsp-active').addClass('hide-dropdown');
            }
            else{jQuery('ul.govsp-dropdown.govsp-active').removeClass('hide-dropdown');
            }
            });
    }catch(e){console.log("Syntax Error in Custom JS")}

    function mansoryGrid(){
        // masonry 
        var $grid = $('.gallery-wrapper').masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            percentPosition: true,
            transitionDuration: 0,
        }); 
    }
    mansoryGrid();

    function warpImg(){
        $(".wp-content p > img").each(function(){
            $(this).wrap($('<a>',{
                href: $(this).attr("src"),
                class: "image-popup-vertical-fit"
             }));

        });
    }warpImg();

    $('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
    });
    
});
