@extends('layout')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@section('content')

<div class="mt-5">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
    @endif

   

    @if (session()->get('message')=="Delete")
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Record Deleted Successfully..!!   </strong>  
        
        </div>
    @endif

    @if (session()->get('message')=="Insert")
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Record Insert Successfully..!!    
        
        </div>
    @endif


    @if (session()->get('message')=="Update")
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Record Update Successfully..!!    
        
        </div>
    @endif

    
   

<!-- Modal -->
<div class="modal fade" id="studaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('stud.store')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="test" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">address</label>
            <input type="test" name="address" class="form-control" id="exampleFormControlInput1" placeholder="" required>
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

<!-- END Modal -->
<table class="table">
    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studaddModal">Add New</a>
    &nbsp; <a href="{{'/'}}" class="btn btn-warning">Back</a>
    <br>
    <a href="">
    <thead>
        <tr class="table-primary">
          <td># ID</td>
          <td>Name</td>
          <td>Address</td>

          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($stud as $stud )
        <tr>
            <td>{{$stud->id}}</td>
            <td>{{$stud->name}}</td>
            <td>{{$stud->address}}</td>
            
            <td class="text-center">
                <a href="{{ route('stud.edit', $stud->id) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('stud.destroy', $stud->id) }}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>


  @endsection
    

</body>
</html>