$(document).on('click', '#btn-edit', function () {
  $('.modal-body #id-category').val($(this).data('id'));
})


const swal = $('.swal_success').data('success');
if (swal) {
  Swal.fire({
    icon: 'success',
    title: swal,
  })
}

const edit = $('.swal_edit').data('edit');
if (edit) {
  Swal.fire({
    icon: 'error',
    title: 'เกิดข้อผิดพลาด',
    text: edit,
  })
}

$(document).on('click', '#btn-editProfile', function () {
  $('.modal-body #user_id').val($(this).data('user_id'));
  $('.modal-body #user_firstname').val($(this).data('user_firstname'));
  $('.modal-body #user_lastname').val($(this).data('user_lastname'));
  $('.modal-body #email').val($(this).data('email'));
  $('.modal-body #user_username').val($(this).data('user_username'));
})



$(document).on('click', '#btn-editWebboard', function () {
  $('.modal-body #webboard_id').val($(this).data('webboard_id'));
  $('.modal-body #category_id').val($(this).data('category_id'));
  $('.modal-body #topic').val($(this).data('topic'));
  
  var editor11 = $(this).data('webboard')
  CKEDITOR.instances.webboard.setData( editor11, function()
  {
    this.checkDirty();  // true
  });;
})

$(document).on('click', '.btn-delete', function (e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'คุณต้องการลบข้อมูลใช่ไหม?',
    text: "ลบแล้วไม่สามารถแก้ไขได้!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ลบ',
    cancelButtonText: 'ยกเลิก'
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  })
})

$(document).ready(function () {
  $('.dropify').dropify();
})


$(document).on('click', '#btn-Close', function () {
  var drEvent = $('.dropify').dropify();
  drEvent = drEvent.data('dropify');
  drEvent.resetPreview();
  drEvent.clearElement();
  
})