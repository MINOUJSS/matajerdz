<script>
    $(document).ready(function(){
        //setup header for ajax request
        $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }                
            });
        //serach local_livereur
        $('#search_local_livereur').on('keyup',function(e){
            e.preventDefault();
            let search_string = $(this).val();
            console.log(search_string);
            $.ajax({
                url:"{{route('super-admin.local-livereur.search')}}",
                Method: 'GET',
                data:{search_string:search_string},
                success:function(result) {
                //console.log(result);
                if(result.status=='nothing')
                {
                    let html='<tr><td></td><td></td><td><span class="text-danger">هذا الشاحن غير موجود</span></td><td></td><td></td></tr>';
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
              local-livereurs function 
    -----------------------------------------*/
// pagination
function pagination(page)
{
    $.ajax({
        url:"/super-admin/local-livereurs/pagination?page="+page,
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
//faction to delete local-livereur with ajax
function DeleteLocalLivereur(id)
{
    //alert admin about this delete
    Swal.fire({
        title: "حذف الشاحن؟",
        text: "هل تريد بالفعل حذف هذا الشاحن!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم, إحذفه!",
        cancelButtonText: "لا"
      }).then((result) => {
        if (result.value) {
            //send request to delete local-livereur
            $.ajax({            
                url:'/super-admin/local-livereur/destroy/'+id,
                type:'DELETE',

                success: function(result)
                {
                    //if success return success message
                    if(result['success'])
                        {
                            Swal.fire({
                                title: "حذف!",
                                text: "تم حذف الشاحن.",
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
                                text: "لم يتم حذف الشاحن حدث خطأ ما ؟",
                                icon: "error"
                            });
                        }                        
                }
            });

        }
      });

}
//function to ban LocalLivereur with ajax
function banedLocalLivereur(id)
{
    //alert admin about this delete
    Swal.fire({
        title: "حضر الشاحن؟",
        text: "هل تريد بالفعل حضر هذا الشاحن!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم, إحضره!",
        cancelButtonText: "لا"
      }).then((result) => {
        if (result.value) {
            //send request to delete local-livereur
            $.ajax({            
                url:'/super-admin/local-livereur/ban/'+id,
                type:'POST',

                success: function(result)
                {
                    //if success return success message
                    if(result['success'])
                        {
                            Swal.fire({
                                title: "حضر!",
                                text: "تم حضر الشاحن.",
                                icon: "success"
                            });
                            //change i class and onclick method
                            $('#i_ban_'+id).toggle();
                            $('#i_unban_'+id).toggle();
                        }else
                        {
                            Swal.fire({
                                title: "فشل الحضر!",
                                text: "لم يتم حضر الشاحن حدث خطأ ما ؟",
                                icon: "error"
                            });
                        }                        
                }
            });

        }
      });
}
//function to ban LocalLivereur with ajax
function unbanedLocalLivereur(id)
{
    //alert admin about this delete
    Swal.fire({
        title: "تفعيل الشاحن؟",
        text: "هل تريد بالفعل تفعيل هذا الشاحن!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم, فعله!",
        cancelButtonText: "لا"
      }).then((result) => {
        if (result.value) {
            //send request to delete local-livereur
            $.ajax({            
                url:'/super-admin/local-livereur/unban/'+id,
                type:'POST',

                success: function(result)
                {
                    //if success return success message
                    if(result['success'])
                        {
                            Swal.fire({
                                title: "تفعيل!",
                                text: "تم تفعيل الشاحن.",
                                icon: "success"
                            });
                            //change i class and onclick method
                            $('#i_ban_'+id).toggle();
                            $('#i_unban_'+id).toggle();
                        }else
                        {
                            Swal.fire({
                                title: "فشل التفعيل!",
                                text: "لم يتم تفعيل الشاحن حدث خطأ ما ؟",
                                icon: "error"
                            });
                        }                        
                }
            });

        }
      });
}
</script>