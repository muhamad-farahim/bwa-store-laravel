@extends('layouts.dashboard')


@section('title')

Account setting    
@endsection

@section('content')

  <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Store Settings</h2>
              <p class="dashboard-subtitle">
                Make a profitable store
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12">
                  <form action="{{ route('dashboard-setting-redirect', 'dashboard-setting-store') }}">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Store Name</label>
                              <input type="text" class="form-control" name="store_name" value="{{ $user->store_name }}">
                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Category</label>
                              <select
                                  type="text"
                                  value="papel la casa"
                                  class="form-control"
                                  name="categories_id"
                                >
                                  @foreach ($categories as $category)
                                        @if ($category->id == $user->categories_id)

                                          <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                            
                                        @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                  @endforeach 
                                </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="is_store_open">Store Status</label>
                              <p class="text-muted">
                                Is your store open?
                              </p>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="store_status" id="openStoreTrue"
                                  value="1" {{ $user->store_status === 1 ? 'checked': '' }} />
                                <label class="custom-control-label" for="openStoreTrue">Open</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="store_status"
                                  id="openStoreFalse" value="0" {{ $user->store_status === 0 || $user->store_status === null ? 'checked': '' }}/>
                                <label makasih class="custom-control-label" for="openStoreFalse">Temporarily
                                  closed</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="text-right">
                              <button class="btn btn-success px-5">Save Now</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection