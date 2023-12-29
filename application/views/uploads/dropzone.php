<script type="text/javascript">
$(document).ready(function(){
     Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element
        url: "/admin/uploads/create",
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 32, // MB
        accept: function(file, done) {
            if (file.name == "justinbieber.jpg") {
              done("Naha, you don't.");
            }
            else { done(); }
        },
        success : function(file, res) {
            res = $.parseJSON(res);
            if(!res.success){
                alert(res.msg);
            }else{
                $('#uploads_list').append(res.new_upload_row);
                $('#uploads_empty').remove();
                if(!$('#vehicle_id').size() || !$('#vehicle_id').val().length){
                    window.onbeforeunload = function(){ return "Please save the post before leaving. Images may not be properly attached."; }
                }
                init_stuff();
            }
        },
        sending : function(file, xhr, formData) {
            var type = 'document';
            formData.append('name', type);  
            formData.append("vehicle_id", $('#vehicle_id').val());
        }
    }
    
    init_stuff();

});

function init_stuff(){
    $('.delete-upload').unbind('click');
    $('.delete-upload').click(function(){
        if(!confirm("Are you sure you want to delete this upload?")) return false;
        id = $(this).parents('tr').attr('data-id');
        $.post('/admin/uploads/delete/' + id, 
            {
                'delete' : true
            }
        )
        .success(function(res){
            res = $.parseJSON(res);
            if(res.success){
                $('#uploads_list tr[data-id="'+id+'"]').remove();
            }else{
                alert(res.msg);
            }
        })
        .error(function(err){
            console.log(err);
            alert("An error occurred saving your upload");
        })
        return false;
    });
    
    $('.save-upload').unbind('click');
    $('.save-upload').click(function(){
        id = $(this).parents('tr').attr('data-id');
        console.log(id);
        $.post('/admin/uploads/edit/' + id, 
            {
                'save' : true,
                'name' : $('select[name="uploads_name_'+id+'"] option:selected').val(),
            }
        )
        .success(function(res){
            console.log(res);
            res = $.parseJSON(res);
            if(res.success){
                $('#uploads_list tr[data-id="'+id+'"]').css('background-color', '#dff0d8');
            }else{
                alert(res.msg);
            }
        })
        .error(function(err){
            console.log(err);
            alert("An error occurred saving your upload");
        })
        return false;
    });
    
    $('form').unbind('submit');
    $('form').submit(function(){
        console.log('beforeunload');
        window.onbeforeunload = function(){ return undefined; }
    });
}
</script>
<input type="hidden" id="vehicle_id" value="<?=$vehicle->id?>">
<div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>