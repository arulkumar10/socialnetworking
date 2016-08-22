<?php
jQuery(function( $ ) {
        $('.like-views a').on('click', function(e) {
        e.preventDefault();
        var url=$(this).attr('data-href');
        var countlike=$('.countlike').text();
        var countdislike=$('.countdislike').text();
        var id=$(this).attr('data-id');
        var value=$(this).attr('data-value');
            $.ajax({
                type:'POST',
                url: url, // url, from form
                data:{id:id,countlike:countlike,countdislike:countdislike},
                success:function(response) {
                    if (!response.status) {
                        if (response.message) {
                            $('.login-box').fadeIn('slow');
                            $('.overlay').fadeIn('slow');  
                        }else
                        if (response.liked) {
                            $(this).prop('disabled', true);
                        }
                        
                    }else{
                        $('.countlike').html(parseInt(response.likecount)+1); 
                        if (response.dislikecount>0) {
                            $('.countdislike').html(parseInt(response.dislikecount)-1);
                        }
                       
                    }
                
                }
            });
        });
});

?>