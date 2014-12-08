
var w;
var o="\n<BR><SELECT><OPTION>Answer<OPTION>";
var p="</SELECT>"
var n="\n\n<P><LI>"
function generate(form) 
{

w="<HTML><HEAD>"+"<TITLE>Quiz - "+form.title.value+" ("+form.name.value+")</TITLE></HEAD>"
w=w+'\n<body  bgcolor="#FFFFCE" text="#000000" link="#0000FF" vlink="#600042">';
w=w+'\n<META NAME="description" CONTENT="This is a multiple-choice quiz.  You can check your answers right away.">'
//w=w+'\n<META NAME="keywords" CONTENT="">'
w=w+"\n<CENTER><H1>"+form.title.value+"</H1>Click the answer button to see the answer.</CENTER>\n<FORM><OL>";

if(form.q1.value){   
w=w+n+form.q1.value+"\n<BR>a. "+form.c1a.value+"\n<BR>b. "+form.c1b.value;
if(form.c1c.value){w=w+"\n<BR>c. "+form.c1c.value;}
if(form.c1d.value){w=w+"\n<BR>d. "+form.c1d.value;}
if(form.c1e.value){w=w+"\n<BR>e. "+form.c1e.value;}
w=w+o+form.a1.value+p;
}
if(form.q2.value){   
w=w+n+form.q2.value+"\n<BR>a. "+form.c2a.value+"\n<BR>b. "+form.c2b.value;
if(form.c2c.value){w=w+"\n<BR>c. "+form.c2c.value;}
if(form.c2d.value){w=w+"\n<BR>d. "+form.c2d.value;}
if(form.c2e.value){w=w+"\n<BR>e. "+form.c2e.value;}
w=w+o+form.a2.value+p;
}
if(form.q3.value){   
w=w+n+form.q3.value+"\n<BR>a. "+form.c3a.value+"\n<BR>b. "+form.c3b.value;
if(form.c3c.value){w=w+"\n<BR>c. "+form.c3c.value;}
if(form.c3d.value){w=w+"\n<BR>d. "+form.c3d.value;}
if(form.c3e.value){w=w+"\n<BR>e. "+form.c3e.value;}
w=w+o+form.a3.value+p;
}
if(form.q4.value){   
w=w+n+form.q4.value+"\n<BR>a. "+form.c4a.value+"\n<BR>b. "+form.c4b.value;
if(form.c4c.value){w=w+"\n<BR>c. "+form.c4c.value;}
if(form.c4d.value){w=w+"\n<BR>d. "+form.c4d.value;}
if(form.c4e.value){w=w+"\n<BR>e. "+form.c4e.value;}
w=w+o+form.a4.value+p;
}
if(form.q5.value){   
w=w+n+form.q5.value+"\n<BR>a. "+form.c5a.value+"\n<BR>b. "+form.c5b.value;
if(form.c5c.value){w=w+"\n<BR>c. "+form.c5c.value;}
if(form.c5d.value){w=w+"\n<BR>d. "+form.c5d.value;}
if(form.c5e.value){w=w+"\n<BR>e. "+form.c5e.value;}
w=w+o+form.a5.value+p;
}
if(form.q6.value){   
w=w+n+form.q6.value+"\n<BR>a. "+form.c6a.value+"\n<BR>b. "+form.c6b.value;
if(form.c6c.value){w=w+"\n<BR>c. "+form.c6c.value;}
if(form.c6d.value){w=w+"\n<BR>d. "+form.c6d.value;}
if(form.c6e.value){w=w+"\n<BR>e. "+form.c6e.value;}
w=w+o+form.a6.value+p;
}
if(form.q7.value){   
w=w+n+form.q7.value+"\n<BR>a. "+form.c7a.value+"\n<BR>b. "+form.c7b.value;
if(form.c7c.value){w=w+"\n<BR>c. "+form.c7c.value;}
if(form.c7d.value){w=w+"\n<BR>d. "+form.c7d.value;}
if(form.c7e.value){w=w+"\n<BR>e. "+form.c7e.value;}
w=w+o+form.a7.value+p;
}
if(form.q8.value){   
w=w+n+form.q8.value+"\n<BR>a. "+form.c8a.value+"\n<BR>b. "+form.c8b.value;
if(form.c8c.value){w=w+"\n<BR>c. "+form.c8c.value;}
if(form.c8d.value){w=w+"\n<BR>d. "+form.c8d.value;}
if(form.c8e.value){w=w+"\n<BR>e. "+form.c8e.value;}
w=w+o+form.a8.value+p;
}
if(form.q9.value){   
w=w+n+form.q9.value+"\n<BR>a. "+form.c9a.value+"\n<BR>b. "+form.c9b.value;
if(form.c9c.value){w=w+"\n<BR>c. "+form.c9c.value;}
if(form.c9d.value){w=w+"\n<BR>d. "+form.c9d.value;}
if(form.c9e.value){w=w+"\n<BR>e. "+form.c9e.value;}
w=w+o+form.a9.value+p;
}
if(form.q10.value){   
w=w+n+form.q10.value+"\n<BR>a. "+form.c10a.value+"\n<BR>b. "+form.c10b.value;
if(form.c10c.value){w=w+"\n<BR>c. "+form.c10c.value;}
if(form.c10d.value){w=w+"\n<BR>d. "+form.c10d.value;}
if(form.c10e.value){w=w+"\n<BR>e. "+form.c10e.value;}
w=w+o+form.a10.value+p;
}
if(form.q11.value){   
w=w+n+form.q11.value+"\n<BR>a. "+form.c11a.value+"\n<BR>b. "+form.c11b.value;
if(form.c11c.value){w=w+"\n<BR>c. "+form.c11c.value;}
if(form.c11d.value){w=w+"\n<BR>d. "+form.c11d.value;}
if(form.c11e.value){w=w+"\n<BR>e. "+form.c11e.value;}
w=w+o+form.a11.value+p;
}
if(form.q12.value){   
w=w+n+form.q12.value+"\n<BR>a. "+form.c12a.value+"\n<BR>b. "+form.c12b.value;
if(form.c12c.value){w=w+"\n<BR>c. "+form.c12c.value;}
if(form.c12d.value){w=w+"\n<BR>d. "+form.c12d.value;}
if(form.c12e.value){w=w+"\n<BR>e. "+form.c12e.value;}
w=w+o+form.a12.value+p;
}
if(form.q13.value){   
w=w+n+form.q13.value+"\n<BR>a. "+form.c13a.value+"\n<BR>b. "+form.c13b.value;
if(form.c13c.value){w=w+"\n<BR>c. "+form.c13c.value;}
if(form.c13d.value){w=w+"\n<BR>d. "+form.c13d.value;}
if(form.c13e.value){w=w+"\n<BR>e. "+form.c13e.value;}
w=w+o+form.a13.value+p;
}
if(form.q14.value){   
w=w+n+form.q14.value+"\n<BR>a. "+form.c14a.value+"\n<BR>b. "+form.c14b.value;
if(form.c14c.value){w=w+"\n<BR>c. "+form.c14c.value;}
if(form.c14d.value){w=w+"\n<BR>d. "+form.c14d.value;}
if(form.c14e.value){w=w+"\n<BR>e. "+form.c14e.value;}
w=w+o+form.a14.value+p;
}
if(form.q15.value){   
w=w+n+form.q15.value+"\n<BR>a. "+form.c15a.value+"\n<BR>b. "+form.c15b.value;
if(form.c15c.value){w=w+"\n<BR>c. "+form.c15c.value;}
if(form.c15d.value){w=w+"\n<BR>d. "+form.c15d.value;}
if(form.c15e.value){w=w+"\n<BR>e. "+form.c15e.value;}
w=w+o+form.a15.value+p;
}
if(form.q16.value){   
w=w+n+form.q16.value+"\n<BR>a. "+form.c16a.value+"\n<BR>b. "+form.c16b.value;
if(form.c16c.value){w=w+"\n<BR>c. "+form.c16c.value;}
if(form.c16d.value){w=w+"\n<BR>d. "+form.c16d.value;}
if(form.c16e.value){w=w+"\n<BR>e. "+form.c16e.value;}
w=w+o+form.a16.value+p;
}
if(form.q17.value){   
w=w+n+form.q17.value+"\n<BR>a. "+form.c17a.value+"\n<BR>b. "+form.c17b.value;
if(form.c17c.value){w=w+"\n<BR>c. "+form.c17c.value;}
if(form.c17d.value){w=w+"\n<BR>d. "+form.c17d.value;}
if(form.c17e.value){w=w+"\n<BR>e. "+form.c17e.value;}
w=w+o+form.a17.value+p;
}
if(form.q18.value){   
w=w+n+form.q18.value+"\n<BR>a. "+form.c18a.value+"\n<BR>b. "+form.c18b.value;
if(form.c18c.value){w=w+"\n<BR>c. "+form.c18c.value;}
if(form.c18d.value){w=w+"\n<BR>d. "+form.c18d.value;}
if(form.c18e.value){w=w+"\n<BR>e. "+form.c18e.value;}
w=w+o+form.a18.value+p;
}
if(form.q19.value){   
w=w+n+form.q19.value+"\n<BR>a. "+form.c19a.value+"\n<BR>b. "+form.c19b.value;
if(form.c19c.value){w=w+"\n<BR>c. "+form.c19c.value;}
if(form.c19d.value){w=w+"\n<BR>d. "+form.c19d.value;}
if(form.c19e.value){w=w+"\n<BR>e. "+form.c19e.value;}
w=w+o+form.a19.value+p;
}
if(form.q20.value){   
w=w+n+form.q20.value+"\n<BR>a. "+form.c20a.value+"\n<BR>b. "+form.c20b.value;
if(form.c20c.value){w=w+"\n<BR>c. "+form.c20c.value;}
if(form.c20d.value){w=w+"\n<BR>d. "+form.c20d.value;}
if(form.c20e.value){w=w+"\n<BR>e. "+form.c20e.value;}
w=w+o+form.a20.value+p;
}

w=w+"\n\n</OL></FORM>"+"<P><CENTER><FONT SIZE=1>Copyright 1999 by ";
if(form.url.value){   
w=w+"<a href="+form.url.value+">"
}
w=w+form.name.value;
if(form.url.value){   
w=w+"</a>"
}
if(form.email.value){  
w=w+" (<a href=\"mailto:"+form.email.value+"?subject=Quiz\">"+form.email.value+"</a>)"
}

if(form.bottom.value){  
w=w+"\n\n<BR>"+form.bottom.value
}

w=w+"</BODY></HTML>\n\n<!-- Make a similar quiz:  http://www.aitech.ac.jp/~iteslj/quizzes/help/ -->"
form.b.value=w;
}

function pr(form) {

var a=window.open('','','toolbar=yes,status=yes,scrollbars=yes,location=yes,menubar=yes,directories=yes,width=500,height=480');

a.document.writeln(form.b.value);
}
