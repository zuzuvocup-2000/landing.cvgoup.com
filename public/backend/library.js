$(document).on('change', '#cityid', function(e, data){
	let _this = $(this);
	let id = _this.val();
	let param = {
		'id' : id,
		'text' : 'Chọn quận/huyện',
		'table' : 'vn_district',
		'trigger_district': (typeof(data) != 'undefined') ? true : false,
		'where' : {'provinceid' : id},
		'select' : 'districtid as id, name',
		'object' : '#districtid',
	};
	get_location(param);
});

if(typeof(cityid) != 'undefined' && cityid != ''){
	$('#cityid').val(cityid).trigger('change', [{'trigger':true}]);
}

$(document).on('change', '#districtid', function(){
	let _this = $(this);
	let id = _this.val();
	let param = {
		'id' : id,
		'text' : 'Chọn phường/xã',
		'table' : 'vn_ward',
		'where' : {'districtid' : id},
		'select' : 'wardid as id, name',
		'object' : '#wardid',
	};
	get_location(param);
});

function get_location(param){
	if(districtid == '' || param.trigger_district == false) districtid = 0;
	if(wardid == ''  || param.trigger_ward == false) wardid = 0;

	let formURL = '/ajax/backend/dashboard/get_location';
	$.post(formURL, {
		param: param},
		function(data){
			let json = JSON.parse(data);
			if(param.object == '#districtid'){
				$(param.object).html(json.html).val(districtid).trigger('change');
			}else if(param.object == '#wardid'){
				$(param.object).html(json.html).val(wardid);
			}
		});
}