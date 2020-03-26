@extends('adminpage.parts.layout')
@section('namecontent','Tags')
@section('title','Tags')

@section('content')

@if (session('create'))<div class="alert-create"></div>@endif
@if (session('delete'))<div class="alert-delete"></div>@endif
@if (session('update'))<div class="alert-update"></div>@endif
<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('tags.create')}}" class="btn btn-success">Add Tags</a></h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table-borderless table">
                <thead>
                    <th>ID Tags</th>
                    <th>Tags Name</th>
                    <th width="20%" class="text-center">Action</th>
                </thead>
                <tbody>
                    @foreach ($datatag as $tag)
                        <tr>
                            <td width="10%">{{$tag->id}}</td>
                            <td>{{$tag->tag}}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="{{route('tags.destroy', $tag->id)}}" id="form-delete" method="post">
                                        <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="hapus()">Delete</button>
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


<script>
    // Alert Here
    $(document).ready(function(){
        $(".alert-create").show(function(){
            toastr.success("{{ session('create') }}");
        });
        $(".alert-update").show(function(){
            toastr.success("{{ session('update') }}");
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
  


</script>

@endsection
