function showmodal(id) {
  
  $('#select-son').modal("show");

  $('#btn-save-data').on('click' , function() { 

    unlock(id);
  });

}


function unlock(id){

  var element = $('#'+id);
  
  if (element.hasClass('locked')) {
    console.log(element.hasClass('locked'))
    
    element.removeClass('locked');
    element.addClass('unlocked');

    console.log(element.hasClass('unlocked'))
   element.find("img").attr("src", '/images/unlock.svg');

    //$('#select-son').modal('toggle');
    
  } else {
    element.removeClass('unlocked');
    element.addClass('locked');

    element.find("img").attr("src", '/images/lock.svg');

   //$('#select-son').modal('toggle');
  }
}

