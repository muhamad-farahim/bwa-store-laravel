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
                            <form action="{{ route('admin.user.update', '$user->id') }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama User</label>
                                            <input type="text" class="form-control" name="name" id="" value="{{ $instance->name }}" required>    
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email User</label>
                                            <input type="text" class="form-control" name="email" id="" value="{{ $instance->email }}" required>    
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password User</label>
                                            <input type="password" class="form-control" name="password" id="" required>    
                                        </div>
                                        <div class="form-group">
                                            <label for="">Konfimasi password User</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="" required>    
                                        </div>
                                        <div class="form-group">
                                            <label for="">Roles</label>
                                            <select name="roles" id="">
                                                @if ($instance -> roles === "ADMIN")
                                                    
                                                    <option selected value="ADMIN">Admin</option>
                                                    <option  value="USER">User</option>

                                                @else

                                                <option  value="ADMIN">Admin</option>
                                                    <option selected value="USER">User</option>
                                                    
                                                @endif
                                            </select>
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


