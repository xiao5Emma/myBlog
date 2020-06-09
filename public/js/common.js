function  markdownToHtml(str) {
    str = str.replace(/(\#){2,}/g,"") ;
    while(str.search('```')!==-1){
        str =  str.replace(/(```)(.*?)(```)/i,"<pre><code>$2</pre></code>") ;
    }

    return str;
}