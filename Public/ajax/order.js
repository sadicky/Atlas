var manageOrderTable;

$(document).ready(function () {

	var divRequest = $(".div-request").text();


	if (divRequest == 'add') {

		// create order form function
		$("#createOrderForm").unbind('submit').bind('submit', function () {
			var form = $(this);

			$('.form-group').removeClass('has-error').removeClass('has-success');
			$('.text-danger').remove();

			var orderDate = $("#datev").val();
			var client = $("#client").val();
			var tel = $("#tel").val();
			var paid = $("#paid").val();
			var paymentType = $("#paymentType").val();
			var paymentStatus = $("#paymentStatus").val();

			// form validation 
			if (orderDate == "") {
				$("#orderDate").after('<p class="text-danger">Date de vente inexistante </p>');
				$('#orderDate').closest('.form-group').addClass('has-error');
			} else {
				$('#orderDate').closest('.form-group').addClass('has-success');
			} // /else

			if (client == "") {
				$("#client").after('<p class="text-danger"> Le nom du client est obligatoire </p>');
				$('#client').closest('.form-group').addClass('has-error');
			} else {
				$('#client').closest('.form-group').addClass('has-success');
			} // /else

			if (tel == "") {
				$("#tel").after('<p class="text-danger"> Le contact est obligatoire </p>');
				$('#tel').closest('.form-group').addClass('has-error');
			} else {
				$('#tel').closest('.form-group').addClass('has-success');
			} // /else

			if (paid == "") {
				$("#paid").after('<p class="text-danger"> Ce Champ est obligatoire </p>');
				$('#paid').closest('.form-group').addClass('has-error');
			} else {
				$('#paid').closest('.form-group').addClass('has-success');
			} // /else


			if (paymentType == "") {
				$("#paymentType").after('<p class="text-danger">Le type de paiement est obligatoire</p>');
				$('#paymentType').closest('.form-group').addClass('has-error');
			} else {
				$('#paymentType').closest('.form-group').addClass('has-success');
			} // /else

			if (paymentStatus == "") {
				$("#paymentStatus").after('<p class="text-danger"> Le champs du statut de paiement est obligatoire </p>');
				$('#paymentStatus').closest('.form-group').addClass('has-error');
			} else {
				$('#paymentStatus').closest('.form-group').addClass('has-success');
			} // /else


			// array validation
			var article = document.getElementsByName('article[]');
			var validateProduct;
			for (var x = 0; x < article.length; x++) {
				var articleId = article[x].id;
				if (article[x].value == '') {
					$("#" + articleId + "").after('<p class="text-danger"> Le produit est obligatoire!! </p>');
					$("#" + articleId + "").closest('.form-group').addClass('has-error');
				} else {
					$("#" + articleId + "").closest('.form-group').addClass('has-success');
				}
			} // for

			for (var x = 0; x < article.length; x++) {
				if (article[x].value) {
					validateProduct = true;
				} else {
					validateProduct = false;
				}
			} // for       		   	

			var qte = document.getElementsByName('qte[]');
			var validateqte;
			for (var x = 0; x < qte.length; x++) {
				var qteId = qte[x].id;
				if (qte[x].value == '') {
					$("#" + qteId + "").after('<p class="text-danger">La quantite est obligatoire!! </p>');
					$("#" + qteId + "").closest('.form-group').addClass('has-error');
				} else {
					$("#" + qteId + "").closest('.form-group').addClass('has-success');
				}
			}  // for

			for (var x = 0; x < qte.length; x++) {
				if (qte[x].value) {
					validateqte = true;
				} else {
					validateqte = false;
				}
			} // for       	


			if (orderDate && client && tel && paid && paymentType && paymentStatus) {
				if (validateProduct == true && validateqte == true) {
					// create order button
					// $("#createOrderBtn").button('loading');

					$.ajax({
						url: form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),
						dataType: 'json',
						success: function (response) {
							// console.log(response);
							// reset button
							$("#createOrderBtn").button('reset');

							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if (response.success == true) {

								// create order button
								$(".success-messages").html('<div class="alert alert-success">' +
									'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
									'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
									' <br /> <br /> <a type="button" onclick="printOrder(' + response.order_id + ')" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print </a>' +
									'<a href="index.php?page=order&o=add" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Order </a>' +
										'</div>');

								$("html, body, div.panel, div.pane-body").animate({ scrollTop: '0px' }, 100);

								// disabled te modal footer button
								$(".submitButtonFooter").addClass('div-hide');
								// remove the product row
								$(".removeProductRowBtn").addClass('div-hide');

							} else {
								alert(response.messages);
							}
						} // /response
					}); // /ajax
				} // if array validate is true
			} // /if field validate is true


			return false;
		}); // /create order form function	

	}

}); // /documernt


