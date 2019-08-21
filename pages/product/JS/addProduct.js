var selectedProdType;
$(()=>{
	jQuery.validator.setDefaults({
  		debug: true,
  		success: "valid"
	});
	
	$("select#productType").change(function(){
        selectedProdType = $(this).children("option:selected").val();
    });

});

$("button#addProduct").on('click', event => {
	event.preventDefault();
	let form=$('#addProductForm');
	form.validate();
	if(form.valid() === false)
	{
		event.stopPropagation();
	}
	else
	{
		let productName = $("#productName").val();
		let productDescription = $("#productDescription").val();
		let unitsInCase = $("#unitsInCase").val();
		let casesInPallet = $("#casesInPallet").val();
		let costPrice = $("#costPrice").val();
		let discountPrice = $("#discountPrice").val();
		let sellingPrice = $("#sellingPrice").val();
		let measurement = $("#productMeasurement").val();
		let measurementUnit = $("#productMeasurementUnit").val();
		let productType = selectedProdType;

		$.ajax({
			url: 'PHPcode/addProduct_.php',
			type: 'POST',
			data: { 
				productName_ : productName,
				productDescription_ : productDescription,
				productType_ : productType,
				unitsInCase_ : unitsInCase,
				casesInPallet_ : casesInPallet,
				costPrice_ : costPrice,
				discountPrice_ : discountPrice,
				sellingPrice_ : sellingPrice,
				measurement_ : measurement,
				measurementUnit_ : measurementUnit
			},
			beforeSend: function() {
	
	    	}
		})
		.done(response => {
			console.log(response);
			if (response == "success")
			{
				$('#modal-title-default').text("Success!");
				$('#modalText').text("Product added sucessfully");
				$('#successfullyAdded').modal("show");
			}
			else if(response == "product name exists")
			{
				$('#modal-title-default').text("Error!");
				$('#modalText').text("This product already exists");
				$("#modalCloseButton").attr("onclick","");
				$('#successfullyAdded').modal("show");
			}
			else if(response == "databaseError")
			{
				$('#modal-title-default').text("Error!");
				$('#modalText').text("Error adding product");
				$("#modalCloseButton").attr("onclick","");
				$('#successfullyAdded').modal("show");
			}
			
			ajaxDone = true;
		});
	}	
});
