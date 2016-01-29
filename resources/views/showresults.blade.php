

 

                   <!-- Blog Entries Column -->
            <div class="post-preview">
      Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }} 
@foreach ($posts as $post)

                <!-- First Blog Post -->
                 <p>
                     <span><h4>
                    <a href="{!! action('BlogController@show', $post->id) !!}"> {!! $post->title !!}  </a>
                         </h4></span> </p>
               
                <span class="glyphicon glyphicon-time"></span> Posted on {!! $post->created_at->format('F d, Y H:i e') !!}               
                by <a class="lead" href={{ URL::route('userprofile', $post->username) }}>{!! $post->username !!}</a>.   
                ({!! $post->comments()->count()  !!} comments)
                    @if ($post->filePath != "" )
                        <p>
                            <img src="{!! asset('/images/'.$post->filePath) !!}" alt="" class="img-responsive" height="300" width="100%" />
                   </p>
                   @endif
                
                    <p>
                    {!! mb_substr($post->content,0,150) !!}....
           </p>
                <a class="btn btn-primary" href="{!! action('BlogController@show', $post->id) !!}">Read More .... <span class="glyphicon glyphicon-chevron-right"></span></a>
                 
                
                    @can('update-post', $post)
                       <a href ="{!! action('UpdatePostsController@updatePost', $post->id) !!}" > update post </a>
                    @endcan
                 <hr>  
                       @endforeach
            {!! $posts->render() !!}
                </div>

           

