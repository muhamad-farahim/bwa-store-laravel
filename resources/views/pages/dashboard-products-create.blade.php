@extends('layouts.dashboard')


@section('title')

Store Dashboard Product Details 
@endsection

@section('content')
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Store Settings</h2>
                <p class="dashboard-subtitle">Make a profitable store</p>
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
                    <form action="{{ route('dashboard-product-store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Product Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="name"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Price</label>
                                <input
                                  type="number"
                                  name="price"
                                  id=""
                                  class="form-control"
                                />
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label for="">Category</label>
                                <select
                                  type="text"
                                  value="papel la casa"
                                  class="form-control"
                                  name="categories_id"
                                >
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach 
                                </select>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label for="">Description</label>
                                <textarea
                                  id="editor"
                                  name="description"
                                  rows="10"
                                ></textarea>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label for="">Thumbnails</label>
                                <input type="file" name="photo" class="form-control" id="" multiple  >
                              </div>
                            </div>
                          </div>
                          <div class="row mt-4">
                            <div class="col-12">
                              <div class="text-right">
                                <button class="btn btn-success btn-block px-5">
                                  Save Now
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                {{-- <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="gallery-container">
                              <img
                                src="images/product-card-1.png"
                                alt=""
                                class="w-100"
                              />
                              <a href="#" class="delete-gallery"
                                ><img src="images/icon-delete.svg" alt=""
                              /></a>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="gallery-container">
                              <img
                                src="images/product-card-2.png"
                                alt=""
                                class="w-100"
                              />
                              <a href="#" class="delete-gallery"
                                ><img src="images/icon-delete.svg" alt=""
                              /></a>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="gallery-container">
                              <img
                                src="images/product-card-3.png"
                                alt=""
                                class="w-100"
                              />
                              <a href="#" class="delete-gallery"
                                ><img src="images/icon-delete.svg" alt=""
                              /></a>
                            </div>
                          </div>
                          <div class="col-12">
                            <input
                              type="file"
                              id="file"
                              style="display: none"
                              name="photo"
                              multiple
                            />
                            <button
                              class="btn btn-secondary btn-block mt-3"
                              onclick="thisFileUpload()"
                            >
                              Add photo
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
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