jQuery(document).ready(function(){
  jQuery('#likeMusiclist').on('click',function(e){
    e.preventDefault();
    $this = jQuery(this);
    var likeurl = $this.data('likeurl');
    var id_musiclist = $this.data('idmusiclist');
    jQuery.ajax({
       url: likeurl,
       type: 'POST',
       dataType: 'json',
       data: {
          id_musiclist: id_musiclist,
       },
    })
    .done(function(data) {
      console.log(data);
    })
    .fail(function(error) {
    });
  })
});
