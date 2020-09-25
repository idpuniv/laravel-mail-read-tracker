$(function () {
    $("#data-table").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('.data-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });