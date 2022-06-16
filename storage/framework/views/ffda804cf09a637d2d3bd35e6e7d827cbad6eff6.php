<script>

    $('select:not(.normal)').each(function () {
        $(this).select2({
            dropdownParent: $(this).parent()
        });
    });

    $('#group_id').on('change',function(){
    var groupID = $(this).val();    
    if(groupID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('api/get-activity-list')); ?>?group_id="+groupID,
          success:function(res){               
            if(res){
                $("#activity_id").empty();
                $.each(res,function(key,value){
                    $("#activity_id").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#activity_id").empty();
            }
           }
        });
    }else{
        $("#activity_id").empty();
    }
    });

</script>

<?php echo $__env->yieldContent('pos-script'); ?>




