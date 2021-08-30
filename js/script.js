jQuery(document).ready(function( $ ) {
	var inInvest = $('#inInvest');
	var addInvest = $('#addInvest');
	var yearNumRange = $('#yearNumRange');
    // alert('ih');
    inInvest.change(function(){
        calculate(inInvest.val(), addInvest.val(), yearNumRange.val());

    });
    $('#inInvestAmount').keyup(function(){
        calculate($(this).val(), addInvest.val(), yearNumRange.val());

    });
   
    addInvest.change(function(){
        calculate(inInvest.val(), addInvest.val(), yearNumRange.val());
    });

    $('#addInvestAmount').keyup(function(){
        calculate(inInvest.val().val(), $(this).val().val(), yearNumRange.val());

    });

    yearNumRange.change(function(){
        calculate(inInvest.val(), addInvest.val(), yearNumRange.val());
    });

    $('#yearNum').keyup(function(){
        calculate(inInvest.val(), addInvest.val(), $(this).val());

    });

	function calculate(a, b, c){
        var percent = 16;
        var cashDriv = 8;

        // calculate
        
       if(parseInt(c) < 2){
            //  16% non-compounded
            var compounded = percent/100;
            var revenue = compounded * parseInt(a) 

            // 8% cash dividend
            var cashDriven =  cashDriv/100;

            // Portfolio Balance
            var pb =  (revenue * parseInt(c)) +  parseInt(a);
            console.log('less then 2 year:'+a);
       }else{
           a = parseInt(a) + (parseInt(b)*(parseInt(c)-1));
            //  16% non-compounded
            var compounded = percent/100;
            var revenue = compounded * parseInt(a) 

            // 8% cash dividend
            var cashDriven =  cashDriv/100;

            // Portfolio Balance
            var pb =  (revenue * parseInt(c)) +  parseInt(a);
            console.log('more then 2 year:'+a);
       }


        var acf = (cashDriven*pb);
        // console.log(acf);
        var mcf = acf/12;    
        // console.log(mcf);


        // display
        if(parseInt(c) == 0){
            // Portfolio Balance
            $('#p_balance').html('$'+Math.round(a));

            // Annual Cash Flow
            $('#a_c_f').html('$0');
            
            // Monthly Cash Flow
            $('#m_c_f').html('$0');

        }else{
            // Portfolio Balance
            $('#p_balance').html('$'+Math.round(pb));

            // Annual Cash Flow
            $('#a_c_f').html('$'+Math.round(acf));
            
            // Monthly Cash Flow
            $('#m_c_f').html('$'+Math.round(mcf));

        }
        
    }
	
});