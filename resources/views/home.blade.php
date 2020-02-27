@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Dashboard
                  <span class="float-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Add New Category
                            </button>
                  </span>
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                          
                            @foreach ($errors->all() as $error)
                                  {{ $error }}
                            @endforeach
                          
                        </div>
                    @endif
                    @if (session('msg') == 'success')
                        <div class="alert alert-success" role="alert">
                            Hurray! Category Created Successfully
                        </div>
                    @elseif(session('msg') == 'error')
                        <div class="alert alert-danger" role="alert">
                            OOPPS! something Went Wrong
                        </div>
                    @endif

                    <h2>Category List</h2>

                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($categories as $category)

                        <tr>
                          <th scope="row">1</th>
                          <td>{{$category->categoryName}}</td>
                          <td>
                            <button class="btn btn-sm btn-info">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                          </td>
                        </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
          
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center" id="exampleModalLongTitle">Add New Category</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark text-light">

        
        <form action="/category" method="post">
            @csrf
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="Enter Category Name">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
