@extends('layouts.admin')


@section('title')
    Product
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Product</h2>
        <p class="dashboard-subtitle">
          Edit of Product
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
                            <form action="{{ route('admin.product.update', ['product'=> $instance->id ]) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Produk</label>
                                            <input type="text" value="{{ $instance->name }}" class="form-control" name="name" id="" required>    
                                        </div>
                                    </div>
                                    <div class="col-md-12">                                
                                        <div class="form-group">
                                            <label for="">Pemilik Produk</label>
                                            <select class="form-control" name="user_id" id="" required>
                                                @foreach ($users as $user)
                                                    @if ($user->name === $instance->user->name)
                                                        <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @else
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endif
                                                @endforeach 
                                            </select>   
                                        </div>
                                    </div> 
                                    <div class="col-md-12">                                
                                        <div class="form-group">
                                            <label for="">Kategori Produk</label>
                                            <select class="form-control" name="categories_id" id="" required>
                                                    <option selected hidden>Pilih Kategori</option>
                                                @foreach ($categories as $category)
                                                @if ($category->name === $instance->category->name)
                                                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                                @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach  
                                            </select>   
                                        </div>
                                    </div> 
                                    <div class="col-md-12">                                
                                        <div class="form-group">
                                            <label for="">Harga Produk</label>
                                            <input type="number" value="{{ $instance->price }}" name="price"class="form-control" id="">  
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="">Description</label>
                                          <textarea
                                            id="editor"
                                            name="description"
                                            rows="10"
                                            class="form-control"
                                        
                                          >{{ $instance->description }}</textarea>
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

@push('addon-scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <script>
      ClassicEditor.create(document.querySelector("#editor"));
    </script>
@endpush

