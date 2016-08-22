var absent  = '<span class="glyphicon glyphicon-remove-circle"></span>';
var present = '<span class="glyphicon glyphicon-ok-circle"></span>';

$('.absent').click(function(){
  var ID = $(this).data();
  saveData(ID.id,'absent',$(this));
});

$('.present').click(function(){
  var ID = $(this).data();
  saveData(ID.id,'present',$(this));
});

function saveData(ID,absent_or_present,OBJ){
  $.ajax({
    type : 'POST',
    url : '/employees/attendance_update',
    data : {id:ID,status:absent_or_present},
    success : function(resp){
      var $toltipParent = $(OBJ).parent().parent().parent();
      $toltipParent.attr('data-toggle','tooltip');
      $toltipParent.attr('data-placement','top');
      if (absent_or_present=='present') {
        $toltipParent.attr('title','This employee is Present today');
        $(OBJ).parent().html(present);
      }else{
        $toltipParent.attr('title','This employee is Absent today');
        $(OBJ).parent().html(absent);
      }
      $('[data-toggle="tooltip"]').tooltip();
    },
    error : function(resp){
      alert('OPPS! error!!!'+resp);
    }
  });
}


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
