@extends('layouts.admin')


@section('title')
Transaction
@endsection

@section('content')
          <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Transactions</h2>
              <p class="dashboard-subtitle">
                Big result start from the small one
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12 mt-2">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-sell" role="tab"
                        aria-controls="pills-home" aria-selected="true">Sell</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-buy" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Buy</a>
                    </li>

                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-sell" role="tabpanel"
                      aria-labelledby="pills-home-tab">
                      
                      @foreach ($sellTransactions as $st)
                          
                      <a href="{{ route('admin.transactions.show', $st->id) }}" class="card card-list d-block">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-1">
                              <img src="{{ Storage::url($st->product->galleries->first()->photo ) ?? null }}" class="w-100" alt="">
                            </div>
                            <div class="col-md-4">
                              {{ $st->product->name }}
                            </div>
                            <div class="col-md-3">
                              {{ $st->transaction->user->name }}
                            </div>
                            <div class="col-md-3">
                              {{ $st->created_at }}
                            </div>
                            <div class="col-1 d-none d-md-block">
                              <img src="../images/dashboard-arrow-right.svg" alt="">
                            </div>
                          </div>
                        </div>
                      </a>

                      @endforeach

                      
                    </div>
                    <div class="tab-pane fade" id="pills-buy" role="tabpanel" aria-labelledby="pills-profile-tab">
                      @foreach ($buyTransactions as $sb)
                          
                      <a href="{{ route('admin.transactions.show', $sb->id) }}" class="card card-list d-block">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-1">
                              <img src="{{ Storage::url($sb->product->galleries->first()->photo ) ?? null }}" class="w-100" alt="">
                            </div>
                            <div class="col-md-4">
                              {{ $sb->product->name }}
                            </div>
                            <div class="col-md-3">
                              {{ $sb->transaction->user->name }}
                            </div>
                            <div class="col-md-3">
                              {{ $sb->date_created }}
                            </div>
                            <div class="col-1 d-none d-md-block">
                              <img src="../images/dashboard-arrow-right.svg" alt="">
                            </div>
                          </div>
                        </div>
                      </a>

                      @endforeach
                    </div>

                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
@endsection