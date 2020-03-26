@extends('adminpage.parts.layout')
@section('namecontent','Create Postingan')
@section('title','Create Post')

@section('content')

@if($errors->any())
<div class="alert-error">
 <ul>

 </ul>
</div>
@endif


<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Postingan</h3>
        </div>
        <div class="card-body">
            <form action="{{route('postingan.store')}}" method="post" class="form-group" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id_user" name="id_user" value="{{auth::user()->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <img id="preview" src="" style="display:none" width="400" height="auto" />
                        <hr>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar"
                                    aria-describedby="inputGroupFileAddon01" required>
                                <label class="custom-file-label" for="gambar">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <hr>
                        <div class="input-group">
                            <input type="text" class="form-control" id="title" name="title" required placeholder="Title Post">
                        </div>
                        <br>
                        <div class="input-group">
                            <textarea name="diskripsi" id="diskripsi" class="form-control" cols="30" rows="4" required placeholder="Deskripsi Postingan"></textarea>    
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select name="id_label" id="id_label" class="form-control" required>
                                        @if ($label->count()>0)
                                            <option value="" disabled selected>Pilih Label...</option>
                                            @foreach ($label as $l)
                                                <option value="{{$l->id}}">{{$l->label}}</option>
                                            @endforeach
                                        @else
                                        <option value="" disabled selected>Kosong Njing</option>
                                        @endif
                                    </select>
                                    @if ($label->count()==0)
                                    <a href="/label"class="btn btn-sm btn-primary ml-2">Add label</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select name="id_tag" id="id_tag" class="form-control" required>
                                        @if ($tags->count()>0)
                                            <option value="" disabled selected>Pilih Tag...</option>
                                            @foreach ($tags as $t)
                                                <option value="{{$t->id}}">{{$t->tag}}</option>
                                            @endforeach
                                        @else
                                        <option value="" disabled selected>Kosong Njing</option>
                                        @endif
                                    </select>
                                    @if ($tags->count() == 0)
                                    <a href="/tags"class="btn btn-sm btn-primary ml-2">Add Tags</a>
                                    @else
                                    {{-- kosong --}}
                                    @endif
                                   
                                </div>
                            </div>
                        </div>


                    </div>
                
                
                </div>
           

        </div>
        <div class="card-footer">
            <button class="btn btn-primary" id="btn" name="btn">Posting..</button>
            <a href="{{route('postingan.index')}}" class="btn btn-danger">Cencel..</a>
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

        $("#gambar").change(function () {
            readURL(this);
            $("#preview").attr("style",'display: ')
        });

        $(".alert-error").show(function(){
            toastr.error("  @foreach($errors->all() as $error) {{$error}} @endforeach");
            
        });
    });

</script>
@endsection
