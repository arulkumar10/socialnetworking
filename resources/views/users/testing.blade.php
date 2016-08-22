<?php
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
                data:{value:value,id:id,countlike:countlike,countdislike:countdislike},
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
?>


<?php
public function postLike(Request $request){
        $category=$request['value'];
        $likecount=$request['countlike'];
        $dislikecount=$request['countdislike'];
        $user_id=Helpers::getUserId(); 

         if(Auth::check()){
                     if ($category=='articles') {
                $article_like=\App\Models\ArticleLikes::where('article_id',$request['id'])->where('user_id',$user_id)->where('like',1)->count();
                if($article_like==0){
                   $delete= \App\Models\ArticleLikes::where('article_id',$request['id'])->where('user_id',$user_id)->delete();
                    $like=\App\Models\ArticleLikes::create([
                                                            'article_id'=> $request['id'],
                                                            'user_id' => $user_id,
                                                            'like' => 1
                                                         ]);
                    return Response::json(['status' => true,'likecount' => $likecount,'dislikecount' => $dislikecount]); 
                }else{
                    return Response::json(['status' => false,'liked' => 'liked']); 
                }
                
            }
         }else{
             $message="Please Login Your Account";
           return Response::json(['status' => false,'message' => $message]);
         }
            
    }
    ?>