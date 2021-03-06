@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Dashboard
                  <span class="float-right">
                    <a href="category">CategoryList</a>
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

                    
                        
                      </tbody>
                    </table>
          
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
