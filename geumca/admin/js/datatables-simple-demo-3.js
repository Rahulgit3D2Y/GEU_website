window.addEventListener('DOMContentLoaded', event => 
{
      //Simple-DataTables
     // https://github.com/fiduswriter/Simple-DataTables/wiki

    const NewRecordTable = document.getElementById('NewRecordTable');
    if (NewRecordTable)
     {
        new simpleDatatables.DataTable(NewRecordTable, {
         perPage: 25
         });
    }


   
});


