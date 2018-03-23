
@extends('layouts.app')

@section('content-title', 'Products Management')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins fixed">
                <div class="ibox-content">
                <div class="bs-example">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#products"><h4>Products</h4></a></li>
                        <li><a data-toggle="tab" href="#categories"><h4>Categories</h4></a></li>
                        <li><a data-toggle="tab" href="#subcategories"><h4>Sub Categories</h4></a></li>
                        <li><a data-toggle="tab" href="#brands"><h4>Brands</h4></a></li>
                    </ul>


                </div> <!-- <div class="bs-example"> -->
{{--                <div class="ibox-title"><h5>Products</h5>
                    <div class="ibox-tools"> <button type="button" class="add-modal btn btn-primary btn-xs" data-toggle="modal" data-target="#addModal" data-keyboard="true" ><i class="fa fa-plus"></i>Add Product</button></div>
                </div>--}}
               {{-- <button type="button" class="show-modal btn btn-success btn-xs" data-toggle="modal" data-target="#showModal" data-keyboard="true" data-id="' + row.id +'" data-nam="' + row.attributes.name +'" data-title="' + row +'"><i class="fa fa-edit"></i></button>--}}


                    <div class="tab-content">
                        <div id="products" class="tab-pane fade in active">

                        {{--                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif--}}

                            @component('partials.indexTable')
                            products
                            @endcomponent
                        </div>

                        <div id="categories" class="tab-pane fade">
                            @component('partials.indexTable')
                                categories
                            @endcomponent
                        </div>

                        <div id="subcategories" class="tab-pane fade">
                            @component('partials.indexTable')
                                subcategories
                            @endcomponent
                        </div>

                        <div id="brands" class="tab-pane fade">
                            @component('partials.indexTable')
                                brands
                            @endcomponent
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection



@section('scripts')
   @parent
   @include('partials.javascripts')
    @include('partials.dtable')
@endsection