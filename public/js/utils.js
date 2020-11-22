//function doRequest(url , data = null, method = "post" , async = false , file = null){

function doRequest(args){
    if(!args.method)
        args.method = "POST";
    if(!args.async)
        args.async = false; 

    if(args.send_file){
        return $.ajax({
            method: args.method,
            url: args.url,
            async : args.async,
            data : args.data,
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
        });
    }        
    return $.ajax({
        method: args.method,
        url: args.url,
        async : args.async,
        data : {data : args.data}
    });
}
    