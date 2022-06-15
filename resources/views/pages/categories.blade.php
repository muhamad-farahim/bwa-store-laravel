@extends('layouts.app')


@section('title')
    Store Category Page
@endsection

@section('content')
<div class="page-content page-home">

  <section class="store-trend-categories">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>Trend Categories</h5>
        </div>
      </div>
      <div class="row">
        @php
            $aosdelayincr = 0;
        @endphp

        @forelse ($categories as $category)

        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $aosdelayincr += 100 }}">
          <a href="#" class="component-categories d-block">
            <div class="categories-image">
              <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100">
            </div>
            <p class="categories-text">
              {{ $category->name }}
            </p>
          </a>
        </div>
            
        @empty
            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
              No Categories Found
            </div>
        @endforelse
  </section>

  <section class="store-new-product">
    <div class="container">
      <div class="row">
        <div class="col-12-lg">
          <h5>New products</h5>
        </div>
      </div>
      <div class="row">

        @php
            $aosdelayinc = 0;
        @endphp
        @forelse ($products as $product)

        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $aosdelayinc += 100 }}">
          <a href="{{ route('details', ['id' => $product->slug]) }}" class="components-products d-block">
            <div class="products-thumbnail">
              <div class="products-image" style="background-image: url('{{ Storage::url($product->galleries->first()->photo) }}');"></div>
            </div>
            <div class="products-text">
              {{ $product->name }}
            </div>
            <div class="products-price">
              ${{ number_format($product->price) }}
            </div>
          </a>
        </div>

        @empty
            
        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
          No Categories Found
        </div>

        @endforelse

      </div>
    </div>
  </section>


  </div>
@endsection