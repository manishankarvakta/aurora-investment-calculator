jQuery(document).ready(function( $ ) {
	
	function calculate(a, b, c){
        var percent = 16;
        var cashDriv = 8;

        var revenue = percent/100;
        var cashDriven =  cashDriv/100;
        // calculate
        var pb = (revenue*a) + a;
        var acf = (cashDriven*a) + (cashDriven*pb);
        var mcf = acf/12;    


        // display
        // Portfolio Balance

        // Annual Cash Flow

        // Monthly Cash Flow
    }
	
});