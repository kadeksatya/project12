@extends('adminpage.parts.layout')
@section('namecontent','Setting User')
@section('title','Setting User')

@section('content')

<section class="content">

    <div class="card">
        <div class="card-header">
            Form Setting user
        </div>
        <div class="card-body">
            <form action="{{route('setting.update',$datauser->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
          <div class="row">
              <div class="col-md-4">
                  <label for="name">Nama Kamu Dude</label>
                  <div class="input-group">
                      <input type="text" name="name" id="name" value="{{$datauser->name}}" class="form-control" placeholder="Masukkan Nama Anda Bangsad" required>
                  </div>
                  <br>
                  <label for="username">Username Kamu Dude</label>
                  <div class="input-group">
                    <input type="text" name="username" id="username" value="{{$datauser->username}}" class="form-control" placeholder="Masukkan Nama Anda Bangsad" required>
                </div>
          
                <br>
                @foreach ($datauser->role as $role)
                <label for="username">Jenis Akses Kamu </label>
                <div class="input-group">
                  <input type="text" disabled value="{{$role->role}}" class="form-control" placeholder="Masukkan Nama Anda Bangsad" required>
              </div>
                @endforeach
                
              </div>
              <div class="col-md-4">
                  <input type="hidden" name="hidden_photo" id="hidden_photo" value="{{$datauser->photo}}">
                <img id="preview" src="{{URL('/')}}/asset/imageuser/{{$datauser->photo}}" class="img-thumbnail"  width="400" height="auto" />

                <hr>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Foto Profile</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo" id="photo"
                            aria-describedby="inputGroupFileAddon01" >
                        <label class="custom-file-label" for="photo">Choose file</label>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" id="btn" name="btn">Simpan Perubahan..</button>
            <a href="/dashboard" class="btn btn-danger">Cencel..</a>
        </div>
    </form>
    </div>

</section>

<script>
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#photo").change(function () {
            readURL(this);
            $("#preview").attr("style",'display: ')
        });

        $(".alert-error").show(function(){
            toastr.error("  @foreach($errors->all() as $error) {{$error}} @endforeach");
            
        });

        $(function(){
        $("#username").on('keypress', function(e){
            if(e.which==32)
            {
                toastr.error("Ngedit ngotak dikit tod, Username jangan ada space")
                return false
            }
        });
    });
    });

</script>

@endsection
