
@extends('layouts.app')

@section('content-title', 'Products Management')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins fixed">
                <div class="ibox-content">
                    <div class="bs-example">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" data-show="product" data-edit="product" data-create="product" data-delete="products" href="#product"><h4>Products</h4></a></li>
                            <li id="categories_tab"><a data-toggle="tab" data-show="category" data-edit="category" data-create="category" data-delete="categories" href="#category"><h4>Categories</h4></a></li>
                            <li><a data-toggle="tab" data-show="subcategory" data-edit="subcategory" data-create="subcategory" data-delete="subcategories" href="#subcategory"><h4>Sub Categories</h4></a></li>
                            <li><a data-toggle="tab" data-show="brand" data-edit="brand" data-create="brand" data-delete= "brands" href="#brand"><h4>Brands</h4></a></li>
                        </ul>


                    </div> <!-- <div class="bs-example"> -->
                    {{--                <div class="ibox-title"><h5>Products</h5>
                                        <div class="ibox-tools"> <button type="button" class="add-modal btn btn-primary btn-xs" data-toggle="modal" data-target="#addModal" data-keyboard="true" ><i class="fa fa-plus"></i>Add Product</button></div>
                                    </div>--}}
                    {{-- <button type="button" class="show-modal btn btn-success btn-xs" data-toggle="modal" data-target="#showModal" data-keyboard="true" data-id="' + row.id +'" data-nam="' + row.attributes.name +'" data-title="' + row +'"><i class="fa fa-edit"></i></button>--}}

                    @component('partials.modal')
                        @slot('title')

                        @endslot
                            @slot('footer')

                            @endslot

                    @endcomponent
                    @component('partials.deleteModal')
                        categories
                    @endcomponent
                    <div class="tab-content">
                        <div id="product" class="tab-pane fade in active">

                            {{--                    @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif--}}


                            @component('partials.indexTable')
                                products
                            @endcomponent
                        </div>

                        <div id="category" class="tab-pane fade">
                            @component('partials.indexTable')
                                categories
                            @endcomponent

                        </div>

                        <div id="subcategory" class="tab-pane fade">
                            @component('partials.indexTable')
                                subcategories
                            @endcomponent
                        </div>

                        <div id="brand" class="tab-pane fade">
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