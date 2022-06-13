@extends('layouts.admin')


@section('title')
    Category
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Category</h2>
        <p class="dashboard-subtitle">
          Edit of Category
        </p>
      </div>
      <div class="dashboard-content">
        
            <div class="row">
                <div class="col-12">
                    @if ($errors -> any())


                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach

                        
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.category.update', ['category'=> $instance->id ]) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Kategori</label>
                                            <input type="text" class="form-control" value="{{ $instance->name }}" name="name" id="" required>    
                                        </div>
                                    </div>
                                    <div class="col-md-12">                                
                                        <div class="form-group">
                                            <label for="">Foto</label>
                                            <input type="file" class="form-control" name="photo" id="" required>    
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">

                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">Save Now</button>
                                    </div>

                                </div>                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
@endsection


