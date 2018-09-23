<div class="lb-upload">
    <div class="lb-upload__head">
        <form action="{{ route('post.post')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input name="body" id="body" type="text" class="form-control ttg-border-none" placeholder="Paste URL or image link or add text here" />


    </div>
    <div class="lb-upload__content">
        <img id="UploadImage" src="{{ url('fonts/icons/sharehub/svg/Upload_graphic.svg') }}" alt="">
        <img id="uploadImageOutput"  alt="">
        <div class="offset-md-5 col-md-3">
          <label class="lb-btn">
          <input type="file" class="form-control-file" name="image" id="image" onchange='loadImage(event)' multiple>
          Upload Images
        </label>
        </div>

    </div>
      </form>
    <div class="lb-upload__footer">
        <a href="#">
            <i class="icon-Video_to_GIF"></i>
            <span>Browse your uploads</span>
        </a>
    </div>
</div>

@section('pagescript')
  <script>
  var output = document.getElementById('uploadImageOutput');
  $(output).hide();
  var loadImage = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('uploadImageOutput');
      output.src = reader.result;
      $(output).show();
      var UploadImage = document.getElementById('UploadImage');
      $(UploadImage).hide();
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
@endsection
