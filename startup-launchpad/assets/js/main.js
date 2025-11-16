(function($){
  $(document).ready(function(){
    // Newsletter AJAX
    $(document).on('submit','#slp-newsletter',function(e){
      e.preventDefault();
      var \$form = $(this);
      var email = \$form.find('input[name="email"]').val();
      var msg = $('#slp-msg');
      msg.hide();
      $.post(slp_ajax.ajax_url,{action:'slp_subscribe',email:email,nonce:slp_ajax.nonce},function(res){
        if(res.success){ msg.text(res.data.message).css('color','green').show(); \$form[0].reset(); }
        else { msg.text(res.data.message || 'Error').css('color','crimson').show(); }
      }).fail(function(){ msg.text('Network error').css('color','crimson').show(); });
    });

    // Reduce motion for users who prefer it
    try{ if(window.matchMedia('(prefers-reduced-motion)').matches){ $('video.video-bg').removeAttr('autoplay').prop('muted',true); } }catch(e){}
  });
})(jQuery);