// print order function
function printOrder(orderId = null) {
	if (orderId) {

		$.ajax({
			url: 'public/script/printOrder.php',
			type: 'post',
			data: { orderId: orderId },
			dataType: 'text',
			success: function (response) {

				var mywindow = window.open('', 'Atlas', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Facture</title>');
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10
				mywindow.resizeTo(screen.width, screen.height);
				setTimeout(function () {
					mywindow.print();
					mywindow.close();
				}, 1250);

				//mywindow.print();
				//mywindow.close();

			}// /success function
		}); // /ajax function to fetch the printable order
	} // /if orderId
} // /print order function

function addRow() {
	$("#addRowBtn").button("loading");

	var tableLength = $("#productTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if (tableLength > 0) {
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;
	} else {
		// no table row
		count = 1;
		arrayNumber = 0;
	}

	$.ajax({
		url: 'Public/script/fetchProductData.php',
		type: 'post',
		dataType: 'json',
		success: function (response) {
			$("#addRowBtn").button("reset");
			var tr = '<tr id="row'+count+'" class="' + arrayNumber + '">' +
				'<td>' +
				'<div class="form-group">' +
				'<select class="form-control" name="article[]" id="article' + count + '" onchange="getProductData(' + count + ')" >' +
				'<option value="">~~SELECT~~</option>';
			// console.log(response);
			$.each(response, function (index, value) {
				tr += '<option value="' + value[0] + '">' + value[1] + '</option>';
			});

			tr += '</select>' +
				'</div>' +
				'</td>' +
				'<td style="padding-left:20px;">' +
					'<input type="text" name="rate[]" id="rate'+count +'" autocomplete="off" disabled="true" class="form-control" />' +
					'<input type="hidden" name="rateValue[]" id="rateValue'+count + '" autocomplete="off" class="form-control" />' +
				'</td>' +
				'<td style="padding-left:20px;">' +
					'<div class="form-group">' +
					'<p id="stockD'+count + '"></p>' +
					'</div>' +
				'<td style="padding-left:20px;">' +
					'<div class="form-group">' +
					'<input type="number" name="qte[]" id="qte' + count + '" onkeyup="getTotal(' + count + ')" autocomplete="off" class="form-control" min="1" />' +
					'</div>' +
				'</td>' +
				'<td style="padding-left:20px;">' +
					'<input type="text" name="total[]" id="total' + count + '" autocomplete="off" class="form-control" disabled="true" />' +
					'<input type="hidden" name="totalValue[]" id="totalValue' + count + '" autocomplete="off" class="form-control" />' +
				'</td>' +
				'<td>' +
					'<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow(' + count + ')"><i class="glyphicon glyphicon-trash"></i></button>' +
				'</td>' +
				'</tr>';
			if (tableLength > 0) {
				$("#productTable tbody tr:last").after(tr);
			} else {
				$("#productTable tbody").append(tr);
			}

		} // /success
	});	// get the product data

} // /add row

function removeProductRow(row = null) {
	if (row) {
		$("#row" + row).remove();
		subAmount();
	} else {
		alert('error! Refresh the page again');
	}
}

// select on product data
function getProductData(row = null) {

	if (row) {
		var productId = $("#article"+row).val();

		if (productId == "") {
			$("#rate"+ row).val("");

			$("#qte"+ row).val("");
			$("#total"+ row).val("");

			// remove check if product name is selected
			// var tableProductLength = $("#productTable tbody tr").length;
			// for (x = 0; x < tableProductLength; x++) {
			// 	var tr = $("#productTable tbody tr")[x];
			// 	var count = $(tr).attr('id');
			// 	count = count.substring(3);

			// 	var productValue = $("#article" + row).val()

			// 	if ($("#article" + count).val() == "") {
			// 		$("#article" + count).find("#changeProduct" + productId).removeClass('div-hide');
			// 		console.log("#changeProduct" + count);
			// 	}
			// } // /for

		} else {
			$.ajax({
				url: 'public/script/fetchSelectedProduct.php',
				type: 'post',
				data: { productId: productId },
			  dataType: 'json',
				success: function (data) {
					
					$("#rate"+row).val(data[0].PRIX);
					$("#rateValue"+row).val(data[0].PRIX);

					$("#qte"+row).val(1);
					$("#stockD"+row).text(data[0].QTE);

					var total = Number(data[0].PRIX) * 1;
					total = total.toFixed(2);
					$("#total"+row).val(total);
					$("#totalValue"+row).val(total);
					// console.log(total);
					subAmount();
				} // /success
			}); // /ajax function to fetch the product data	
		}

	} else {
		alert('no row! please refresh the page');
	}
} // /select on product data

// table total
function getTotal(row = null) {
	if (row) {
		var total = Number($("#rate"+row).val()) * Number($("#qte"+row).val());
		total = total.toFixed(2);
		$("#total"+row).val(total);
		$("#totalValue"+row).val(total);

		subAmount();

	} else {
		alert('no row !! please refresh the page');
	}
}

function subAmount() {
	var tableProductLength = $("#productTable tbody tr").length;
	var totalAmount = 0;
	for (x = 0; x < tableProductLength; x++) {
		var tr = $("#productTable tbody tr")[x];
		var count = $(tr).attr('id');
		count = count.substring(3);
		// console.log(count);
		totalAmount = Number(totalAmount) + Number($("#total"+count).val());
	} // /for

	totalAmount = totalAmount.toFixed(2);
	$("#totalAmount").val(totalAmount);
	$("#totalAmountValue").val(totalAmount);

	// console.log(totalAmount);

	var paidAmount = $("#paid").val();
	if (paidAmount) {
		paidAmount = Number($("#totalAmount").val()) - Number(paidAmount);
		paidAmount = paidAmount.toFixed(2);

		console.log(paidAmount);
		$("#due").val(paidAmount);
		$("#dueValue").val(paidAmount);
	} else {
		$("#due").val($("#totalAmount").val());
		$("#dueValue").val($("#totalAmount").val());
	} // else

} // /sub total amount


	var paid = $("#paid").val();

	var dueAmount;
	if (paid) {
		dueAmount = Number($("#totalAmount").val()) - Number($("#paid").val());
		dueAmount = dueAmount.toFixed(2);

		$("#due").val(dueAmount);
		$("#dueValue").val(dueAmount);
	} else {
		$("#due").val($("#totalAmount").val());
		$("#dueValue").val($("#totalAmount").val());
	}

// } // /discount function

function paidAmount() {
	var grandTotal = $("#totalAmount").val();

	if (grandTotal) {
		var dueAmount = Number($("#totalAmount").val()) - Number($("#paid").val());
		dueAmount = dueAmount.toFixed(2);
		$("#due").val(dueAmount);
		$("#dueValue").val(dueAmount);
	} // /if
} // /paid amoutn function


function resetOrderForm() {
	// reset the input field
	$("#createOrderForm")[0].reset();
	// remove remove text danger
	$(".text-danger").remove();
	// remove form group error 
	$(".form-group").removeClass('has-success').removeClass('has-error');
} // /reset order form


// remove order from server
function removeOrder(orderId = null) {
	if (orderId) {
		$("#removeOrderBtn").unbind('click').bind('click', function () {
			$("#removeOrderBtn").button('loading');

			$.ajax({
				url: 'public/script/removeOrder.php',
				type: 'post',
				data: { orderId: orderId },
				dataType: 'json',
				success: function (response) {
					$("#removeOrderBtn").button('reset');

					if (response.success == true) {

						manageOrderTable.ajax.reload(null, false);
						// hide modal
						$("#removeOrderModal").modal('hide');
						// success messages
						$("#success-messages").html('<div class="alert alert-success">' +
							'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
							'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function () {
							$(this).delay(3000).hide(10, function () {
								$(this).remove();
							});
						}); // /.alert	          

					} else {
						// error messages
						$(".removeOrderMessages").html('<div class="alert alert-warning">' +
							'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
							'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function () {
							$(this).delay(3000).hide(10, function () {
								$(this).remove();
							});
						}); // /.alert	          
					} // /else

				} // /success
			});  // /ajax function to remove the order

		}); // /remove order button clicked


	} else {
		alert('error! refresh the page again');
	}
}
// /remove order from server

