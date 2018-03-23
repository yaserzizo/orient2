'<div class="btn-group">'+
    '<button data-toggle="dropdown" class="btn btn-warning dropdown-toggle" aria-expanded="true" aria-labelledby="dropdownMenu1"><i class="glyphicon glyphicon-cog"></i> <span class="caret"></span></button>'+
    '<ul class="dropdown-menu" >'+
        '<li class="show-modal " data-toggle="modal" data-target="showModal" data-keyboard="true" data-id="' + row.id +'" data-nam="' + row.attributes.name +'" data-title="' + row +'"><a href="#">Show</a></li>'+
        '<li class=" edit-modal " data-toggle="modal" data-target="editModal" data-keyboard="true" data-id="' + row.id +'"><a href="#">Edit</a></li>'+
        '<li class="divider"></li>'+
        '<li><a href="#">Separated link</a></li>'+
    '</ul>'+
'</div>'


{{--
class="delete-modal btn btn-danger btn-xs" data-toggle="modal" data-target="deleteModal" data-url="' + table +'" data-keyboard="true" data-title="' + row.attributes.name +'" data-id="' + row.id +'">--}}
