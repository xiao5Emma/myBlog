function  markdownToHtml(str) {
    log(str);
    str = str.replace(/(\#){2,}/g,"") ;
    // 分割线
    str = str.replace(/<br>------<br>/g,"<hr/>") ;
    // 图片
    str = str.replace(/\!\[([a-zA-Z0-9-_?%.]+)\]\(([a-zA-Z0-9-_?%/:.]+)\)/i,"<img src='$2' alt='$1'>") ;

    // 链接
    str = str.replace(/\[([a-zA-Z0-9-_?%.:\/]+)\]\(([a-zA-Z0-9-_?%/:.]+)\)/i,"<a href='$2'>$1</a>") ;

    // 粗体
    str = str.replace(/\*\*(.+?)\*\*/gi,"<span class='font-weight-bold'>$1</span>");

    while(str.search('```')!==-1){
        str =  str.replace(/(```)(.*?)(```)/i,"<pre><code>$2</pre></code>") ;
    }

    return str;
}