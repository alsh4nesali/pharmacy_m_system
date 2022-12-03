<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<x-app-layout>
    <style>
        .del:hover{
            color:black;
        }

        .update:hover{
            color:black;
        }
        h1{
          font-family:'Poppins',sans-serif;
        }
    </style>

    <h1 style="margin:2%; font-size:25px; display:inline-block;">List of Medicine Available</h1>
      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" 
      style="float:right; margin:2%; background-color:#FFC75F;">Add Product</button>
    <table class="table table-bordered table-hover text-center">
    <thead class="table-secondary">
    <tr>
      <th scope="col">Medicine Name</th>
      <th scope="col">Brand</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($medInformation as $userItem => $data)
    <tr>

      <td>{{ $data -> medname }}</td>
      <td>{{ $data -> brand }}</td>
      <td>{{ $data -> price }}</td>
      <td>
      <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal"><button type="button" class="btn btn-danger del" style="background-color:#C34A36;">Delete</button></a> ||
      <a href="" data-bs-toggle="modal" data-bs-target="#updateModal"><button type="button" class="btn btn-primary update" style="background-color:#2B809B;">Update</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="m-4">
{{ $medInformation->links() }}
</div>

</x-app-layout>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('saveInfo') }}" autocomplete="off">
      {{ csrf_field() }}
      <div class="modal-body" style="padding:5%;">
      <h1 class="modal-title fs-5" id="exampleModalLabel" style="text-align:center; margin-bottom:2%; font-weight:bold;">Medicine Information</h1>
      <div class="input-group mb-3">
  <input type="text" class="form-control" name="medname" placeholder="Medicine Name" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" name="medbrand" placeholder="Brand" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" name="medprice" placeholder="Price" aria-label="Username" aria-describedby="basic-addon1">
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#4B4453;">Close</button>
        <button type="submit" class="btn btn-primary" style="background-color:#008E9B;">Save Information</button>
      </div>
    </div>
    </form>
  </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top:10%;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center p-2" id="exampleModalLabel">Are you sure you want to delete this product?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#4B4453;">Cancel</button>
        <a href="{{ route('deleteTask', $data->id) }}"><button type="submit" class="btn btn-danger" style="background-color:#C34A36;">Yes</button></a>
      </div>
    </div>

  </div>
</div>

@foreach ($medInformation as $userItem => $data)
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Product Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('updateTask', $data->id) }}" autocomplete="off">
      {{ csrf_field() }}
      
      <div class="modal-body" style="padding:5%;">
      <h1 class="modal-title fs-5" id="exampleModalLabel" style="text-align:center; margin-bottom:2%; font-weight:bold;">Update Medicine Information</h1>
      
      <div class="input-group mb-3">
  <input type="text" class="form-control" name="medname" id="medname" placeholder="Medicine Name" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" name="medbrand" id="brand"  placeholder="Brand" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" name="medprice" id="price"  placeholder="Price" aria-label="Username" aria-describedby="basic-addon1">
</div>
      
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#4B4453;">Close</button>
        <button type="submit" class="btn btn-primary" style="background-color:#008E9B;">Save Information</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endforeach



    <script>
        $(document).ready(function () {

            $('.update').on('click', function () {

                $('#updateModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#medname').val(data[0]);
                $('#brand').val(data[1]);
                $('#price').val(data[2])
            });
        });
    </script>