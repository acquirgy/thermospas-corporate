function gup( name ){  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");  var regexS = "[\\?&]"+name+"=([^&#]*)";  var regex = new RegExp( regexS );  var results = regex.exec( window.location.href );  if( results == null )    return "Find the best hot tub that fits your needs, then get a quote!";  else    return results[1];}	

var test_string = gup ( 'testy' );


	
if (document.referrer.length > 0 || test_string == "1" )

{

var passed_string = gup( 'headline' ); 

} else var passed_string = "Find the best hot tub that fits your needs, then get a quote!";

var strReplaceAll = passed_string;
var intIndexOfMatch = strReplaceAll.indexOf( "_" );
var intIndexOfMatch2 = strReplaceAll.indexOf( "/+" );
var intIndexOfMatch3 = strReplaceAll.indexOf( "/^" );
var intIndexOfMatch4 = strReplaceAll.indexOf( "/~" );
var intIndexOfMatch5 = strReplaceAll.indexOf( "/u" );
var intIndexOfMatch6 = strReplaceAll.indexOf( "/U" );
var intIndexOfMatch7 = strReplaceAll.indexOf( "/s" );
var intIndexOfMatch8 = strReplaceAll.indexOf( "/S" );
var intIndexOfMatch9 = strReplaceAll.indexOf( "/q" );
var intIndexOfMatch10 = strReplaceAll.indexOf( "/d" );
var intIndexOfMatch11 = strReplaceAll.indexOf( "/D" );
var intIndexOfMatch12 = strReplaceAll.indexOf( "/i" );
var intIndexOfMatch13 = strReplaceAll.indexOf( "/I" );



// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "_", " " )
 

// Get the index of any next matching substring.
intIndexOfMatch = strReplaceAll.indexOf( "_" );
}

// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch2 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/+", "<br \>" )
 

// Get the index of any next matching substring.
intIndexOfMatch2 = strReplaceAll.indexOf( "/+" );
}

// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch3 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/^", "'" )
 

// Get the index of any next matching substring.
intIndexOfMatch3 = strReplaceAll.indexOf( "/^" );
}

// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch4 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/~", "£" )
 

// Get the index of any next matching substring.
intIndexOfMatch4 = strReplaceAll.indexOf( "/~" );
}

// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch5 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/u", "<u>" )
 

// Get the index of any next matching substring.
intIndexOfMatch5 = strReplaceAll.indexOf( "/u" );
}

// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch6 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/U", "</u>" )
 

// Get the index of any next matching substring.
intIndexOfMatch6 = strReplaceAll.indexOf( "/U" );
}

// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch7 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/s", "<span class=\"" )
 

// Get the index of any next matching substring.
intIndexOfMatch7 = strReplaceAll.indexOf( "/s" );
}


// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch8 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/S", "</span>" )
 

// Get the index of any next matching substring.
intIndexOfMatch8 = strReplaceAll.indexOf( "/S" );
}

// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch9 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/q", "\">" )
 

// Get the index of any next matching substring.
intIndexOfMatch9 = strReplaceAll.indexOf( "/q" );
}

// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch10 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/d", "<div class=\"" )
 

// Get the index of any next matching substring.
intIndexOfMatch10 = strReplaceAll.indexOf( "/d" );
}


// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch11 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/D", "</div>" )
 

// Get the index of any next matching substring.
intIndexOfMatch11 = strReplaceAll.indexOf( "/D" );
}

// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch12 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/i", "<i>" )
 

// Get the index of any next matching substring.
intIndexOfMatch12 = strReplaceAll.indexOf( "/i" );
}


// Loop over the string value replacing out each matching
// substring.
while (intIndexOfMatch13 != -1){
// Relace out the current instance.
strReplaceAll = strReplaceAll.replace( "/I", "</i>" )
 

// Get the index of any next matching substring.
intIndexOfMatch13 = strReplaceAll.indexOf( "/I" );
}


document.write(strReplaceAll);
