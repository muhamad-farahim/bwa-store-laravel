@extends('layouts.admin')


@section('title')
    User
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">User</h2>
        <p class="dashboard-subtitle">
          Create a User
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
                            <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama User</label>
                                            <input type="text" class="form-control" name="name" id="" required>    
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email User</label>
                                            <input type="text" class="form-control" name="email" id="" required>    
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
                                                <option value="ADMIN">Admin</option>
                                                <option value="USER">User</option>
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


