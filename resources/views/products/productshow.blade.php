
    <!-- page content -->


    <div id="targetmodal" data-target="product-show"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $products->name }} <small> ID:{{$products->id}}  Code: {{$products->code}}</small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table class="table">
                                <tbody>

                                <tr>
                                    <th>Category</th><td>{{$products->subCategory->category->name}}</td>
                                    <th>Sub Category</th><td>{{$products->subCategory->name}}</td>

                                </tr>
                                <tr>
                                    <th>Brand</th><td>{{$products->brand->brand}}</td>
                                    <th>Model</th><td>{{$products->model}}</td>

                                </tr>
                                <tr>
                                    <th>Unit of measure</th><td>{{$products->uom->uom}}</td>
                                    <th>Modified date</th><td>{{$products->updated_at}}</td>

                                </tr>
                                <tr>
                                    <table class="table hover">
                                        <caption>Extra Options</caption>
                                        <thead>
                                        <tr>
                                            <th>Option Name</th>
                                            <th>Option Value</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @if($products->options)
                                        @foreach($products->options  as $key => $value)
                                            <tr>
                                            <td>{{$key}}</td><td>{{$value}}</td>
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

    <script>

        function addRow(input) {
            var table = document.getElementById("myTable");
            var i = parseInt(input.id.substring(3, input.id.length));
            document.getElementById('icon' + i).className = "glyphicon glyphicon-minus";
            var row = table.insertRow(table.rows.length);
            row.id = "row" + (i + 1);
            var fcell = row.insertCell(0);
            fcell.innerHTML =  '<input type="text" name='+'options[name][]'+'  placeholder="Enter Option Name" class="form-control"/>';


            var cell = row.insertCell(1);
            cell.innerHTML = '<div class="input-group">'+
                '<input type="text" name='+'options[value][]'+' placeholder="Enter Option Value" class="form-control" />'+
                '<span class="input-group-btn">'+
                '<button id="btn'+(i+1)+'" type="button" class="btn btn-primary" onclick="addRow(this)">'+
                '<span id="icon'+(i+1)+'" class="glyphicon glyphicon-plus"></span>'+
                '</button>'+
                '</span>'+
                '</div>';
            $('#btn'+i).attr('onclick', 'remRow(this)');
        }

        function remRow(input) {
            var table = document.getElementById("myTable");
            var i = parseInt(input.id.substring(3, input.id.length));
            var ind = table.rows["row" +i].rowIndex;
            table.deleteRow(ind);
        }


    </script>

    <script type="text/javascript">
        $('#Register').submit(function(event) {
            event.preventDefault();

        });
        $('body').on('click', '#submitForm', function(){
            sessionStorage.clear();

            var registerForm = $("#Register");
            var formData = registerForm.serialize();
            $( '#name-error' ).html( "" );


            $.ajax({
                url:'/products',
                type:'POST',
                data:formData,
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        toastr.error("Operation Failed!!!", "Title", {
                            "timeOut": "5000",
                            "extendedTImeout": "5000"
                        });
                        if(data.errors.name){

                            $( '#name-error' ).html( data.errors.name[0] );
                        }
                        if(data.errors.category){
                            $( '#category-error' ).html( data.errors.category[0] );
                        }
                        if(data.errors.uom){
                            $( '#uom-error' ).html( data.errors.uom[0] );
                        }

                    }
                    if(data.success) {

                        $('#success-msg').removeClass('hide');
                        setInterval(function(){
                            $('#modal').modal('hide');
                            $('#success-msg').addClass('hide');
                        }, 3000);

                        toastr.error("Operation Done Succesfuly!!!", "Title", {
                            "timeOut": "5000",
                            "extendedTImeout": "5000"
                        });
                    }
                },
            });
        });
    </script>
