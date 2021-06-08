$(function(){
    $('#orderBy').on('change', function(){
        var url= $(this).val();
        if(url){
            console.log('url');
            window.location=url;
        }
        return false;
    });
    $('#nrp').on('change', function(){
        var url= $(this).val();
        if(url){
            console.log('url');
            window.location=url;
        }
        return false;
    });
});