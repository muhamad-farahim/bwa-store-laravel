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
          Create a Product
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
                            <form action="{{ route('admin.product.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Produk</label>
                                            <input type="text" class="form-control" name="name" id="" required>    
                                        </div>
                                    </div>
                                    <div class="col-md-12">                                
                                        <div class="form-group">
                                            <label for="">Pemilik Produk</label>
                                            <select class="form-control" name="user_id" id="" required>
                                                    <option selected hidden>Pilih Pemilik</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach 
                                            </select>   
                                        </div>
                                    </div> 
                                    <div class="col-md-12">                                
                                        <div class="form-group">
                                            <label for="">Harga Produk</label>
                                            <input type="number" name="price"class="form-control" id="">  
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
                                          ></textarea>
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

