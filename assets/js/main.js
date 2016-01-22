$(document).ready(function() {
	init();
	
	if ($("a[data-id=signout]").size()>0)
	{
		$("a[data-id=signout]").click(function() {
			request("http://pm.div-art.com.ua/api/users/signout/", {}, "reload");
		});
	}
	
	$(document).ajaxStart(function(){
		$('.loading').show();
	});
	
	$(document).ajaxComplete(function(){
		$('.loading').hide();
	});
});

function init()
{
	$("form").each( function() {
		$(this).submit(function() {
		var post = {};
		$(this).find("[data-field]").each(function() {
			post[$(this).attr("data-field")] = $(this).val();
		});

		var callback = false;
		if ($(this).attr("data-callback") && window[$(this).attr("data-callback")])
		{
			callback = $(this).attr("data-callback");
		}
		
		
		var action = $(this).attr("action");
		if (action)
		{
			request("/api" + action, post, callback);
		}

		return false;
	});
	});

	$("button").click(function(){
		post = {};
		callback = false;
		if ($(this).attr('data-callback') && window[$(this).attr("data-callback")])
		{
			callback = $(this).attr('data-callback');
		}
		
		if ($(this).attr('data-callback'))
		{
			request("/api" + $(this).attr('data-action'), post, callback);	
		}
		
	});
}

function request(url, data, callback)
{
	data['_callback'] = callback || "";
	$.post(url, data, response, 'json');
}

function response(data)
{
	show_message(data.messages);
	if (data.callback && window[data.callback])
	{
		window[data.callback](data.data);
	}
}

function show_message(message)
{
	if ( ! message.length)
	{
		message = [message];
	}
	
	for (var key in message)
	{
		add_message(message[key]);
	}
}

function add_orgs_result(data)
{
	if (data)
	{
		alert("Дані успішно додані");
		window.location.reload(true);
	}
		
}

function add_message(message)
{
	var content = '';
	content += '<div class="message-item type=' + message.type + '">';
	content += '<p>' + message.text + '</p>';
	content += '</div>';

	if ($('message-item').size())
	{
		$(content).insertBefore('message-item');
	}
	else
	{
		$(".message-box").html(content);
	}
}

function reload(data)
{
	
	if (data)
	{
		window.location.reload(true);
	}
}

function recovery(data)
{
	if (data)
	{
		window.location='/';
	}
}

function show_orgs_result(data)
{
	if (!show_orgs_result.status)
		return false;
	if (data)
	{
		orgs_jur = "";
		$.each(data, function(key, value)
		{
			
			if ( ! value['address_jur_id'].length )
			{
				orgs_jur = to_format(value['address_jur_id']);
			}
			else 
			{
				orgs_jur = to_format(value['address_fact_id']);
			}
			
			$($('.table_show')[0]).append('<tr><td>'+value['orgs_id']+'</td><td>'+value['orgs_name']+'</td><td>'+value['orgs_phones']+'</td><td>'+to_format(value['address_fact_id'])+'</td><td>'+ orgs_jur +'</td><td><sp	an class="glyphicon glyphicon-trash"></span></td></tr>');	
			
		});
		show_orgs_result.status = false;
	}
}
show_orgs_result.status = true;

function delete_orgs(data)
{
	if (data)
	{
		alert('Організацію видалено');
	}
}

function to_format(obj)
{
	var string = '';
	
	$.each(obj, function(key, value)
	{
		string = string+value+'<br>';
	});
	return string;
}

$($('.bottom')[0]).bind('click', function(){

	if ( ! this.checked)
	{
		$($(".checked_btn")[0]).attr('style','display:block');
	}
	else
	{
		$($(".checked_btn")[0]).attr('style','display:none');
	}
		
	
});