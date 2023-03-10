$(".profile").ready(function(){
    $('.buttonHead').click(function(){
      $('.profile').slideToggle(0);      
      return false;
    });
});
var value = $(this).attr("data-filter");
var elem = $(".elem");

$(document).ready(function(){
  $(".button_all-i").click(function(){
     $(".item").show();
    }
  )});

$(document).ready(function(){
  $(".button_site-i").click(function(){
      $(".foto").hide();
      $(".template").hide();
      $(".site").show();
    });
  })
  
$(document).ready(function(){
  $(".button_foto-i").click(function(){
      $(".site").hide();
      $(".template").hide();
      $(".foto").show();
    });
  })
    
$(document).ready(function(){
  $(".button_template-i").click(function(){
      $(".foto").hide();
      $(".site").hide();
      $(".template").show();
    });
  })
$(document).ready(function(){
  $(".close").click(function(){
    $(".backgroundWindow").hide();
    $(".corz").hide();

  })
})
$(document).ready(function(){
  $(".corzbat").click(function(){
    $(".backgroundWindow").show();
    $(".corz").show();

  })
})

$(document).ready(function(){
  $(".close").click(function(){
    $(".backgroundWindow").hide();
    $(".izb").hide();

  })
})
$(document).ready(function(){
  $(".izbbat").click(function(){
    $(".backgroundWindow").show();
    $(".izb").show();

  })
})
$(document).ready(function(){
  $(".backgroundWindow").click(function(){
    $(".corz").hide();
    $(".izb").hide();
    $(".backgroundWindow").hide();

  })
})

$(function(){
  $('.add-to-cart').on('click', function (e) {
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
        url: 'cart.php',
        type: 'GET',
        data: {cart: 'add', id: id},
        dataType: 'json',
        success: function (res) {
        console.log(res)
        },
        error: function () {
            alert('Error');
        }
    });
});
});

$(document).ready(function(){
  $(".close1").click(function(){
    $(".backgroundWindow1").hide();
    $(".okno").hide();

  })
})
$(document).ready(function(){
  $(".btn1").click(function(){
    $(".backgroundWindow1").show();
    $(".okno").show();

  })
})
$(document).ready(function(){
  $(".backgroundWindow1").click(function(){
    $(".okno").hide();
    $(".backgroundWindow1").hide();
  })
})

$(document).ready(function(){
  $(".qiwi").click(function(){
    $(".cart-buy").show();

  })
})
$(document).ready(function(){
  $("mir").click(function(){
    $(".cart-buy").show();

  })
})