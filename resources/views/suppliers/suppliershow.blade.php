
    <!-- page content -->


    <div id="targetmodal" data-target="supplier-show"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $products->name }} <small> ID:{{$products->id}}  </small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table class="table table-fixed">
                                <tbody>

                                <tr>
                                    <th>Address</th><td>{{$products->address}}</td>


                                </tr>

                                <tr>
                                    <table class="table table-fixed hover">
                                        <caption>Contacts</caption>
                                        <thead>
                                        <tr>
                                            <th class="col-xs-3">Name</th>
                                            <th class="col-xs-3">Phone</th>
                                            <th class="col-xs-3">Phone</th>
                                            <th class="col-xs-3">E-mail</th>

                                        </tr>

                                        </thead>
                                        <tbody>
                                        @if($products->contacts)
                                        @foreach($products->contacts  as $key)
                                            <tr>
                                            <td>{{$key->name}}</td>
                                                <td>{{$key->phone}}</td>
                                                <td>{{$key->phone2}}</td>
                                                <td>{{$key->email}}</td>

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

{{--<style>


    .table-fixed{
        width: 100%;
        background-color: #f3f3f3;
    tbody{
        height:200px;
        overflow-y:auto;
        width: 100%;
    }
    thead,tbody,tr,td,th{
        display:block;
    }
    tbody{
    td{
        float:left;
    }
    }
    thead {
    tr{
    th{
        float:left;
        background-color: #f39c12;
        border-color:#e67e22;
    }
    }
    }
    }

</style>--}}
