// code executed when page loaded
jQuery(document).ready(function($) {
    // $() will work as an alias for jQuery() inside of this function

    var $container = $('#gallery');
        filters = {};


var windowSizeInit = $(window).width();
alert(windowSizeInit);

if(windowSizeInit >1000){

$container.isotope({
      itemSelector : '.post-thumbnail',
      // disable resizing
      resizable: false,
      // set columnWidth to a percentage of container width

      
      // 

      masonry: {
        columnWidth: $container.width() / 5
      },

    getSortData: {
      color: function( $elem ) {
        return $elem.attr('data-etat');
      },
      shape: function( $elem ) {
        return $elem.attr('data-type');
      },
      size: function( $elem ) {
        return $elem.attr('data-annee');
      }
    }
    });

}else{


$container.isotope({
      itemSelector : '.post-thumbnail',
      // disable resizing
      resizable: false,
      // set columnWidth to a percentage of container width

      
      // 

      masonry: {
        columnWidth: $container.width() / 3
      },

    getSortData: {
      color: function( $elem ) {
        return $elem.attr('data-etat');
      },
      shape: function( $elem ) {
        return $elem.attr('data-type');
      },
      size: function( $elem ) {
        return $elem.attr('data-annee');
      }
    }
    });


}
  
    
    // update columnWidth on window resize
    $(window).smartresize(function(){

    var windowSize = $(window).width();
    // alert(windowSize);
    if(windowSize > 1000){

    	$('.post-thumbnail').css('width', '18%');

    	$container.isotope({
        // set columnWidth to a percentage of container width
        masonry: {
          columnWidth: $container.width() / 5
        }
      });

    }else{

    	$('.post-thumbnail').css('width', '40%');

    	$container.isotope({
        // set columnWidth to a percentage of container width
        masonry: {
          columnWidth: $container.width() / 2
        }
      });

    }

      
    });
      

    // filter buttons
    $('.filter a').click(function(){
      var $this = $(this);
      // don't proceed if already selected
      if ( $this.hasClass('selected') ) {
        return;
      }
      
      var $optionSet = $this.parents('.option-set');
      // change selected class
      $optionSet.find('.selected').removeClass('selected');
      $this.addClass('selected');
      
      // store filter value in object
      // i.e. filters.color = 'red'
      var group = $optionSet.attr('data-filter-group');
      filters[ group ] = $this.attr('data-filter-value');
      // convert object into array
      var isoFilters = [];
      for ( var prop in filters ) {
        isoFilters.push( filters[ prop ] )
      }
      var selector = isoFilters.join('');
      $container.isotope({ filter: selector });

      return false;
    });

  

    //selection par la liste dropdown
  $select = $('div#filterGroup select');
  $select.change(function() {
        var $this = $(this);

        var $optionSet = $this;
        var group = $optionSet.attr('data-filter-group');
    filters[group] = $this.find('option:selected').attr('data-filter-value');

        var isoFilters = [];
        for (var prop in filters) {
            isoFilters.push(filters[prop])
        }
        var selector = isoFilters.join('');

        $container.isotope({
            filter: selector
        });

        return false;
   });




//le slider

    $('.flexslider').flexslider({
      animation: "slide",
      directionNav: false,
      controlNav: false,      
    });
  




});




// code executer tout de suite
(function($) {
    // $() will work as an alias for jQuery() inside of this function
})(jQuery);