<script>
    $(document).ready(function(){
        //setup header for ajax request
        $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }                
            });
        //serach supplier
        $('#search_supplier').on('keyup',function(e){
            e.preventDefault();
            let search_string = $(this).val();
            console.log(search_string);
            $.ajax({
                url:"{{route('super-admin.supplier.search')}}",
                Method: 'GET',
                data:{search_string:search_string},
                success:function(result) {
                //console.log(result);
                if(result.status=='nothing')
                {
                    let html='<tr><td></td><td></td><td><span class="text-danger">هذا المورد غير موجود</span></td><td></td><td></td></tr>';
                    $('.tbody').html(html);
                }else
                {
                    $('#table-data').html(result);
                }
               
                }
            });
        });
        //pagination
        $(document).on('click', '.pagination a', function(e)
        {
            e.preventDefault();
            let page= $(this).attr('href').split('page=')[1];
            pagination(page);
        });
    });
    /*---------------------------------------
              suppliers function 
    -----------------------------------------*/
// pagination
function pagination(page)
{
    $.ajax({
        url:"/super-admin/suppliers/pagination?page="+page,
        success: function(res)
        {
            $('#table-data').html(res);
        }
    });
}
//function to drop details 
function DropDawnDetails(id)
{
    $('.footable-row-detail-'+id).toggle();
}
//faction to delete supplier with ajax
function DeleteSupplier(id)
{
    //alert admin about this delete
    Swal.fire({
        title: "حذف المورد؟",
        text: "هل تريد بالفعل حذف هذا المورد!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم, إحذفه!",
        cancelButtonText: "لا"
      }).then((result) => {
        if (result.value) {
            //send request to delete supplier
            $.ajax({            
                url:'/super-admin/supplier/destroy/'+id,
                type:'DELETE',

                success: function(result)
                {
                    //if success return success message
                    if(result['success'])
                        {
                            Swal.fire({
                                title: "حذف!",
                                text: "تم حذف المورد.",
                                icon: "success"
                            });
                            //
                            $('#tr_details_'+id).slideUp('slow');
                            $('#tr_'+id).slideUp('slow');
                            //change i class and onclick method
                            $('#i_ban_'+id).toggle();
                            $('#i_unban_'+id).toggle();
                        }else
                        {
                            Swal.fire({
                                title: "فشل الحذف!",
                                text: "لم يتم حذف المورد حدث خطأ ما ؟",
                                icon: "error"
                            });
                        }                        
                }
            });

        }
      });

}
//function to ban supplier with ajax
function banedSupplier(id)
{
    //alert admin about this delete
    Swal.fire({
        title: "حضر المورد؟",
        text: "هل تريد بالفعل حضر هذا المورد!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم, إحضره!",
        cancelButtonText: "لا"
      }).then((result) => {
        if (result.value) {
            //send request to delete supplier
            $.ajax({            
                url:'/super-admin/supplier/ban/'+id,
                type:'POST',

                success: function(result)
                {
                    //if success return success message
                    if(result['success'])
                        {
                            Swal.fire({
                                title: "حضر!",
                                text: "تم حضر المورد.",
                                icon: "success"
                            });
                            //change i class and onclick method
                            $('#i_ban_'+id).toggle();
                            $('#i_unban_'+id).toggle();
                        }else
                        {
                            Swal.fire({
                                title: "فشل الحضر!",
                                text: "لم يتم حضر المورد حدث خطأ ما ؟",
                                icon: "error"
                            });
                        }                        
                }
            });

        }
      });
}
//function to ban supplier with ajax
function unbanedSupplier(id)
{
    //alert admin about this delete
    Swal.fire({
        title: "تفعيل المورد؟",
        text: "هل تريد بالفعل تفعيل هذا المورد!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم, فعله!",
        cancelButtonText: "لا"
      }).then((result) => {
        if (result.value) {
            //send request to delete supplier
            $.ajax({            
                url:'/super-admin/supplier/unban/'+id,
                type:'POST',

                success: function(result)
                {
                    //if success return success message
                    if(result['success'])
                        {
                            Swal.fire({
                                title: "تفعيل!",
                                text: "تم تفعيل المورد.",
                                icon: "success"
                            });
                            //change i class and onclick method
                            $('#i_ban_'+id).toggle();
                            $('#i_unban_'+id).toggle();
                        }else
                        {
                            Swal.fire({
                                title: "فشل التفعيل!",
                                text: "لم يتم تفعيل المورد حدث خطأ ما ؟",
                                icon: "error"
                            });
                        }                        
                }
            });

        }
      });
}
</script>