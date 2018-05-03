
//
//  Helper for open ModalBox with requested header, content and bottom
//
//
function OpenModalBox(header, inner, bottom){
    $('#modalbox').modal('show');
    $('#modalbox').find('.modal-title').html(header);
    $('#modalbox').find('.modal-body').html(inner);
    $('#modalbox').find('.modal-footer').html(bottom);
}
//
//  Close modalbox
//
//
function CloseModalBox(){
    $('#modalbox').modal('hide')
}
