$(document).ready(function(){
	$('.add_another').click(function(){
		if(!confirm('Are you sure you want to add this option?')) return false;
		var p = $(this).parents('.row');
		var new_input = p.find('.add_another_by_name');
		var new_name = new_input.val();
		var field = new_input.attr('data-field');
		if(new_name && new_name.length > 0){
			var model = new_input.attr('data-model');
			$.post('/admin/admin/new_record_by_name', {
				model : model,
				name : new_name
			})
			.success(function(res){
				var j = $.parseJSON(res);
				if(j && j.success){
					add_another(p, field, j.id, new_name);
					new_input.val('');
				}else{
					alert('Unable to Add');
				}
			});
			return false;
		}
	});

	$('.vehicle select[name="status_id"]').change(function(){
		var obj = this;
		var selected = $(this).find('option:selected').val();
		var id = $(this).parents('.vehicle').attr('data-id');
		$.post('/admin/vehicles/quick_edit/' + id, {status_id:selected})
		.success(function(data){
			var json, color;
			try{
				json = $.parseJSON(data);
			}catch(e){
				console.log(data);
				json = {success:false};
			}
			if(json.success){
				color = 'green';
			}else{
				color = 'red';
			}

			$(obj).css('border', '2px solid ' + color);
		})
		.error(function(err){
			alert('An error happened, sorry.');
		});
	});
	
	if(window.group){
        // If low level
        if(~[4].indexOf(window.group)){
            $('*[data-low-hide]').hide();
        }
	}
});

function add_another(p, field, val, lbl){
	//Add Hidden Field
	var item = p.find('.item_template:first');
	if(item.is('[type="radio"]')){
		p.find('.item_to_add').each(function(){
			$(this).removeAttr('checked');
		});
	}
	var new_item = $(item).clone();
	new_item.attr('checked', 'checked');
	new_item.attr('name', field + '[]');
	new_item.attr('value', val);
	new_item.show();
	p.find('.add_more_here').before(
		new_item[0].outerHTML + "<span>"+lbl+"</span><br />"
	);
}
