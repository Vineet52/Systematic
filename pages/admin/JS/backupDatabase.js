$(()=>{
	$("#btnSave").on('click',function(e){
		e.preventDefault();
		console.log("Here");
		$.ajax({
		url:'PHPcode/backupdatabasecode.php',
		type:'POST',
		data:{choce:1},
		beforeSend:function(){
			$('.loadingModal').modal('show');
		},
		complete:function(){
			$('.loadingModal').modal('hide');
		}
		})
		.done(data=>{
			console.log(data);
		});
	});
	
});