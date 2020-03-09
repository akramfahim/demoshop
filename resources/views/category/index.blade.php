@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Category Page
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
                                  <b>{{ $error }}</b>
                            @endforeach
                          
                        </div>
                    @endif
                    @if (session('successMessage'))
                        <div class="alert alert-success" role="alert">
                            <b>{{ session('successMessage') }}</b>
                        </div>
                    @elseif(session('errorMessage'))
                        <div class="alert alert-danger" role="alert">
                            <b>{{ session('errorMessage') }}</b>
                        </div>
                    @endif

                    <h2>Category List</h2>

                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col" class="text-center">Category Name</th>
                          <th scope="col" class="text-center">Created At </th>
                          <th scope="col" class="text-center">Last Update</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($categories as $category)

                        <tr>
                          <td><b>{{$category->categoryName}}</b></td>
                          <td><b>{{$category->created_at->format('d/m/Y')}}</b></td>
                          <td><b>{{$category->updated_at->format('d/m/Y')}}</b></td>
                          <td class="">
                            <a href="category/{{$category->id}}/edit" class="btn btn-sm btn-info">Edit</a>
                            <span class="float-right">
                            <form action="category/{{$category->id}}" method="post">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            </span>
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
            <button type="submit" class="btn btn-success float-right">Create</button>
        </form>


      </div>
    </div>
  </div>
</div>
@endsection
