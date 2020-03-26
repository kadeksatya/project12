@extends('adminpage.parts.layout')
@section('namecontent','Postingan')
@section('title','Postingan')

@section('content')
@if (session('status'))<div class="alert-success"></div>@endif
@if (session('delete'))<div class="alert-delete"></div>@endif

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{route('postingan.create')}}" class="btn btn-success">Add Post</a>
            </h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-borderless table-sm table-hover">
                <thead>
                <tr class="text-center">
                  <th>Image</th>
                  <th>Title</th>
                  <th>Tags</th>
                  <th>Label</th>
                  <th>Post By</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($datapost as $post)
                        

                <tr>
                  <td width="10%"><img src="{{URL('/')}}/asset/imagepost/{{$post->gambar}}" class="img-thumbnail" alt="{{$post->diskripsi}}" title="{{$post->title}}" width="100" height="auto"></td>
                  <td>{{$post->title}}</td>
                  
                  @foreach ($post->tag as $tags)
                  <td width="10%">{{$tags->tag}}</td>
                  @endforeach
                  @foreach ($post->label as $l)
                  <td width="10%">{{$l->label}}</td> 
                  @endforeach
                 
                  @foreach ($post->user as $u)
                  <td width="10%">{{$u->username}}</td>
                  @endforeach
                  
                  <td width="20%" class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <form id="form-delete" action="{{route('postingan.destroy', $post->id)}}" method="POST">
                            @csrf
                            <a class="btn btn-primary btn-sm" href="{{route('postingan.edit', $post->id)}}">Edit</a>
                            <button type="button" class="btn btn-info btn-sm detailpost" data-title="{{$post->title}}" data-des="{{$post->diskripsi}}" data-gambar="{{$post->gambar}}" data-tag="{{$tags->tag}}" data-label="{{$l->label}}" data-user="{{$u->username}}">Details</button>

                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm hapuspost" onclick="hapus()">Delete</button>

                            </form>
                        
                       
                      </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                
              </table>
            
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>

</section>

<!-- Modal Detail -->
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md 6">
                  <img id="image" class="img-thumbnail">

                  <br>
                  <br>
                  Keterangan:
                  <br>
                  <span class="badge badge-info">Post By</span>
                  <span class="badge badge-success">Label</span>
                  <span class="badge badge-primary">Tags</span>
              </div>
              <div class="col-md-6">
                  <h4 id="title"></h4>
                  <h6 id="dis"></h6>
                  <div id="id_user" class="d-inline p-2 bg-info text-white"></div>
                  <div id="id_label" class="d-inline p-2 bg-success text-white"></div>
                  <div id="id_tag" class="d-inline p-2 bg-primary text-white"></div>
              </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



{{-- Form --}}



<script>
    // Alert Here
    $(document).ready(function(){
        $(".alert-success").show(function(){
            toastr.success("{{ session('status') }}");
        });

        $(".alert-delete").show(function(){
            toastr.success("{{ session('delete') }}");
        });
    });


    // Confirm Delete

        
            function hapus() {
            event.preventDefault();
            swal.fire({
            title: 'Kamu Yakin?',
            text: "File akan terhapus selamanya, seperti kenanganmu bersamanya!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }). then((result) => {
                if (result.value) {
                document.getElementById("form-delete").submit()
                swal.fire(
                'Deleted!',
                'Cie yang berhasil Move On ! :)',
                'success'
                );
                } 
            else
                {
                swal.fire(
                'Cancelled',
                'Move On Njing !',
                'error'
                );
                }

            
       
        });
            }                
  

    $(document).ready(function(){
        $(".detailpost").click(function(){
           $("#modaldetail").modal("show");
           $("#image").attr("src", "{{URL('/')}}/asset/imagepost/" + $(this).data('gambar'));
           $("#title").text($(this).data('title'));
           $("#dis").text($(this).data('des'));
           $("#id_user").text($(this).data('user'));
           $("#id_tag").text($(this).data('tag'));
           $("#id_label").text($(this).data('label'));
        });
    });

</script>
<script>
    $(function () {

      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>
@endsection
