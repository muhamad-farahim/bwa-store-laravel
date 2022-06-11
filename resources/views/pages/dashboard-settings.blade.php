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
                  <form action="">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Store Name</label>
                              <input type="text" value="papel la casa" class="form-control" name="namaToko">
                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Category</label>
                              <select class="form-control" name="category">
                                <option value="furniture">Furniture</option>
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
                                <input class="custom-control-input" type="radio" name="is_store_open" id="openStoreTrue"
                                  value="true" checked />
                                <label class="custom-control-label" for="openStoreTrue">Open</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="is_store_open"
                                  id="openStoreFalse" value="false" />
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