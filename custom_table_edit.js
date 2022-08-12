$(document).ready(function(){
$('#data_table').Tabledit({
deleteButton: false,
editButton: false,
columns: {
identifier: [0, 'id'],
editable: [[6, 'status']]
},
hideIdentifier: false,
url: 'live_edit.php'
});
});