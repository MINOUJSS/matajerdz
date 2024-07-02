<script>
    $(document).ready(function(){
     //make all notes as readed
      $('#notes').on('click', function(e){
        e.preventDefault();
        //make all notifications as readable
        $.ajax({
            url:"/super-admin/notification/read/all",
            success:function(res)
            {
                if(res.success){
                //count=0
                $('.noti').text('0');
                }
            }
        });
      });
    });
</script>