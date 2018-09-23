@extends('master.master')

@section('content')
  <!-- MAIN -->
  <main>
      <form action="{{ route('profile.updated')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{Auth::user()->id}}">
      <div class="container">
          <!--sections-->
          <div class="row">
              <div class="col-lg-4">
                  <aside class="lb-aside lb-aside__edit-post">
                      <div>
                          <img src="{{ Storage::url('/userfiles/avatars/' .$user->avatar) }}" id="avatar" class="lb-user-avatar"></img>
                          <img class="lb-user-avatar" id="output"></img>
                        </br>
                          <label class="lb-btn">
                          <input type="file" class="form-control-file" name="avatar" id="avatar" onchange='loadFile(event)'>
                          Upload Avatar
                          </label>
                      </div>

                      <div class="lb-aside__edit-post-head">

                      </div>
                      <div class="lb-aside__get-code">
                          <p>Name</p>
                              <input name="name" id="name" type="text" class="form-control" value="{{ $user->name }}" placeholder='Enter Full Name'>
                            </br>
                          <p>Username</p>
                              <input name="username" id="username" type="text" class="form-control" value="{{ $user->username }}" placeholder='Enter Username'>
                            </br>
                          <p>Email Address</p>
                              <input name="email" id="email" type="text" class="form-control" value="{{ $user->email }}" placeholder='Enter Email Address'>
                            </br>
                                <a href="#" class="lb-btn default">Change Password</a>
                                <button tyoe="submit" href="#" class="lb-btn">Update Profile</button>
                      </div>


                  </aside>
              </div>
              <div class="col-lg-8">
                  <!--section-->
                  <div class="lb-section lb-section__edit-post">
                      <div class="lb-section__content">
                        <input name="about" id="about" type="text" max-length="255" class="form-control ttg-border-none" value="{{ $user->about }}" placeholder="About you" />
                      </div>
                  </div>
              </div>

          </div>
      </div>
    </form>
  </main>
@endsection
@section('pagescript')
  <script>
  var output = document.getElementById('output');
  $(output).hide();
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
      $(output).show();
      var avatarHide = document.getElementById('avatar');
      $(avatarHide).hide();
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
@endsection
