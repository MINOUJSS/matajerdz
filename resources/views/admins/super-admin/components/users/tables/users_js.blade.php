<script>
    $(document).ready(function(){
        //setup header for ajax request
        $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }                
            });
        //serach user
        $('#search_user').on('keyup',function(e){
            e.preventDefault();
            let search_string = $(this).val();
            console.log(search_string);
            $.ajax({
                url:"{{route('super-admin.user.search')}}",
                Method: 'GET',
                data:{search_string:search_string},
                success:function(result) {
                //console.log(result);
                if(result.status=='nothing')
                {
                    let html='<tr><td></td><td></td><td><span class="text-danger">هذا الموظف غير موجود</span></td><td></td><td></td></tr>';
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
              users function 
    -----------------------------------------*/
            //function to drop details 
// pagination
function pagination(page)
{
    $.ajax({
        url:"/super-admin/users/pagination?page="+page,
        success: function(res)
        {
            $('#table-data').html(res);
        }
    });
}
//DropDownDetails
function DropDawnDetails(id)
{
    $('.footable-row-detail-'+id).toggle();
}
//faction to delete user with ajax
function DeleteUser(id)
{
    //alert admin about this delete
    Swal.fire({
        title: "حذف الموظف؟",
        text: "هل تريد بالفعل حذف هذا الموظف!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم, إحذفه!",
        cancelButtonText: "لا"
      }).then((result) => {
        if (result.value) {
            //send request to delete user
            $.ajax({            
                url:'/super-admin/user/destroy/'+id,
                type:'DELETE',

                success: function(result)
                {
                    //if success return success message
                    if(result['success'])
                        {
                            Swal.fire({
                                title: "حذف!",
                                text: "تم حذف الموظف.",
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
                                text: "لم يتم حذف الموظف حدث خطأ ما ؟",
                                icon: "error"
                            });
                        }                        
                }
            });

        }
      });

}
//function to ban user with ajax
function banedUser(id)
{
    //alert admin about this delete
    Swal.fire({
        title: "حضر الموظف؟",
        text: "هل تريد بالفعل حضر هذا الموظف!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم, إحضره!",
        cancelButtonText: "لا"
      }).then((result) => {
        if (result.value) {
            //send request to delete user
            $.ajax({            
                url:'/super-admin/user/ban/'+id,
                type:'POST',

                success: function(result)
                {
                    //if success return success message
                    if(result['success'])
                        {
                            Swal.fire({
                                title: "حضر!",
                                text: "تم حضر الموظف.",
                                icon: "success"
                            });
                            //change i class and onclick method
                            $('#i_ban_'+id).toggle();
                            $('#i_unban_'+id).toggle();
                        }else
                        {
                            Swal.fire({
                                title: "فشل الحضر!",
                                text: "لم يتم حضر الموظف حدث خطأ ما ؟",
                                icon: "error"
                            });
                        }                        
                }
            });

        }
      });
}
//function to ban user with ajax
function unbanedUser(id)
{
    //alert admin about this delete
    Swal.fire({
        title: "تفعيل الموظف؟",
        text: "هل تريد بالفعل تفعيل هذا الموظف!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم, فعله!",
        cancelButtonText: "لا"
      }).then((result) => {
        if (result.value) {
            //send request to delete user
            $.ajax({            
                url:'/super-admin/user/unban/'+id,
                type:'POST',

                success: function(result)
                {
                    //if success return success message
                    if(result['success'])
                        {
                            Swal.fire({
                                title: "تفعيل!",
                                text: "تم تفعيل الموظف.",
                                icon: "success"
                            });
                            //change i class and onclick method
                            $('#i_ban_'+id).toggle();
                            $('#i_unban_'+id).toggle();
                        }else
                        {
                            Swal.fire({
                                title: "فشل التفعيل!",
                                text: "لم يتم تفعيل الموظف حدث خطأ ما ؟",
                                icon: "error"
                            });
                        }                        
                }
            });

        }
      });
}
</script>