
    <!-- page content -->


    <div id="targetmodal" data-target="product-show"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $products->name }}       <small> ID:{{$products->id}} </small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table class="table">
                                <tbody>

                                <tr>
                                    <th>Created Date</th><td>{{$products->created_at}}</td>
                                    <th>Modified Date</th><td>{{$products->updated_at}}</td>

                                </tr>

                                <tr>

                                    <td>{{$products->description}}</td>

                                </tr>
                                <tr>
                                    <table class="table hover">
                                        <caption>Sub Categories</caption>
                                        <thead>
                                        <tr>

                                            <th>Name</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @if($products->subCategories)
                                        @foreach($products->subCategories  as $key)
                                            <tr>
                                            <td>{{$key->name}}</td>
                                            </tr>

                                        @endforeach
                                            @endif
                                        </tbody>
                                    </table>


                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
