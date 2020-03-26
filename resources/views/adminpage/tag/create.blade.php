@extends('adminpage.parts.layout')
@section('namecontent','Create Tags')
@section('title','Create Tags')

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
        <form action="{{route('tags.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
           
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="hidden" id="id" name="id">
                        <input type="text" class="form-control" id="tags" required name="tags" placeholder="Masukkan Nama Tags">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" id="btn" name="btn">Posting..</button>
            <a href="{{route('tags.index')}}" class="btn btn-danger">Cencel..</a>
        </div>
    </form>
    </div>

</section>

<script>
    $(document).ready(function () {
        $(".alert-error").show(function(){
            toastr.error("  @foreach($errors->all() as $error) {{$error}} @endforeach");
            
        });
    });

</script>
@endsection
