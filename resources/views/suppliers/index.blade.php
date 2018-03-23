
@extends('layouts.app')

@section('content-title', 'Suppliers Management')
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

{{--    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins ">
                <div class="ibox-content">
                    <div class="bs-example">--}}
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" data-show="supplier" data-edit="supplier" data-create="supplier" data-delete="suppliers" href="#supplier"><h4>Supplier</h4></a></li>
                        </ul>


                    {{--</div>--}} <!-- <div class="bs-example"> -->
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
                                suppliers
                            @endcomponent
                        </div>
                    </div>


               {{--     </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection



@section('scripts')
    @parent
    @include('partials.javascripts')
    @include('partials.dtable')
@endsection