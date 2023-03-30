window.addEventListener('DOMContentLoaded', event => 
{
      //Simple-DataTables
     // https://github.com/fiduswriter/Simple-DataTables/wiki

    const RecordTableNew = document.getElementById('RecordTableNew');
    if (RecordTableNew)
     {
        new simpleDatatables.DataTable(RecordTableNew, {
         perPage: 25
         });
    }


   
});


