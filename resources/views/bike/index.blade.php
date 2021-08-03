@extends('layout')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('content')


<!-- Modal -->
<div class="modal fade" id="BikeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('bike.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label">bike_name</label>
              <input type="test" name="bike_name" class="form-control" id="exampleFormControlInput1" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label">price</label>
              <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="" required>
            </div>
           </div>
  
           
  
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-info" name="submit"> Save</button>
            </div>
        
      </div>
    </form>
    </div>
  </div>

  {{-- Model End --}}

  {{-- Edit Model Start --}}
  <div class="modal fade" id="BikeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('bike.create')}}">
            @csrf
                @method('PATCH')

            <input type="hidden" class="form-control" name="edit_id" id="edit_id">
            <div class="form-group">
              <label for="exampleFormControlInput1"  class="form-label">bike_name</label>
              <input type="test" name="bike_name" id="bike_name" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label">price</label>
              <input type="number" name="price" class="form-control" id="price" placeholder="" required>
            </div>
           </div>
  
           
  
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-info" name="submit"> Save</button>
            </div>
        
      </div>
    </form>
    </div>
  </div>
  {{-- Edit model end --}}

<div class="card mt-5">
  <div class="card-header">
    CRUD -> Bike Info &nbsp; <a href="{{ route('bike.create')}}" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#BikeModal">Add Data</a>
    &nbsp; <a href="{{'/'}}" class="btn btn-warning">Back</a>
  </div>

   @if (session()->get('message')=="Insert")
    
        <script>
          swal({
          title: "Insert",
          text: "Record Insert Successfully..!!",
          icon: "success",
        });
        </script>
    @endif

    @if (session()->get('message')=="Update")
    
    <script>
      swal({
      title: "Update",
      text: "Record Update Successfully..!!",
      icon: "success",
    });
    </script>
@endif

    @if (session()->get('message')=="Delete")
    
    <script>
      swal({
      title: "Delete",
      text: "Record Insert Successfully..!!",
      icon: "warning",
    });
    </script>
@endif

  <div class="card-body">
   
  </div>


  <table class="table">
    <thead>
        <tr class="table-primary">
          <td># ID</td>
          <td>Name</td>
          <td>Price</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($bike as $bike)
        <tr>
            <td>{{$bike->id}}</td>
            <td>{{$bike->bike_name}}</td>
            <td>{{$bike->price}}</td>
           
            <td class="text-center">
                <button value="{{$bike->id}}" class="edit_student btn btn-success btn-sm">Edit</button>
                <button value="{{$bike->id}}" class="delete_student btn btn-danger btn-sm" >Delete</button>
                {{-- <form action="{{ route('bike.destroy', $bike->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

</div>
@endsection

<script>

$(document).on('click','.edit_student', function () {
  // e.preventDefault();

  var edit_id = $(this).val();
// alert(edit_id);

$.ajax({
  type: "GET",
  url: "/bike-update/"+edit_id,
  success: function (response) {
    // console.log(response);
    // alert
    if(response.status == 404){
      swal({
          title: response.status,
          text: response.message,
          icon: "warning",
        });
    } else {
      $('#BikeEditModal').modal('show');
      $('#edit_id').val(response.bike.id)
      $('#bike_name').val(response.bike.bike_name);
      $('#price').val(response.bike.price);
    }
  }
});
});


// delete 


$(document).on('click','.delete_student', function () {
  // e.preventDefault();

  var delete_id = $(this).val();

  // alert(delete_id);

  swal({
        title: "Are you sure to Delete?",
        text: " ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {

        if (willDelete) {

            $.ajax({
              type: "GET",
              url: "/bike-delete/"+delete_id,
                success: function(response) {
              //  alert(response.message);
                   if(response.status == 200){
                    swal({
                        title: 'Delete',
                        text: response.message,
                        icon: "warning",
                      });
                      setTimeout(function() {
                                // alert('Reloading Page');
                                location.reload(true);
                            }, 1500); 
                  }

                  // $(document).ready(function() {
                  //           setTimeout(function() {
                  //               // alert('Reloading Page');
                  //               location.reload(true);
                  //           }, 2000);
                  //       });
                   
                }
            });


        } else {
            return false;
        }
    });

  });



</script>
