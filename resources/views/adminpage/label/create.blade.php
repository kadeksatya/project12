@extends('adminpage.parts.layout')
@section('namecontent','Create Label')
@section('title','Create Label')

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
        <form action="{{route('label.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
           
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="hidden" id="id" name="id">
                        <input type="text" class="form-control" id="label" required name="label" placeholder="Masukkan Nama Label">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" id="btn" name="btn">Posting..</button>
            <a href="{{route('label.index')}}" class="btn btn-danger">Cencel..</a>
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
