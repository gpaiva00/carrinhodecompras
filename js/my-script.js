$(document).ready(function(){
  refreshCartItens();
  refreshRating();

  $('#user-img').mouseover(function(){
    $('.alter').show();
  });
  $('#user-img').mouseout(function(){
      $('.alter').hide();
  });
  $('#user-img').click(function(){
      $('[name="photo"]').trigger('click');
  });
  
  $('.add-cart').click(function(){
    var id = $(this).attr('id');
    $.get('/adicionarcarrinho', 'id='+id, function(data){
      console.log(data);
      if(data == 1){
        changeButton($('.add-cart'));
        refreshCartItens();
      }
    });  
  });
  
  $('[name="quantidade"]').change(function(){
    calcTotal();
  });

  $('.finaliza').click(function(){
    $('[name="arr_qtds"]').val(arr_qtds);
    $('[name="arr_ids_produtos"]').val(arr_ids_produtos);
    $('[name="id_pedido"]').val($(this).attr('id'));

    $('[name="cartForm"]').submit();
  });

});
var total = 0, original = parseFloat($('.total').html()),
arr_qtds = [], arr_ids_produtos = [];


function changeNumItem(op){
  var num = parseInt($('.num-itens').html());
  if(op == '+')
    $('.num-itens').html(num+1);
  else
    if(num > 0)
    $('.num-itens').html(num-1);
}
function changeButton(btn){
  if(btn.hasClass('btn-info')){
      btn.html('<i class="fa fa-check"></i> Adicionado').removeClass('btn-info').addClass('btn-success');
      changeNumItem('+');
  }
  else if(btn.hasClass('btn-success')){
      btn.html('Adicionar à sacola').removeClass('btn-success').addClass('btn-info');
      changeNumItem('-');
  }
}

//********cart
function refreshCartItens(){
  $.get('/getitemsdropdown', 'data', function(data){
    // console.log(data);
    var obj = JSON.parse(data);
    viewCartItems(obj.item);

  });
}
function viewCartItems(obj){
  var html = '';
  for(var i = 0; i < obj.length; i++){
    html += '<a class="dropdown-item" href="/produtos/'+obj[i].id+'"><div class="col-md-12"><img src="/images/produtos/'+obj[i].imagem+'" width="50" class="float-left mr-2"><p class="text-truncate col-10 float-left">'+obj[i].nome+' <br> <small>Qtd: '+obj[i].quantidade+'</small> </p></div></a>';
  }
  $('.num-itens').html(obj.length);
  if(obj.length > 0)
    $('.cart-items').html(html);
  else
    $('.cart-items').html('<p class="dropdown-item text-center"><i class="fas fa-shopping-bag text-muted"></i> Sua sacola está vazia</p>');
}


// *******start rating
function highlightStar(obj) {
  // removeHighlight();		
  $('.fe.fa-star').each(function(index) {
      $(this).addClass('checked');
      if(index == $('.fe.fa-star').index(obj)) {
          return false;	
      }
  });
}

function removeHighlight() {
  $('.fe.fa-star').removeClass('checked');
  refreshRating()
}

function addRating(obj) {
  $('.fe.fa-star').each(function(index) {
      $(this).addClass('checked');
      $('#rating').val((index+1));
      if(index == $(".fe.fa-star").index(obj)) {
          return false;	
      }
  });
  
  val = $('#rating').val(), id = $('#rating').data('id-produto');
  $.get('/avaliarproduto', 'id='+id+'&num='+val, function(data){
      console.log(data);
      if(data == 1){
          $('.alert-success').show();
          refreshRating();
      }
  });
}

function refreshRating() {
  var id = 'id='+$('#rating').data('id-produto');
  $.get('/mediaavaliacoes', 'id='+id, function(data){
    console.log(data);

  });
  // $('.fe.fa-star').each(function(index) {
  //     if((index) < val) {
  //       $(this).addClass('checked');
  //     }
  // });
}
/*function changeShoopingBagButton(btn){
  if(btn.hasClass('btn-info'))
    btn.html('<i class="fa fa-check"></i> <i class="fas fa-shopping-bag"></i>').removeClass('btn-info').addClass('btn-success');
  else if(btn.hasClass('btn-success'))
    btn.html('+ <i class="fas fa-shopping-bag"></i>').removeClass('btn-success').addClass('btn-info');
}*/
$(function(){

  $('#user-img-input').change(function(e){
    files = e.target.files;
    var formData = new FormData(),
      file = [];

    $('#divprogress').append('<div class="progress mt-3"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>');

    formData.append('file', files[0]);
    console.log(formData); 
  });
  
  function upload_image(formData) 
  {
    var bar = $('.progress-bar'), divbar = $('div.progress');
    var percent = bar.css('width');

    $.ajax({
      url: '/perfiluploadImgUser',
      data: formData,
      type: 'post',
      processData: false,
      contentType: false,
      
      beforeSubmit: function() {
        var percentVal = '0%';
        bar.width(percentVal)
      },

      uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
      },
      
      success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
      },

      complete: function(xhr) {
        console.log(xhr.responseText);
        if(xhr.responseText)
        {
          document.getElementById("user-img").innerHTML=xhr.responseText;
        }
      }
    }); 
  }
});  
  
