// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

// LIST OF STUDENTS ASSIGNED ADVISER
$(document).ready(function() {
  $('#students').DataTable(
    { "aaSorting": [[ 2, "asc" ]] }
  );
    }); 

// LIST OF  ADVISER
$(document).ready(function() {
  $('#manageAdviserTable').DataTable();
});

