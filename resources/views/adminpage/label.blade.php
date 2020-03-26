@extends('adminpage.parts.layout')
@section('namecontent','Label')
@section('title','Label')
@if (session('create'))<div class="alert-create"></div>@endif
@if (session('delete'))<div class="alert-delete"></div>@endif
@if (session('update'))<div class="alert-update"></div>@endif
@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('label.create')}}" class="btn btn-success">Add Label</a></h3>
        </div>
        <div class="card-body">
           <table class="table table-borderless" id="example2">
               <thead>
                   <th>ID Label</th>
                   <th>Label Name</th>
                   <th>Action</th>
               </thead>
               <tbody>
                   @foreach ($datalabel as $label)

                   <tr>
                       <td>{{$label->id}}</td>
                       <td>{{$label->label}}</td>
                       <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form id="form-delete" action="{{route('label.destroy', $label->id)}}" method="POST">
                                @csrf
                                <a class="btn btn-primary btn-sm" href="{{route('label.edit', $label->id)}}">Edit</a>    
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
