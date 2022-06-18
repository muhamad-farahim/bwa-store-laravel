@extends('layouts.admin')


@section('title')
    Transaction
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Transaction</h2>
        <p class="dashboard-subtitle">
          Edit of Transaction
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
                            <form action="{{ route('admin.transactions.update', $instance->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Transaction Status</label>
                                            <select
                                                name="transaction_status"
                                                id="status"
                                                class="form-control"
                                                v-model="status"
                                                    >
                                            <option {{ $instance->transaction_status === "UNPAID" ? 'SELECTED' : '' }} value="UNPAID">Unpaid</option>
                                            <option {{ $instance->transaction_status === "PENDING" ? 'SELECTED' : '' }} value="PENDING">Pending</option>
                                            <option {{ $instance->transaction_status === "SHIPPING" ? 'SELECTED' : '' }} value="SHIPPING">Shipping</option>
                                            <option {{ $instance->transaction_status === "SUCCESS" ? 'SELECTED' : '' }} value="SUCCESS">Success</option>
                                        </select>   
                                        </div>
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text" class="form-control" name="total_price" id="" value="{{ $instance->total_price }}" required>    
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


