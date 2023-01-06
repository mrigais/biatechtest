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
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-lg-6">
        <div class="container">
          <div class="row">
            <div class="col-md-20">
              <h3 style="padding-bottom: 10px; justify-content: center;">Update Blog</h3>
               <form id="updateBlog" enctype="multipart/form-data">
               <meta name="csrf-token" content="{{ csrf_token() }}">
                 @if(Session::has('message'))
                 <div class="alert">{{Session::get('message')}}</div>
                 @endif
                <div class="form-label-group" style="padding-bottom: 10px;">
                  <input type="text" id="inputTitle" name="title" class="form-control" placeholder="Enter Title" value="{{$blog->title}}" autofocus></input>
                  @if($errors->has('title'))
                    <div class="error">{{ $errors->first('title') }}</div>
                  @endif
                  <label for="inputTitle">Title</label>
                </div> 
                <div class="form-label-group" style="padding-bottom: 10px;">
                  <input type="file" id="inputImage" name="image" class="form-control-file" required><img height=100 width=100 src="{{ $blog->image }}"></img></input>
                  @if($errors->has('image'))
                    <div class="error">{{ $errors->first('image') }}</div>
                  @endif
                  <label for="inputImage">Thumbnail</label>
                </div>
                <div class="form-label-group" style="padding-bottom: 10px;">
                  <textarea name="description" id="inputDescription" class="form-control">{{$blog->description}}</textarea>
                  @if($errors->has('description'))
                    <div class="error">{{ $errors->first('description') }}</div>
                  @endif
                  <label for="inputDescription">Description</label>
                </div>
                <div class="form-label-group" style="padding-bottom: 10px;">
                  <input type="text" id="inputAuthor" class="form-control" value="{{$blog->author}}"></input>
                  @if($errors->has('author'))
                    <div class="error">{{ $errors->first('author') }}</div>
                  @endif
                  <label for="inputAuthor">Author</label>
                </div>
 
                <input type="hidden" name="blog_id" id="blog_id" value="{{$blog->id}}">

                <button class="btn btn-lg btn-primary mb-2" type="submit">Update</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
               <!-- <div class="col-md-12 gap10"></div> -->
             </div>
</div>

<script>
$('#updateBlog').on('submit', function(e) {
    
    e.preventDefault(); 
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    var title = $('#inputTitle').val();
    var description = $('#inputDescription').val();
    var image = $('#inputImage').val();
    var author = $('#inputAuthor').val();
    var blog_id = $('#blog_id').val();
    $.ajax({
        type: "POST",
        url: '/edit-blog/'+blog_id,
        data: {title:title, description:description, author:author, image: image},
        success: function() {
            alert( 'Updated Successfully' );
            window.location.href = "/all-blogs";
        },
        error: function (error) {
        alert(error);
    }
    });
});
</script>