(function() {
    var video = document.getElementById('video'),
        vendorURL= window.URL || window.webkit.URL;
        
        navigator.getMedia = navigator.getUserMedia ||
                             navigator.webkitGetUserMedia ||
                             navigator.mozGetUserMedia ||
                             navigator.msGetUserMedia;
    //Capture Video
    navigator.getMedia(
    {
        video:true,
        audio:false
    },
    function(stream)
    {
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    },
    function(error)
    {//error occured
        //error.code
    });
    
    
    
    
    
    
    
    
})();