// Payment ORDER
function paymentOrder(orderId = null) {
	if (orderId) {

		$("#orderDate").datepicker();

		$.ajax({
			url: 'Public/script/fetchOrderData.php',
			type: 'post',
			data: { orderId: orderId },
			dataType: 'json',
			success: function (response) {

				// due 
				$("#due").val(response.order[10]);

				// pay amount 
				$("#payAmount").val(response.order[10]);

				var paidAmount = response.order[9]
				var dueAmount = response.order[10];
				var grandTotal = response.order[8];

				// update payment
				$("#updatePaymentOrderBtn").unbind('click').bind('click', function () {
					var payAmount = $("#payAmount").val();
					var paymentType = $("#paymentType").val();
					var paymentStatus = $("#paymentStatus").val();

					if (payAmount == "") {
						$("#payAmount").after('<p class="text-danger">The Pay Amount field is required</p>');
						$("#payAmount").closest('.form-group').addClass('has-error');
					} else {
						$("#payAmount").closest('.form-group').addClass('has-success');
					}

					if (paymentType == "") {
						$("#paymentType").after('<p class="text-danger">The Pay Amount field is required</p>');
						$("#paymentType").closest('.form-group').addClass('has-error');
					} else {
						$("#paymentType").closest('.form-group').addClass('has-success');
					}

					if (paymentStatus == "") {
						$("#paymentStatus").after('<p class="text-danger">The Pay Amount field is required</p>');
						$("#paymentStatus").closest('.form-group').addClass('has-error');
					} else {
						$("#paymentStatus").closest('.form-group').addClass('has-success');
					}

					if (payAmount && paymentType && paymentStatus) {
						$("#updatePaymentOrderBtn").button('loading');
						$.ajax({
							url: 'php_action/editPayment.php',
							type: 'post',
							data: {
								orderId: orderId,
								payAmount: payAmount,
								paymentType: paymentType,
								paymentStatus: paymentStatus,
								paidAmount: paidAmount,
								grandTotal: grandTotal
							},
							dataType: 'json',
							success: function (response) {
								$("#updatePaymentOrderBtn").button('loading');

								// remove error
								$('.text-danger').remove();
								$('.form-group').removeClass('has-error').removeClass('has-success');

								$("#paymentOrderModal").modal('hide');

								$("#success-messages").html('<div class="alert alert-success">' +
									'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
									'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
									'</div>');

								// remove the mesages
								$(".alert-success").delay(500).show(10, function () {
									$(this).delay(3000).hide(10, function () {
										$(this).remove();
									});
								}); // /.alert	

								// refresh the manage order table
								manageOrderTable.ajax.reload(null, false);

							} //

						});
					} // /if

					return false;
				}); // /update payment			

			} // /success
		}); // fetch order data
	} else {
		alert('Error ! Refresh the page again');
	}
}
