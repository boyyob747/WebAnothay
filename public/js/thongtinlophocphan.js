$(document).on('click', '#allcb', function() {
  var table = $('#table_teachers').DataTable();
  var rows = table.rows({ 'search': 'applied' }).nodes();
  $('input[type="checkbox"]', rows).prop('checked', this.checked);
});
