<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	 <div id="blog" class="row"> 
   @include('partials.navbar')
        @foreach ($blogs as $blog)
        <div class="col-md-10 blogShort">
                     <h1>{{$blog->title}}</h1>
                     <!-- <img src="http://www.kaczmarek-photo.com/wp-content/uploads/2012/06/guinnes-150x150.jpg" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail"> -->
                     <img src="{{ asset( 'storage/' . $blog->image ) }}" class="pull-left img-responsive thumb margin10 img-thumbnail" >
                         <em>This blog is written by <a href="http://bootsnipp.com/snippets/featured/sexy-sidebar-navigation" target="_blank">{{$blog->author}}</a></em>
                     <article><p>
                         {{$blog->description}}    
                         </p></article>
                     <div>
                     <!-- <button type="button" class="btn btn-outline-secondary">Publish<i class="fa fa-publish"></i></button> -->
                     <button type="button" class="btn btn-outline-secondary"><a href="{{ url('/delete-blog/' . $blog->id ) }}" >Delete</a><i class="fa fa-delete"></i></button> 
                     <button type="button" class="btn btn-outline-secondary" ><a href="{{ url('/edit-blog/' . $blog->id ) }}" >Edit</a><i class="fa fa-edit"></i></button>
                     </div>
                     
                 </div>
        @endforeach
            </div>
</div>
