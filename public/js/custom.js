$(document).ready(function () {

    $('.plus').click(function (e) { 
        e.preventDefault();
        var card = $(this).closest('.card-body');
        var harga = card.find('#harga').val();
        var qty = card.find('#qty').val();

        var inc = parseInt(qty) + 1;
        card.find('#qty').val(inc);

        var subtotal = parseInt(harga) * parseInt(inc);
        card.find('.total').val(subtotal);

        if( qty >= 0 ){
            card.find('.minus').prop('disabled', false)
        }
    });

    $('.minus').click(function (e) { 
        e.preventDefault();
        var card = $(this).closest('.card-body');
        var harga = card.find('#harga').val();
        var qty = card.find('#qty').val();

        var desc = parseInt(qty) - 1;
        card.find('#qty').val(desc);

        var subtotal = parseInt(harga) * parseInt(desc);
        card.find('.total').val(subtotal);

        if( qty <= 1 ){
            card.find('.minus').prop('disabled', true)
        }
    });

    $('.card-body').each(function(){
        var card = $(this);
        var harga = card.find('#harga').val();
        var qty = card.find('#qty').val();
        var total = parseInt(harga) * parseInt(qty);
        card.find('#total').val(total);
    })
});

$(document).ready(function () {

    $('.eksp').change(function (e) {

        e.preventDefault();

        var eksp = $('.eksp').val();

        if (eksp === 'jnt'){
            var ongkir = $('.ongkir').val(15000);
        } else if (eksp === 'jne'){
            var ongkir = $('.ongkir').val(12500);
        } else if (eksp === 'sicepat'){
            var ongkir = $('.ongkir').val(20500);
        } else {
            var ongkir = $('.ongkir').val(10500);
        }

        $('.pembayaran').each(function(){
    
            var card = $(this);
            var totalBelanja = card.find('.totalBelanja').val();
    
            var totalPpn = parseInt(totalBelanja) * 0.11;
            var ppn = card.find('.ppn').val(totalPpn);
    
            var discount = card.find('.discount').val();
            var totalDisc = parseInt(totalBelanja) * parseFloat(discount);
    
            var ongkir = card.find('.ongkir').val();
    
            var subtotal = parseInt(totalBelanja) + parseInt(totalPpn) + parseInt(ongkir);

            card.find('#dibayarkan').val(subtotal);
        });
    });
}); 

