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
              <h3 style="padding-bottom: 10px; justify-content: center;">Create A New Blog</h3>
               <form action="{{url('create-blog')}}" method="POST" id="createBlog">
                 {{ csrf_field() }}
                 @if(Session::has('message'))
                 <div class="alert">{{Session::get('message')}}</div>
                 @endif
                <div class="form-label-group" style="padding-bottom: 10px;">
                  <input type="text" id="inputTitle" name="title" class="form-control" placeholder="Enter Title" autofocus>
                  <label for="inputTitle">Title</label>
                </div> 
                <div class="form-label-group" style="padding-bottom: 10px;">
                  <input type="file" id="inputImage" name="image" class="form-control-file">
                  <label for="inputImage">Image</label>
                </div>
                <div class="form-label-group" style="padding-bottom: 10px;">
                  <textarea name="description" id="inputDescription" class="form-control"></textarea>
                  <label for="inputDescription">Description</label>
                </div>
 
                <div class="form-label-group" style="padding-bottom: 10px;">
                  <input type="text" id="inputAuthor" name="author" class="form-control" placeholder="Enter Author" autofocus>
                  <label for="inputAuthor">Author</label>
                </div> 
                <button class="btn btn-lg btn-primary mb-2" type="submit">Save</button>
                <button class="btn btn-lg btn-primary  mb-2" type="submit">Save & Publish</button>
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