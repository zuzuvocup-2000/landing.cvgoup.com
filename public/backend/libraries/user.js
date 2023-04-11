$(document).on('click', '.delete-item', function(){
	let _this = $(this);
	let id = _this.parents('tr').attr('data-id');
	swal({
		title: "Bạn có chắc khi xóa bản ghi này?",
		text: "Bạn sẽ không thể khôi phục tập tin này!",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Xóa bản ghi",
		cancelButtonText: "Hủy bỏ",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			var formURL = 'delete';
			$.post(formURL, {id:id},
				function(data){
					let json = JSON.parse(data);
					if(json.code == 200){
						$('#post-'+id).hide().remove()				
						swal("Xóa thành công!", json.message, "success");
					}else{
						swal("Có vấn đề xảy ra", json.message, "error");
					}
				}
			);
		} else {
			swal("Hủ bỏ", "Thao tác bị hủy bỏ!", "error");
		}
	});
});