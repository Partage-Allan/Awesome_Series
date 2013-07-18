$(document).ready(function() 
{    
    $('#nav li a').click(function()
    {  
        var aCharger = $(this).attr('href')+' #contenu';
        $('#contenu').hide('fast',chargerContenu); 
        
        function chargerContenu() 
        {  
            $('#contenu').load(aCharger,'',afficherNouveauContenu)  
        }
        
        function afficherNouveauContenu() 
        {  
            $('#contenu').show('normal');  
        }
        return false;
    });   
});  

